
<?php
if (!defined('BRAIN_CMS')) {
    die('Sorry but you cannot access this file!');
}
/* 
Functions list Class User.
---------------
checkUser();
hashed();
validName();
userData();
emailTaken();
userTaken();
refUser();
login();
loginRPG();
register();
userRefClaim();
editPassword();
editEmail();
editHotelSettings();
editUsername();
*/

class User
{
    public static function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        
        
        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        
        return $ip;
        $user_ip = getUserIP();
        
    }
    public static function checkUser($password, $passwordDb, $username)
    {
        $hash_secret = "xCg532%@%gdvf^5DGaa6&*rFTfg^FD4\$OIFThrR_gh(ugf*/";
        $string      = md5($password . ($hash_secret));
        //echo $string;
        return ($string == $passwordDb);
        
    }
    
    public static function hashed($password)
    {
        $hash_secret = "xCg532%@%gdvf^5DGaa6&*rFTfg^FD4\$OIFThrR_gh(ugf*/";
        return md5($password . ($hash_secret));
    }
    
    public static function filtrono($username)
    {
        $pattern = "([,_>_`_´_<_~_^_/_?_°_\_:_;_§_|_!_¹_²_³_£_¢_¬_§_º_@_#_%_¨_&_*_+_{_}_*_])";
        if (ereg($pattern, $password) == TRUE) {
            return false;
        } else {
            return true;
        }
    }
    public static function validName($username)
    {
        if (strlen($username) <= 15 && strlen($username) >= 3 && preg_match("/^([a-zA-Z0-9-.:]+)$/", $username)) {
            return true;
        }
        return false;
    }
    public static function diasatras($key)
    {
        global $dbh, $config;
        if (loggedIn()) {
            $data_inicial = date("Y-m-d", $key);
            // Calcula a diferença em segundos entre as datas
            $diferenca    = strtotime("now") - strtotime($data_inicial);
            //Calcula a diferença em dias
            $dias         = floor($diferenca / (60 * 60 * 24));
            return $dias;
            
        }
    }
    
    public static function quartos($key)
    {
        global $dbh, $config;
        if (loggedIn()) {
            $stmt = $dbh->prepare("SELECT id FROM rooms WHERE owner = :player_id");
            $stmt->bindParam(':player_id', $key);
            $stmt->execute();
            $row_count = $stmt->RowCount();
            return $row_count;
            
        }
    }
    public static function userData($key)
    {
        global $dbh, $config;
        if (loggedIn()) {
            $stmt = $dbh->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
            $row = $stmt->fetch();
            return filter($row[$key]);
            
        }
    }
    public static function rank($key)
    {
        global $dbh, $config;
        $stmt = $dbh->prepare("SELECT :type,username,look,rank from users WHERE rank < 6 and :type > 0 ORDER BY :type DESC LIMIT 5");
        $stmt->bindParam(':type', $key);
        $stmt->execute();
        $row = $stmt->fetch();
        return filter($row[$key]);
        
        
    }
    
    public static function userDataHome($key)
    {
        global $dbh, $config;
        if (loggedIn()) {
            $stmt = $dbh->prepare("SELECT * FROM users WHERE username = :id LIMIT 1");
            $stmt->bindParam(':id', $_GET['user']);
            $stmt->execute();
            $row = $stmt->fetch();
            return filter($row[$key]);
            
        }
    }
    public static function emailTaken($email)
    {
        global $dbh;
        $stmt = $dbh->prepare("SELECT*FROM users WHERE mail = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->RowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public static function userTaken($username)
    {
        global $dbh;
        $stmt = $dbh->prepare("SELECT*FROM users WHERE username = :username LIMIT 1");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        if ($stmt->RowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public static function FormPost()
    {
        global $dbh;
        if (isset($_GET['id'])) {
            $FormPost = $dbh->prepare("INSERT INTO news_form(user,news,img,date)
                        VALUES
                        (
                        :user,
                        :formid,
                        :img,
                        '" . time() . "'
                        )");
            $FormPost->bindParam(':formid', $_GET['id']);
            $FormPost->bindParam(':img', $_POST['img']);
            $FormPost->bindParam(':user', $_POST['user']);
            $FormPost->execute();
        }
    }
    
    public static function atualiza()
    {
        global $dbh;
        if (isset($_POST['atualiza'])) {
            $atualiza = $dbh->prepare("INSERT INTO atualiza(user,news,img,date)
                        VALUES
                        (
                        :user,
                        0,
                        :img,
                        '" . time() . "'
                        )");
            $atualiza->bindParam(':img', $_POST['img']);
            $atualiza->bindParam(':user', $_POST['user']);
            $atualiza->execute();
        }
    }
    public static function Hotel()
    {
        global $dbh;
        if (isset($_GET['id'])) {
            $deleteNews = $dbh->prepare("UPDATE cms_news SET roomid = roomid+1 WHERE id=:newsid");
            $deleteNews->bindParam(':newsid', $_GET['id']);
            $deleteNews->execute();
        }
    }
    public static function refUser($refUsername)
    {
        global $dbh, $lang;
        $getUsernameRef = $dbh->prepare("SELECT*FROM users WHERE username = :username LIMIT 1");
        $getUsernameRef->bindParam(':username', $refUsername);
        $getUsernameRef->execute();
        $getUsernameRefData = $getUsernameRef->fetch();
        if ($getUsernameRef->RowCount() > 0) {
            if ($getUsernameRefData['ip_reg'] == checkCloudflare()) {
                html::error($lang["RsameIpRef"]);
            } else {
                return true;
            }
        } else {
            html::error($lang["RnotExist"]);
            return false;
        }
    }
    
    public static function loginRPG()
    {
        global $dbh, $config, $lang;
        if (isset($_POST['login'])) {
            if (!empty($_POST['username'])) {
                if (!empty($_POST['password'])) {
                    $stmt = $dbh->prepare("SELECT id, password,username FROM rpgusers WHERE username = :username LIMIT 1");
                    $stmt->bindParam(':username', $_POST['username']);
                    $stmt->execute();
                    if ($stmt->RowCount() == 1) {
                        $row = $stmt->fetch();
                        if (self::checkUser($_POST['password'], $row['password'], $row['username'])) {
                            $_SESSION['id'] = $row['id'];
                            if (!$config['maintenance'] == true) {
                                $userLastIp = 'ip_last';
                                $stmt       = $dbh->prepare("UPDATE users SET " . $userLastIp . " = '" . checkCloudflare() . "' WHERE id = :id");
                                $stmt->bindParam(':id', $_SESSION['id']);
                                $stmt->execute();
                                header('Location: ' . $config['hotelUrl'] . '/painel/index');
                            } else {
                                if ($row['rank'] >= $config['maintenancekMinimumRankLogin']) {
                                    $_SESSION['adminlogin'] = true;
                                    header('Location: ' . $config['hotelUrl'] . '/painel/index');
                                }
                                return html::error($lang["Mnologin"]);
                            }
                        }
                        return html::error($lang["Lpasswordwrong"]);
                    }
                    return html::error($lang["Lnotexistuser"]);
                }
                return html::error($lang["Lnopassword"]);
            }
            return html::error($lang["Lnousername"]);
        }
    }
    public static function UserExiste()
    {
        global $dbh;
        $stmt = $dbh->prepare("SELECT username FROM users WHERE username = :username LIMIT 1");
        $stmt->bindParam(':username', $_POST['ValidaUser']);
        $stmt->execute();
        if ($stmt->RowCount() >= 1) {
			echo 'false';
		}
		else{
			echo 'true';
		}
      
    }
    public static function login()
    {
        global $dbh, $config, $lang;
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            if (empty($_SESSION['tempologin'])) {
                $_SESSION['tempologin'] = 0;
            }
            if (!empty($_POST['username'])) {
                if (!empty($_POST['password'])) {
                    $stmt = $dbh->prepare("SELECT id, password,username,rank,gotw_points,credits,look,activity_points,vip_points,points_e FROM users WHERE username = :username LIMIT 1");
                    $stmt->bindParam(':username', $_POST['username']);
                    $stmt->execute();
                    if ($stmt->RowCount() == 1) {
                        $row = $stmt->fetch();
                        if (!self::checkUser($_POST['password'], $row['password'], $row['username']) || (time() - $_SESSION['tempologin']) != 0) {
                            
                            if ((time() - $_SESSION['tempologin']) < 5) {
                                $tempo = time() - $_SESSION['tempologin'];
                                $falta = 5 - $tempo;
                                return html::error('Espere ' . $falta . ' segundos para tentar logar novamente.');
                            } else if (empty($_SESSION['tempologin']) || (time() - $_SESSION['tempologin']) > 5) {
                                $_SESSION['tempologin'] = time();
                            }
                        }
                        if (self::checkUser($_POST['password'], $row['password'], $row['username'])) {
                            $_SESSION['id']       = $row['id'];
                            $_SESSION['username'] = $row['username'];
                            echo '<meta http-equiv="refresh" content="0;url=./" />';
                            if (!$config['maintenance'] == true) {
                                $userLastIp = 'ip_last';
                                $stmt       = $dbh->prepare("UPDATE users SET " . $userLastIp . " = '" . checkCloudflare() . "' WHERE id = :id");
                                $stmt->bindParam(':id', $_SESSION['id']);
                                $stmt->execute();
                                $_SESSION['ip'] = checkCloudflare();
                            } else {
                                if ($row['rank'] >= $config['maintenancekMinimumRankLogin']) {
                                    $_SESSION['adminlogin'] = true;
                                }
                                return html::error($lang["Mnologin"]);
                            }
                        } else {
                            return html::error($lang["Lpasswordwrong"]);
                        }
                    } else {
                        return html::error($lang["Lnotexistuser"]);
                    }
                } else {
                    return html::error($lang["Lnopassword"]);
                }
                
            } else {
                return html::error($lang["Lnousername"]);
            }
            
        }
    }
    public static function register()
    {
        global $config, $lang, $dbh;
        if (isset($_POST['register'])) {
            if (isset($_POST['g-recaptcha-response'])) {
                $captcha_data = $_POST['g-recaptcha-response'];
            }
            
            // Se nenhum valor foi recebido, o usuário não realizou o captcha
            if (!$captcha_data) {
                return html::error("Por favor, confirme o captcha.");
            }
            if ($config['registerEnable'] == true) {
                if (!empty($_POST['username'])) {
                    if (self::validName($_POST['username'])) {
                        if (!empty($_POST['password'])) {
                            if (!empty($_POST['password_repeat'])) {
                                if (!empty($_POST['email'])) {
                                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                        if (!self::userTaken($_POST['username'])) {
                                            if (!self::emailTaken($_POST['email'])) {
                                                if (strlen($_POST['password']) >= 6) {
                                                    $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfyaWAUAAAAAAs6V-EDm-U-Fhg00ZZMyT0TQs9h&response=" . $captcha_data . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                                                    if ($resposta . success) {
                                                        
                                                    } else {
                                                        
                                                        exit;
                                                    }
                                                    if ($_POST['password'] == $_POST['password_repeat']) {
                                                        $userRegIp = 'ip_reg';
                                                        $stmt      = $dbh->prepare("SELECT " . $userRegIp . " FROM users WHERE " . $userRegIp . " = '" . checkCloudflare() . "'");
                                                        $stmt->execute();
                                                        if ($stmt->RowCount() < 400) {
                                                            if (self::refUser($_POST['referrer']) || empty($_POST['referrer'])) {
                                                                if (!$config['recaptchaSiteKeyEnable'] == true) {
                                                                    $_POST['g-recaptcha-response'] = true;
                                                                }
                                                                if ($_POST['captcha'] == $_POST['captchaoc']) {
                                                                    if (empty($_POST['figure'])) {
                                                                        
                                                                        $look = 'hr-105-1035.hd-180-1.ch-215-92.lg-275-94.sh-295-1408';
                                                                    } else if ($_POST['figure'] == '0') {
                                                                        $look = 'hr-105-1035.hd-180-1.ch-215-92.lg-275-94.sh-295-1408';
                                                                        
                                                                    } else if ($_POST['figure'] == '1') {
                                                                        $look = 'hr-893-45.hd-208-1.ch-225-83.lg-285-83.sh-290-1408.ha-1003-1408.fa-1202-80.ca-1819';
                                                                        
                                                                    } else if ($_POST['figure'] == '2') {
                                                                        $look = 'hr-3163-52.lg-3116-92-1185.ch-3111-1185-92.hd-207-1016.sh-3115-1193-110.ca-3085-92';
                                                                        
                                                                    }
                                                                    
                                                                    else if ($_POST['figure'] == '3') {
                                                                        $look = 'ch-989999869-110-62.he-3071-1189.hr-7839859-45.fa-201407-97.ca-505387-62.sh-56541282-62.wa-9211528-62-62.hd-605-1024.lg-5628582-1189';
                                                                        
                                                                    } else if ($_POST['figure'] == '4') {
                                                                        $look = 'he-987462913-110-62.sh-740-110.hr-894624590-45-1055.cc-987435751-110-110.fa-1202-110.lg-696-77.ch-685-74.hd-627-1.ha-1013-110';
                                                                        
                                                                    } else if ($_POST['figure'] == '5') {
                                                                        $look = 'ch-826-92-1298.hr-955822-1346.hd-627-10.lg-3057-92';
                                                                        
                                                                    }
                                                                    
                                                                    $motto      = filter($_POST['motto']);
                                                                    $password   = self::hashed($_POST['password']);
                                                                    $addNewUser = $dbh->prepare("
                                                                            INSERT INTO
                                                                            users
                                                                            (username, password, rank, motto, account_created, mail, look, ip_last, ip_reg, credits, activity_points, vip_points)
                                                                            VALUES
                                                                            (
                                                                            :username, 
                                                                            :password, 
                                                                            '1', 
                                                                            :motto, 
                                                                            '" . strtotime("now") . "', 
                                                                            :email, 
                                                                            :avatar,
                                                                            '" . checkCloudflare() . "', 
                                                                            '" . checkCloudflare() . "', 
                                                                            :credits,
                                                                            :duckets,
                                                                            :diamonds
                                                                            )");
                                                                    $addNewUser->bindParam(':username', $_POST['username']);
                                                                    $addNewUser->bindParam(':password', $password);
                                                                    $addNewUser->bindParam(':motto', $motto);
                                                                    $addNewUser->bindParam(':email', $_POST['email']);
                                                                    $addNewUser->bindParam(':avatar', $look);
                                                                    $addNewUser->bindParam(':credits', $config['credits']);
                                                                    $addNewUser->bindParam(':duckets', $config['duckets']);
                                                                    $addNewUser->bindParam(':diamonds', $config['diamonds']);
                                                                    $addNewUser->execute();
                                                                    
                                                                    $lastId = $dbh->lastInsertId();
                                                                    //User referrer//
                                                                    if (!empty($_POST['referrer'])) {
                                                                        $getUserRef = $dbh->prepare("SELECT id,username FROM users WHERE username = :username LIMIT 1");
                                                                        $getUserRef->bindParam(':username', $_POST['referrer']);
                                                                        $getUserRef->execute();
                                                                        $getInfoRefUser = $getUserRef->fetch();
                                                                        $veri           = $dbh->prepare("SELECT * from referrer WHERE ip=:ip AND refid=:ref");
                                                                        $veri->bindParam(':ip', $_POST['ip']);
                                                                        $veri->bindParam(':ref', $_POST['nameref']);
                                                                        $veri->execute();
                                                                        if ($veri->RowCount() >= 1) {
                                                                            return html::error($lang["referi"]);
                                                                        }
                                                                        if ($veri->RowCount() == 0) {
                                                                            $addRef = $dbh->prepare("
                                                                            INSERT INTO
                                                                            referrer
                                                                            (userid, refid,diamonds)
                                                                            VALUES
                                                                            (
                                                                            :lastid, 
                                                                            :refid,
                                                                            :diamonds
                                                                            )");
                                                                            $addRef->bindParam(':lastid', $lastId);
                                                                            $addRef->bindParam(':refid', $getInfoRefUser['id']);
                                                                            $addRef->bindParam(':diamonds', $config['diamondsRef']);
                                                                            $addRef->execute();
                                                                            $stmt = $dbh->prepare("SELECT*FROM referrerbank WHERE userid = :id LIMIT 1");
                                                                            $stmt->bindParam(':id', $getInfoRefUser['id']);
                                                                            $stmt->execute();
                                                                            if ($stmt->RowCount() == 0) {
                                                                                $addDiamondsRow = $dbh->prepare("
                                                                                INSERT INTO
                                                                                referrerbank
                                                                                (userid,diamonds)
                                                                                VALUES
                                                                                (
                                                                                :lastid, 
                                                                                :diamonds
                                                                                )");
                                                                                $addDiamondsRow->bindParam(':lastid', $getInfoRefUser['id']);
                                                                                $addDiamondsRow->bindParam(':diamonds', $config['diamondsRef']);
                                                                                $addDiamondsRow->execute();
                                                                            } else {
                                                                                $addDiamonds = $dbh->prepare("
                                                                                UPDATE referrerbank SET 
                                                                                diamonds=diamonds + :diamonds 
                                                                                WHERE 
                                                                                userid=:lastid
                                                                                ");
                                                                                $addDiamonds->bindParam(':lastid', $getInfoRefUser['id']);
                                                                                $addDiamonds->bindParam(':diamonds', $config['diamondsRef']);
                                                                                $addDiamonds->execute();
                                                                            }
                                                                            
                                                                            $_SESSION['id'] = $lastId;
                                                                        }
                                                                    }
                                                                    //User referrer//
                                                                    else {
                                                                        $stmt = $dbh->prepare("SELECT id, password,username,rank,gotw_points,credits,look,activity_points,vip_points FROM users WHERE id = :id LIMIT 1");
                                                                        $stmt->bindParam(':id', $lastId);
                                                                        $stmt->execute();
                                                                        $row                         = $stmt->fetch();
                                                                        $_SESSION['id']              = $row['id'];
                                                                        $_SESSION['username']        = $row['username'];
                                                                        $_SESSION['rank']            = $row['rank'];
                                                                        $_SESSION['look']            = $row['look'];
                                                                        $_SESSION['credits']         = $row['credits'];
                                                                        $_SESSION['activity_points'] = $row['activity_points'];
                                                                        $_SESSION['vip_points']      = $row['vip_points'];
                                                                        $_SESSION['gotw_points']     = $row['gotw_points'];
                                                                        $_SESSION['page1']           = true;
                                                                        $_SESSION['page2']           = true;
                                                                        $_SESSION['page3']           = true;
                                                                        $_SESSION['page4']           = true;
                                                                        $_SESSION['page5']           = true;
                                                                        $_SESSION['page6']           = true;
                                                                        $_SESSION['page7']           = true;
                                                                        $_SESSION['page8']           = true;
                                                                    }
                                                                } else {
                                                                    return html::error($lang["Rrobot"]);
                                                                }
                                                            }
                                                        } else {
                                                            return html::error($lang["Rmaxaccounts"]);
                                                        }
                                                    } else {
                                                        return html::error($lang["Rpasswordswrong"]);
                                                    }
                                                } else {
                                                    return html::error($lang["Rpasswordshort"]);
                                                }
                                            } else {
                                                return html::error($lang["Remailexists"]);
                                            }
                                        } else {
                                            return html::error($lang["Rusernameused"]);
                                        }
                                    } else {
                                        return html::error($lang["Remailnotallowed"]);
                                    }
                                } else {
                                    return html::error($lang["Remailempty"]);
                                }
                            } else {
                                return html::error($lang["Rpasswordsempty"]);
                            }
                        } else {
                            return html::error($lang["Rpasswordsempty"]);
                        }
                    } else {
                        return html::error($lang["Rusernameshort"]);
                    }
                } else {
                    return html::error($lang["Rusrnameempty"]);
                }
            } else {
                return html::error($lang["RregisterDisable"]);
            }
        }
    }
    public static function userRefClaim()
    {
        global $dbh, $lang;
        if (isset($_POST['claimdiamonds'])) {
            if (User::userData('online') == 0) {
                $bankCount = $dbh->prepare("SELECT userid,diamonds FROM referrerbank WHERE userid = :userid");
                $bankCount->bindParam(':userid', $_SESSION['id']);
                $bankCount->execute();
                $bankCountData = $bankCount->fetch();
                if ($bankCountData['diamonds'] == 0) {
                    return html::error($lang["MrefNoDia"]);
                } else {
                    $addDiamondsRef = $dbh->prepare("
                        UPDATE users SET 
                        vip_points=vip_points + :diamonds 
                        WHERE 
                        id=:id
                        ");
                    $addDiamondsRef->bindParam(':id', $_SESSION['id']);
                    $addDiamondsRef->bindParam(':diamonds', $bankCountData['diamonds']);
                    $addDiamondsRef->execute();
                    $DiamondsCountRemove = $dbh->prepare("
                        UPDATE referrerbank SET 
                        diamonds = 0 
                        WHERE 
                        userid=:userid
                        ");
                    $DiamondsCountRemove->bindParam(':userid', $_SESSION['id']);
                    $DiamondsCountRemove->execute();
                    return html::errorSucces($lang["MrefOnline"]);
                }
            } else {
                return html::error('Je mag niet online zijn om je diamanten te claimen!');
            }
        }
    }
    Public static function editPassword()
    {
        global $dbh, $lang;
        if (isset($_POST['password'])) {
            if (isset($_POST['oldpassword']) && !empty($_POST['oldpassword'])) {
                if (isset($_POST['newpassword']) && !empty($_POST['newpassword'])) {
                    $stmt = $dbh->prepare("SELECT id, password, username FROM users WHERE id = :id");
                    $stmt->bindParam(':id', $_SESSION['id']);
                    $stmt->execute();
                    $getInfo = $stmt->fetch();
                    if (self::checkUser(filter($_POST['oldpassword']), $getInfo['password'], filter($getInfo['username']))) {
                        if (strlen($_POST['newpassword']) >= 6) {
                            $newPassword = self::hashed($_POST['newpassword']);
                            $stmt        = $dbh->prepare("
                                UPDATE 
                                users 
                                SET password = 
                                :newpassword 
                                WHERE id = 
                                :id
                                ");
                            $stmt->bindParam(':newpassword', $newPassword);
                            $stmt->bindParam(':id', $_SESSION['id']);
                            $stmt->execute();
                            return Html::errorSucces($lang["Ppasswordchanges"]);
                        } else {
                            return Html::errorn($lang["Ppasswordshort"]);
                        }
                    } else {
                        return Html::errorn($lang["Poldpasswordwrong"]);
                    }
                } else {
                    return Html::errorn('Sua nova senha está vazia!');
                }
            } else {
                return Html::errorn('A senha antiga está vazia!');
            }
        }
    }
    Public static function editEmail()
    {
        global $lang, $dbh;
        if (isset($_POST['account'])) {
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    if (!self::emailTaken($_POST['email'])) {
                        $stmt = $dbh->prepare("
                            UPDATE 
                            users 
                            SET mail = 
                            :newmail
                            WHERE id = 
                            :id
                            ");
                        $stmt->bindParam(':newmail', $_POST['email']);
                        $stmt->bindParam(':id', $_SESSION['id']);
                        $stmt->execute();
                        return Html::errorSucces($lang["Eemailchanges"]);
                    } else {
                        return Html::error($lang["Eemailexists"]);
                    }
                } else {
                    return Html::error($lang["Eemailnotallowed"]);
                }
            } else {
                return Html::error($lang["Enoemail"]);
            }
        }
    }
    
    public static function EditVideo()
    {
        global $lang, $dbh;
        if (isset($_POST['update'])) {
            $stmt = $dbh->prepare("SELECT id, video, username FROM users");
            $stmt = $dbh->prepare("UPDATE users SET 
                video=:video
                WHERE id = :id");
            $stmt->bindParam(':video', $_POST['video']);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
            Admin::gelukt("Video Atualizado!");
        }
    }
    
    public static function EditCapa()
    {
        global $lang, $dbh;
        if (isset($_POST['scapa'])) {
            $stmt = $dbh->prepare("UPDATE users SET 
                photo_capa=:capa
                WHERE id = :id");
            $stmt->bindParam(':capa', $_POST['capa']);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
            Admin::gelukt("Capa Atualizada!");
        }
    }
    
    public static function EditPerfil()
    {
        global $lang, $dbh;
        if (isset($_POST['sperfil'])) {
            $stmt = $dbh->prepare("UPDATE users SET 
                photo_perfil=:perfil
                WHERE id = :id");
            $stmt->bindParam(':perfil', $_POST['perfil']);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
            Admin::gelukt("Foto de Perfil Atualizada!");
        }
    }
    
    public static function EditFace()
    {
        global $lang, $dbh;
        if (isset($_POST['sface'])) {
            $stmt = $dbh->prepare("UPDATE users SET 
                facebook=:facebook
                WHERE id = :id");
            $stmt->bindParam(':facebook', $_POST['facebook1']);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
            Admin::gelukt("Facebook adicionado ao seu Perfil!");
        }
    }
    
    public static function EditImgur()
    {
        global $lang, $dbh;
        if (isset($_POST['simgur'])) {
            $stmt = $dbh->prepare("UPDATE users SET 
                imgur=:imgur
                WHERE id = :id");
            $stmt->bindParam(':imgur', $_POST['imgur']);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
            Admin::gelukt("Imgur adicionado ao seu Perfil!");
        }
    }
    
    public static function EnviarForm1()
    {
        global $lang, $dbh;
        if (isset($_POST['enviar']))
            if (!$_SESSION['id']) {
                return Html::error("Ente no Hotel para votar!");
            } else { {
                    if (User::userData('account_created') <= 1541630194) {
                        $stmt = $dbh->prepare("SELECT * FROM votacoes WHERE user_id = :id AND categoria=:categoria");
                        $stmt->bindParam(':id', $_SESSION['id']);
                        $stmt->bindParam(':categoria', $_POST['categoria']);
                        $stmt->execute();
                        $teste = $stmt->RowCount();
                        if ($stmt->RowCount() == 0) {
                            $inser = $dbh->prepare("INSERT INTO votacoes(user_id, usuario,categoria) VALUES(
                            :id,
                            :usuario,
                            :cat)");
                            $inser->bindParam(':id', $_SESSION['id']);
                            $inser->bindParam(':usuario', $_POST['usuario']);
                            $inser->bindParam(':cat', $_POST['categoria']);
                            $inser->execute();
                            return Admin::gelukt("Voto computado com sucesso!");
                        } else {
                            return Html::error("Você já votou!");
                        }
                    } else {
                        return Html::error("Que pena! Novos usuários não podem votar :/");
                    }
                }
            }
    }
    public static function EnviarForm25()
    {
        global $lang, $dbh;
        if (isset($_POST['enviar']))
            if ($_SESSION == NULL) {
                return Html::error("Ente no Hotel para votar!");
            } else { {
                    if (User::userData('account_created') <= 1541630194) {
                        if ($_POST['categoria1'] != "Barraqueiro(a) do Ano" OR $_POST['categoria2'] != "Criador(a) de Jogos do Ano" OR $_POST['categoria3'] != "LGBT do Ano" OR $_POST['categoria4'] != "Staff do Ano" OR $_POST['categoria5'] != "Construtor do Ano" OR $_POST['categoria6'] != "Visual do Ano" OR $_POST['categoria7'] != "Locutor(a) do Ano | Masculino" OR $_POST['categoria8'] != "Locutor(a) do Ano | Feminino" OR $_POST['categoria9'] != "Superior da Rádio" OR $_POST['categoria10'] != "Ouvinte do Ano" OR $_POST['categoria11'] != "Programação do Ano" OR $_POST['categoria12'] != "Artista | Designer do Ano" OR $_POST['categoria13'] != "Grupo do Ano" OR $_POST['categoria14'] != "Usuário Revelação em Eventos" OR $_POST['categoria15'] != "Membro da Rádio do Ano" OR $_POST['categoria16'] != "Melhor Campanha" OR $_POST['categoria17'] != "Melhor realizador de Eventos" OR $_POST['categoria18'] != "Casal do Ano") {
                            return Html::error("Não altere nenhum campo de categoria!");
                        } else {
                            $stmt = $dbh->prepare("SELECT * FROM votacoes2 WHERE user_id = :id");
                            $stmt->bindParam(':id', $_SESSION['id']);
                            $stmt->execute();
                            $teste = $stmt->RowCount();
                            $i     = 1;
                            if ($stmt->RowCount() == 0) {
                                while ($i <= 18) {
                                    $inser = $dbh->prepare("INSERT INTO votacoes2(user_id, usuario,categoria) VALUES(
                                    :id,
                                    :usuario,
                                    :cat)");
                                    $inser->bindParam(':id', $_SESSION['id']);
                                    $inser->bindParam(':usuario', $_POST['usuario' . $i . '']);
                                    $inser->bindParam(':cat', $_POST['categoria' . $i . '']);
                                    $inser->execute();
                                    $i++;
                                }
                                return Admin::gelukt("Voto computado com sucesso!");
                            } else {
                                return Html::error("Você já votou!");
                            }
                        }
                        
                    } else {
                        return Html::error("Que pena! Novos usuários não podem votar :/");
                    }
                }
            }
    }
    
    
    public static function EnviarForm30()
    {
        global $lang, $dbh;
        if (isset($_POST['enviar']))
            if ($_SESSION == NULL) {
                return Html::error("Ente no Hotel para votar!");
            } else { {
                    if (User::userData('account_created') <= 1541630194) {
                        if ($_POST['categoria1'] != "Barraqueiro(a) do Ano" OR $_POST['categoria2'] != "Criador(a) de Jogos do Ano" OR $_POST['categoria3'] != "LGBT do Ano" OR $_POST['categoria4'] != "Staff do Ano" OR $_POST['categoria5'] != "Construtor do Ano" OR $_POST['categoria6'] != "Visual do Ano" OR $_POST['categoria7'] != "Locutor(a) do Ano | Masculino" OR $_POST['categoria8'] != "Locutor(a) do Ano | Feminino" OR $_POST['categoria9'] != "Superior da Rádio" OR $_POST['categoria10'] != "Ouvinte do Ano" OR $_POST['categoria11'] != "Programação do Ano" OR $_POST['categoria12'] != "Artista | Designer do Ano" OR $_POST['categoria13'] != "Grupo do Ano" OR $_POST['categoria14'] != "Usuário Revelação em Eventos" OR $_POST['categoria15'] != "Membro da Rádio do Ano" OR $_POST['categoria16'] != "Melhor Campanha" OR $_POST['categoria17'] != "Melhor realizador de Eventos" OR $_POST['categoria18'] != "Casal do Ano") {
                            return Html::error("Não altere nenhum campo de categoria!");
                        } else {
                            $stmt = $dbh->prepare("SELECT * FROM votacoes3 WHERE user_id = :id");
                            $stmt->bindParam(':id', $_SESSION['id']);
                            $stmt->execute();
                            $teste = $stmt->RowCount();
                            $i     = 1;
                            if ($stmt->RowCount() == 0) {
                                while ($i <= 18) {
                                    $inser = $dbh->prepare("INSERT INTO votacoes3(user_id, usuario,categoria) VALUES(
                                    :id,
                                    :usuario,
                                    :cat)");
                                    $inser->bindParam(':id', $_SESSION['id']);
                                    $inser->bindParam(':usuario', $_POST['usuario' . $i . '']);
                                    $inser->bindParam(':cat', $_POST['categoria' . $i . '']);
                                    $inser->execute();
                                    $i++;
                                }
                                return Admin::gelukt("Voto computado com sucesso!");
                            } else {
                                return Html::error("Você já votou!");
                            }
                        }
                        
                    } else {
                        return Html::error("Que pena! Novos usuários não podem votar :/");
                    }
                }
            }
    }
    
    
    Public static function editHotelSettings()
    {
        global $lang, $dbh;
        if (isset($_POST['hinstellingenv'])) {
            $stmt = $dbh->prepare("
                UPDATE 
                users 
                SET ignore_invites = 
                :hinstellingenv
                WHERE id = 
                :id
                ");
            $stmt->bindParam(':hinstellingenv', $_POST['hinstellingenv']);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
        }
        if (isset($_POST['hinstellingenl'])) {
            $stmt = $dbh->prepare("
                UPDATE 
                users 
                SET allow_mimic = 
                :hinstellingenl
                WHERE id = 
                :id
                ");
            $stmt->bindParam(':hinstellingenl', $_POST['hinstellingenl']);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
        }
        if (isset($_POST['hinstellingeno'])) {
            $stmt = $dbh->prepare("
                UPDATE 
                users 
                SET hide_online = 
                :hinstellingeno
                WHERE id = 
                :id
                ");
            $stmt->bindParam(':hinstellingeno', $_POST['hinstellingeno']);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
        }
        if (isset($_POST['hotelsettings'])) {
            return Html::errorSucces($lang["Hchanges"]);
        }
    }
    Public static function editUsername()
    {
        global $lang, $dbh;
        if (isset($_POST['editusername'])) {
            if (!User::userData('fbenable') == 1) {
                if (!self::userTaken($_POST['username'])) {
                    if (self::validName($_POST['username'])) {
                        if (strlen($_POST['password']) >= 6) {
                            $password = self::hashed($_POST['password']);
                            $stmt     = $dbh->prepare("UPDATE users SET username = :username, fbenable = '1', password = :password WHERE id = :id");
                            $stmt->bindParam(':username', $_POST['username']);
                            $stmt->bindParam(':password', $password);
                            $stmt->bindParam(':id', $_SESSION['id']);
                            $stmt->execute();
                            header('Location: http://cdn.habbwine.com/yuup.php');
                        }
                        
                        
                        else {
                            return Html::error('Insira uma senha com 6 ou mais caracteres!');
                        }
                    } else {
                        return Html::error($lang["Cusernameshort"]);
                    }
                } else {
                    return html::error($lang["Cusernameused"]);
                }
            } else {
                return html::error($lang["Cchangeno"]);
            }
        }
    }
    
    
    Public static function senhafacebook()
    {
        global $lang, $dbh;
        if (isset($_POST['senhafacebook'])) {
            if (!self::userTaken($_POST['password'])) {
                if (self::validName($_POST['password'])) {
                    $password = self::hashed($_POST['password']);
                    $stmt     = $dbh->prepare("UPDATE users SET password = :password WHERE id = :id");
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':id', $_SESSION['id']);
                    $stmt->execute();
                    header('Location: http://cdn.habbwine.com/yuup.php');
                } else {
                    return Html::error($lang["Cusernameshort"]);
                }
            } else {
                return html::error($lang["Cusernameused"]);
            }
        }
    }
}
?>                                                                                                                                    