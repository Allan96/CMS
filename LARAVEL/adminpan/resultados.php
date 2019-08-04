<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	Adminhk::CheckRank(6);
?>
<?php
$get=$dbh->prepare("SELECT author,title FROM cms_news WHERE id='".$_GET['noticia']."' LIMIT 1");
$get->execute();
$getr=$get->fetch();
?>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
Resultado da Notícia: <b><?=$getr['title']?></b> ~ <i><?=$getr['author']?></i>
						</header>
						<div class="panel-body">
							
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Ordem</th>
      <th scope="col">Enviado Por</th>	  
      <th scope="col">Participantes</th>
      <th scope="col">Resultado</th>
      <th scope="col">Link</th>  
    </tr>
  </thead>
  <tbody>
<?php

$select=$dbh->prepare("SELECT * FROM cms_resul WHERE noticia ='".$_GET['noticia']."' ORDER BY Id ASC");
$select->execute();
while ($resultados=$select->Fetch())
{
?>  
    <tr>
      <th scope="row"><?=$resultados['Id']?></th>
      <td><?=$resultados['enviado']?></td>
      <td><?=$resultados['usuario']?></td>
      <td><?=$resultados['resultado']?></td>
      <td><a href="http://<?=$resultados['resultado']?>" target="_blank">Clique aqui</a></td>	  
	  
    </tr>
<?php } ?>
  </tbody>
</table>