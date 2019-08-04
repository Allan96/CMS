<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	Adminhk::CheckRank(7);
					$loteria=$dbh->prepare("SELECT * FROM loteria_conf WHERE Id='1'");
					$loteria->execute();
					$loteriaconf=$loteria->fetch(); 	
?>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Loteria
													<?php Adminhk::Updatelote(); ?>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Data (Escreva no formato xx/yy/zzzz)</label>
								<div class="col-sm-10">
									<input type="text" name="data" class="form-control" value="<?=$loteriaconf['data']?>">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Gif</label>
								<div class="col-sm-10">
									<input type="text" name="gif" class="form-control"value="<?=$loteriaconf['gif']?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Video</label>
								<div class="col-sm-10">
									<input type="text" name="video" class="form-control" value="<?=$loteriaconf['video']?>" >
								</div>
							</div>							
							<br><br>	
					<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Ativar</label>
						<select required="required"  name="lote" value="<?=$loteriaconf['gif']?>">
								<option value="1">Ligar</option>
								<option value="0">Desligar</option></select>
							</div>
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="atualizar" type="submit" class="btn btn-success">Atualizar</button>
						<button style="width: 140px;
							float: left;
						margin-right: 14px;" name="apagar" type="submit" class="btn btn-success">Apagar Tickets</button>
						</form>
						
					</div>
				</section>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				