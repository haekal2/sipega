<?php
class M_gender extends CI_Model{
	function menu(){
		return array(
				"appTitle"=>"Referensi Kode Kode Gender"
				,"modules"=>array("add","edit","del","list")
				,"start"=>"list"
			);
	}
	function appdata($key){
		// data konfigurasi modul aplikasi dalam model
		// baca data yang dikirimkan dari form
		$data=array();
		$data["filter2edit"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Cari Kode Gender Untuk Edit!" 
			,"action"=> site_url("iotacrud/showformdatato/edit/m_gender")
			,"btnSubmit"=> "Edit"
		);
		$data["filter2del"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Cari Kode Gender Untuk Hapus!" 
			,"action"=> site_url("iotacrud/showformdatato/del/m_gender")
			,"btnSubmit"=> "Delete"
		);
		$data["form2edit"]=array(
			"appformtitle"=> "Edit Data Kode Gender!" 
			,"action"=> site_url("iotacrud/savedatafor/update/m_gender")
			,"btnSubmit"=> "Update"
		);
		$data["form2delete"]=array(
			"appformtitle"=> "Delete Data Kode Gender!" 
			,"action"=> site_url("iotacrud/savedatafor/delete/m_gender")
			,"btnSubmit"=> "Delete"
		);
		$data["formfilter"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Filter Data Kode Gender"
			,"form"=>array(
				"action"=> site_url("iotacrud/showfiltereddata/m_gender")
				,"elements"=> array("rgender_kode")
				,"buttons"=> array(
					"btnFilter"=>array(
							"name"=>"btnFilter"
							,"id"=>"btnFilter"
							,"value"=>"true"
							,"type"=>"submit"
							,"content"=>"Filter"
					)
					,"btnReset"=>array(
							"name"=>"btnReset"
							,"id"=>"btnReset"
							,"value"=>"true"
							,"type"=>"reset"
							,"content"=>"Reset"
					)
				)
			,"attributes"=>$this->attributes('*')
			)
		);
		$data["form2insert"]=array(
			"view"=> "v_tplform"
			,"appformtitle"=> "Tambah Data Kode Gender!"
			,"form"=>array(
						"action"=> site_url("iotacrud/savedatafor/insert/m_gender")
						,"elements"=> $this->defvar()
						,"buttons"=> array(
									"btnSimpan"=>array(
											"name"=>"btnSimpan"
											,"id"=>"btnSimpan"
											,"value"=>"true"
											,"type"=>"submit"
											,"content"=>"Simpan"
											)
									,"btnReset"=>array(
											"name"=>"btnReset"
											,"id"=>"btnReset"
											,"value"=>"true"
											,"type"=>"reset"
											,"content"=>"Reset"
											)
									)
						,"attributes"=>$this->attributes('*')
					)
		);
		$data["forminserted"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Tambah Data Kode Gender!"
			,"form"=>array(
						"actionnext"=> anchor("iotacrud/showformto/add/m_gender","Tambah Data Gender lagi!")
						,"elements"=> $this->defvar()
						,"attributes"=>$this->attributes('*')
					)
		);
		$data["formupdated"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Update Data Kode Gender!"
			,"form"=>array(
				"actionnext"=> 
					anchor("iotacrud/showformto/edit/m_gender",
					"Update Data Kode Gender lagi!")
				,"elements"=> $this->defvar()
				,"attributes"=>$this->attributes('*')
				)
		);
		$data["formdeleted"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Hapus Data Kode Gender!"
			,"form"=>array(
						"actionnext"=> anchor("iotacrud/showformto/del/m_gender","Hapus Data Kode Gender lagi!")
						,"elements"=> $this->defvar()
						,"attributes"=>$this->attributes('*')
					)
		);
		$data["listdata"]=array(
			// "view"=> "v_tpllistdata"
			"view"=> "v_tplcrud"
			,"appreporttitle"=> "Daftar Data Kode Gender"
			,"report"=>array(
						"fieldnames"=>$this->defvar()
						,"fieldkeys"=>array("rgender_kode")
						,"fieldtitles"=>array(
								"rgender_kode"=>"Kode"
								,"rgender_nama"=>"Nama Gender"
						)
			)
		);
		return $data[$key];
	}

	function attributes($elementname="*"){
		$attribs=array();
		$attribs["rgender_kode"]=array(
					"name"=>"rgender_kode"
					,"id"=>"rgender_kode"
					,"label"=>"Kode Gender"
					,"placeholder"=>"Kode Gender"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"1"
					,"maxlength"=>"1"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-1"  // mendefinisikan lebar kolom input
				);
		$attribs["rgender_nama"]=array(
					"name"=>"rgender_nama"
					,"id"=>"rgender_nama"
					,"label"=>"Nama Gender"
					,"placeholder"=>"Nama Gender"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"15"
					,"maxlength"=>"35"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		return (($elementname=="*")?$attribs:$attribs[$elementname]);
	}
	function defvar(){
		return array(
				"rgender_kode"
				,"rgender_nama"
			);
	}

	function deftable(){
		return array(
			"tablename"=>"r_gender"
			,"query"=>array(
						"sourcetype"=>"sql"
						,"sql"=>"select rgender_kode,rgender_nama 
								from r_gender "
						,"alias"=>array()
					)
			,"fieldkey"=>array("rgender_kode")
			,"fieldfilter"=>array("rgender_kode")
			,"fieldinsert"=>$this->defvar()
			,"fieldupdate"=>array("rgender_nama")
			,"fieldlist"=>$this->defvar()
		);
	}

	function initdata(){
		// baca data yang dikirimkan dari form
		$avar=$this->defvar();
		$data=array();
		foreach($avar as $key=>$val) $data[$val]=$this->input->post($val);
		return $data;
	}

	function insertdata($data){
        $tabledefs=$this->deftable();
        $akeyval=$this->iotadb->buildkey($data,$tabledefs["fieldkey"]);
        $c=$this->iotadb->checkrec($tabledefs["tablename"],$akeyval);
        if(!$c){
			$rec=$this->iotadb->buildrec($data,$tabledefs["fieldinsert"]);
			$result=$this->iotadb->execinsert($tabledefs["tablename"],$rec);
        } else {
			$result="Gagal simpan! ".br();
			$result.=" Key : ".$this->iotadb->showkey($data,
			$tabledefs["fieldkey"])." sudah ada!";
        }
        return $result;
	}
	function listdata($data){
		$tabledefs=$this->deftable();
		$akeyval=array();
		$recset=$this->iotadb->getrec($tabledefs["tablename"],
				$tabledefs["fieldlist"],$akeyval);
		return $recset;
	}
}
?>
