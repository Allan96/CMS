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
						Usuário <?php echo Adminhk::EditUser("username"); ?>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php Adminhk::EditUser("username"); 
								Adminhk::UpdateUser();
							?>
							<h2>Informações do usuário</h2><hr>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">ID</label>
								<div class="col-sm-10">
									<?php echo Adminhk::EditUser("id"); ?>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Nome</label>
								<div class="col-sm-10">
									<?php echo Adminhk::EditUser("username"); ?>
									<input type="hidden"  value="<?php echo Adminhk::EditUser("username"); ?>" name="naam" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">E-Mail</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditUser("mail"); ?>" name="mail" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Missão</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditUser("motto"); ?>" name="motto" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Moedas</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditUser("credits"); ?>" name="credits" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Duckets</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditUser("activity_points"); ?>" name="activity_points" class="form-control">
								</div>
							</div>
							<br><br>							
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Diamantes</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditUser("vip_points"); ?>" name="vip_points" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Rank</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditUser("rank"); ?>" name="rank" class="form-control">
								</div>
							</div>
							<br><br>						
	
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">Salvar usuário</button></form>
						<!--<?php

							echo'';
						?>-->
					</div>
				</section>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				