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
						Editar um staff
													<?php Adminhk::UpdateAparecer(); ?>
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
								<label class="col-sm-2 col-sm-2 control-label">Função staff:</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="fun" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Aparecer na página (6=MOD,7=ADM)</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="real" class="form-control">
								</div>
							</div>
							<br><br>					
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">Editar staff</button></form>
						
					</div>
				</section>
			</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				