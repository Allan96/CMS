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
													<?php Adminhk::presente(); ?>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Nome</label>
								<div class="col-sm-10">
									<input type="text" span="23" name="username" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">ID DO MOBI</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="base_item" class="form-control">
								</div>
							</div>

							<br><br>
														<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">MENSAGEM</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="mes" class="form-control">
								</div>
							</div>
														<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">REMETENTE</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="id" class="form-control">
								</div>
							</div>
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