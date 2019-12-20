<div class="container">
	<div class="row well">
		<h3><?=$appreporttitle;?></h3>
	</div>
	<div class="row well">
	<?php
	$fieldnames=$report["fieldnames"];
	$fieldtitles=$report["fieldtitles"];
	?>
	<table class="table table-striped">
	<thead>
		<tr>
		<?php
		foreach($fieldnames as $c=>$fname){
			?>
			<th><?=$fieldtitles["$fname"];?></th>
			<?php
		}
		?>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($recset->result_array() as $row){
		?>
		<tr>
		<?php
		foreach($fieldnames as $c=>$fname){
			?>
			<td><?=$row["$fname"];?></td>
			<?php
		}
		?>
		</tr>
		<?php
	}
	?>
	</tbody>
	</table>
	</div>
	<div class="row">
	</div>
</div>
