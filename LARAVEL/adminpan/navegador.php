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
						Adicionar Oficial
													<?php Adminhk::Navegador(); ?>
						<form name="mygallery" action="" method="POST">
						</header>
							<iframe src="https://swf.yuup.online/navegadorpng.php?2" width="200" height="200" scrolling="no" style="height: 500px;width: 100%;border: 0;"></iframe>
					
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">ID DA SALA</label>
								<div class="col-sm-10">
									<input type="text" name="id" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Nome</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="cap" class="form-control">
								</div>
							</div>
							<br><br>
														<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Descrição</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="desc" class="form-control">
								</div>
							</div>
							<br><br>
														<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Imagem (ALTERAR NOME DA IMAGEM E ENVIAR)</label>
								<div class="col-sm-10">
									<input type="text"  value="\album1584/NOME DA IMAGEM.png" name="img" class="form-control">
								</div>
							</div>
							<br><br>
														<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Ordem (1 a 10)</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="order" class="form-control">
								</div>
							</div>
							<br><br>
																					
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Categoria: 1= Públicos//17= Jogos//17=Outros//40 = ATIVIDADES//</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="cat" class="form-control">
								</div>
							</div>
							<br><br>
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">Adicionar</button>

														
														<br><br>
<header class="panel-heading" style="margin-top:50px;">
						Remover Oficial
						</header>														
														<?php Adminhk::Nevegadordel(); ?>

							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">ID (para remover)</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="id2" class="form-control">
								</div>
							</div>
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update4" type="submit" class="btn btn-success">Remover</button></form>
						
					</div>
				</section>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				