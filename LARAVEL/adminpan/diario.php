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
																	<?php Adminhk::Diario(); ?>
																	<?php Adminhk::diariotirar(); ?>
																	
						<div class="col-md-12">
NÃO DEIXAR NENHUM CAMPO VAZIO						
					<section class="panel">
						<header class="panel-heading">
							<form action="" method="POST">
							</header>
							<div class="panel-body">
							<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Quantidade (Raros)</label>
									<div class="col-sm-10">
										<input type="text"  value="" name="raros" class="form-control">
									</div>
									
								</div>
								<br><br>
							<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Quantidade (Lotes)</label>
									<div class="col-sm-10">
										<input type="text"  value="" name="quantidade" class="form-control">
									</div>
									
								</div>
								<br><br>								
							<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Diamantes</label>
									<div class="col-sm-10">
										<input type="text"  value="" name="precod" class="form-control">
									</div>
									
								</div>
								<br><br>	
															<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Moedas</label>
									<div class="col-sm-10">
										<input type="text"  value="" name="precom" class="form-control">
									</div>
									
								</div>
								<br><br>
								<button style="width: 140px;
								float: right;
								margin-right: 14px;" name="postar" type="submit" class="btn btn-success">Adicionar</button>
							</div>
					<center><b><p>
					<button style="width: 140px;
								float: right;
								margin-right: 14px;" name="retirar" type="submit" class="btn btn-success">Retirar Raros Diários</button>
										</section>

					</div>
				</form>
				<?php
				}
			?>
				
		
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																							