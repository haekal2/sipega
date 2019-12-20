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
	$fieldkeys=$report["fieldkeys"];
	$fieldtitles=$report["fieldtitles"];
	?>
	<?php echo anchor("iotacrud/showformto/add/".$namamodel,"Tambah",array("class"=>"btn btn-default"));?>
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
			<td>
				<form action="<?=site_url("iotacrud/showformdatato/edit/".$namamodel);?>" method="post">
				<?php
				foreach($fieldkeys as $i=>$fk) echo form_hidden($fk,$row[$fk]);
				?>
				<button type="submit">Edit</button>
				</form>
			</td>
			<td>
				<form action="<?=site_url("iotacrud/showformdatato/del/".$namamodel);?>" method="post">
				<?php
				foreach($fieldkeys as $i=>$fk) echo form_hidden($fk,$row[$fk]);
				?>
				<button type="submit">Delete</button>
				</form>
			</td>
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
