<div class="container">
	<form class="form" action="<?=$form["action"];?>" method="post">
			<?php 
			$elements=$form["elements"];
			$attributes=$form["attributes"];
			foreach($elements as $fid=>$fieldname){ 
				$f=$attributes[$fieldname];
				$fattr =getusedattr($f,$f["type"]);
				$keyval=$f["name"];
				$f["value"]=$$keyval;
				if ($f["type"]!="hidden"){
			?>
			<div class="form-group row">
				<label for="<?=$fieldname;?>" class="col-sm-2 control-label">
					<?=$f["label"];?>
				</label>
				<div class="<?=$attributes[$fieldname]["divclass"]?>">
				<?php
					echo showforminput($f,$fattr,$f["value"]);
				?>
				</div>
			<?php 
				} else {
					echo form_hidden($f["name"],$f["value"]);
				}
			} 
			?>
				<div class="form-group form-group-sm">
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
