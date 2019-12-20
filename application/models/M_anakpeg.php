<?php
class M_anakpeg extends CI_Model{
	function menu(){
		return array(
				"appTitle"=>"Data Anak Pegawai"
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
			,"action"=> site_url("iotacrud/showformdatato/edit/m_anakpeg")
			,"btnSubmit"=> "Edit"
		);
		$data["filter2del"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Cari NIK Pegawai Untuk Hapus!" 
			,"action"=> site_url("iotacrud/showformdatato/delete/m_anakpeg")
			,"btnSubmit"=> "Delete"
		);
		$data["form2edit"]=array(
			"appformtitle"=> "Edit Data Anak Pegawai!" 
			,"action"=> site_url("iotacrud/savedatafor/update/m_anakpeg")
			,"btnSubmit"=> "Update"
		);
		$data["form2delete"]=array(
			"appformtitle"=> "Delete Data Anak Pegawai!" 
			,"action"=> site_url("iotacrud/savedatafor/delete/m_anakpeg")
			,"btnSubmit"=> "Delete"
		);
		$data["formfilter"]=array(
		"view"=> "v_tplsearch"
		,"appformtitle"=> "Filter Data Anak Pegawai"
		,"form"=>array(
			"action"=> site_url("iotacrud/showfiltereddata/m_anakpeg")
				,"elements"=> array("rpegawai_nip","ranakpeg_nourut")
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
			// "view"=> "v_tpllistdata"
			"view"=> "v_tplcrud"
			,"appreporttitle"=> "Daftar Data Anak Pegawai"
			,"report"=>array(
						"fieldnames"=>array(
							"rpegawai_nip"			
							,"rpegawai_nama"        
							,"ranakpeg_nourut"        
							,"ranakpeg_nama"        
							,"ranakpeg_tgllahir"    
							,"ranakpeg_tempatlahir" 
							,"rgender_nama"         
						)
						,"fieldkeys"=>array(
							"rpegawai_nip"			
							,"ranakpeg_nourut" 
							)      
						,"fieldtitles"=>array(
							"rpegawai_nip"=>"NIP "
							,"rpegawai_nama"=>"Nama Pegawai"
							,"ranakpeg_nourut"=>"No urut"
							,"ranakpeg_nama"  =>"Nama Anak"
							,"ranakpeg_tgllahir"  =>"Tgl Lahir"
							,"ranakpeg_tempatlahir" =>"Tempat Lahir"
							,"rgender_nama" =>"Gender"
						)
			)
		);
		$data["form2insert"]=array(
			"view"=> "v_tplform"
			,"appformtitle"=> "Tambah Data Anak Pegawai!"
			,"form"=>array(
						"action"=> site_url("iotacrud/savedatafor/insert/m_anakpeg")
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
			,"appformtitle"=> "Tambah Anak Pegawai!"
			,"form"=>array(
						"actionnext"=> anchor("iotacrud/showformto/add/m_anakpeg","Tambah Data Anak Pegawai lagi!")
						,"elements"=> $this->defvar()
						,"attributes"=>$this->attributes('*')
					)
		);
		$data["formupdated"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Update Data Anak Pegawai!"
			,"form"=>array(
				"actionnext"=> 
					anchor("iotacrud/showformto/edit/m_anakpeg",
					"Update Data Anak Pegawai lagi!")
				,"elements"=> $this->defvar()
				,"attributes"=>$this->attributes('*')
				)
		);
		$data["formdeleted"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Hapus Data Anak Pegawai!"
			,"form"=>array(
						"actionnext"=> anchor("iotacrud/showformto/del/m_anakpeg","Hapus Data Anak Pegawai lagi!")
						,"elements"=> $this->defvar()
						,"attributes"=>$this->attributes('*')
					)
		);
		return $data[$key];
	}

	function attributes($elementname="*"){
		$attribs=array();
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
					,"divclass"=>"col-sm-3"  // mendefinisikan lebar kolom input
				);
		$attribs["ranakpeg_nourut"]=array(
					"name"=>"ranakpeg_nourut"
					,"id"=>"ranakpeg_nourut"
					,"label"=>"No Urut"
					,"placeholder"=>"No urut"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"2"
					,"maxlength"=>"2"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-1"  // mendefinisikan lebar kolom input
				);
		$attribs["ranakpeg_nama"]=array(
					"name"=>"ranakpeg_nama"
					,"id"=>"ranakpeg_nama"
					,"label"=>"Nama Anak"
					,"placeholder"=>"Nama Anak"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"50"
					,"maxlength"=>"50"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["ranakpeg_tgllahir"]=array(
					"name"=>"ranakpeg_tgllahir"
					,"id"=>"ranakpeg_tgllahir"
					,"label"=>"Tanggal Lahir"
					,"placeholder"=>"Tanggal Lahir"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"10"
					,"maxlength"=>"10"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-3"  // mendefinisikan lebar kolom input
				);
		$attribs["ranakpeg_tempatlahir"]=array(
					"name"=>"ranakpeg_tempatlahir"
					,"id"=>"ranakpeg_tempatlahir"
					,"label"=>"Tempat Lahir"
					,"placeholder"=>"Tempat Lahir"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"20"
					,"maxlength"=>"50"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["rgender_kode"]=array(
					"name"=>"rgender_kode"
					,"id"=>"rgender_kode"
					,"label"=>"Kode Gender"
					,"placeholder"=>"Kode Gender"
					,"type"=>"radio"
					,"options"=>$this->iotadb->optionkeyval("r_gender",
								array("rgender_kode","rgender_nama")) 
					,"value"=>""
					,"class"=>"form-check"
					,"classlabel"=>"form-check-label"
					,"classinput"=>"form-check-input"
					,"divclass"=>"col-sm-6"  
				);
		return (($elementname=="*")?$attribs:$attribs[$elementname]);
	}

	function defvar(){
		return array(
				"rpegawai_nip"
				,"ranakpeg_nourut"
				,"ranakpeg_nama"
				,"ranakpeg_tgllahir"
				,"ranakpeg_tempatlahir"
				,"rgender_kode"
			);
	}

	function deftable(){
		return array(
			"tablename"=>"r_anakpeg"
			,"query"=>array(
					"sourcetype"=>"sql"
					,"sql"=>"select a.rpegawai_nip, c.rpegawai_nama
						, a.rgender_kode, b.rgender_nama
						, a.ranakpeg_nourut, a.ranakpeg_nama
						, a.ranakpeg_tempatlahir
						, a.ranakpeg_tgllahir
						from r_anakpeg a 
						left join r_gender b 
						on a.rgender_kode=b.rgender_kode 
						left join r_pegawai c 
						on a.rpegawai_nip=c.rpegawai_nip "
						,"alias"=>array(
						"rgender_kode"=>"a.rgender_kode"
						,"rpegawai_nip"=>"c.rpegawai_nip"
						)
					)
			,"fieldkey"=>array("rpegawai_nip","ranakpeg_nourut")
			,"fieldfilter"=>array("rpegawai_nip","ranakpeg_nourut")
			,"fieldinsert"=>$this->defvar()
			,"fieldupdate"=>array("ranakpeg_nama"
								,"rgender_kode"
								,"ranakpeg_tempatlahir", "ranakpeg_tgllahir"
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
}
?>
