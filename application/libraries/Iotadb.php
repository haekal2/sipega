<?php
    Class Iotadb{
        private $ci;
        function __construct(){
            $this->ci =& get_instance();
            $this->ci->load->database();
        }

        function buildWhere($awhere,$alias=array()){
            $retstr="";
            $i=0;
            foreach($awhere as $key=>$val){
                if ($i>0) $retstr.=" and ";
                $retstr.=((isset($alias[$key]))?$alias[$key]:" $key ")." = '$val' ";
                $i++;
            }
            if (strlen($retstr)>0) $retstr=" where ".$retstr;
            return $retstr;
        }

        public function checkrec($tablename, $akeyval){
            // query untuk periksa data sudah ada atau belum
            $this->ci->db->like($akeyval);
            $this->ci->db->from($tablename);
            $c=$this->ci->db->count_all_results();
            return $c;
        }
        
        public function buildkey($data, $akey){
            // membentuk array key field dengan datanya
            $akeyval = array();
            foreach($akey as $key=>$val) $akeyval[$val] = $data[$val];
            return $akeyval;
        }

        public function buildrec($data,$afields){
            // membentuk array pasangan field dengan datanya
            $akeyval=array();
            foreach($afields as $key=>$val) $akeyval[$val]=$data[$val];
            return $akeyval;
        }

        public function showkey($data, $akey){
            // membentuk array key field dengan datanya
            $retstr="";
            foreach($akey as $key=>$val) $retstr.=" ".$val."=".$data[$val]." ";
            return $retstr;
        }

        public function execupdate($tablename,$rec,$akeyval){
            $this->ci->db->where($akeyval);
            $this->ci->db->update($tablename,$rec);
            $result=$this->ci->db->affected_rows();
            $result=($result)?"Berhasil Diupdate!":"Gagal Diupdate!";
            return $result;
        }

        public function execdelete($tablename,$akeyval){
            $this->ci->db->delete($tablename,$akeyval);
            $result=$this->ci->db->affected_rows();
            $result=($result)?"Berhasil Dihapus!":"Gagal Dihapus!";
            return $result;
        }

        public function execinsert($tablename, $rec){
            // proses simpan...
            $this->ci->db->insert($tablename, $rec);
            $result=$this->ci->db->affected_rows();
            $result=($result)?"Berhasil disimpan!":"Gagal disimpan!";
            return $result;
        }

        public function optionkeyval($tablename,$afields){
            $this->ci->db->select($afields);
            $q=$this->ci->db->get($tablename);
            $optionarr=array();
            $optionarr["--"]="-- Pilihan --";
            foreach ($q->result_array() as $row){
            $optionarr[$row[$afields[0]]]=$row[$afields[1]];
            }
            return $optionarr;
        }
        
        public function getrec($tablename,$fieldlist,$awhere=array()){
            if (sizeof($awhere)>0) $this->ci->db->where($awhere);
            $this->ci->db->select($fieldlist);
            $result=$this->ci->db->get($tablename);
            return $result;
        }

        public function getrecsql($sqlstr,$strwhere=""){
            if (strlen($strwhere)>0) $sqlstr.=$strwhere;
            $result=$this->ci->db->query($sqlstr);
            return $result;
        }
    }
?>