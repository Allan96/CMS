<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	Adminhk::CheckRank(6);
?>
<script src="//cdn.ckeditor.com/4.6.0/full/ckeditor.js"></script>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Editar rascunho: <b><?php echo Adminhk::EditRascunho("title"); ?></b>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php Adminhk::EditRascunho("id"); 
							Adminhk::UpdateRascunho();
							Adminhk::PostNewsRascunho();?>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">ID</label>
								<div class="col-sm-10">
									<?php echo Adminhk::EditRascunho("id"); ?>
									<input type="hidden" name="id" value="<?php echo Adminhk::EditRascunho("id"); ?>">
								</div>
							</div><br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Titulo</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditRascunho("title"); ?>" name="title" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Descrição</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditRascunho("longstory"); ?>" name="longstory" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Formulário</label>
								<div class="col-sm-10">
								<select name="form">
								<option value="1">Ativado</option>
								<option value="0">Desativado</option>
								</select>
								</div>
							</div><br><br>
								<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Prazo do Formulário</label>
								<div class="col-sm-10">
									<input type="date" name="formdate"class="form-control">
								</div>								
							</div><br><br>							
														<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Categoria</label>
								<div class="col-sm-10">
<select name="category">
					<option value="<?php echo Adminhk::EditRascunho("category"); ?>"><?php echo Adminhk::EditRascunho("category"); ?></option>
								<option value="Atividade">Atividade</option>
								<option value="Canto">Canto</option>																
								<option value="Campanha">Campanha</option>								
								<option value="Caça-Palavra">Caça-Palavras</option>																
								<option value="Desenho">Desenho</option>
								<option value="Fotografia">Fotografia</option>	
								<option value="Pixel-Art">Pixel-Art</option>								
								<option value="Quarto">Quarto</option>	
								<option value="Resistência">Resistência</option>	
								<option value="Texto">Texto</option>	
								<option value="Tirinha">Tirinha</option>																
								<option value="Visual">Visual</option>								
								<option value="7 Erros">7 Erros</option>
								<option value="Outros">Outros</option>	
							<option value="Resultado">Resultado</option>															
								</select>								</div>
							</div>
							<br><br>							
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Imagem</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditRascunho("image"); ?>" name="topstory" class="form-control">
								</div>
							</div>
							<br><br>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Corpo da noticia</label>
								<p style="margin-top:50px;">
								<div class="col-sm-10" style="width:840px;">
								<textarea id="editor1" name="shortstory"  rows="15" cols="80"><?php echo Adminhk::EditRascunho("shortstory"); ?></textarea></div>
							</div>
							<br><br>
							<button style="    margin-top: 10px;width: 140px;float: right;margin-right: 14px;" name="atualizar" type="submit" class="btn btn-success">Salvar Rascunho</button>
							<button style="    margin-top: 10px;width: 160px;float: left;margin-right: 14px;" name="postnews" type="submit" class="btn btn-success">Postar Noticia </button>							
						</div>
					</section>
				</div>
			</form>
		</div>
		<?php
			if (User::userData('rank') > '6')
			{
			?>
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Confira todos os rascunhos<br>
						<div class="panel-body">
							<?php Adminhk::DeleteNews(); ?>
							<table class="table table-striped table-bordered table-condensed">
								<tbody>
									<?php
									
									
									
									$getArticles = $dbh->prepare("SELECT * FROM cms_rascunho ORDER BY id DESC");
									$getArticles->execute();
										
										while($news = $getArticles->fetch())
										{
											echo'<tr>
											<td>'.$news["id"].'</td>
											<td>'.$news["title"].'</td>
											<td>'.$news["longstory"].'</td>
											<td>'.$news["author"].'</td>
											<td>'. date('d-m-Y', $news['date']).'</td>
											<td><center><a href="'.$config['hotelUrl'].'/adminpan/rascunho/edit/'.$news["id"].'"><i  style="padding-top: 5px; color:green;" class="fa fa-edit"></i></a></td>
											</tr>';
										}
									?>
									
									
									
									
								</tbody>
							</table>
						</div>
						<?php
						}
						else{
						?>
						<?php
						}
					?>
				</div>
			</div>
			<script>
				// Replace the <textarea id="editor1"> with a CKEditor
				// instance, using default configuration.
				CKEDITOR.replace( 'editor1' );
			</script>
			<?php
				include_once "includes/footer.php";
				include_once "includes/script.php";
			?>		