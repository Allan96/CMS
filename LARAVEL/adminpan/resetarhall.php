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
						Resetar Hall
						<?php Adminhk::ResetHE(); ?><?php Adminhk::ResetHP(); ?>
						<form name="mygallery" action="" method="POST">
						</header>
						<center><p style="font-size:20px;margin-left:20px;margin-top:10px;">AO RESETAR QUALQUER UM DOS HALL'S, NÃO TERÁ VOLTA, TENHA PLENA CONSCIÊNCIA QUE NÃO HÁ UM BOTÃO DE CONFIRMAÇÃO, CLICOU = RESETOU
						</center><div class="panel-body">
							<br><br>
							<button style="width: 140px;
							float: left;
						margin-right: 14px;" name="updatehe" type="submit" class="btn btn-success">Resetar Eventos</button>
						<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="updatehp" type="submit" class="btn btn-success">Resetar Promoções</button>
						<br><button style="width: 180px;
							float: left;
						margin-top: 50px;" name="updateemb" type="submit" class="btn btn-success">MODS</button>
						<br><button style="width: 140px;
							float: left;
						margin-right: 14px;" name="updateadm" type="submit" class="btn btn-success">ADM</button>						
						</form>
						
					</div>
				</section>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				