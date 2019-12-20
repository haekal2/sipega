<div class="container">
	<div class="jumbotron">
		<form class="form-horizontal" role="form" >
			<div class="row">
				<div class="col-sm-2"></div><div class="col-sm-10">
				<h3><?=$appformtitle;?></h3>
				</div>
			</div>
			<?php 
			$elements=$form["elements"];
			$attributes=$form["attributes"];
			foreach($elements as $fid=>$fieldname){ ?>
			<div class="form-group form-group-sm">
				<label for="<?php echo $fid;?>" class="col-sm-2 control-label">
				<?=$attributes[$fieldname]["label"];?>
				</label>
				<div class="<?=$attributes[$fieldname]["divclass"]?>">
					<?=$$fieldname;?>
				</div>
			</div>	
			<?php } ?>
			<div class="form-group form-group-sm">
				<label for="rgender_nama" class="col-sm-2 control-label"></label>
				<div class="col-sm-6">
					<?=$saveresult;?>
					<br /><?=$form["actionnext"];?>
				</div>
			</div>
		</form>
	</div>
</div>
