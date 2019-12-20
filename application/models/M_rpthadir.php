<?php
class M_rpthadir extends CI_Model{
	function menu(){
		return array(
				"appTitle"=>""
				,"modules"=>array()
				,"start"=>"list"
			);
	}
	function appdata($key){
		// data konfigurasi modul aplikasi dalam model
		$data=array();
		$data["formfilter"]=array(
			"view"=> "v_tplsearch"
			,"appformtitle"=> "Filter Data Kehadiran Pegawai"
			,"form"=>array(
				"action"=> site_url("iotacrud/showfiltereddata/m_hadirpeg")
				,"elements"=> array("rpegawai_nip","thadirpeg_tgl")
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
			"view"=> "v_tplreport"
			,"appreporttitle"=> "Daftar Data Kehadiran Pegawai"
			,"report"=>array(
						"fieldnames"=>array(
							"rpegawai_nip"			
							,"rpegawai_nama"        
							,"thadirpeg_tgl"        
							,"thadirpeg_jmasuk"    
							,"thadirpeg_jkeluar" 
							)
						,"fieldkeys"=>array(
							"rpegawai_nip"			
							,"thadirpeg_tgl"        
							)
						,"fieldtitles"=>array(
							"rpegawai_nip"=>"NIP "
							,"rpegawai_nama"=>"Nama Pegawai"
							,"thadirpeg_tgl"=>"Tanggal"
							,"thadirpeg_jmasuk"=>"Jam Masuk"
							,"thadirpeg_jkeluar"=>"Jam Keluar"
							)
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
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["thadirpeg_tgl"]=array(
					"name"=>"thadirpeg_tgl"
					,"id"=>"thadirpeg_tgl"
					,"label"=>"Tanggal"
					,"placeholder"=>"Tanggal"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"25"
					,"maxlength"=>"50"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["thadirpeg_jmasuk"]=array(
					"name"=>"thadirpeg_jmasuk"
					,"id"=>"thadirpeg_jmasuk"
					,"label"=>"Jam Masuk"
					,"placeholder"=>"Jam Masuk"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"10"
					,"maxlength"=>"10"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		$attribs["thadirpeg_jkeluar"]=array(
					"name"=>"thadirpeg_jkeluar"
					,"id"=>"thadirpeg_jkaluar"
					,"label"=>"Jam Keluar"
					,"placeholder"=>"Jam Keluar"
					,"type"=>"text"
					,"value"=>""
					,"size"=>"10"
					,"maxlength"=>"10"
					,"class"=>"form-control mini"
					,"divclass"=>"col-sm-6"  // mendefinisikan lebar kolom input
				);
		return (($elementname=="*")?$attribs:$attribs[$elementname]);
	}
	function defvar(){
		return array(
				"rpegawai_nip"
				,"thadirpeg_tgl"
				,"thadirpeg_jmasuk"
				,"thadirpeg_jkeluar"
			);
	}
	function deftable(){
		return array(
			"tablename"=>"t_hadirpeg"
			,"query"=>array(
				"sourcetype"=>"sql"
				,"sql"=>"select a.rpegawai_nip, c.rpegawai_nama
					, a.thadirpeg_tgl
					, a.thadirpeg_jkeluar, a.thadirpeg_jmasuk
					from t_hadirpeg a 
					left join r_pegawai c 
					on a.rpegawai_nip=c.rpegawai_nip "
					,"alias"=>array(
					"rpegawai_nip"=>"c.rpegawai_nip"
					)
				)
			,"fieldkey"=>array("rpegawai_nip","thadirpeg_tgl")
			,"fieldfilter"=>array("rpegawai_nip","thadirpeg_tgl")
			,"fieldinsert"=>$this->defvar()
			,"fieldupdate"=>array("thadirpeg_jmasuk"
								,"thadirpeg_jkeluar"
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
}
?>
