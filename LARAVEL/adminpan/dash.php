<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	$_SESSION['title'] = '';
	$_SESSION['slogan'] = '';
	$_SESSION['news'] ='';
?>
<aside class="right-side">
	<section class="content">
		<!-- Main row -->
		<div class="row">
			<div class="col-md-8">
				<!--earning graph start-->
				<section class="panel">
					<header class="panel-heading">
						<b>   Administração</b><br>
					</header>
					<div class="panel-body">
					
						Estamos trabalhando duro para adicionar novas funções. <br>
						Caso tenha alguma função que você desejaria que houvesse em nosso painel contate o <a href="http://fb.com/wevehp">Weve</a><br>
						Esse painel tem todas as funções para que um hotel funcione perfeitamente =)
						<br><br>
						

						<b> Allan </b>						
					</div>
				</section>
				<!--earning graph end-->
			</div>
			<div class="col-lg-4">
				<!--chat start-->
				<section class="panel">
					<header class="panel-heading">
						<b>   AVISO! </b>
					</header>
					<div class="panel-body">
						<div class="alert alert-block alert-danger">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							Qualquer erro ou bug contate o <a href="http://fb.com/ASDSAllan">DESENVOLVEDOR</a>
						</div>
					</div>
				</section>
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>		