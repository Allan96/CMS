<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function friendList()
	{
			
	if(isset($_GET['user'])) {
		$user = $_GET['user'];
	}
	else{
	$user = '';}
		global $dbh,$config;
		echo '<link rel="stylesheet" href="'.$config['hotelUrl'].'\templates\Habbo\css\simplefriends.css?v=2" type="text/css">';
		//INFORMATIE VAN TYPE 1
		$getRelations0 = $dbh->prepare("SELECT * FROM users WHERE username = '$user'");
		$getRelations0->execute();
		$infoRelations0 = $getRelations0->fetch();
		$getRelations1 = $dbh->prepare("SELECT * FROM user_relationships WHERE user_id = :id AND type = '1' ORDER BY RAND()");
		$getRelations1->bindParam(':id', $infoRelations0['id']);		
		$getRelations1->execute();
		$infoRelations1 = $getRelations1->fetch();
		$infoRelationsNum = $getRelations1->rowCount();
		$getUser = $dbh->prepare("SELECT id,username,look,online FROM users WHERE id = :targetId");
		$getUser->bindParam(':targetId', $infoRelations1['target']);
		$getUser->execute();
		$infoFriends = $getUser->fetch();
		if($infoFriends['online'] == '1'){
			$friend_online = "<span class='friend_online' style='margin-left:10px;'> - Online</span>";
			}else{
			$friend_online = "<span class='friend_online' style='margin-left:10px;'>- Offline</span>";
		}
		if($infoRelationsNum == '0'){
			echo '
			<div class="friend_1" style="padding: 10px;">
			Você não tem amigos nesta categoria!
			<img src="http://i.imgur.com/2CXVkjA.png" class="friend_icon" style="margin-top: -10px;float: right;">
			</div>
			';
			}else{
			if($infoRelationsNum == '1'){
				$infoNumtext = "Faça mais amigos nesta categoria :)";
				}else{
				$infoRelationsNum = $infoRelationsNum - 1;
				$infoNumtext = "Você tem <b>" . $infoRelationsNum . "</b> amigos nesta categoria";
			}
			echo '
			<div class="friend_1"">
			<table>
			<tr>
			<td>
			<div class="circle_friend">
			<div class="friend_head" style="width: 55px; height:60px;background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure='. filter($infoFriends['look']) .'&head_direction=2&action=wav&headonly=1)">
			</div>
			</div>
			</td>
			<td>
			<img src="http://i.imgur.com/2CXVkjA.png" class="friend_icon">
			</td>
			<td>
			'. $infoFriends['username'] .'
			</td>
			<td style="width: 100%;">
			'.  $friend_online .'
			</td>
			</tr>
			
			</table>
			
			<div class="numRows_friend">
			'. $infoNumtext .'
			</div>
			</div>
			';
		}
		//INFORMATIE VAN TYPE 2
		$getRelations1 = $dbh->prepare("SELECT * FROM user_relationships WHERE user_id = :id AND type = '2' ORDER BY RAND()");
		$getRelations1->bindParam(':id', $infoRelations0['id']);		
		$getRelations1->execute();
		$infoRelations1 = $getRelations1->fetch();
		$infoRelationsNum = $getRelations1->rowCount();
		$getUser = $dbh->prepare("SELECT id,username,look,online FROM users WHERE id = :targetId");
		$getUser->bindParam(':targetId', $infoRelations1['target']);
		$getUser->execute();
		$infoFriends = $getUser->fetch();
		if($infoFriends['online'] == '1'){
			$friend_online = "<span class='friend_online' style='margin-left:10px;'> - Online</span>";
			}else{
			$friend_online = "<span class='friend_online' style='margin-left:10px;'> - Offline</span>";
		}
		if($infoRelationsNum == '0'){
			echo '
			<div class="friend_2" style="padding: 10px;">
			Você não tem amigos nesta categoria!
			<img src="http://i.imgur.com/krRqCBj.png" class="friend_icon" style="margin-top: -10px;float: right;">
			</div>
			';
			}else{
			if($infoRelationsNum == '1'){
				$infoNumtext = "Faça mais amigos nesta categoria :)";
				}else{
				$infoRelationsNum = $infoRelationsNum - 1;
				$infoNumtext = "Você tem <b>" . $infoRelationsNum . "</b> amigos nesta categoria";
			}
			echo '
			<div class="friend_2"">
			<table>
			<tr>
			<td>
			<div class="circle_friend">
			<div class="friend_head" style="width: 55px; height:60px;background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure='. filter($infoFriends['look']) .'&head_direction=2&action=wav&headonly=1)">
			</div>
			</div>
			</td>
			<td>
			<img src="http://i.imgur.com/krRqCBj.png" class="friend_icon">
			</td>
			<td>
			'. $infoFriends['username'] .'
			</td>
			<td style="width: 100%;">
			'.  $friend_online .'
			</td>
			</tr>
			</table>
			<div class="numRows_friend">
			'. $infoNumtext .'
			</div>
			</div>
			';
		}
		//INFORMATIE VAN TYPE 3
		$getRelations1 = $dbh->prepare("SELECT * FROM user_relationships WHERE user_id = :id AND type = '3' ORDER BY RAND()");
		$getRelations1->bindParam(':id', $infoRelations0['id']);		
		$getRelations1->execute();
		$infoRelations1 = $getRelations1->fetch();
		$infoRelationsNum = $getRelations1->rowCount();
		$getUser = $dbh->prepare("SELECT id,username,look,online FROM users WHERE id = :targetId");
		$getUser->bindParam(':targetId', $infoRelations1['target']);
		$getUser->execute();
		$infoFriends = $getUser->fetch();
		if($infoFriends['online'] == '1'){
			$friend_online = "<span class='friend_online' style='margin-left:10px;'> - Online</span>";
			}else{
			$friend_online = "<span class='friend_online' style='margin-left:10px;'> - Offline</span>";
		}
		if($infoRelationsNum == '0'){
			echo '
			<div class="friend_3" style="padding: 10px;">
			Você não tem amigos nesta categoria!
			<img src="http://i.imgur.com/2XaE1mr.png" class="friend_icon" style="margin-top: -10px;float: right;">
			</div>
			';
			}else{
			if($infoRelationsNum == '1'){
				$infoNumtext = "Faça mais amigos nesta categoria :)";
				}else{
				$infoRelationsNum = $infoRelationsNum - 1;
				$infoNumtext = "Você tem <b>" . $infoRelationsNum . "</b> amigos nesta categoria";
			}
			echo '
			<div class="friend_3"">
			<table>
			<tr>
			<td>
			<div class="circle_friend">
			<div class="friend_head" style="width: 55px; height:60px;background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure='. filter($infoFriends['look']) .'&head_direction=2&action=wav&headonly=1)">
			</div>
			</div>
			</td>
			<td>
			<img src="http://i.imgur.com/2XaE1mr.png" class="friend_icon">
			</td>
			<td>
			'. $infoFriends['username'] .'
			</td>
			<td style="width: 100%;">
			'.  $friend_online .'
			</td>
			</tr>
			</table>
			<div class="numRows_friend">
			'. $infoNumtext .'
			</div>
			</div>
			';
		}
	}
?>		