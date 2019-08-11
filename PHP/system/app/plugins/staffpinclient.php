<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Desculpe, mas você não tem permissão para acessar este arquivo! Entre em contato com o Desenvolvedor - Weverson'); 
	}
	function staffPin()
	{
		global $dbh,$config, $lang;
		if (isset($_POST['loginPin']))
		{
		
				if ($_POST['PINbox'] == 'Xa02@dwqPlL2aq0')
				{
					$_SESSION['staffCheck'] = '1';
					header('Location: '.$config['hotelUrl'].'/client');
				}
				else{
					echo 'Senha Errada, Vacila1';
				}
			}
	
	}
	function staffCheck()
	{
		global $config,$hotel;
		if($hotel['staffCheckClient'] == true)
		{
			if (User::userData('rank') >= $hotel['staffCheckClientMinimumRank'])
			{
				if (empty($_SESSION['staffCheck'])) 
				{ 
					header('Location: '.$config['hotelUrl'].'/pin');
					exit;
				}
			}
		}
	}
?>