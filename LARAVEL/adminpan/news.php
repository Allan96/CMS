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
						Postar uma noticia<br>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php Adminhk::PostNews(); ?>
							<?php Adminhk::SaveNews(); ?>							
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Titulo</label>
								<div class="col-sm-10">
									<input type="text" value="<?php echo $_SESSION['title']; ?>" name="title"class="form-control">
								</div>
							</div><br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Descrição da noticia</label>
								<div class="col-sm-10">
									<input type="text" value="<?php echo $_SESSION['news']; ?>" name="news"class="form-control">
								</div>
							</div><br><br>
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
								<option value="Enigma">Enigma</option>	
								<option value="Flyer">Flyer</option>	
								<option value="Hall da Fama">Hall da Fama</option>	
								<option value="Áudio">Áudio</option>	
								<option value="Vídeos">Vídeos</option>	
								<option value="Wired">Wired</option>	
								<option value="Notícia">Notícia</option>	
								</select>
								</div>
							</div><br><br>								
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Imagem</label>
								<div class="col-sm-10">
						<div class="col-sm-10">
									<input type="text" value="" name="topstory"class="form-control">
								</div>		
							</div>
							<br><br>
							<script src="//cdn.ckeditor.com/4.6.0/full/ckeditor.js"></script>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Corpo da noticia</label>
								<div class="col-sm-10" style="width:840px;">
									<textarea id="editor1" name="slogan"  rows="15" cols="80"><?php echo $_SESSION['slogan']; ?></textarea>
								</div>
							</div><br><br>

							
						</div></p></br>
						<button style="width: 130px;
							float: right;
							margin-right: 14px;" name="postnews" type="submit" class="btn btn-success">Postar noticia</button>
						<button style="width: 130px;
							float: left;
							margin-right: 14px;" name="savenews" type="submit" class="btn btn-success">Salvar noticia</button>							
					</section>
				</div>
				
			</form>
		</header>
		<?php
			if (User::userData('rank') > '6')
			{
			?>
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Confira as noticias postadas<br>
						<div class="panel-body">
							<?php Adminhk::DeleteNews(); ?>
							<table class="table table-striped table-bordered table-condensed">
								<tbody>
									<?php
									
									
									
									$getArticles = $dbh->prepare("SELECT * FROM cms_news ORDER BY id DESC");
									$getArticles->execute();
										
										while($news = $getArticles->fetch())
										{
											echo'<tr>
											<td>'.$news["id"].'</td>
											<td>'.$news["title"].'</td>
											<td>'.$news["longstory"].'</td>
											<td>'.$news["author"].'</td>
											<td>'. date('d-m-Y', $news['date']).'</td>
											<td><center><a href="'.$config['hotelUrl'].'/adminpan/resultados/'.$news["id"].'"><img src="https://i.imgur.com/8ZO0Z6t.png" style="width:100px;heigth:100px;"></i></a></td>
											<td><center><a href="'.$config['hotelUrl'].'/adminpan/news/edit/'.$news["id"].'"><i  style="padding-top: 5px; color:green;" class="fa fa-edit"></i></a></td>
											<td><a href='.$config['hotelUrl'].'/adminpan/news/delete/'.$news["id"].'><i style="padding-top: 4px; color:red;" class="fa fa-trash"></i></center></a></td>
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