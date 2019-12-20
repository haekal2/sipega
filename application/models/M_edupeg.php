<?php
class M_edupeg extends CI_Model{
	function menu(){
		return array(
				"appTitle"=>"Data Pendidikan Pegawai"
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
			,"action"=> site_url("iotacrud/showformdatato/edit/m_edupeg")
			,"btnSubmit"=> "Edit"
		);
		$data["filter2del"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Cari NIK Pegawai Untuk Hapus!" 
			,"action"=> site_url("iotacrud/showformdatato/delete/m_edupeg")
			,"btnSubmit"=> "Delete"
		);
		$data["form2edit"]=array(
			"appformtitle"=> "Edit Data Pendidikan Pegawai!" 
			,"action"=> site_url("iotacrud/savedatafor/update/m_edupeg")
			,"btnSubmit"=> "Update"
		);
		$data["form2delete"]=array(
			"appformtitle"=> "Delete Data Pendidikan Pegawai!" 
			,"action"=> site_url("iotacrud/savedatafor/delete/m_edupeg")
			,"btnSubmit"=> "Delete"
		);
		$data["formfilter"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Filter Data Level Pendidikan Pegawai"
			,"form"=>array(
						"action"=> site_url("iotacrud/showfiltereddata/m_edupeg")
						,"elements"=> array("rpegawai_nip","redupeg_nourut")
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
			,"appreporttitle"=> "Daftar Data Level Pendidikan Pegawai"
			,"report"=>array(
						"fieldnames"=>array(
									"rpegawai_nip"											
									,"rpegawai_nama"        
									,"redupeg_nourut"        
									,"redupeg_namasekolah"        
									,"redupeg_tmasuk"    
									,"redupeg_tkeluar" 
						)
						,"fieldkeys"=>array(
									"rpegawai_nip"											
									,"redupeg_nourut"        
									)
						,"fieldtitles"=>array(
							"rpegawai_nip"=>"NIP "
							,"rpegawai_nama"=>"Nama Pegawai"
							,"redupeg_nourut"=>"No urut"
						,"redupeg_namasekolah"=>"Nama Sekolah"
							,"redupeg_tmasuk"=>"Tahun Masuk"
							,"redupeg_tkeluar"=>"Tahun Keluar"
						)
			)
		);
		$data["form2insert"]=array(
			"view"=> "v_tplform"
			,"appformtitle"=> "Tambah Data Pendidikan Pegawai!"
			,"form"=>array(
						"action"=> site_url("iotacrud/savedatafor/insert/m_edupeg")
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
			,"appformtitle"=> "Tambah Data Pendidikan Pegawai!"
			,"form"=>array(
						"actionnext"=> anchor("iotacrud/showformto/add/m_edupeg","Tambah Data Pendidikan Pegawai lagi!")
						,"elements"=> $this->defvar()
						,"attributes"=>$this->attributes('*')
					)
		);
		$data["formupdated"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Update Data Pendidikan Pegawai!"
			,"form"=>array(
				"actionnext"=> 
					anchor("iotacrud/formto/edit/m_edupeg",
					"Update Data Pendidikan Pegawai lagi!")
				,"elements"=> $this->defvar()
				,"attributes"=>$this->attributes('*')
				)
		);
		$data["formdeleted"]=array(
			"view"=> "v_tplshow"
			,"appformtitle"=> "Hapus Data Pendidikan Pegawai!"
			,"form"=>array(
						"actionnext"=> anchor("iotacrud/formto/del/m_edupeg","Hapus Data Pendidikan Pegawai lagi!")
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
		$attribs["redupeg_nourut"]=array(
					"name"=>"redupeg_nourut"
					,"id"=>"redupeg_nourut"
					,"label"=>"No Urut"
					,"placeholder"=>"No urut"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"2"
					,"maxlength"=>"2"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-1"  // mendefinisikan lebar kolom input
				);
		$attribs["redulevel_kode"]=array(
					"name"=>"redulevel_kode"
					,"id"=>"redulevel_kode"
					,"label"=>"Level Pendidikan"
					,"placeholder"=>"Level Pendidikan"
					,"type"=>"select"
					,"options"=>$this->iotadb->optionkeyval("r_edulevel",
								array("redulevel_kode","redulevel_desk")) 
					,"value"=>""
					,"size"=>"1"
					,"maxlength"=>"1"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["redupeg_namasekolah"]=array(
					"name"=>"redupeg_namasekolah"
					,"id"=>"redupeg_namasekolah"
					,"label"=>"Nama Sekolah"
					,"placeholder"=>"Nama Sekolah"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"50"
					,"maxlength"=>"50"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["redupeg_tmasuk"]=array(
					"name"=>"redupeg_tmasuk"
					,"id"=>"redupeg_tmasuk"
					,"label"=>"Tahun Masuk"
					,"placeholder"=>"Tahun Masuk"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"10"
					,"maxlength"=>"10"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-2"  // mendefinisikan lebar kolom input
				);
		$attribs["redupeg_tkeluar"]=array(
					"name"=>"redupeg_tkeluar"
					,"id"=>"redupeg_tkeluar"
					,"label"=>"Tahun Keluar"
					,"placeholder"=>"Tahun Keluar"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"4"
					,"maxlength"=>"4"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-2"  // mendefinisikan lebar kolom input
				);
		return (($elementname=="*")?$attribs:$attribs[$elementname]);
	}

	function defvar(){
		return array(
				"rpegawai_nip"
				,"redupeg_nourut"
				,"redulevel_kode"
				,"redupeg_namasekolah"
				,"redupeg_tmasuk"
				,"redupeg_tkeluar"
			);
	}

	function deftable(){
		return array(
			"tablename"=>"r_edupeg"
			,"query"=>array(
				"sourcetype"=>"sql"
				,"sql"=>"select a.rpegawai_nip, c.rpegawai_nama
					, a.redulevel_kode, b.redulevel_singkat
					, a.redupeg_nourut, a.redupeg_namasekolah
					, a.redupeg_tkeluar, a.redupeg_tmasuk
					from r_edupeg a 
					left join r_edulevel b 
					on a.redulevel_kode=b.redulevel_kode 
					left join r_pegawai c 
					on a.rpegawai_nip=c.rpegawai_nip "
					,"alias"=>array(
						"redulevel_kode"=>"a.redulevel_kode"
						,"rpegawai_nip"=>"c.rpegawai_nip"
					)
				)
			,"fieldkey"=>array("rpegawai_nip","redupeg_nourut")
			,"fieldfilter"=>array("rpegawai_nip","redupeg_nourut")
			,"fieldinsert"=>$this->defvar()
			,"fieldupdate"=>array("redupeg_namasekolah"
								,"redulevel_kode"
								,"redupeg_tmasuk", "redupeg_tkeluar"
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
