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
						Ver emblemas de um usuário
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
									<input type="text" name="usuario" class="form-control" disable>
								</div>
							</div>
							<br><br>
						
							<br><br>
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;margin-top: -50px;" name="update" type="submit" class="btn btn-success">Ver emblemas</button>
						
						
																							<?php Adminhk::veremblemas(); ?></form>					</div>


				</section>
				
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				