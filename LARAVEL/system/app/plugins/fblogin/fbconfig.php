<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	define('BRAIN_CMS', 1);
	include_once PROJECT_ROOT_PATH.'/global.php';
	// added in v4.0.0
	require_once 'autoload.php';
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\Entities\AccessToken;
	use Facebook\HttpClients\FacebookCurlHttpClient;
	use Facebook\HttpClients\FacebookHttpable;
	// init app with app id and secret
	FacebookSession::setDefaultApplication($config['facebookAPPID'],$config['facebookAPPSecret']);
	// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper($config['hotelUrl'].'/system/app/plugins/fblogin/fbconfig.php');
	try {
		$session = $helper->getSessionFromRedirect();
		} catch( FacebookRequestException $ex ) {
		// When Facebook returns an error
		} catch( Exception $ex ) {
		// When validation fails or other local issues
	}
	// see if we have a session
	if ( isset( $session ) ) {
		// graph api request for user data
		$request = new FacebookRequest( $session, 'GET', '/me?fields=first_name,email');
		$response = $request->execute();
		// get response
		$graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('first_name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
		/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
		/* ---- header location after session ----*/
		if ($config['facebookLogin'] == true)
		{
			$fbLogin = $dbh->prepare("SELECT fbid FROM users WHERE fbid = ".$_SESSION['FBID']."");
			$fbLogin->execute();
			if ($fbLogin->RowCount() == 0)
			{
				$ffbid = "FB_".$_SESSION['FBID']."";
				$fbLoginCreat = $dbh->prepare("
				INSERT INTO
				users
				(username, rank, look, motto, account_created, mail, ip_last, ip_reg, credits, activity_points, vip_points, fbid, fbenable)
				VALUES
				(
				:ffbid,  
				'1',
				'hr-3163-1035.hd-3092-2.ch-215-63.lg-3320-1189-62.sh-3089-1408.ca-3219-110.wa-2001-0',
				:motto, 
				'".strtotime("now")."', 
				:email, 
				'".checkCloudflare()."', 
				'".checkCloudflare()."', 
				:credits,
				:duckets,
				:diamonds,
				:fbid,
				'0'
				)
				");
				$fbLoginCreat->bindParam(':fbid', $_SESSION['FBID']);
				$fbLoginCreat->bindParam(':ffbid', $ffbid);
				$fbLoginCreat->bindParam(':motto', $config['startMotto']);
				$fbLoginCreat->bindParam(':email', $_SESSION['EMAIL']);
				$fbLoginCreat->bindParam(':credits', $config['credits']);
				$fbLoginCreat->bindParam(':duckets', $config['duckets']);
				$fbLoginCreat->bindParam(':diamonds', $config['diamonds']);
				$fbLoginCreat->execute();
				$newUser = $dbh->prepare("SELECT * FROM `users` WHERE username=:ffbid && mail = :email LIMIT 1");
				$newUser->bindParam(':ffbid', $ffbid);
				$newUser->bindParam(':email', $_SESSION['EMAIL']);
				$newUser->execute();
				while ($User = $newUser->fetch())
				{
					$_SESSION['id'] = $User['id'];
					$_SESSION['username'] = $User['username'];
					$_SESSION['rank'] = $User['rank'];
					$_SESSION['look'] = $User['look'];
					$_SESSION['credits'] = $User['credits'];
					$_SESSION['activity_points'] = $User['activity_points'];
					$_SESSION['vip_points'] = $User['vip_points'];
					$_SESSION['gotw_points'] = $User['gotw_points'];
					
								$_SESSION['page1'] = true;
								$_SESSION['page2'] = true;
								$_SESSION['page3'] = true;
								$_SESSION['page4'] = true;
								$_SESSION['page5'] = true;
								$_SESSION['page6'] = true;
								$_SESSION['page7'] = true;
								$_SESSION['page8'] = true;	
					header('Location: https://yuup.online');
				}
			}
			else
			{
				$loadUser = $dbh->prepare("SELECT * FROM `users` WHERE fbid=:fbid LIMIT 1");
				$loadUser->bindParam(':fbid', $_SESSION['FBID']);
				$loadUser->execute();
				while ($User = $loadUser->fetch())
				{
					$_SESSION['id'] = $User['id'];
					$_SESSION['username'] = $User['username'];
					$_SESSION['rank'] = $User['rank'];
					$_SESSION['look'] = $User['look'];
					$_SESSION['credits'] = $User['credits'];
					$_SESSION['activity_points'] = $User['activity_points'];
					$_SESSION['vip_points'] = $User['vip_points'];
					$_SESSION['gotw_points'] = $User['gotw_points'];
								$_SESSION['page1'] = true;
								$_SESSION['page2'] = true;
								$_SESSION['page3'] = true;
								$_SESSION['page4'] = true;
								$_SESSION['page5'] = true;
								$_SESSION['page6'] = true;
								$_SESSION['page7'] = true;
								$_SESSION['page8'] = true;					
					header('Location: https://yuup.online/index');
				}
			}
		}
		else{
			header('Location: https://yuup.online/index');
			exit;
		}
		} else {
		$loginUrl = $helper->getLoginUrl(array('scope' => 'email'));
		header("Location: ".$loginUrl);
	}
?>	