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
						Dar Pontos: <b>MOD</b>
													<?php Adminhk::UpdateAparecer2(); ?>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Nome do usuário:</label>
								<div class="col-sm-10">
									<input type="text" name="naam" class="form-control" disable>
								</div>
							</div>
							
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Pontos:</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="pontos" class="form-control">
								</div>
							</div>
							<br><br>
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update2" type="submit" class="btn btn-success">Dar Pontos</button></form>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				