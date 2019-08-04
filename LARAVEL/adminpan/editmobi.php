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
						Adicionar mobi (EXPLICAÇÕES NO FINAL DA PÁGINA)
													<?php Adminhk::ADDLTD(); ?>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">ID DO ITEM</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="item" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">PÁGINA</label>
								<div class="col-sm-10">
									<input type="text"  value="9081" name="page" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">NOME DO MOBI</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="name" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">CÂMBIOS</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="credits" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">DIAMANTES</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="diamonds" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">QUANTIDADE DE RAROS</label>
								<div class="col-sm-10">
									<input type="text"  value="10" name="limited" class="form-control">
								</div>
							</div>
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">ADICIONAR LTD</button></form>
						
					</div>
					
				</section>
			<center><p><b>ID DO ITEM</b> deverá ser o número encontrado na página anterior.
					<br><b>O Nome do MOBI</b> é o mesmo que você retirou do catalogo (IGUAL)
					<br><b>Quantidade de raros</b> se refere ao número de raros que terá no catalogo (O valor padrão é 10, porém pode ser alterado)
					<br><b>Página</b> Tem um valor padrão (9083), NÃO ALTERE!
					<br><b>Página Raros Usados</b> É a página (9082)! </center>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				