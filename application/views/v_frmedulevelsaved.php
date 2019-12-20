	<div class="container">
		<div class="jumbotron">
			<form class="form-horizontal" role="form" action="<?=site_url("c_edulevel/save4add");?>" method="post">
				<div class="row">
					<div class="col-sm-2"></div><div class="col-sm-10"><h3>Form Entri Kode Level Edukasi!</h3></div>
				</div>
				<div class="form-group row">
					<label for="redulevel_kode" class="col-sm-2 control-label">Kode Level</label>
					<div class="col-sm-1">
						<input type="text" name="redulevel_kode" id="redulevel_kode" value="<?=$redulevel_kode;?>" readonly class="form-control-plaintext" />
					</div>
				</div>
				<div class="form-group row">
					<label for="redulevel_singkat" class="col-sm-2 control-label">Singkatan</label>
					<div class="col-sm-3">
						<input type="text" name="redulevel_singkat" id="redulevel_singkat" value="<?=$redulevel_singkat;?>" readonly class="form-control-plaintext" />
					</div>
				</div>
				<div class="form-group row">
					<label for="redulevel_desk" class="col-sm-2 control-label">Nama Level</label>
					<div class="col-sm-6">
						<input type="text" name="redulevel_desk" id="redulevel_desk" value="<?=$redulevel_desk;?>" readonly class="form-control-plaintext" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-3">
						<?=$saveresult;?>
						<br /><?=anchor("iotadb/form2add/m_edulevel","Klik untuk tambah Gender lagi!");?>
					</div>
				</div>
			</form>
		</div>
	</div>
