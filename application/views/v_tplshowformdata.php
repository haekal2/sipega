<div class="container">
	<div class="row well">
		<h3><?=$appreporttitle;?></h3>
	</div>
	<?php
	if (isset($form)) $this->load->view("v_formsearch");
	?>
	<div class="row well">
	<?php
	$fieldnames=$report["fieldnames"];
	$fieldtitles=$report["fieldtitles"];
	foreach ($recset->result_array() as $row){
	?>
	<table class="table table-striped">
		<thead>
			<tr><th colspan="2"><?=$appreporttitle;?></th></tr>
		</thead>
		<tbody>
	<?php
		foreach($fieldnames as $c=>$fname){
		?>
			<tr>
				<td><?=$fieldtitles["$fname"];?></td>
				<td><?=$row["$fname"];?></td>
			</tr>
	<?php
		}
	?>
		</tbody>
	</table>
	<?php
	}
	?>
	</div>
	<div class="row">
	</div>
</div>
