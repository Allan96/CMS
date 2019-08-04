<?php if(empty($_GET['username']))
{
	echo 'aaa';
}
else if(!empty($_GET['username']))
{ 
$look = $_GET['username'];
echo '{"reponse":"https://yuup.online/api/grande/'.$look.'"}';
}
?>