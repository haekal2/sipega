<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function checkvar($data,$avar){
	$retval=false;
	$i=0;
	$c=sizeof($avar);
	while(($i<$c) && (!$retval)){
		if (strlen($data[$avar[$i]])>0) $retval=true;
		$i++;
	}
	return $retval;
}

function getusedattr($f, $tipe){
	$elattr=array();
	$elattr["text"]=array("name","id","label",
		"placeholder","size","maxlength","value","class");
	$elattr["textarea"]=array("name","id","label",
		"placeholder","rows","cols","value","class");
	$elattr["hidden"]=array("name","id","label",
		"placeholder","size","maxlength","value","class");
	$elattr["password"]=array("name","id","label",
		"placeholder","size","maxlength","value","class");
	$elattr["select"]=array("name","id","class");
	$elattr["radio"]=array("name","id","value","class");
	$elattr["checkbox"]=array("name","id","value","class");
	$elattr["email"]=array("name","id","label",
		"placeholder","size","maxlength","value","class");
	$theattr=array();
	foreach($elattr[$tipe] as $key=>$val) $theattr[$val]=$f[$val];
	return $theattr;
}
function arr2attr($myarr=array()){
	$retstr="";
	foreach($myarr as $key=>$val) $retstr.=" $key = '$val' ";
	return $retstr;
}
function showforminput($f,$fattr,$val){
	switch($f["type"]){
		case "text":
		case "email":
			$fattr["value"]=$val;
			echo form_input($fattr);
			break;
		case "hidden":
			echo form_hidden($fattr["name"],$fattr["value"]);
			break;
		case "password":
			$fattr["value"]=$val;
			echo form_password($fattr);
			break;
		case "textarea":
			$fattr["value"]=$val;
			echo form_textarea($fattr);
			break;
		case "radio":
			$options=$f["options"];
			foreach($options as $c=>$el) {
			if($c!="--"){
				$fattr["value"]=$c;
				$fattr["checked"]=($c==$val)?true:false;
				$fattr["class"]=$f["classinput"];
				echo '<label class="'.$f["classlabel"].'">'.
				form_radio($fattr).$el.'</label> &nbsp;&nbsp;';
			}
			}
			break;
		case "checkbox":
			$options=$f["options"];
			foreach($options as $c=>$el) {
			if($c!="--"){
				$fattr["value"]=$c;
				$fattr["checked"]=($c==$val)?true:false;
				$fattr["class"]=$f["classinput"];
				echo '<label class="'.$f["classlabel"].'">'.
				form_checkbox($fattr).$el.'</label>';					}
			}
			break;
		case "select":
			echo form_dropdown($f["name"],$f["options"],$val,arr2attr($fattr));
			break;
	}
}
?>
