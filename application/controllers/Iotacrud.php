<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Iotacrud extends CI_Controller{
        public function index()
        {
            $data=array();
            $data["controller"]=$this->router->class;
            $data["method"]=$this->router->method;
            $this->load->view('v_temp', $data);
        }

        public function start($fmodel){
            $this->load->model($fmodel,"iotamodel");
            $data=$this->iotamodel->menu();
            if ($data["start"]!="list") $this->showformto($data["start"],$fmodel);
            else $this->showfiltereddata($fmodel);
        }

        function modelaksi($aksi=""){
            $amodelaksi=array();
            // kunci digunakan oleh formto()
            $amodelaksi["filter"]="formfilter";
            $amodelaksi["add"]="form2insert";	
            $amodelaksi["edit"]="filter2edit";
            $amodelaksi["del"]="filter2del";
            // kunci digunakan oleh showformdatato()
            $amodelaksi["formedit"]="form2edit";
            $amodelaksi["formdel"]="form2delete";
            // kunci digunakan oleh savedatafor()
            $amodelaksi["insert"]="forminserted";
            $amodelaksi["update"]="formupdated";
            $amodelaksi["delete"]="formdeleted";
            return $amodelaksi["$aksi"];
        }

        public function showformto($aksi="view",$namamodel=""){
            $data=array();
            $this->load->model($namamodel,"iotamodel");
            $data=$this->iotamodel->initdata();
            $data["menu"]=$this->iotamodel->menu();
            if (($aksi!="add") && ($aksi!="filter")) {
                $appdata=$this->iotamodel->appdata("formfilter");
                $appdef=$this->iotamodel->appdata($this->modelaksi($aksi));
                $appdata["appformtitle"]=$appdef["appformtitle"];
                $appdata["form"]["action"]=$appdef["action"];
                $appdata["form"]["buttons"]["btnFilter"]["content"]=$appdef["btnSubmit"];
            } else $appdata=$this->iotamodel->appdata($this->modelaksi($aksi));
            $data["aksi"]=$aksi;
            $data["namamodel"]=$namamodel;
            $data["myview"]=$appdata["view"];
            $data["appformtitle"]=$appdata["appformtitle"];
            $data["form"]=$appdata["form"];
            $this->load->view("v_main",$data);
        }

        public function savedatafor($aksi="insert",$namamodel=""){
            $data=array();
            $this->load->model($namamodel,"iotamodel");
            $data=$this->iotamodel->initdata();
            $data["menu"]=$this->iotamodel->menu();		
            $appdata=$this->iotamodel->appdata($this->modelaksi($aksi));

            $tabledefs=$this->iotamodel->deftable();
            $akeyval=$this->iotadb->buildkey($data,$tabledefs["fieldkey"]);
            $c=$this->iotadb->checkrec($tabledefs["tablename"],$akeyval);
            switch($aksi){
                case "insert" :
                if(!$c){
                    $rec=$this->iotadb->buildrec($data,$tabledefs["fieldinsert"]);
                    $result=$this->iotadb->execinsert($tabledefs["tablename"],$rec);
                } else {
                    $result="Gagal simpan! ".br();
                    $result.=
                        " Key : ".$this->iotadb->showkey($data
                        ,$tabledefs["fieldkey"])." sudah ada!";
                }
                break;
                case "update" :
                if($c){
                    $rec=$this->iotadb->buildrec($data,$tabledefs["fieldupdate"]);
                    $result=$this->iotadb->execupdate($tabledefs["tablename"],$rec,$akeyval);
                } else {
                    $result="Gagal Update! ".br();
                    $result.=" Key : ".$this->iotadb->showkey($data,$tabledefs["fieldkey"])." sudah tidak ada!";
                }
                break;
                case "delete" :
                if($c){
                    $result=$this->iotadb->execdelete($tabledefs["tablename"],$akeyval);
                } else {
                    $result="Gagal Hapus! ".br();
                    $result.=" Key : ".$this->iotadb->showkey($data,$tabledefs["fieldkey"])." sudah tidak ada!";
                }
                break;
            }
            $data["namamodel"]=$namamodel;
            $data["saveresult"]=$result;
            $data["myview"]=$appdata["view"];
            $data["appformtitle"]=$appdata["appformtitle"];
            $data["form"]=$appdata["form"];
            $this->load->view("v_main",$data);
        }

        public function showformdatato($aksi="view",$namamodel){
            $data=array();
            $this->load->model($namamodel,"iotamodel");
            $data=$this->iotamodel->initdata();
            $data["menu"]=$this->iotamodel->menu();
            $formfilter=$this->iotamodel->appdata("formfilter");

            $tabledefs=$this->iotamodel->deftable();
            $akeyval=array();
            if (checkvar($data,$tabledefs["fieldfilter"])){
                $akeyval=$this->iotadb->buildkey($data,
                            $tabledefs["fieldfilter"]);
                $recset=$this->iotadb->getrec(
                            $tabledefs["tablename"],
                            $tabledefs["fieldlist"],$akeyval);
                
                if ($recset->num_rows()>0){ 
                    $row=$recset->result_array();
                foreach($row[0] as $key=>$val) $data[$key]=$val;
                }

                $appdef=$this->iotamodel->appdata($this->modelaksi("form".$aksi));
                $appdata=$this->iotamodel->appdata("form2insert");
                $appdata["appformtitle"]=$appdef["appformtitle"];
                $appdata["form"]["action"]=$appdef["action"];
                $appdata["form"]["buttons"]["btnSimpan"]["content"]=
                            $appdef["btnSubmit"];
            } else {
                if ($aksi=="add") {
                    $appdata=$this->iotamodel->appdata("form2insert");
                }// provide message - no record to edit!
            }
            $data["form"]=$appdata["form"];
            $data["aksi"]=$aksi;
            $data["fieldkey"]=$tabledefs["fieldkey"];
            $data["namamodel"]=$namamodel;
            $data["myview"]=$appdata["view"];
            $data["appformtitle"]=$appdata["appformtitle"];
            $this->load->view("v_main",$data);
        }
        
        public function showfiltereddata($namamodel){
            $data=array();
            $this->load->model($namamodel,"iotamodel");
            $data=$this->iotamodel->initdata();
            $data["menu"]=$this->iotamodel->menu();
            $formfilter=$this->iotamodel->appdata("formfilter");
            $data["form"]=$formfilter["form"];
            $appdata=$this->iotamodel->appdata("listdata");
        
            $tabledefs=$this->iotamodel->deftable();
            $query=$tabledefs["query"];
            $akeyval=array();
            $strwhere="";
            if (checkvar($data,$tabledefs["fieldfilter"])) {
                $akeyval=$this->iotadb->buildkey($data,
                                $tabledefs["fieldfilter"]);
                if ($query["sourcetype"]=="sql") 
                    $strwhere=$this->iotadb->buildwhere($akeyval,
                                    $query["alias"]);
            }
            if ($query["sourcetype"]=="sql") 
            $recset=$this->iotadb->getrecsql($query["sql"],$strwhere);
            else $recset=$this->iotadb->getrec($query["sql"],
            $tabledefs["fieldlist"],$akeyval);

            $data["recset"]=$recset;
            $data["namamodel"]=$namamodel;
            $data["myview"]=$appdata["view"];
            $data["appreporttitle"]=$appdata["appreporttitle"];
            $data["report"]=$appdata["report"];
            $this->load->view("v_main",$data);
        }
    }
?>