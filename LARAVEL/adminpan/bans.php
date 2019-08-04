<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
		Adminhk::CheckRank(7);
?>
<aside class="right-side">
	<section class="content">
		<!-- Main row -->
		<div class="row">
			<div class="col-md-12">
				<!--earning graph start-->
				<section class="panel">
					<header class="panel-heading">
						<b>   Administração</b><br>
					</header>
					<div class="panel-body">
						
						<div style="float: left;margin-top: 20px;font-size: 14px;color: #4370b4;">
Usuários banidos <p><br>
<div id="carrega_rank_forum" style="height:254px;">
<?php
					$belcr_get = $dbh->prepare("SELECT bantype,value,reason,added_by,id from bans ORDER BY `id` DESC  LIMIT 200");
					$belcr_get->execute();
					while ($belcr_row = $belcr_get->fetch())
					{
					?>
 <div id="ranking_forum" style="float: left;width: 300px;">
 <div id="alinha">
 <p><p><p><div id="texto">Tipo de ban: <?= filter($belcr_row['bantype']) ?><br>
<span>Usuário/IP: <?= filter($belcr_row['value']) ?></span><br>
<span>Adicionado por: <?= filter($belcr_row['added_by']) ?></span><br>
<span>Razão: <?= filter($belcr_row['reason']) ?></span></div></div></div>

 
 <?php
					}
					echo "</div>";?>
					
					</div>
					
					</div>
					<div style="float: left;margin-top: 20px;font-size: 14px;width: 550px;">
					<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Remover BAN
													<?php Adminhk::RemoverBan(); ?>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Username/IP</label>
								<div class="col-sm-10">
									<input type="text" name="ban" class="form-control" disable>
								</div>
							</div>
							<br><br>
							
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update3" type="submit" class="btn btn-success">Remover</button></form>
						
					</div>
				</section>
			</div>
		</div></div>
				</section>
				<!--earning graph end-->
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>		