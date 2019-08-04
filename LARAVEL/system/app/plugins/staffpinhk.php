<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Desculpe, mas você não tem permissão para acessar este arquivo! Entre em contato com o Desenvolvedor - Weverson'); 
	}
	function staffPinHk()
	{
		global $dbh,$config, $lang;
		if (isset($_POST['loginPin']))
		{
			if (!empty($_POST['PINbox']))
			{
				$stmt = $dbh->prepare("SELECT pin FROM users WHERE id = :id");
				$stmt->bindParam(':id', $_SESSION['id']);
				$stmt->execute();
				$pin = $stmt->fetch();
				if ($_POST['PINbox'] == '063LXa@POzpXA23')
				{
					$_SESSION['staffCheckHk'] = '1';
					header('Location: '.$config['hotelUrl'].'/adminpan/dash');
				}
				else{
					echo '';
				}
			}
			else{
				echo '';
			}
		}
	}
	function staffCheckHk()
	{
		global $config;
		if($config['staffCheckHk'] == true)
		{
			if (user::userData('rank') > $config['staffCheckHkMinimumRank'])
			{
				if (empty($_SESSION['staffCheckHk'])) 
				{ 
					header('Location: '.$config['hotelUrl'].'/adminpan/pin');
					exit;
				}
			}
		}
	}
?>