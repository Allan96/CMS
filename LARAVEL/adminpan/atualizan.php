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
						Postar uma Atualização<br>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php Adminhk::addatualiza(); ?>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Titulo</label>
								<div class="col-sm-10">
									<input type="text" value="" name="resumo"class="form-control">
								</div>
							</div><br><br>
							<script src="//cdn.ckeditor.com/4.6.0/full/ckeditor.js"></script>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Corpo da Atualização</label>
								<div class="col-sm-10" style="width:840px;">
									<textarea id="editor1" name="conteudo"  rows="15" cols="80"><?php echo $_SESSION['slogan']; ?></textarea>
								</div>
							</div><br><br>

							
						</div></p></br>
						<button style="width: 130px;
							float: right;
							margin-right: 14px;" name="add" type="submit" class="btn btn-success">Postar</button>
							</section>
				</div>
				
			</form>
		</header>
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