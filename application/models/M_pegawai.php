<?php
class M_pegawai extends CI_Model{
	function menu(){
		return array(
				"appTitle"=>"Data Induk Pegawai"
				,"modules"=>array("add","edit","del","list")
				,"start"=>"list"
			);
	}

	function appdata($key){
		// data konfigurasi modul aplikasi dalam model
		$data=array();
		$data["filter2edit"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Cari NIK Pegawai Untuk Edit!" 
			,"action"=> site_url("iotacrud/showformdatato/edit/m_pegawai")
			,"btnSubmit"=> "Edit"
		);
		$data["filter2del"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Cari NIK Pegawai Untuk Hapus!" 
			,"action"=> site_url("iotacrud/showformdatato/del/m_pegawai")
			,"btnSubmit"=> "Delete"
		);
		$data["form2edit"]=array(
			"appformtitle"=> "Edit Data Pegawai!" 
			,"action"=> site_url("iotacrud/savedatafor/update/m_pegawai")
			,"btnSubmit"=> "Update"
		);
		$data["form2delete"]=array(
			"appformtitle"=> "Delete Data Pegawai!" 
			,"action"=> site_url("iotacrud/savedatafor/delete/m_pegawai")
			,"btnSubmit"=> "Delete"
		);
		$data["formfilter"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Filter Data Pegawai"
			,"form"=>array(
				"action"=>site_url("iotacrud/showfiltereddata/m_pegawai")
				,"elements"=> array("rpegawai_nip")
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
		$data["listdata"]=array(
			"view"=> "v_tplcrud"
			,"appreporttitle"=> "Daftar Data Pegawai"
			,"report"=>array(
				"fieldnames"=>array(
							"rpegawai_nip"			
							,"rpegawai_nama"        
							,"rpegawai_tgllahir"    
							,"rpegawai_tempatlahir" 
							,"rgender_nama"         
							,"rpegawai_alamat"      
							,"rpegawai_kdpos"       
							,"rpegawai_telp"        
							,"rpegawai_email"       
						)
				,"fieldkeys"=>array("rpegawai_nip")
				,"fieldtitles"=>array(
							"rpegawai_nip"=>"NIP "
							,"rpegawai_nama"=>"Nama Pegawai"
							,"rpegawai_tgllahir"=>"Tgl Lahir"
							,"rpegawai_tempatlahir" =>"Tempat Lahir"
							,"rgender_nama"=>"Gender"
							,"rpegawai_alamat"=>"Alamat"
							,"rpegawai_kdpos"=>"Kode Pos"
							,"rpegawai_telp"=>"Telp."
							,"rpegawai_email"=>"Email "
						)
			)
		);
		$data["form2insert"]=array(
			"view"=> "v_tplform"
			,"appformtitle"=> "Tambah Data Pegawai!"
			,"form"=>array(
						"action"=> site_url("iotacrud/savedatafor/insert/m_pegawai")
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
			,"appformtitle"=> "Tambah Data Pegawai!"
			,"form"=>array(
						"actionnext"=> anchor("iotacrud/showformto/add/m_pegawai","Tambah Data Pegawai lagi!")
						,"elements"=> $this->defvar()
						,"attributes"=>$this->attributes('*')
					)
		);
		$data["formupdated"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Update Data Pegawai!"
			,"form"=>array(
				"actionnext"=> 
					anchor("iotacrud/showformto/edit/m_pegawai",
					"Update Data Pegawai lagi!")
				,"elements"=> $this->defvar()
				,"attributes"=>$this->attributes('*')
				)
		);
		$data["formdeleted"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Hapus Data Pegawai!"
			,"form"=>array(
						"actionnext"=> anchor("iotacrud/showformto/del/m_pegawai","Hapus Data Pegawai lagi!")
						,"elements"=> $this->defvar()
						,"attributes"=>$this->attributes('*')
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
					,"type"=>"radio"
					,"options"=>$this->iotadb->optionkeyval("r_gender",
								array("rgender_kode","rgender_nama")) 
					,"value"=>""
					,"class"=>"form-check form-check-inline"
					,"classlabel"=>"form-check-label"
					,"classinput"=>"form-check-input"
					,"divclass"=>"col-sm-6"  
				);
		$attribs["rpegawai_nip"]=array(
					"name"=>"rpegawai_nip"
					,"id"=>"rpegawai_nip"
					,"label"=>"NIP"
					,"placeholder"=>"NIP"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"10"
					,"maxlength"=>"10"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["rpegawai_nama"]=array(
					"name"=>"rpegawai_nama"
					,"id"=>"rpegawai_nama"
					,"label"=>"Nama Pegawai"
					,"placeholder"=>"Nama Pegawai"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"25"
					,"maxlength"=>"50"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["rpegawai_tgllahir"]=array(
					"name"=>"rpegawai_tgllahir"
					,"id"=>"rpegawai_tgllahir"
					,"label"=>"Tanggal Lahir"
					,"placeholder"=>"Tanggal Lahir"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"10"
					,"maxlength"=>"10"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["rpegawai_tempatlahir"]=array(
					"name"=>"rpegawai_tempatlahir"
					,"id"=>"rpegawai_tempatlahir"
					,"label"=>"Tempat Lahir"
					,"placeholder"=>"Lahir"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"25"
					,"maxlength"=>"35"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["rpegawai_alamat"]=array(
					"name"=>"rpegawai_alamat"
					,"id"=>"rpegawai_alamat"
					,"label"=>"Alamat"
					,"placeholder"=>"Alamat"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"50"
					,"maxlength"=>"100"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["rpegawai_kdpos"]=array(
					"name"=>"rpegawai_kdpos"
					,"id"=>"rpegawai_kdpos"
					,"label"=>"Kode Pos"
					,"placeholder"=>"Kode Pos"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"5"
					,"maxlength"=>"5"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["rpegawai_telp"]=array(
					"name"=>"rpegawai_telp"
					,"id"=>"rpegawai_telp"
					,"label"=>"Telepon"
					,"placeholder"=>"Telepon"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"15"
					,"maxlength"=>"30"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["rpegawai_email"]=array(
					"name"=>"rpegawai_email"
					,"id"=>"rpegawai_email"
					,"label"=>"Email"
					,"placeholder"=>"Email"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"50"
					,"maxlength"=>"100"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		return (($elementname=="*")?$attribs:$attribs[$elementname]);
	}

	function defvar(){
		return array(
				"rpegawai_nip"
				,"rpegawai_nama"
				,"rpegawai_tgllahir"
				,"rpegawai_tempatlahir"
				,"rgender_kode"
				,"rpegawai_alamat"
				,"rpegawai_kdpos"
				,"rpegawai_telp"
				,"rpegawai_email"
			);
	}

	function deftable(){
		return array(
			"tablename"=>"r_pegawai"
			,"query"=>array(
						"sourcetype"=>"sql"
						,"sql"=>"select a.rpegawai_nip, a.rpegawai_nama
								, a.rgender_kode, b.rgender_nama
								, a.rpegawai_tempatlahir, a.rpegawai_tgllahir
								, a.rpegawai_alamat, a.rpegawai_kdpos
								, a.rpegawai_telp, a.rpegawai_email
							from r_pegawai a 
							left join r_gender b 
							on a.rgender_kode=b.rgender_kode "
						,"alias"=>array("rgender_kode"=>"a.rgender_kode")
					)
			,"fieldkey"=>array("rpegawai_nip")
			,"fieldfilter"=>array("rpegawai_nip")
			,"fieldinsert"=>$this->defvar()
			,"fieldupdate"=>array("rpegawai_nama"
								,"rgender_kode"
								,"rpegawai_tempatlahir", "rpegawai_tgllahir"
								,"rpegawai_alamat"
								,"rpegawai_kdpos"
								,"rpegawai_telp"
								,"rpegawai_email"
								)
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
