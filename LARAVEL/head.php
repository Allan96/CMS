<?php
header("Content-type: image/png");

$nick = addslashes(htmlspecialchars($_GET['user']));

$conexao = mysqli_connect('localhost', 'root', 'huph@123', 'yuupisando') or die ("Configuração de Banco de Dados Errada!");
$sql ="SELECT look FROM users WHERE username='$nick'";
$res = mysqli_query($conexao, $sql) or die(mysqli_error());
$look = mysqli_fetch_array($res);
$avatar = $look['look'];

$imagem = imagecreate(54, 62);

$home = imagecreatefrompng("http://habbo.city/habbo-imaging/avatarimage?figure=$avatar&headonly=1");

imagecopy($imagem, $home, 0, 0, 0, 0, 54, 62);

ImagePng($home);//Converte a imagem para um GIF e a envia para o browser

ImageDestroy($imagem); //Destrói a memória alocada para a construção da imagem GIF.
?>