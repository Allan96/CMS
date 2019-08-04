<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	Adminhk::CheckRank(7);
?>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Classificar Raros (POR NOME DO CATALOGO)
													<?php Adminhk::ClassRaro(); ?>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Nome  (EXATAMENTE IGUAL DO CATALOGO)</label>
								<div class="col-sm-10">
									<input type="text" name="name" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Classe (D, B ,C , A, S, SS)</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="tipo" class="form-control">
								</div>
							</div>
							<br><br>
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update2" type="submit" class="btn btn-success">Classificar</button></form>
						
					</div>
				</section>
			</div>
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Classificar Raros (POR ID NO GAME)
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">ID</label>
								<div class="col-sm-10">
									<input type="text" name="id" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Classe (D, B ,C , A, S, SS)</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="tipo" class="form-control">
								</div>
							</div>
							<br><br>
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">Classificar</button></form>
						
					</div>
				</section>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				