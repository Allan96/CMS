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
    $helper = new FacebookRedirectLoginHelper($config['hotelUrl'].'/system/app/plugins/fblogin/fbvinc.php');
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
			if(loggedIn()){ 
			if ($fbLogin->RowCount() != 0)
			{
				header('Location: '.$config['hotelUrl'].'/rpxfalse');
			}
			if ($fbLogin->RowCount() == 0){
				$loadUser = $dbh->prepare("UPDATE users SET fbid = :fbid WHERE id=:userid");
				$loadUser->bindParam(':fbid', $_SESSION['FBID']);
				$loadUser->bindParam(':userid', $_SESSION['id']);
				$loadUser->execute();
				header('Location: '.$config['hotelUrl'].'/rpxtrue');
			}
			}
			else{
				header('Location: '.$config['hotelUrl'].'/index');
			}
		}
		else{
			header('Location: '.$config['hotelUrl'].'/index');
			exit;
		}
		} else {
		$loginUrl = $helper->getLoginUrl(array('scope' => 'email'));
		header("Location: ".$loginUrl);
	}
?>	