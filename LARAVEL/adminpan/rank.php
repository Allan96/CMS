<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
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
						
						<div style="float: left;margin-top: 10px;font-size: 14px;color: #4370b4;"> Usuários com RANK
<div id="carrega_rank_forum" style="height:254px;">
<?php
					$belcr_get = $dbh->prepare("SELECT credits,username,look,rank from users WHERE rank > 2 ORDER BY `rank`");
					$belcr_get->execute();
					while ($belcr_row = $belcr_get->fetch())
					{
					?>
 <div id="ranking_forum" style="float: left;width: 90px;">
 <div id="alinha">
 <div style="width:64px; height:61px; background:url(https://habbo.city/habbo-imaging/avatarimage?figure=<?= filter($belcr_row['look']) ?>&size=m&direction=3&head_direction=3&gesture=sml&action=wav); float:left; margin-top:-15px; margin-left:-5px;"></div>
 <div id="texto"><?= filter($belcr_row['username']) ?><br>
 <span>Cargo: <?= filter($belcr_row['rank']) ?></span></div></div></div>
 
 <?php
					}
					echo "</div>";?>
					</div>
					</div>
				</section>
				<!--earning graph end-->
			</div>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>		