<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	Adminhk::CheckRank(7);
?>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<?php
				if (User::userData('rank') > '7')
				{
				?>
				<div class="col-md-12">
					<section class="panel">
						<header class="panel-heading">
							Encontrar um usuário
							<form action="" method="POST">
							</header>
							<div class="panel-body">
								<?php Adminhk::searchUser(); ?>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nome</label>
									<div class="col-sm-10">
										<input type="text"  value="" name="user" class="form-control">
									</div>
								</div>
								<br><br>
								<button style="width: 140px;
								float: right;
								margin-right: 14px;" name="zoek" type="submit" class="btn btn-success">Procurar Usuário</button>
							</div>
						</section>
					</div>
				</form>
				<?php
				}
				else{
				?>
				<input type="hidden"  value="<?php echo Adminhk::EditUser("zoek"); ?>" name="zoek" class="form-control" disabled>
				<?php
				}
			?>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																							