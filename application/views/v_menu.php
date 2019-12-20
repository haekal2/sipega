<div class="container">
<div class="row">
<?php
	echo $menu["appTitle"];
	echo "&nbsp;&nbsp;";
	foreach($menu["modules"] as $c=>$item){
		if ($item!="list") echo anchor("iotacrud/showformto/$item/$namamodel",$item)." | ";
		else echo anchor("iotacrud/showfiltereddata/$namamodel",$item)." | ";
	}
	echo br();
?>
</div>
</div>
