<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	/* 
		Functions list Class Html.
		--------------- 
		checkBan();
		page();
		pageHK();
		error();
		errorSucces();
		loadPlugins();
	*/
	class Html 
	{
		private static function checkBan($ip, $username = null)
		{
			global $dbh;
			$ipBan = $dbh->prepare("SELECT id,bantype,expire FROM bans WHERE bantype = 'ip' && value = :ip ORDER BY id LIMIT 1");
			$ipBan->bindParam(':ip', $ip);
			$ipBan->execute();
			if ($ipBan->RowCount() >= 1)
			{
				$queryIp = $dbh->prepare("SELECT id,bantype,expire FROM bans WHERE bantype = 'ip' && value = :ip ORDER BY id LIMIT 1");
				$queryIp->bindParam(':ip', $ip);
				$queryIp->execute();
				$rowIp = $queryIp->fetch();
					if ($rowIp['expire'] <= strtotime('now'))
					{
						$remove=$dbh->prepare("DELETE FROM bans WHERE id=".$rowIp['id']." ");
						$remove->execute();						
						return false;
					}
					else
					{
						return true;
					}
			}
			else if ($username !== null)
			{
				$userBan = $dbh->prepare("SELECT id,bantype,expire FROM bans WHERE bantype = 'user' && value = :username ORDER BY id LIMIT 1");
				$userBan->bindParam(':username', $username);
				$userBan->execute();
				if ($userBan->RowCount() >= 1)
				{
					$userBan = $dbh->prepare("SELECT id,bantype,expire FROM bans WHERE bantype = 'user' && value = :username ORDER BY id LIMIT 1");
					$userBan->bindParam(':username', $username);
					$userBan->execute();
					$rowUser = $userBan->fetch();
						if ($rowUser['expire'] <= strtotime('now'))
						{
							$remove=$dbh->prepare("DELETE FROM bans WHERE id=".$rowUser['id']." ");
							$remove->execute();
							return false;
						}
						else
						{
							return true;
						}
				}
			}
			else
			{
				return false;
			}
		}
		public static function page()
		{
			global $dbh, $emu, $config, $lang, $hotel, $version;
			if (defined('PHP_VERSION') && PHP_VERSION >= 5.6) 
			{
				true;
			} 
			else 
			{
				echo 'PHP version is lower then PHP 5.6 your PHP version is '.PHP_VERSION.'';
				exit;
			}
			if (self::checkBan(checkCloudflare(), User::userData('username')))
			{
				include Z . H . S .'/banned.php';
				exit();
			}
			else
			{
				if(isset($_GET['url']))
				{
					$page = filter($_GET['url']);
					$allowed = array(); 
					foreach (new DirectoryIterator(Z . H . S) as $file) { 
						$file = explode('.php', $file);
						$allowed[] = $file[0];
					} 
					if($page)
					{ 
						if (!$config['maintenance'] == true || isset($_SESSION['adminlogin'])	){
							$fileExists = Z . H . S ."/{$page}.php";
							if(file_exists($fileExists))
							{
								$content = in_array($page, $allowed) ? include(Z . H . S ."/{$page}.php") : '';
							} 
							else 
							{
								include Z . H . S .'/404.php'; 
							}
						}
						else
						{
							if ($page == 'adminlogin')
							{
								include A . I . 'adminlogin.php'; 
							}
							else
							{
								include A . I . 'index.php'; 
							}
						}
					} 
					else 
					{
						include Z . H . S .'/pages/index.php';
					}
				} 
				else 
				{
					include A . H . S . '/pages/index.php';
					header('Location: '.$config['hotelUrl'].'/index');
				}
			}
			if(loggedIn()){ 
				switch($page)
				{
					case "register":
					case "registro":
					header('Location: '.$config['hotelUrl'].'/me');
					break;
					case "index":
					header('Location: '.$config['hotelUrl'].'/me');
					break;
					case "changename";
					if ($config['facebookLogin'] == true)
					{
						if (User::userData('fbenable') >= 1)
						{
							header('Location: '.$config['hotelUrl'].'/me');	
							exit();
						}
					}
					break;
					case "game":
					case "client":
					case "hotel":
					if ($config['facebookLogin'] == true)
					{
						if (User::userData('fbenable') == 0)
						{
							header('Location: '.$config['hotelUrl'].'/changename');	
							exit();
						}
					}
					break;
					default:
					//Nothing
					break;
				}
			}
			if(!loggedIn()){ 
				switch($page)
				{
					case "me":
					case "ajax":
					case "jogo":										
					case "ajustes":
					case "game":
					case "client":
					case "hotel":
					case "pin":
					case "troca":
					case "trocas":		
					case "craft":										
					case "online":
					case "home/":
					case "home":					
					case "loteria":					
					case "changename":
					case "texto":
					case "forum":					
					header('Location: '.$config['hotelUrl'].'/index');
					break;
					case "register":
					$userref = 'lol';
					break;
					default:
					//Nothing
					break;
				}
			}
		}
		public static function pageHK()
		{
			global $dbh, $config, $lang, $hotel, $version;
			if(isset($_GET['url']))
			{
				$pageHK = filter($_GET['url']);
				$allowed = array(); 
				foreach (new DirectoryIterator(J) as $file) { 
					$file = explode('.php', $file);
					$allowed[] = $file[0];
				} 
				if($pageHK)
				{ 
					
					$fileExists = J ."{$pageHK}.php";
					if(file_exists(filter($fileExists)))
					{
						$content = in_array($pageHK, $allowed) ? include(J ."/{$pageHK}.php") : '';
					} 
					else 
					{
						include J . "/404.php"; 
					}
				} 
				else 
				{
					include J . "/dash.php";
				}
			} 
			else 
			{
				include J . "dash.php";
				header('Location: '.$config['hotelUrl'].'/adminpan/dash');
			}
			switch($pageHK)
			{
				case $pageHK:
				admin::CheckRank(3);
				break;
				default:
				//Nothing
				break;
			}
		} 
		public static function error($errorName)
		{
			echo '<div class="error" style="display: block;">'.$errorName.'</div>';
		}
		public static function errorn($errorName)
		{
			echo '<div class="error" style="display: block;position: fixed;bottom: 0;width: 401px;right: 0;">'.$errorName.'</div>';
		}
public static function error2($errorName)
		{
			echo '

			<div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -170px;"><div class="sa-icon sa-error animateErrorIcon" style="display: block;">
      <span class="sa-x-mark animateXMark">
        <span class="sa-line sa-left"></span>
        <span class="sa-line sa-right"></span>
      </span>
    </div><div class="sa-icon sa-warning" style="display: none;">
      <span class="sa-body"></span>
      <span class="sa-dot"></span>
    </div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: none;">
      <span class="sa-line sa-tip"></span>
      <span class="sa-line sa-long"></span>

      <div class="sa-placeholder"></div>
      <div class="sa-fix"></div>
    </div><div class="sa-icon sa-custom" style="display: none;"></div><h2>Erro!</h2>
    <p style="display: ;">'.$errorName.'</p>
    <fieldset>
      <input type="text" tabindex="3" placeholder="">
      <div class="sa-input-error"></div>
    </fieldset><div class="sa-error-container">
      <div class="icon">!</div>
      <p>Not valid!</p>
    </div><div class="sa-button-container">
      <button class="cancel" tabindex="2" style="display: none;">Cancel</button>
      <div class="sa-confirm-button-container">
        <a href=/index><button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(140, 212, 245); box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">OK</button><div class="la-ball-fall">/<a>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div></div>';
		}		
		public static function errorSucces($succesMessage)
		{
			echo '<div class="errorSucces" style="display: block;">'.$succesMessage.'</div>';
		}
		public static function loadPlugins()
		{
			$pluginDir = A . B . K;
			foreach (glob($pluginDir."*.php") as $filename) {
				require_once $pluginDir."".basename($filename)."";
			}
		}
		
		
		
	} 
?>																								