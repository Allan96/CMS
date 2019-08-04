<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	/* 
		Functions list Class Game.
		--------------- 
		sso();
		usersOnline();
		homeRoom();
	*/
	class Game 
	{
		public static function sso()
		{
			global $dbh;
			$timeNow = strtotime("now");
			$sessionKey  = 'Brain-1.5.0-'.substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 25).'-SSO';
			$stmt = $dbh->prepare("UPDATE users SET last_online = :timenow , auth_ticket = :sso WHERE id = :id;
			REPLACE INTO user_auth_ticket VALUES (:id , :sso);");
			$stmt->bindParam(':timenow', $timeNow);
			$stmt->bindParam(':id', $_SESSION['id']);
			$stmt->bindParam(':sso', $sessionKey);
			$stmt->execute();
			
			return $sessionKey;
			
		}
		public static function usersOnline()
		{
			global $dbh;
			$userCount = $dbh->prepare("SELECT * FROM users WHERE online = '1'");
			$userCount->execute();
			$count = floor($userCount->RowCount()*1.2);
			return $count;
		}
		
		public static function Ons()
		{
			global $dbh;
			$userCount = $dbh->prepare("SELECT * FROM server_status");
			$userCount->execute();
			$row = $userCount->fetch();
			return $row['users_online'];
		}
		
		public static function contas()
		{
			global $dbh;
			$userCounts = $dbh->prepare("SELECT * FROM users");
			$userCounts->execute();
			return $userCounts->RowCount();
		}		
		public static function homeRoom()
		{
			global $dbh, $hotel;
			$stmt = $dbh->prepare("UPDATE users SET home_room = :homeroom WHERE id = :id");
			$stmt->bindParam(':homeroom', $hotel['homeRoom']);
			$stmt->bindParam(':id', $_SESSION['id']);
			$stmt->execute();
		}
	} 
?>