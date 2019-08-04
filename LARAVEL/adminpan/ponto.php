<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	Adminhk::CheckRank(6);
?>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Dar pontos de promoções
													<?php Adminhk::UpdatePromo(); ?>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Nome</label>
								<div class="col-sm-10">
									<input type="text" name="naam" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Pontos de promoções que deseja dar (+1 ou -1)</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="ppromo" class="form-control">
								</div>
							</div>
							<br><br>
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">Dar ponto</button></form>
						
					</div>
				</section>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				