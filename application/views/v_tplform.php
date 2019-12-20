	<div class="container">
		<div class="jumbotron">
			<form class="form-horizontal" role="form" action="<?=$form["action"];?>" method="post">
				<div class="row">
					<div class="col-sm-2"></div><div class="col-sm-10">
					<h3><?=$appformtitle;?></h3>
					</div>
				</div>
				<?php 
				$elements=$form["elements"];
				$attributes=$form["attributes"];
				foreach($elements as $fid=>$fieldname){ 
					$f=$attributes[$fieldname];
					$fattr =getusedattr($f,$f["type"]);
					if ($f["type"]!="hidden"){
					?>
					<div class="form-group form-group-sm row">
						<label for="<?=$fieldname;?>" 
							class="col-sm-2 control-label">
							<?=$f["label"];?>
						</label>
						<div class="<?=$attributes[$fieldname]["divclass"]?>">
							<?php
							if ($aksi!="add") if (in_array($f["name"],$fieldkey)) 
										$fattr["readonly"]="readonly";
								$f["value"]=$$fieldname;
								echo showforminput($f,$fattr,$f["value"]);
							?>
						</div>
					</div>
					<?php 
					} else {
						echo form_hidden($f["name"],$f["value"]);
						}
					} 
					?>
				<div class="form-group form-group-sm row">
					<label for="rgender_nama" class="col-sm-2 control-label"></label>
					<div class="col-sm-6">
						<?php
							$buttons=$form["buttons"];
							foreach($buttons as $name=>$button){ 
								echo form_button($button);
							}
						?>
					</div>
				</div>
			</form>
		</div>
	</div>
