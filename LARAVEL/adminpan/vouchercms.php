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
						Gerar Código Voucher para CMS
													<?php Adminhk::vouchercms(); ?>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Código</label>
								<div class="col-sm-10">
									<input type="text" name="nome" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Prêmiação</label>
								<div class="col-sm-10">
  <select name="premio">
    <option value="emblema">Emblema</option>
    <option value="moeda">Moedas</option>
    <option value="diamante">Diamante</option>
    <option value="mobi">Mobi</option>
  </select>									</div>
							</div>
							<br><br>
							
													<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Valor/Emblema/ID do Mobi</label>
								<div class="col-sm-10">
									<input type="text"  value="" name="valor" class="form-control">									</div>
							</div>
							<br><br>
														<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Quantidade</label>
								<div class="col-sm-10">
									<input type="text" name="quantidade" class="form-control" disable>
								</div>
							</div>
							<br><br>
							<button style="width: 140px;
							float: right;
						margin-right: 14px;" name="update" type="submit" class="btn btn-success">Gerar código</button></form>
						
					</div>
				</section>
			</div>
												<?php
					$belcr_get2 = $dbh->prepare("SELECT * from codigos");	
					$belcr_get2->execute();
			$filtro7 = $belcr_get2->fetch();
			$quan=''.filter($filtro7["quantidade"]).'';		
			$peg=''.filter($filtro7["pegos"]).'';		
					$belcr_get = $dbh->prepare("SELECT * from codigos WHERE `quantidade`>=`pegos`");
					$belcr_get->execute();
					while ($belcr_row = $belcr_get->fetch())
					{
					?>			
<div  style="float:left; margin-left:4px;margin-bottom:5px;margin-top:5px; ">
								
<b style="font-size: 14px;">Código: <?= filter($belcr_row['nome']) ?></b>
<br><span class="currency cookies" style="background: #FFFAFA no-repeat right -9px center  url();margin-top:1px">Prémio: <?= filter($belcr_row['premio'])?></span>
<br><span class="currency cookies" style="background: #FFFAFA no-repeat right -9px center  url();margin-top:1px">Valor: <?= filter($belcr_row['valor'])?></span>
<br><span class="currency cookies" style="background:  #FFFAFA no-repeat right -9px center  url();margin-top:1px">Pegos: <?= filter($belcr_row['pegos'])?></span>
<br><span class="currency cookies" style="background: #FFFAFA no-repeat right -9px center  url();margin-top:1px">Quantidade: <?= filter($belcr_row['quantidade'])?></span>
<br><span class="currency cookies" style="background: #FFFAFA no-repeat right -9px center  url();margin-top:1px">Gerado por: <?= filter($belcr_row['staff'])?></span>

</div>



</a>
 <?php
					}
					echo "";?>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>																				