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
						Adicionar/Remover Filtro
													<?php Adminhk::Filtro(); ?>
													<?php Adminhk::RemoverFiltro(); ?>
													
													
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Palavra</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="palavra" class="form-control">
								</div>
							</div>
							<br><br>
							<button style="width: 140px;
							float: left;
						margin-right: 14px;" name="update2" type="submit" class="btn btn-success">Remover Filtro</button>	</br>
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">Adicionar Filtro</button><br></br>
					
										
						
					
						</form>
													<?php Adminhk::FiltroVer(); ?>
						
					</div>
				</section>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				