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
							Procurar ID de uma página
							<form action="" method="POST">
							</header>
							<div class="panel-body">
								<?php Adminhk::catalogpage(); ?>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nome da Página</label>
									<div class="col-sm-10">
										<input type="text"  value="" name="page" class="form-control">
									</div>
								</div>
							</div>
						</section>
					<section class="panel">
						<header class="panel-heading">
							Ver Mobis na página
							<form action="" method="POST">
							</header>
							<div class="panel-body">
								<?php Adminhk::catalogpagesi(); ?>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">ID da página</label>
									<div class="col-sm-10">
										<input type="text"  value="" name="mobis" class="form-control">
									</div>
								</div>
								
								
							</div>
							<button style="width: 140px;
								float: right;
								margin-right: 14px;" name="zoek1" type="submit" class="btn btn-success">Procurar</button>
							<br><br>
								
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
			?><p><br><br>	

				<section class="content">
				<section class="panel">
					<header class="panel-heading">
						Editar Mobi
													<?php Adminhk::catalogpagesal(); ?>
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
								<label class="col-sm-2 col-sm-2 control-label">Página</label>
								<div class="col-sm-10">
									<input type="text"  value="(ADICIONAR NOVO VALOR OU VALOR ANTIGO) 9082 = RAROS USADOS" name="page" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Câmbios</label>
								<div class="col-sm-10">
									<input type="text"  value="(ADICIONAR NOVO VALOR OU VALOR ANTIGO)" name="credits" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Diamantes</label>
								<div class="col-sm-10">
									<input type="text"  value="(ADICIONAR NOVO VALOR OU VALOR ANTIGO)" name="diamonds" class="form-control">
								</div>
							</div>
							
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update1" type="submit" class="btn btn-success">Editar MOBI</button></form>
						
					</div>
				</section>
		
		</div>
		
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																							