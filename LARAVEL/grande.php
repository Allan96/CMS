<?php
header("Content-type: image/png");
$dbh5 = new PDO('mysql:host=localhost:3306;dbname=yuupisando', 'root', 'huph@123');
$nick = addslashes(htmlspecialchars($_GET['user']));
$select=$dbh5->prepare("SELECT look FROM users WHERE username='$nick' LIMIT 1");
$select->execute();
$look=$select->fetch();
$avatar1=$look['look'];
$imagem = imagecreate(128, 220);
	$home = imagecreatefrompng("http://habbo.city/habbo-imaging/avatarimage?figure=$avatar1&size=l&img_format=png");
imagecopy($imagem, $home, 0, 0, 0, 0, 128, 220);
ImagePng($imagem);//Converte a imagem para um GIF e a envia para o browser

ImageDestroy($imagem); //Destrói a memória alocada para a construção da imagem GIF.
mysql_close($dbh5);
?>