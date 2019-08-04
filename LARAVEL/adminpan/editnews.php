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
						Editar a noticia <b><?php echo Adminhk::EditNews("title"); ?></b>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php Adminhk::EditNews("id"); 
							Adminhk::UpdateNews();?>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">ID</label>
								<div class="col-sm-10">
									<?php echo Adminhk::EditNews("id"); ?>
									<input type="hidden" name="id" value="<?php echo Adminhk::EditNews("id"); ?>">
								</div>
							</div><br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Titulo</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditNews("title"); ?>" name="title" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Descrição</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo Adminhk::EditNews("longstory"); ?>" name="longstory" class="form-control">
								</div>
							</div>
							<br><br>
														<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Categoria</label>
								<div class="col-sm-10">
<select name="category">
					<option value="<?php echo Adminhk::EditNews("category"); ?>"><?php echo Adminhk::EditNews("category"); ?></option>
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
									<input type="text"  value="<?php echo Adminhk::EditNews("image"); ?>" name="topstory" class="form-control">
								</div>
							</div>
							<br><br>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Corpo da noticia</label>
								<p style="margin-top:200px;">
								<div class="col-sm-10" style="width:840px;">
								<textarea id="editor1" name="shortstory"  rows="15" cols="80"><?php echo Adminhk::EditNews("shortstory"); ?></textarea></div>
							</div>
							<br><br>
							<button style="    margin-top: 10px;width: 140px;float: right;margin-right: 14px;" name="update" type="submit" class="btn btn-success">Salvar noticia</button>
						</div>
					</section>
				</div>
			</form>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>									
		<style>
			.imagebox {
			width: auto;
			background-repeat: repeat-y;
			border-radius: 6px;
			float: left;
			margin-right: 0.72pc;
			margin-bottom: 10px;
			webkit-box-shadow: 0 3px rgba(0,0,0,.17),inset 0px 0px 0px 1px rgba(0,0,0,0.31),inset 0 0 0 2px rgba(255,255,255,0.44)!important;
			-moz-box-shadow: 0 3px rgba(0,0,0,.17),inset 0px 0px 0px 1px rgba(0,0,0,0.31),inset 0 0 0 2px rgba(255,255,255,0.44)!important;
			box-shadow: 0 3px rgba(0,0,0,.17),inset 0px 0px 0px 1px rgba(0,0,0,0.31),inset 0 0 0 2px rgba(255,255,255,0.44)!important;
			}
		</style>
		<script>
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			CKEDITOR.replace( 'editor1' );
		</script>		