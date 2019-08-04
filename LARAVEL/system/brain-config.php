<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	
	/* Database Setting */
	$db['host'] = 'localhost'; //Mysql's Host
	$db['port'] = '3306'; //Mysql's port
	$db['user'] = "root"; //Mysql's user
	$db['pass'] = ''; //Mysql's password
	$db['db'] = "yuup"; //Mysql's database
	
	/* Emu Settings */
	$config['hotelEmu'] = 'plusemu'; // plusemu // arcturus

	/* Client Setting */
	$hotel['emuHost'] = "217.182.189.233"; //IP of VPS//IP of Proxy
	$hotel['emuPort'] = "9015";  //Port of VPS//Port of Proxy
	$hotel['staffCheckClient'] = true; //Enable the staff pin in the client (true) or disable it (false)
	$hotel['staffCheckClientMinimumRank'] = 5; //Minium staff rank to get the staff pin in the client
	$hotel['homeRoom'] = '191'; //Set the start room when you get in the hotel
	$hotel['external_Variables'] = "http://swf.yuup.online/gamedata/variables_yuup.txt?14aaaaaa";
	$hotel['external_Variables_Override'] = "http://swf.yuup.online/gamedata/override/TESTE.txt?";
	$hotel['external_Texts'] = "http://swf.yuup.online/gamedata/external_flash_texts.txt?16aaaaaaaa?";
	$hotel['external_Texts_Override'] = "http://swf.yuup.online/data/override/external_flash_override_texts.txt?";
	$hotel['productdata'] = "http://swf.yuup.online/data/productdata.txt?";
	$hotel['furnidata'] = "http://swf.yuup.online/gamedata/furnidata.xml?";
	$hotel['figuremap'] = "http://swf.yuup.online/gamedata/lifemap.xml?AA";
	$hotel['figuredata'] = "http://swf.yuup.online/gamedata/lifedata.xml?AA";
	$hotel['swfFolder'] = "http://swf.yuup.online/gordon/YUUP201812";
	$hotel['swfFolderSwf'] = "http://swf.yuup.online/gordon/YUUP201812/Yuup20183.swf?addaddaa11111";
	
	/* Website Setting */
	$config['hotelUrl'] = "http://localhost/2019/CMS-Yuup/LARAVEL";//Address of your hotel. Does not end with a "/"
	$config['skin'] = "theme-yuup"; //Skin/template of your website
	$config['lang'] = "en"; //Language of your website /en/nl/es
	$config['donos'] = "Weve";
	$config['hotelName'] = "Yuup"; //Name of your hotel
	$config['favicon'] = "http://i.imgur.com/leIxs6a.png";
	$config['staffCheckHk'] = true; //Enable the staff pin in the housekeeping (true) or disable it (false)
	$config['staffCheckHkMinimumRank'] = 3; //Minium staff rank to get the staff pin in the housekeeping
	$config['maintenance'] = false; //Enable the maintenance of your website (true) or disable it (false)
	$config['maintenancekMinimumRankLogin'] = 3; //Minium staff rank to login when the website is in maintenance
	$config['groupBadgeURL'] = "http://127.0.0.1/swf/habbo-imaging/badge.php?badge=";
	$config['badgeURL'] = "http://127.0.0.1/swf/c_images/album1584/"; 
	
	/* Facebook Login Settings
		You need a Facebook app for this to work go to
		http://developers.facebook.com/apps/ */
	 
	$config['facebookLogin'] = false; //Enable the Facebook login (true) or disable it (false)
	$config['facebookAPPID'] = '937775742914377';
	$config['facebookAPPSecret'] = '8589a7a250e13c515164a9aa9405516e';
	$config['newsCommandEnable'] = true;
	
	/* Email Settings */
	$email['mailServerHost'] = 'smtp.gmail.com';
	$email['mailServerPort'] = '587';
	$email['SMTPSecure'] = 'TLS';
	$email['mailUsername'] = 'yuupofc@gmail.com';
	$email['mailPassword'] = 'QUIRON@YUUP';
	$email['mailLogo'] = 'http://yuup.online/templates/yuup/img/yuup2.png';
	$email['mailTemplate'] = '/system/app/plugins/PHPmailer/temp/resetpassword.html';
	
	/* Social settings */
	$config['facebook'] = 'http://www.facebook.com/Habbo/';
	$config['facebookEnable'] = false;
	$config['twitter'] = 'http://twitter.com/Habbo';
	$config['twitterEnable'] = false;
	
	/* Register Setting */
	$config['startMotto'] = "Welkom in Brain!"; //Regsiter start motto
	$config['credits']	= "10000";
	$config['duckets']	= "0";
	$config['diamonds']	= "10";
	$config['diamondsRef']	= "10";
	$config['registerEnable'] = true;
	
	/* Google recaptcha Site Key  
	   Go to this website to create a recaptcha Site Key: http://www.google.com/recaptcha/intro/index.html	*/
	$config['recaptchaSiteKey'] = "6LdzewwUAAAAABkJ3vsdfCDca9qmLGDaWAHqMRtFEs2";
	$config['recaptchaSiteKeyEnable'] = false;
	
	/* Buy VIP Settings */
	$config['vipCost'] = "25";
	$config['vipRankToGet'] = "3";
	$config['vipBadge'] = "vip";
?>