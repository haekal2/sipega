<?php
class M_edulevel extends CI_Model{
	function menu(){
		return array(
				"appTitle"=>"Referensi Kode Level Pendidikan"
				,"modules"=>array("add","edit","del","list")
				,"start"=>"list"
			);
	}

	function appdata($key){
		// baca data yang dikirimkan dari form
		$data=array();
		$data["formfilter"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Filter Data Level Pendidikan"
			,"form"=>array(
				"action"=> site_url("iotacrud/showfiltereddata/m_edulevel")
				,"elements"=> array("redulevel_kode")
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
			,"appformtitle"=> "Tambah Data Level Pendidikan!"
			,"form"=>array(
						"action"=> site_url("iotacrud/savedatafor/insert/m_edulevel")
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
			,"appformtitle"=> "Tambah Data Level Pendidikan!"
			,"form"=>array(
						"actionnext"=> anchor("iotacrud/showformto/add/m_edulevel","Tambah Data Level Pendidikan lagi!")
						,"elements"=> $this->defvar()
						,"attributes"=>$this->attributes('*')
					)
		);
		$data["filter2edit"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Cari Level Pendidikan Untuk Edit!" 
			,"action"=> site_url("iotacrud/showformdatato/edit/m_edulevel")
			,"btnSubmit"=> "Edit"
		);

		$data["form2edit"]=array(
			"appformtitle"=> "Edit Data Level Pendidikan!" 
			,"action"=> site_url("iotacrud/savedatafor/update/m_edulevel")
			,"btnSubmit"=> "Update"
		);
		$data["formupdated"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Update Data Level Pendidikan!"
			,"form"=>array(
				"actionnext"=>anchor("iotacrud/showformto/edit/m_edulevel","Update Data Level Pendidikan lagi!")
				,"elements"=> $this->defvar()
				,"attributes"=>$this->attributes('*')
				)
		);
		$data["filter2del"]=array(
			"appformtitle"=> "Cari Kode Level Pendidikan U/ Dihapus!" 
			,"action"=> site_url("iotacrud/showformdatato/del/m_edulevel")
			,"btnSubmit"=> "Delete"
		);
		$data["form2delete"]=array(
			"appformtitle"=> "Delete Data Level Pendidikan!" 
			,"action"=> site_url("iotacrud/savedatafor/delete/m_edulevel")
			,"btnSubmit"=> "Delete"
		);
		$data["formdeleted"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Hapus Data Level Pendidikan!"
			,"form"=>array(
					"actionnext"=> anchor("iotacrud/showformto/del/m_edulevel","Hapus Data Level Pendidikan lagi!")
					,"elements"=> $this->defvar()
					,"attributes"=>$this->attributes('*')
					)
		);
		$data["listdata"]=array(
			"view"=> "v_tplcrud"
			,"appreporttitle"=> "Daftar Data Kode Level Pendidikan"
			,"report"=>array(
						"fieldnames"=>$this->defvar()
						,"fieldkeys"=>array("redulevel_kode")
						,"fieldtitles"=>array(
						"redulevel_kode"=>"Kode"
						,"redulevel_singkat"=>"Singkatan"
						,"redulevel_desk"=>"Nama Level"
						)
			)
		);
		return $data[$key];
	}
	function attributes($elementname="*"){
		$attribs=array();
		$attribs["redulevel_kode"]=array(
					"name"=>"redulevel_kode"
					,"id"=>"redulevel_kode"
					,"label"=>"Kode "
					,"placeholder"=>"Kode "
					,"type"=>"text"
					,"value"=>""
					,"size"=>"1"
					,"maxlength"=>"1"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-1"  // mendefinisikan lebar kolom input
				);
		$attribs["redulevel_singkat"]=array(
					"name"=>"redulevel_singkat"
					,"id"=>"redulevel_singkat"
					,"label"=>"Nama Singkat"
					,"placeholder"=>"Nama Singkat"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"15"
					,"maxlength"=>"35"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["redulevel_desk"]=array(
					"name"=>"redulevel_desk"
					,"id"=>"redulevel_desk"
					,"label"=>"Deskripsi"
					,"placeholder"=>"Deskripsi"
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
				"redulevel_kode"
				,"redulevel_singkat"
				,"redulevel_desk"
			);
	}

	function deftable(){
		return array(
			"tablename"=>"r_edulevel"
			,"query"=>array(
				"sourcetype"=>"sql"
				,"sql"=>"select 
						redulevel_kode,redulevel_singkat
						,redulevel_desk from r_edulevel "
				,"alias"=>array()
				)
			,"fieldkey"=>array("redulevel_kode")
			,"fieldfilter"=>array("redulevel_kode")
			,"fieldinsert"=>array("redulevel_kode"
					,"redulevel_singkat","redulevel_desk")
			,"fieldupdate"=>array("redulevel_singkat"
						,"redulevel_desk")
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
			$result.=" Key : ".$this->iotadb->showkey($data,$tabledefs["fieldkey"])." sudah ada!";
		}
		return $result;
	}

	function listdata($data){
		$tabledefs=$this->deftable();
		$akeyval=array();
		if (checkvar($data,$tabledefs["fieldfilter"])) 
			$akeyval=$this->iotadb->buildkey($data,
								$tabledefs["fieldfilter"]);
		$recset=$this->iotadb->getrec($tabledefs["tablename"],
					$tabledefs["fieldlist"],$akeyval);
		return $recset;
	}
}
?>
