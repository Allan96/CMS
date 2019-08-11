<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	/* 
		Functions list Class Admin.
		--------------- 
		error();
		gelukt();
		CheckRank();
		staffpin();
		staffCheck();
		UpdateUser();
		UpdateUserOfTheWeek();
		UpdateNews();
		searchUser();
		searchUserOfTheWeek();
		EditUser();
		EditUserOfTheWeek();
		EditNews();
		LookSollie();
		DeleteNews();
		DeleteSollie();
		DeleteBans();
		PostNews();
	*/
	Class Adminhk
	{
		public static function hashed($password) {
		$hash_secret = "xCg532%@%gdvf^5DGaa6&*rFTfg^FD4\$OIFThrR_gh(ugf*/";
		return md5($password.($hash_secret));
		}
		
		public static function error($errorName)
		{
			echo "<div class=\"alert alert-block alert-danger \"><strong>" . $errorName . "</div>";
		}
		public static function gelukt($errorName)
		{
			echo "<div class=\"alert alert-block alert-success \"><strong>" . $errorName . "</div>";
		}
		public static function CheckRank($rank)
		{
			global $config;
			{
				if (User::userData('rank') <= $rank)
				{
					header('Location: '.$config['hotelUrl'].'/index');	
					exit();
				}
			}
		}
		public static function UpdateUser()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$upateUser = $dbh->prepare("UPDATE users SET 
				motto=:motto,
				username=:name,
				mail=:mail,
				credits=:credits,
				vip_points=:vip_points,
				activity_points=:activity_points,
				rank=:rank,
				real_name=:rank
				WHERE username = :name");
				$upateUser->bindParam(':motto', $_POST['motto']); 
				$upateUser->bindParam(':name', $_POST['naam']); 
				$upateUser->bindParam(':mail', $_POST['mail']); 
				$upateUser->bindParam(':credits', $_POST['credits']); 
				$upateUser->bindParam(':vip_points', $_POST['vip_points']); 
				$upateUser->bindParam(':activity_points', $_POST['activity_points']); 
				$upateUser->bindParam(':rank', $_POST['rank']); 
				$upateUser->execute(); 
				Admin::gelukt("Usuário Salvo");
			}	
		}
		public static function UpdateUserD()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$updateDiamondsD = $dbh->prepare("UPDATE users SET 
				username=:name,
				vip_points=:vip_points,
				WHERE username = :name");
				$updateDiamondsD->bindParam(':name', $_POST['naam']); 
				$updateDiamondsD->bindParam(':vip_points', $_POST['vip_points']); 
				$updateDiamondsD->execute(); 
				Admin::gelukt("Diamantes dados com sucesso!");
			}	
		}
		public static function UpdateDiamonds()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$updateDiamonds = $dbh->prepare("UPDATE users SET 
				vip_points=vip_points + :vip_points
				WHERE username = :name");
				$updateDiamonds->bindParam(':vip_points', $_POST['vip_points']); 
				$updateDiamonds->bindParam(':name', $_POST['naam']); 
				$updateDiamonds->execute(); 
				Admin::gelukt("Diamantes dados com sucesso!");
			}	
		}
		public static function UpdateUserOfTheWeek()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$getUserData = $dbh->prepare("SELECT id,username FROM users WHERE username = :name");
				$getUserData->bindParam(':name', $_POST['naam']); 
				$getUserData->execute(); 
				$upateUser2 = $getUserData->fetch();
				if ($upateUser = $dbh->prepare("UPDATE uotw SET userid=:userdata,text=:txt"))
				{
					$upateUser->bindParam(':userdata', $upateUser2['id']); 
					$upateUser->bindParam(':txt', $_POST['uftwtext']); 
					$upateUser->execute();
					Admin::gelukt("De gebruiker heeft nu UOTW");
				}
				else 
				{
					Admin::error("Niet gelukt!");
				}  
			}
		}
		
		public static function UpdatePromo()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$upateUser = $dbh->prepare("UPDATE users SET 
				ppromos=ppromos + :promo
				WHERE username = :name");
				$upateUser->bindParam(':promo', $_POST['ppromo']); 
				$upateUser->bindParam(':name', $_POST['naam']); 
				$upateUser->execute(); 
				Admin::gelukt("Ponto de promoção foi enviado!");
			}	
		}
		
		public static function UpdateDiaa()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$upateUser = $dbh->prepare("UPDATE users SET 
				vip_points=vip_points + :vip_points
				WHERE username = :name");
				$upateUser->bindParam(':vip_points', $_POST['vip_points']); 
				$upateUser->bindParam(':name', $_POST['naam']); 
				$upateUser->execute(); 
				Admin::gelukt("Diamantes atualizados com sucesso!");
			}	
		}
		
		public static function Updatelote()
		{
			global $dbh;
			if (isset($_POST['atualizar'])) 
			{
				$upateUser = $dbh->prepare("UPDATE loteria_conf SET 
				data=:data,
				gif=:gif,
				video=:video,
				lote=:lote
				WHERE Id = 1");
				$upateUser->bindParam(':data', $_POST['data']); 
				$upateUser->bindParam(':gif', $_POST['gif']); 	
				$upateUser->bindParam(':video', $_POST['video']); 		
				$upateUser->bindParam(':lote', $_POST['lote']); 						
				$upateUser->execute(); 
				Admin::gelukt("Loteria Atualizada com Sucesso!");
			}	
		}		
		
		public static function Updatelote2()
		{
			global $dbh;
			if (isset($_POST['apagar'])) 
			{
				$upateUser = $dbh->prepare("DELETE FROM lote");
				$upateUser->execute(); 
				Admin::gelukt("Loteria resetada com sucesso!");
			}	
		}		
		
		
		public static function Emblema()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
			$teste=$_POST['nome'];
			$userCount = $dbh->prepare("SELECT * FROM users WHERE username ='$teste'");
			$userCount->execute();
			$news8 = $userCount->fetch();
			$nome=''.filter($news8["id"]).'';
				$postNews = $dbh->prepare("INSERT INTO user_badges (id, user_id, badge_id) 
				VALUES (NULL, '$nome', :emblema)");
				$postNews->bindParam(':emblema', $_POST['emblema']); 
				$postNews->execute(); 
				Admin::gelukt("Emblema enviado ao ".$teste." com sucesso!");
			}	
		}
		
		
		public static function veremblemas()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
			$userCount = $dbh->prepare("SELECT * FROM users WHERE username =:user");
			$userCount->bindParam(':user', $_POST['usuario']); 
			$userCount->execute();
			$news8 = $userCount->fetch();
			$nome=''.filter($news8["id"]).'';
				$postNews = $dbh->prepare("SELECT * FROM user_badges WHERE user_id =$nome ");
				$postNews->execute(); 
				while ($emblemas2=$postNews->fetch()){ 
				echo '<img src="http://swf.yuup.online/c_images/album1584/'.$emblemas2["badge_id"].'.gif" style="float:left; margin-top:2px;margin-left:2px;" title="'.$emblemas2["badge_id"].'"> ';
			}	
			}
		}		

		
		public static function Quarto()
		{
			global $dbh;
			if (isset($_POST['atualizar'])) 
			{
			$teste=$_POST['usuario'];
			$userCount = $dbh->prepare("SELECT id FROM users WHERE username ='$teste' LIMIT 1");
			$userCount->execute();
			$news8 = $userCount->fetch();
			$nome=''.filter($news8["id"]).'';
				$postNews = $dbh->prepare("UPDATE rooms SET owner='$nome' WHERE id='".$_POST['id']."' ");
				$postNews->execute(); 
				Admin::gelukt("Quarto trocado com sucesso");
			}	
		}		
		
		
		public static function Logs()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
			$teste=$_POST['nome'];
			$userCount = $dbh->prepare("SELECT * FROM users WHERE username ='$teste' LIMIT 100");
			$userCount->execute();
			$news8 = $userCount->fetch();
			$nome=''.filter($news8["username"]).'';
			$postNews = $dbh->prepare("SELECT * FROM logs_client_staff WHERE username ='$nome' ORDER BY id DESC");
			$postNews->execute();
				while ($news = $postNews->fetch())
				if ($postNews->RowCount() >> 0)
				{ 
					Admin::gelukt('ID:'.filter($news["id"]).' - O log de  '.filter($news8["username"]).' foi encontrado! Ele fez: <b>'.filter($news["data_string"]).'</b>');
				}
				if ($postNews->RowCount() == 0)
				{
					Admin::error(" Nenhum Log foi encontrado.");
				}
			}	
		}
		
		public static function Navegador()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$postNews = $dbh->prepare("INSERT INTO navigator_publics (room_id, caption, description, image_url, order_num, cat_id) 
				VALUES (:id, :cap, :desc, :img, :order, :cat)");
				$postNews->bindParam(':id', $_POST['id']); 
				$postNews->bindParam(':cap', $_POST['cap']); 
				$postNews->bindParam(':desc', $_POST['desc']); 
				$postNews->bindParam(':img', $_POST['img']); 
				$postNews->bindParam(':order', $_POST['order']); 
				$postNews->bindParam(':cat', $_POST['cat']); 
				

				$postNews->execute(); 
				Admin::gelukt("Oficial adicionado com sucesso!Para atualizar use:  ':update navigator'");
			}	
			}
			
			
		public static function vouchercms()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$postNews = $dbh->prepare("INSERT INTO codigos (nome, premio, valor, quantidade, staff) 
				VALUES (:nome, :premio, :valor, :quantidade, '".User::userData('username')."')");
				$postNews->bindParam(':nome', $_POST['nome']); 
				$postNews->bindParam(':premio', $_POST['premio']); 
				$postNews->bindParam(':valor', $_POST['valor']); 
				$postNews->bindParam(':quantidade', $_POST['quantidade']); 

				$postNews->execute(); 
				Admin::gelukt("Código gerado com sucesso!!");
			}	
		}
						
		public static function RemoverEmblema()
		{
			global $dbh;
			if (isset($_POST['update3'])) 
			{
$teste=$_POST['id'];
			$userCount = $dbh->prepare("SELECT * FROM users WHERE username ='$teste'");
			$userCount->execute();
		 $news8 = $userCount->fetch();
			$nome=''.filter($news8["id"]).'';				
				$postNews = $dbh->prepare("DELETE FROM user_badges WHERE user_id ='$nome' AND badge_id=:badge");
				$postNews->bindParam(':badge', $_POST['badge']); 
				$postNews->execute(); 
				Admin::gelukt("Emblema Removido");
			}	
		}
				
		public static function Nevegadordel()
		{
			global $dbh;
			if (isset($_POST['update4'])) 
			{
				$postNews = $dbh->prepare("DELETE FROM navigator_publics WHERE room_id =:id");
				$postNews->bindParam(':id', $_POST['id2']); 
				$postNews->execute(); 
				Admin::gelukt("Oficial removido, para atualizar use: ':update navigator'");
			}	
		}
		
		
		

		public static function HospedarEmblema()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$postNews = $dbh->prepare("INSERT INTO `badge_definitions` (`code`, `required_right`) 
				VALUES (:emblema, '')");
				$postNews->bindParam(':emblema', $_POST['emblema']); 
				$postNews->execute(); 
				Admin::gelukt("Agora use o comando ':update badge_definitions' para atualizar o codigo do emblema!");
			}	
		}
		
		public static function Filtro()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$postNews = $dbh->prepare("INSERT INTO `wordfilter` (`word`) 
				VALUES (:emblema)");
				$postNews->bindParam(':emblema', $_POST['palavra']); 
				$postNews->execute(); 
				Admin::gelukt("Palavra adicionada! Agora use o comando ':update filter' para atualizar o Filtro!");
			}	
		}		
		
				public static function RemoverFiltro()
		{
			global $dbh;
			if (isset($_POST['update2'])) 
			{
				$postNews = $dbh->prepare("DELETE FROM wordfilter WHERE word =:ban");
				$postNews->bindParam(':ban', $_POST['palavra']); 
				$postNews->execute(); 
				Admin::gelukt("Palavra removida!Agora use o comando ':update filter' para atualizar o Filtro!");
			}	
		}		
		
				public static function RemoverBan()
		{
			global $dbh;
			if (isset($_POST['update3'])) 
			{
				$postNews = $dbh->prepare("DELETE FROM bans WHERE value =:ban");
				$postNews->bindParam(':ban', $_POST['ban']); 
				$postNews->execute(); 
				Admin::gelukt("BAN Removido, recarregue a página para conferir!");
			}	
		}
		
		public static function UpdateNome()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$upateUser = $dbh->prepare("UPDATE users SET 
				username = :novonome
				WHERE username = :name");
				$upateUser->bindParam(':novonome', $_POST['novonome']); 
				$upateUser->bindParam(':name', $_POST['naam']); 
				$upateUser->execute(); 
				Admin::gelukt("O nome do usuário foi mudado com sucesso!");
			}	
		}
		
		public static function UpdateSenha()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				
				$newPassword = self::hashed($_POST['novasenha']);
				$upateUser = $dbh->prepare("UPDATE users SET 
				password = :novasenha
				WHERE username = :name");
				$upateUser->bindParam(':novasenha', $newPassword); 
				$upateUser->bindParam(':name', $_POST['naam']); 
				$upateUser->execute(); 
				Admin::gelukt("Senha mudada com sucesso");
			}	
		}
		
		public static function UpdateRank()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$upateRank = $dbh->prepare("UPDATE users SET 
				username=:name,
				real_name=:real,
				working=:fun,
				rank=:rank
				WHERE username = :name");
				$upateRank->bindParam(':name', $_POST['naam']);
				$upateRank->bindParam(':real', $_POST['real_name']);
				$upateRank->bindParam(':fun', $_POST['working']);
				$upateRank->bindParam(':rank', $_POST['rank']); 
				$upateRank->execute(); 
				Admin::gelukt("Usuário atualizado com sucesso!");
			}	
		}
		public static function DarVip()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$upateRank = $dbh->prepare("UPDATE users SET 
				username=:name,
				vip_dias=vip_dias + :dias,
				rank='2'
				WHERE username = :name");
				$upateRank->bindParam(':name', $_POST['name']);
				$upateRank->bindParam(':dias', $_POST['dias']);
				$upateRank->execute(); 
				Admin::gelukt("Vip enviado com sucesso!");
			}	
		}		
		public static function UpdateAparecer()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$upateAparecer = $dbh->prepare("UPDATE users SET 
				username=:name,
				working=:fun,
				real_name=:real,
				staff_ocult=:pontos
				WHERE username = :name");
				$upateAparecer->bindParam(':name', $_POST['naam']);
				$upateAparecer->bindParam(':fun', $_POST['fun']);
				$upateAparecer->bindParam(':real', $_POST['real']);
				$upateAparecer->bindParam(':pontos', $_POST['pontos']);
				$upateAparecer->execute(); 
				Admin::gelukt("Usuário atualizado com sucesso!");
			}	
		}
				public static function UpdateAparecer2()
		{
			global $dbh;
			if (isset($_POST['update2'])) 
			{
				$upateAparecer = $dbh->prepare("UPDATE users SET 
				staff_ocult=staff_ocult + :pontos
				WHERE username = :name");
				$upateAparecer->bindParam(':name', $_POST['naam']);
				$upateAparecer->bindParam(':pontos', $_POST['pontos']);
				$upateAparecer->execute(); 
				Admin::gelukt("Usuário atualizado com sucesso!");
			}	
		}
		
		public static function UpdateAparecer3()
		{
			global $dbh;
			if (isset($_POST['update2'])) 
			{
				$upateAparecer = $dbh->prepare("UPDATE users SET 
				rank_adm=rank_adm + :pontos
				WHERE username = :name");
				$upateAparecer->bindParam(':name', $_POST['naam']);
				$upateAparecer->bindParam(':pontos', $_POST['pontos']);
				$upateAparecer->execute(); 
				Admin::gelukt("Usuário atualizado com sucesso!");
			}	
		}
		
		public static function UpdateEventos()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$upateUser = $dbh->prepare("UPDATE users SET 
				peventos=peventos + :evento
				WHERE username = :name");
				$upateUser->bindParam(':evento', $_POST['peventos']); 
				$upateUser->bindParam(':name', $_POST['naam']); 
				$upateUser->execute(); 
				Admin::gelukt("Ponto de eventos foi enviado!");
			}	
		}
		
		
		public static function UpdateNews()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
					$seleautor = $dbh->prepare("SELECT author FROM cms_news WHERE id=:newsid");
					$seleautor->bindParam(':newsid', $_POST['id']);
					$seleautor->execute();
					$resul=$seleautor->fetch();
					if($resul['author'] == User::userdata('username') OR  User::userdata('rank') > 7 OR $resul['author'] == "Confused")
					{				
						$editNews = $dbh->prepare("UPDATE cms_news SET 
						id=:id,
						title=:title,
						shortstory=:shortstory,
						longstory=:longstory,
						image=:topstory,
						category=:category
						WHERE id = :id");
						$editNews->bindParam(':title', $_POST['title']);
						$editNews->bindParam(':shortstory', $_POST['shortstory']);
						$editNews->bindParam(':topstory', $_POST['topstory']);
						$editNews->bindParam(':longstory', $_POST['longstory']);
						$editNews->bindParam(':id', $_POST['id']);
						$editNews->bindParam(':category', $_POST['category']);				
						$editNews->execute();
						Admin::gelukt("Notícia alterada com sucesso!");
					}
					else
					{
						Admin::gelukt("Sem permissão!");
					}
			}
		}
		
		public static function UpdateRascunho()
		{
			global $dbh;
			if (isset($_POST['atualizar'])) 
			{
				$editNews = $dbh->prepare("UPDATE cms_rascunho SET 
				id=:id,
				title=:title,
				shortstory=:shortstory,
				longstory=:longstory,
				image=:topstory,
				category=:category
				WHERE id = :id");
				$editNews->bindParam(':title', $_POST['title']);
				$editNews->bindParam(':shortstory', $_POST['shortstory']);
				$editNews->bindParam(':topstory', $_POST['topstory']);
				$editNews->bindParam(':longstory', $_POST['longstory']);
				$editNews->bindParam(':id', $_POST['id']);
				$editNews->bindParam(':category', $_POST['category']);				
				$editNews->execute();
				Admin::gelukt("Nieuws bericht aangepast!");
			}	
		}
		
		public static function searchUser()
		{
			global $dbh,$config;
			if(isset($_POST['zoek'])) {	
				$searchUser = $dbh->prepare("SELECT * FROM users WHERE username = :user");
				$searchUser->bindParam(':user', $_POST['user']); 
				$searchUser->execute();
				if ($searchUser->RowCount() == 1)
				{
					Admin::gelukt('Usuário '.$_POST['user'].' foi encontrado! Clique <a href ="'.$config['hotelUrl'].'/adminpan/gebruiker/'.$_POST['user'].'">aqui</a> Para ver as informações do usuário');
				}
				else
				{
					Admin::error("O usuário ".$_POST['user']." não foi encontrado");
				}
			}
		}
		
				public static function searchMobi()
				
		{
			global $dbh,$config;
			if(isset($_POST['zoek'])) {	
				$searchUser = $dbh->prepare("SELECT item_name, id FROM furniture WHERE item_name = :mobi");
				$searchUser->bindParam(':mobi', $_POST['mobi']);
				$searchUser->execute();
				while ($news = $searchUser->fetch())
				if ($searchUser->RowCount() == 1)
					
				{ 
					Admin::gelukt('O Mobi '.$_POST['mobi'].' foi encontrado! Seu ID é '.filter($news["id"]).' Clique <a href="/adminpan/editmobi">Aqui </a> para adiciona-lô');
				}
				else
					
				{
					Admin::error("O ".$_POST['mobi']." não foi encontrado");
				}
			}
		}
		
		
				public static function searchMobi3()
				
		{
			global $dbh,$config;
			if(isset($_POST['zoek5'])) {	
				$searchUser = $dbh->prepare("SELECT base_item, id FROM items WHERE id = :mobi LIMIT 1");
				$searchUser->bindParam(':mobi', $_POST['mobi5']);
				$searchUser->execute();
				while ($news = $searchUser->fetch())
				if ($searchUser->RowCount() == 1)
					
				{ 
					Admin::gelukt('Seu ID BASE  é '.filter($news["base_item"]).' Clique <a href="/adminpan/editmobi">Aqui </a> para adiciona-lô');
				}
				else
					
				{
					Admin::error("O ".$_POST['mobi5']." não foi encontrado");
				}
			}
		}		
		
		
		
		
		public static function searchMobi2()
				
		{
			global $dbh,$config;
			if(isset($_POST['zoek2'])) {	
				$searchUser = $dbh->prepare("SELECT catalog_name, id, item_id FROM catalog_items WHERE catalog_name = :mobi2");
				$searchUser->bindParam(':mobi2', $_POST['mobi2']);
				$searchUser->execute();
				while ($news = $searchUser->fetch())
				if ($searchUser->RowCount() == 1)
					
				{ 
					Admin::gelukt('O Mobi '.$_POST['mobi2'].' foi encontrado! Seu ID é '.filter($news["item_id"]).' Clique <a href="/adminpan/editmobi">Aqui </a> para adiciona-lô');
				}
				else
					
				{
					Admin::error("O  ".$_POST['mobi2']." não foi encontrado");
				}
			}
		}
		
		public static function diario()
				
		{
			global $dbh,$config;
			if(isset($_POST['postar'])) {	
				$searchUser = $dbh->prepare("SELECT id,item_name,tipo,public_name FROM furniture WHERE tipo = 'D' OR tipo='C' OR tipo='B' ORDER BY RAND() LIMIT ".$_POST['raros']." ");
				$searchUser->execute();				
				while ($news = $searchUser->fetch()) { 	
				
				$upateAparecer = $dbh->prepare("INSERT INTO catalog_items (item_id,page_id,cost_diamonds,limited_stack,cost_credits,catalog_name) VALUES (" . $news['id'] . ", '9083', ".$_POST['precod'].",".$_POST['quantidade'].",".$_POST['precom'].", '" . $news['public_name'] . "')");
				$upateAparecer->execute(); 
				Admin::gelukt("<img src='http://swf.yuup.online/dcr/hof_furni_70/icons/".$news['item_name']."_icon.png' style='width:30px'>  ".$news['public_name']." Adicionado com sucesso");				
				}
				
								if ($upateAparecer->RowCount() == 1)
								{
				Admin::gelukt(" ".$_POST['raros']." Ltds adicionados com sucesso, vá ao Hotel e digite  :update catalogue  para aparecer.");
			}	}	
			
		}	

		public static function diariotirar()
				
		{
			global $dbh,$config;
			if(isset($_POST['retirar'])) {	
				$upateAparecer = $dbh->prepare("UPDATE catalog_items SET page_id = '9082' WHERE page_id='9083'");
				$upateAparecer->execute(); 
				
								if ($upateAparecer->RowCount() >= 1)
								{
				Admin::gelukt("Raros Retirados com sucesso!");
			}	}	
			
		}			
		
		
				public static function AddLTD()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$upateAparecer = $dbh->prepare("INSERT catalog_items SET 
				item_id=:item,
				page_id=:page,
				catalog_name=:name,
				cost_credits=:credits,
				cost_diamonds=:diamonds,
				limited_stack=:limited
				");
				$upateAparecer->bindParam(':item', $_POST['item']);
				$upateAparecer->bindParam(':page', $_POST['page']);
				$upateAparecer->bindParam(':name', $_POST['name']);
				$upateAparecer->bindParam(':credits', $_POST['credits']);
				$upateAparecer->bindParam(':diamonds', $_POST['diamonds']);
				$upateAparecer->bindParam(':limited', $_POST['limited']);
				$upateAparecer->execute();
								if ($upateAparecer->RowCount() == 1)
								{
				Admin::gelukt("Mobi Adicionado com sucesso");
			}	
			else
			{
				Admin::error("Error");
				
			}
		}
		}
		
		
		
						public static function FiltroVer()
				
		{
			global $dbh,$config;
				$searchUser = $dbh->prepare("SELECT * FROM wordfilter");
				$searchUser->execute();
				while ($news = $searchUser->fetch())
				if ($searchUser->RowCount() >> 0)
					
				{ 
					Admin::gelukt('Palavra encontrada: '.filter($news["word"]).' ');
				}
				if ($searchUser->RowCount() == 0)
					
				{
					Admin::error("  não foi encontrado nenhum filtro ");
				
			}
		}		
		
		
	
	public static function presente()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{

				$belrs_get = $dbh->prepare("SELECT username,id FROM users WHERE username=:user LIMIT 1");
				$belrs_get->bindParam(':user', $_POST['username']);
				$belrs_get->execute();
				while ($belrs_row = $belrs_get->fetch())
				{
				$suf='|3372|0|0';
 $mes = $_POST['mes'];
 $username = $_POST["username"];
 $item = $_POST["base_item"];
 $envi = $_POST["id"];
 $ba ='|';
			$belrs2_get = $dbh->prepare("INSERT INTO items (user_id,base_item,extra_data) VALUES (" . $belrs_row['id'] . ",'920020','$username'  '$ba' ' ' '$ba' '$mes' '$ba' '$envi' '$ba' '$item' '$suf')");
				$belrs2_get->bindParam(':mes', $_POST['mes']);
				$belrs2_get->bindParam(':user', $_POST['username']);
				$belrs2_get->execute();
				$belrs6_get = $dbh->prepare("SELECT * FROM items ORDER BY id DESC LIMIT 1");
				$belrs6_get->execute();
				while ($belrs_row6 = $belrs6_get->fetch())
				{
					$belrs3_get = $dbh->prepare("INSERT INTO user_presents (item_id,base_id,extra_data) VALUES (" . $belrs_row6['id'] . ",:item,' ')");
					$belrs3_get->bindParam(':item', $_POST['base_item']);
					$belrs3_get->execute();
				}
				
				if ($belrs3_get->RowCount() >> 0)						
				{
				Admin::gelukt("Mobi Adicionado com sucesso " .filter($belrs_row2['id']) .   "  ".$_POST['base_item']." e ".$_POST['mes']."" . $suf . "  ");
				}
			else
			{
				Admin::error("Error  " . $suf . "  " . $teste . " " .filter($belrs_row['id']) ."");
				
			}
					
				}
				}
		}
		
		
  
 
				

	
	
		
		

public static function presentes2()
		{
			global $dbh;
			if (isset($_POST['update1'])) 
			{
				$upateAparecer = $dbh->prepare("UPDATE users SET 
				evento=:evento,
				WHERE id =:id");
				$upateAparecer->bindParam(':id', $_POST['id']);
				$upateAparecer->bindParam(':evento', $_POST['evento']);
				$upateAparecer->execute(); 
			if ($upateAparecer->RowCount() == 1)

			
					
				{ 
					Admin::gelukt('O Mobi foi alterado com sucesso!  ');
				}
				else 
					
				{
					Admin::error(" Não pode ser alterado, revise todos os campos ");
					
				}}	
		}

		
		
		public static function catalogpage()
				
		{
			global $dbh,$config;
			if(isset($_POST['zoek1'])) {	
				$searchUser = $dbh->prepare("SELECT id FROM catalog_pages WHERE caption = :page");
				$searchUser->bindParam(':page', $_POST['page']);
				$searchUser->execute();
				while ($news = $searchUser->fetch())
				if ($searchUser->RowCount() >> 0)
					
				{ 
					Admin::gelukt('A página '.$_POST['page'].' foi encontrada! Seu ID é '.filter($news["id"]).'  ');
				}
				if ($searchUser->RowCount() == 0)
					
				{
					Admin::error("A página".$_POST['page']." não foi encontrada ");
				}
			}
		}
		
		
		
		
						public static function catalogpagesi()
				
		{
			global $dbh,$config;
			if(isset($_POST['zoek1'])) {	
				$searchUser = $dbh->prepare("SELECT catalog_name, id, page_id FROM catalog_items WHERE page_id = :mobis");
				$searchUser->bindParam(':mobis', $_POST['mobis']);
				$searchUser->execute();
				while ($news = $searchUser->fetch())
				if ($searchUser->RowCount() >> 0)
					
				{ 
					Admin::gelukt('O Mobi '.$_POST['mobis'].' foi encontrado! Seu nome é '.filter($news["catalog_name"]).' Seu ID é '.filter($news["id"]).' ');
				}
				if ($searchUser->RowCount() == 0)
					
				{
					Admin::error(" ".$_POST['mobis']." não foi encontrado ");
				}
			}
		}
		
				public static function catalogpagesal()
		{
			global $dbh;
			if (isset($_POST['update1'])) 
			{
				$upateAparecer = $dbh->prepare("UPDATE catalog_items SET 
				page_id=:page,
				cost_diamonds=:diamonds,
				cost_credits=:credits
				WHERE id =:id");
				$upateAparecer->bindParam(':id', $_POST['id']);
				$upateAparecer->bindParam(':page', $_POST['page']);
				$upateAparecer->bindParam(':diamonds', $_POST['diamonds']);
				$upateAparecer->bindParam(':credits', $_POST['credits']);
				$upateAparecer->execute(); 
			if ($upateAparecer->RowCount() == 1)

			
					
				{ 
					Admin::gelukt('O Mobi foi alterado com sucesso!  ');
				}
				else 
					
				{
					Admin::error(" Não pode ser alterado, revise todos os campos ");
					
				}}	
		}
				public static function ResetHE()
		{
			global $dbh;
			if (isset($_POST['updatehe'])) 
			{
				$editNews = $dbh->prepare("UPDATE users SET peventos='0'");
				$editNews->execute();
				Admin::gelukt("Hall de Eventos Resetado com Sucesso");
			}
		}
						public static function ResetHP()
		{
			global $dbh;
			if (isset($_POST['updatehp'])) 
			{
				$editNews = $dbh->prepare("UPDATE users SET ppromos='0'");
				$editNews->execute();
				Admin::gelukt("Hall de Promoções Resetado com Sucesso");
			}
			if (isset($_POST['updateemb'])) 
				{
				$editNews = $dbh->prepare("UPDATE users SET points_moderator='0'");
				$editNews->execute();
				Admin::gelukt("Hall de Embaixadores Resetado com Sucesso");
			}
			if (isset($_POST['updateadm'])) 
				{
				$editNews = $dbh->prepare("UPDATE users SET rank_adm='0'");
				$editNews->execute();
				Admin::gelukt("Hall de Administradores Resetado com Sucesso");
			}
		}
		
								public static function ClassRaro()
		{
			global $dbh;
			if (isset($_POST['update'])) 
			{
				$editNews3 = $dbh->prepare("SELECT * FROM items WHERE id=:id LIMIT 1");
				$editNews3->bindParam(':id', $_POST['id']);		
				$editNews3->execute();
				$news8 = $editNews3->fetch();
				$base=''.filter($news8["base_item"]).'';			
				$editNews2 = $dbh->prepare("UPDATE furniture SET tipo=:tipo WHERE id='$base'");
				$editNews2->bindParam(':tipo', $_POST['tipo']);						
				$editNews2->execute();
				if ($editNews2->RowCount() == 1){				
				Admin::gelukt("Raro Classificado com sucesso!");		}	
				else
				{
					Admin::error("Raro não encontrado!");
				}	
			}				
			
			
			
			if (isset($_POST['update2'])) 
			{
				$editNews = $dbh->prepare("UPDATE furniture SET tipo=:tipo WHERE public_name=:name");
				$editNews->bindParam(':tipo', $_POST['tipo']);						
				$editNews->bindParam(':name', $_POST['name']);		
				$editNews->execute();			
				if ($editNews->RowCount() == 1){				
				Admin::gelukt("Raro Classificado com sucesso!");		}	
				else if ($editNews->RowCount() > 1){				
				Admin::gelukt("||||||| MAIS DE UM RARO ENCONTRADO!");		}				
				else
				{
					Admin::error("|||||||||||| Raro não encontrado!");
				}	
		}
		}
				
			
		
		
		public static function searchUserOfTheWeek()
		{
			global $dbh,$config;
			if(isset($_POST['zoek'])) {	
				$searchUser = $dbh->prepare("SELECT * FROM users WHERE username = :user");
				$searchUser->bindParam(':user', $_POST['user']); 
				$searchUser->execute();
				if ($searchUser->RowCount() == 1)
				{
					Admin::gelukt(''.$_POST['user'].' gevonden! Klik <a href ="'.$config['hotelUrl'].'/adminpan/giveuseroftheweek/'.$_POST['user'].'">hier</a> om deze gebruiker Brain van de week te geven!');
				}
				else
				{
					Admin::error("Gebruiker ".$_POST['user']." niet gevonden!");
				}
			}
		}
		public static function EditUser($variable)
		{
			global $dbh;
			if (isset($_GET['user'])) {
				$getUser = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
				$getUser->bindParam(':username', $_GET['user']);
				$getUser->execute();
				if ($getUser->RowCount() == 1) 
				{
					$user = $getUser->fetch();
					return filter($user[$variable]);
				} 
				else 
				{
					Admin::error("Gebruiker niet gevonden!"); exit;
				}
			}
		
		
		}

		
		
		
		public static function EditUserOfTheWeek($variable)
		{
			global $dbh;
			if (isset($_GET['user'])) {
				$getUser = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
				$getUser->bindParam(':username', $_GET['user']);
				$getUser->execute();
				if ($getUser->RowCount() == 1) 
				{
					$user = $getUser->fetch();
					return filter($user[$variable]);
				} 
				else 
				{
					Admin::error("Gebruiker niet gevonden!"); exit;
				}
			}
		}
		public static function EditNews($variable)
		{
			global $dbh;
			if (isset($_GET['news'])) 
			{
				$getNews = $dbh->prepare("SELECT * FROM cms_news WHERE id=:newsid LIMIT 1");
				$getNews->bindParam(':newsid', $_GET['news']);
				$getNews->execute();
				if ($getNews->RowCount() == 1) 
				{
					$news = $getNews->fetch();
					return $news[$variable];
				} 
				else 
				{
					Admin::error("Geen nieuws gevonden!"); exit;
				}
			}
		}
		
		
		public static function EditRascunho($variable)
		{
			global $dbh;
			if (isset($_GET['news'])) 
			{
				$getNews = $dbh->prepare("SELECT * FROM cms_rascunho WHERE id=:newsid LIMIT 1");
				$getNews->bindParam(':newsid', $_GET['news']);
				$getNews->execute();
				if ($getNews->RowCount() == 1) 
				{
					$news = $getNews->fetch();
					return $news[$variable];
				} 
				else 
				{
					Admin::error("Geen nieuws gevonden!"); exit;
				}
			}
		}		
		public static function LookSollie($variable)
		{
			Global $dbh,$config;
			if (isset($_GET['look'])) 
			{
				$getSollie = $dbh->prepare("SELECT * FROM staffApplication WHERE id=:look LIMIT 1");
				$getSollie->bindParam(':look', $_GET['look']);
				$getSollie->execute();
				if ($getSollie->RowCount() == 1) 
				{
					$data = $getSollie->fetch();
					$datenow = date('d-m-Y', $data['date']);
					return filter($data[$variable]);
				} 
				else 
				{
					header('Location: '.$config['hotelUrl'].'/adminpan/sollie');
				}
			}
		}
		public static function DeleteNews()
		{
			Global $dbh;
			if(isset($_GET['delete'])) 
			{ 
				$seleautor = $dbh->prepare("SELECT author FROM cms_news WHERE id=:newsid");
				$seleautor->bindParam(':newsid', $_GET['delete']);
				$seleautor->execute();
				$resul=$seleautor->fetch();
				if($resul['author'] == User::userdata('username') OR  User::userdata('rank') > 7)
				{
					$deleteNews = $dbh->prepare("DELETE FROM cms_news WHERE id=:newsid");
					$deleteNews->bindParam(':newsid', $_GET['delete']);
					$deleteNews->execute();
					Admin::gelukt('Noticia apagada com sucesso!');
				}
				else
				{
					Admin::gelukt('Sem permissão');					
				}
			}
		}
		public static function DeleteSollie()
		{
			Global $config, $dbh;
			if(isset($_GET['delete'])) 
			{ 
				$deleteSollie = $dbh->prepare("DELETE FROM staffApplication WHERE id=:newsid");
				$deleteSollie->bindParam(':newsid', $_GET['delete']);
				$deleteSollie->execute();
				Admin::gelukt('Sollicitatie verwijderd');
				header('Location: '.$config['hotelUrl'].'/adminpan/sollie');
			}
		}
		public static function DeleteBans()
		{
			Global $dbh;
			if(isset($_GET['delete'])) 
			{ 
				$deleteBan = $dbh->prepare("DELETE FROM bans WHERE id=:newsid");
				$deleteBan->bindParam(':newsid', $_GET['delete']);
				$deleteBan->execute();
				Admin::gelukt('Sollicitatie verwijderd');
			}
		}
		public static function PostNews()
		{
			global $dbh;
			if (isset($_POST['postnews']))
			{
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['news'] = $_POST['news'];
				$_SESSION['topstory'] = $_POST['topstory'];				
				if (!empty($_POST['title']))
				{
					if (!empty($_POST['news']))
					{
						$postNews = $dbh->prepare("
						INSERT INTO cms_news(title,image,shortstory,longstory,author,date,type,roomid,updated,category,formdate,form)
						VALUES
						(
						:title,
						:topstory, 
						:slogan,
						:news,
						'".User::userData('username')."',
						'" . time() . "',
						'1',
						'1',
						'1',
						:category,
						:formdate,
						:form
						)");
						$postNews->bindParam(':title', $_POST['title']);
						$postNews->bindParam(':slogan', $_POST['slogan']);
						$postNews->bindParam(':topstory', $_POST['topstory']);
						$postNews->bindParam(':news', $_POST['news']);
						$postNews->bindParam(':category', $_POST['category']);		
						$postNews->bindParam(':formdate', $_POST['formdate']);
						$postNews->bindParam(':form', $_POST['form']);	
						$postNews->execute();
						$_SESSION['title'] = '';
						$_SESSION['kort'] = '';
						$_SESSION['news'] ='';
						$_SESSION['topstory'] ='';						
						Admin::gelukt("Nieuws bericht geplaatst!");
					}
					else
					{
						Admin::error("Nieuws bericht is leeg!");
						return;
					}
				}
				else
				{
					Admin::error("Er is geen titel!");
					return;
				}
			}
			else
			{
			}
		}
		
				public static function SaveNews()
		{
			global $dbh;
			if (isset($_POST['savenews']))
			{
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['news'] = $_POST['news'];
				$_SESSION['topstory'] = $_POST['topstory'];				
				if (!empty($_POST['title']))
				{
					if (!empty($_POST['news']))
					{
							$postNews = $dbh->prepare("
							INSERT INTO cms_rascunho(title,image,shortstory,longstory,author,date,type,roomid,updated,category,formdate,form)
							VALUES
							(
							:title,
							:topstory, 
							:slogan,
							:news,
							'".User::userData('username')."',
							'" . time() . "',
							'1',
							'1',
							'1',
							:category,
							:formdate,
							:form
							)");
							$postNews->bindParam(':title', $_POST['title']);
							$postNews->bindParam(':slogan', $_POST['slogan']);
							$postNews->bindParam(':topstory', $_POST['topstory']);
							$postNews->bindParam(':news', $_POST['news']);
							$postNews->bindParam(':category', $_POST['category']);		
							$postNews->bindParam(':formdate', $_POST['formdate']);
							$postNews->bindParam(':form', $_POST['form']);	
							$postNews->execute();
							$_SESSION['title'] = '';
							$_SESSION['kort'] = '';
							$_SESSION['news'] ='';
							$_SESSION['topstory'] ='';						
							Admin::gelukt("Noticia Alterada com sucesso!");
					}
					else
					{
						Admin::error("Nieuws bericht is leeg!");
						return;
					}
				}
				else
				{
					Admin::error("Adicione um título");
					return;
				}
			}
			else
			{
			}
		}
		
		
		
		public static function PostNewsRascunho()
		{
			global $dbh;
			if (isset($_POST['postnews']))
			{
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['longstory'] = $_POST['longstory'];
				$_SESSION['topstory'] = $_POST['topstory'];				
				if (!empty($_POST['title']))
				{
					if (!empty($_POST['longstory']))
					{
						$postNews = $dbh->prepare("
						INSERT INTO cms_news(title,image,shortstory,longstory,author,date,type,roomid,updated,category,formdate,form)
						VALUES
						(
						:title,
						:topstory, 
						:shortstory,
						:longstory,
						'".User::userData('username')."',
						'" . time() . "',
						'1',
						'1',
						'1',
						:category,
						:formdate,
						:form
						)");
						$postNews->bindParam(':title', $_POST['title']);
						$postNews->bindParam(':shortstory', $_POST['shortstory']);
						$postNews->bindParam(':topstory', $_POST['topstory']);
						$postNews->bindParam(':longstory', $_POST['longstory']);
						$postNews->bindParam(':category', $_POST['category']);		
						$postNews->bindParam(':formdate', $_POST['formdate']);
						$postNews->bindParam(':form', $_POST['form']);	
						$postNews->execute();
						$_SESSION['title'] = '';
						$_SESSION['kort'] = '';
						$_SESSION['news'] ='';
						$_SESSION['topstory'] ='';						
						Admin::gelukt("Nieuws bericht geplaatst!");
					}
					else
					{
						Admin::error("Nieuws bericht is leeg!");
						return;
					}
				}
				else
				{
					Admin::error("Er is geen titel!");
					return;
				}
			}
			else
			{
			}
		}
		
		public static function addatualiza()
		{
			global $dbh,$config;
			if(isset($_POST['add']))
			{
				$data=time();
				$inse=$dbh->prepare("INSERT INTO atualiza (user,img,date,resumo) VALUES (:user,:img,:date,:resumo)");
				$inse->bindParam(':user', $_SESSION['username']);
				$inse->bindParam(':img', $_POST['conteudo']);
				$inse->bindParam(':date', $data);
				$inse->bindParam(':resumo', $_POST['resumo']);
				$inse->execute();
				Admin::gelukt("Sucesso!");
			}
		}
				
		
	}
?>							