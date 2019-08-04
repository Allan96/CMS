<?php
if (!defined('BRAIN_CMS')) {
    die('Sorry but you cannot access this file!');
}

/* 
    Outros.
    ---------------
    userDataHome();
    diasatras();
    quartos();
    
*/

class Outros
{

    public static function countcomentarios($key)
    {
        global $dbh;

        $sql4 = $dbh->prepare("SELECT * FROM atualiza_coments WHERE news=:name");
        $sql4->bindParam(':name', $key);
        $sql4->execute();
        return $sql4->RowCount();
    }

    public static function comentar()
    {
        global $dbh;
        if (isset($_POST['comentar'])) {
            $atualiza = $dbh->prepare("
				INSERT INTO atualiza_coments(user,comentario,horario,news) 
				VALUES (:user, :comentario, '" . time() . "', :news)");
            $atualiza->bindParam(':user', $_POST['user']);
            $atualiza->bindParam(':comentario', $_POST['comentario1']);
            $atualiza->bindParam(':news', $_POST['news1']);
            $atualiza->execute();
            echo '<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  Você acabou de comentar em uma atualização!
</div>';
        }
    }


    public static function countlike($key, $like)
    {
        global $dbh;

        $sql4 = $dbh->prepare("SELECT news FROM atualiza_like WHERE news=:name AND likeoudeslike=:like");
        $sql4->bindParam(':name', $key);
        $sql4->bindParam(':like', $like);
        $sql4->execute();
        return $sql4->RowCount();
    }

    public static function countlikenews($key, $like)
    {
        global $dbh;

        $sql4 = $dbh->prepare("SELECT id FROM news_like WHERE news=:name AND likeoudeslike=:like");
        $sql4->bindParam(':name', $key);
        $sql4->bindParam(':like', $like);
        $sql4->execute();
        return $sql4->RowCount();
    }


    public static function settings($key, $id)
    {
        global $dbh;
        $sql4 = $dbh->prepare("SELECT $key FROM users WHERE id=:name");
        $sql4->bindParam(':name', $id);
        $sql4->execute();
        $row = $sql4->fetch();
        if ($row[$key] == '0') {
            echo 'SIM';
        } else {
            echo 'NÃO';
        }

    }


    public static function settings1($key, $id)
    {
        global $dbh;
        $sql4 = $dbh->prepare("SELECT $key FROM users WHERE id=:name");
        $sql4->bindParam(':name', $id);
        $sql4->execute();
        $row = $sql4->fetch();
        if ($row[$key] == '0') {
            return true;
        } else {
            return false;
        }

    }

    public static function countlikecom($key, $like)
    {
        global $dbh;

        $sql4 = $dbh->prepare("SELECT * FROM atualiza_coments_like WHERE news=:name AND likecomen=:like");
        $sql4->bindParam(':name', $key);
        $sql4->bindParam(':like', $like);
        $sql4->execute();
        return $sql4->RowCount();
    }

    public static function formdesa($key)
    {
        global $dbh;
        $stmt = $dbh->prepare("UPDATE cms_news SET form='0' WHERE  id=:id;");
        $stmt->bindParam(':id', $key);
        $stmt->execute();
    }

    public static function Embaixador()
    {
        global $dbh;
        if (isset($_POST['embaixador'])) {

            if (empty($_POST['cargo']) || empty($_POST['nome'])) {
                echo 'Ops parece que tem algum campo sem ser preenchido.';
            } else {

                $stmt = $dbh->prepare("UPDATE users SET rank=:cargo WHERE  username=:nome;");
                $stmt->bindParam(':nome', $_POST['nome']);
                $stmt->bindParam(':cargo', $_POST['cargo']);
                $stmt->execute();
                echo 'Pronto';
            }
        }
    }

    public static function formulario($key)
    {
        global $dbh;
        if (isset($_POST['envio'])) {
            $veri = $dbh->prepare("SELECT id FROM cms_news WHERE id=:id LIMIT 1");
            $veri->bindParam(':id', $key);
            $veri->execute();
            if ($veri->RowCount() == 0) {
                Admin::error("Esta notícia não existe!");
            } else {
                $veri = $dbh->prepare("SELECT Id FROM cms_resul WHERE enviado='" . User::userdata('username') . "' AND noticia=:id LIMIT 4");
                $veri->bindParam(':id', $key);
                $veri->execute();
                if ($veri->RowCount() >= 3) {
                    Admin::error("Você não pode enviar mais resultados pois já enviou 2!");
                } else {
                    if (empty($_POST['resultado'])) {
                        Admin::error("O campo de 'resultado' não pode ser vazio!");
                    }
                    if (empty($_POST['participantes'])) {
                        Admin::error("Preencha os participantes para enviar!");
                    } else {
                        $inserir = $dbh->prepare("INSERT INTO cms_resul (usuario,noticia,resultado,enviado) VALUES ('" . $_POST['participantes'] . "', :id,'" . $_POST['resultado'] . "', '" . User::userdata('username') . "')  ");
                        $inserir->bindParam(':id', $key);
                        $inserir->execute();
                        Admin::gelukt("Resultado enviado com sucesso!");
                    }
                }
            }
        }
    }

    public static function likecomentario()
    {
        global $dbh;
        if (isset($_POST['comelike'])) {
            $sql = $dbh->prepare("INSERT INTO `atualiza_coments_like` (`user`, `news`, `likecomen`) VALUES (:id, :news, :like)");
            $sql->bindParam(':like', $_POST['comelike']);
            $sql->bindParam(':news', $_POST['comenews']);
            $sql->bindParam(':id', $_SESSION['id']);
            $sql->execute();
            if ($_POST['comelike'] == 'like') {
                html::errorn("Sua curtida foi registrada e parece que você gostou desse comentário!");
            } else {
                html::errorn("Sua curtida foi registrada e parece que você  não gostou desse comentário!");
            }
        }
    }

    public static function likeatu()
    {
        global $dbh;
        if (isset($_POST['like'])) {
            $sql = $dbh->prepare("INSERT INTO `atualiza_like` (`user`, `news`, `likeoudeslike`) VALUES (:id, :news, :like)");
            $sql->bindParam(':like', $_POST['like']);
            $sql->bindParam(':news', $_POST['news']);
            $sql->bindParam(':id', $_SESSION['id']);
            $sql->execute();
            if ($_POST['like'] == 'like') {
                html::errorn("Sua curtida foi registrada e parece que você gostou dessa atualização! Que bom =)");
            } else {
                html::errorn("Sua curtida foi registrada e parece que você não gostou dessa atualização! ;(");
            }
        }
    }

    public static function deletecomen()
    {
        global $dbh;
        if (isset($_POST['deletecomen'])) {
            $sql = $dbh->prepare("DELETE FROM atualiza_coments WHERE id=:news;");
            $sql->bindParam(':news', $_POST['comenews']);
            $sql->execute();
            echo '<div class="alert alert-dismissible alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Comentário apagado com sucesso!</div>';
        }
    }

    public static function verificacomentario($key)
    {
        global $dbh;
        $sql8 = $dbh->prepare("SELECT * FROM atualiza_coments WHERE news = :key");
        $sql8->bindParam(':key', $key);
        $sql8->execute();
        if ($sql8->RowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function vercompras($key)
    {
        global $dbh;
        $sql8 = $dbh->prepare("SELECT * FROM compras WHERE pack = :key AND user = :usa");
        $sql8->bindParam(':key', $key);
        $sql8->bindParam(':usa', $_SESSION['id']);
        $sql8->execute();
        $count = $sql8->RowCount();
        return $count;
    }


    public static function verificanews($key, $user)
    {
        global $dbh;
        $sql8 = $dbh->prepare("SELECT * FROM news_like WHERE news=:name and user=:user");
        $sql8->bindParam(':name', $key);
        $sql8->bindParam(':user', $user);
        $sql8->execute();
        if ($sql8->RowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function votoverificacomen()
    {
        global $dbh;
        if (isset($_POST['comelike'])) {
            $sqlcom = $dbh->prepare("SELECT * FROM atualiza_coments_like WHERE news=:name AND user='" . User::userdata('id') . "'");
            $sqlcom->bindParam(':name', $_POST['comenews']);
            $sqlcom->execute();
            if ($sqlcom->RowCount() >= 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function votoverificaatu()
    {
        global $dbh;
        $sqlatu = $dbh->prepare("SELECT * FROM atualiza_like WHERE user=:id AND news =:news LIMIT 1");
        $sqlatu->bindParam(':news', $_POST['news']);
        $sqlatu->bindParam(':id', $_SESSION['id']);
        $sqlatu->execute();
        if ($sqlatu->RowCount() >= 1) {
            return true;
        } else {
            return false;
        }
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

    public static function diasatras($key)
    {
        global $dbh, $config;

        $now = strtotime(date('m/d/Y H:i:s'));
        $time = strtotime(gmdate("m/d/Y H:i:s", $key));
        $diff = $now - $time;

        $seconds = $diff;
        $minutes = round($diff / 60);
        $hours = round($diff / 3600);
        $days = round($diff / 86400);
        $weeks = round($diff / 604800);
        $months = round($diff / 2419200);
        $years = round($diff / 29030400);

        if ($seconds <= 60) return "1 min atrás";
        else if ($minutes <= 60) return $minutes == 1 ? '1 min atrás' : $minutes . ' min atrás';
        else if ($hours <= 24) return $hours == 1 ? '1 hrs atrás' : $hours . ' hrs atrás';
        else if ($days <= 7) return $days == 1 ? '1 dia atras' : $days . ' dias atrás';
        else if ($weeks <= 4) return $weeks == 1 ? '1 semana atrás' : $weeks . ' semanas atrás';
        else if ($months <= 12) return $months == 1 ? '1 mês atrás' : $months . ' meses atrás';
        else return $years == 1 ? 'um ano atrás' : $years . ' anos atrás';

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

    public static function addtexto()
    {
        global $dbh;
        if (isset($_POST['postar'])) {
            $upper = implode('', range('A', 'Z')); // ABCDEFGHIJKLMNOPQRSTUVWXYZ
            $lower = implode('', range('a', 'z')); // abcdefghijklmnopqrstuvwxyzy
            $nums = implode('', range(0, 9)); // 0123456789

            $alphaNumeric = $upper . $lower . $nums; // ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789
            $string = '';
            $len = 10; // numero de chars
            for ($i = 0; $i < $len; $i++) {
                $string .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
            }
            $post = $dbh->prepare("INSERT INTO texto (username,texto,link) VALUES ('" . User::userdata('username') . "', '" . $_POST['texto'] . "', '" . $string . "')");
            $post->execute();
            echo '					<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>O Link do seu texto é:<a href="http://yuup.online/texto/' . $string . '" target="_blank"> http://yuup.online/texto/' . $string . '</a></div>';
        }
    }

    public static function atualizarxml1()
    {
        global $dbh;
        $xml = '<?xml version="1.0" encoding="UTF-8" ?>';     // PRECISO SALVAR  O CONTEUDO DO VERSION EM ASPAS DUPLAS E DO ENCONDING TAMBÉM prono REAAAAL BOA
        $data = time();
        $data2 = $data + 10;
        $data3 = $data + 20;

        $xml .= "<info> \n";


        $select1 = $dbh->prepare("SELECT credits,username,look,id FROM users  WHERE rank <= 3 ORDER BY credits DESC LIMIT 10");
        $select1->execute();
        while ($vari1 = $select1->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<hallmoeda>\n";
            $xml .= "\t\t<id>" . filter("$vari1->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari1->username") . "</username>\n";
            $xml .= "\t\t<credits>" . filter("$vari1->credits") . "</credits>\n";
            $xml .= "\t\t<look>" . filter("$vari1->look") . "</look>\n";
            $xml .= "\t</hallmoeda>\n";
        }
        $select2 = $dbh->prepare("SELECT credits,username,look,id,vip_points FROM users WHERE rank <= 3 ORDER BY vip_points DESC LIMIT 10");
        $select2->execute();
        while ($vari2 = $select2->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<halldima>\n";
            $xml .= "\t\t<id>" . filter("$vari2->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari2->username<") . "/username>\n";
            $xml .= "\t\t<vippoints>" . filter("$vari2->vip_points") . "</vippoints>\n";
            $xml .= "\t\t<look>" . filter("$vari2->look") . "</look>\n";
            $xml .= "\t</halldima>\n";
        }
        $select3 = $dbh->prepare("SELECT credits,username,look,id,gotw_points FROM users WHERE rank <= 3 ORDER BY gotw_points DESC LIMIT 10");
        $select3->execute();
        while ($vari3 = $select3->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<hallgotw>\n";
            $xml .= "\t\t<id>" . filter("$vari3->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari3->username") . "</username>\n";
            $xml .= "\t\t<gotw>" . filter("$vari3->gotw_points") . "</gotw>\n";
            $xml .= "\t\t<look>" . filter("$vari3->look") . "</look>\n";
            $xml .= "\t</hallgotw>\n";
        }
        $select4 = $dbh->prepare("SELECT credits,username,look,id,peventos FROM users ORDER BY peventos DESC LIMIT 10");
        $select4->execute();
        while ($vari4 = $select4->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<hallevento>\n";
            $xml .= "\t\t<id>" . filter("$vari4->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari4->username") . "</username>\n";
            $xml .= "\t\t<pontos>" . filter("$vari4->peventos") . "</pontos>\n";
            $xml .= "\t\t<look>" . filter("$vari4->look") . "</look>\n";
            $xml .= "\t</hallevento>\n";
        }
        $select5 = $dbh->prepare("SELECT credits,username,look,id,ppromos FROM users ORDER BY ppromos DESC LIMIT 10");
        $select5->execute();
        while ($vari5 = $select5->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<hallpromo>\n";
            $xml .= "\t\t<id>" . filter("$vari5->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari5->username") . "</username>\n";
            $xml .= "\t\t<pontos>" . filter("$vari5->ppromos") . "</pontos>\n";
            $xml .= "\t\t<look>" . filter("$vari5->look") . "</look>\n";
            $xml .= "\t</hallpromo>\n";
        }
        $select6 = $dbh->prepare("SELECT credits,username,look,id,staff_ocult FROM users WHERE rank='6' ORDER BY staff_ocult DESC LIMIT 10");
        $select6->execute();
        while ($vari6 = $select6->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<hallmod>\n";
            $xml .= "\t\t<id>" . filter("$vari6->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari6->username") . "</username>\n";
            $xml .= "\t\t<pontos>" . filter("$vari6->staff_ocult") . "</pontos>\n";
            $xml .= "\t\t<look>" . filter("$vari6->look") . "</look>\n";
            $xml .= "\t</hallmod>\n";
        }
        $select7 = $dbh->prepare("SELECT credits,username,look,id,staff_ocult FROM users WHERE rank='3' ORDER BY staff_ocult DESC LIMIT 10");
        $select7->execute();
        while ($vari7 = $select7->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<hallemb>\n";
            $xml .= "\t\t<id>" . filter("$vari7->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari7->username") . "</username>\n";
            $xml .= "\t\t<pontos>" . filter("$vari7->staff_ocult") . "</pontos>\n";
            $xml .= "\t\t<look>" . filter("$vari7->look") . "</look>\n";
            $xml .= "\t</hallemb>\n";
        }
        $select8 = $dbh->prepare("SELECT points_e,username,look from users WHERE rank < 6 ORDER BY `points_e` DESC LIMIT 10");
        $select8->execute();
        while ($vari8 = $select8->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<hallpicole>\n";
            $xml .= "\t\t<id>" . filter("$vari8->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari8->username") . "</username>\n";
            $xml .= "\t\t<picoles>" . filter("$vari8->points_e") . "</picoles>\n";
            $xml .= "\t\t<look>" . filter("$vari8->look") . "</look>\n";
            $xml .= "\t</hallpicole>\n";
        }

        $xml .= "<tempos><tempo1>$data</tempo1>\n<tempo2>$data2</tempo2>\n<tempo3>$data3</tempo3>\n</tempos>";


        $xml .= "</info>\n";


        $ponteiro = fopen('C:\inetpub\HOTEIS\BETA\xml\teste3.xml', 'w'); //cria um arquivo com o nome backup.xml
        fwrite($ponteiro, $xml); // salva conteúdo da variável $xml dentro do arquivo backup.xml

        $ponteiro = fclose($ponteiro); //fecha o arquivo

    }

    public static function atualizarxml2()
    {
        global $dbh;
        $xml = '<?xml version="1.0" encoding="UTF-8" ?>';     // PRECISO SALVAR  O CONTEUDO DO VERSION EM ASPAS DUPLAS E DO ENCONDING TAMBÉM prono REAAAAL BOA
        $data = time();

        $xml .= "<info> \n";


        $select1 = $dbh->prepare("SELECT vip_dias,username,look,id,online FROM users WHERE rank=2 ORDER BY vip_dias DESC LIMIT 10");
        $select1->execute();
        while ($vari1 = $select1->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<vip>\n";
            $xml .= "\t\t<id>" . filter("$vari1->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari1->username") . "</username>\n";
            $xml .= "\t\t<online>" . filter("$vari1->online") . "</online>\n";
            $xml .= "\t\t<look>" . filter("$vari1->look") . "</look>\n";
            $xml .= "\t\t<vip_dias>" . filter("$vari1->vip_dias") . "</vip_dias>\n";
            $xml .= "\t</vip>\n";
        }
        $select8 = $dbh->prepare("SELECT username,look,id,rank,online,real_name,motto FROM users WHERE rank >='3' OR real_name >='2' ORDER BY rank DESC LIMIT 1000");
        $select8->execute();
        while ($vari8 = $select8->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<equipe>\n";
            $xml .= "\t\t<id>" . filter("$vari8->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari8->username") . "</username>\n";
            $xml .= "\t\t<rank>" . filter("$vari8->rank") . "</rank>\n";
            $xml .= "\t\t<look>" . filter("$vari8->look") . "</look>\n";
            $xml .= "\t\t<online>" . filter("$vari8->online") . "</online>\n";
            $xml .= "\t\t<real_name>" . filter("$vari8->real_name") . "</real_name>\n";
            $xml .= "\t\t<motto>" . filter("$vari8->motto") . "</motto>\n";
            $xml .= "\t</equipe>\n";
        }
        $select9 = $dbh->prepare("SELECT username,look,id,rank,online,real_name,motto FROM users WHERE rank = '3'OR real_name > '90' ORDER BY rank DESC LIMIT 1000");
        $select9->execute();
        while ($vari9 = $select9->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<emb>\n";
            $xml .= "\t\t<id>" . filter("$vari9->id") . "</id>\n";
            $xml .= "\t\t<username>" . filter("$vari9->username") . "</username>\n";
            $xml .= "\t\t<rank>" . filter("$vari9->rank") . "</rank>\n";
            $xml .= "\t\t<look>" . filter("$vari9->look") . "</look>\n";
            $xml .= "\t\t<online>" . filter("$vari9->online") . "</online>\n";
            $xml .= "\t\t<real_name>" . filter("$vari9->real_name") . "</real_name>\n";
            $xml .= "\t\t<motto>" . filter("$vari9->motto") . "</motto>\n";
            $xml .= "\t</emb>\n";
        }		
			
        $xml .= "<adicionais><tempo>$data</tempo>\n</adicionais>";


        $xml .= "</info>\n";


        $ponteiro = fopen('C:\inetpub\HOTEIS\BETA\xml\teste5.xml', 'w'); //cria um arquivo com o nome backup.xml
        fwrite($ponteiro, $xml); // salva conteúdo da variável $xml dentro do arquivo backup.xml

        $ponteiro = fclose($ponteiro); //fecha o arquivo
    }


    public static function atualizarxml3()
    {
        global $dbh;
        $xml = '<?xml version="1.0" encoding="UTF-8" ?>';     // PRECISO SALVAR  O CONTEUDO DO VERSION EM ASPAS DUPLAS E DO ENCONDING TAMBÉM prono REAAAAL BOA
        $data = time();


        $xml .= "<info> \n";


        $select1 = $dbh->prepare("SELECT item_name,id,tipo FROM furniture WHERE tipo IN('SS','S') ORDER BY tipo DESC");
        $select1->execute();
        while ($vari1 = $select1->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<raross>\n";
            $xml .= "\t\t<id>$vari1->id</id>\n";
            $xml .= "\t\t<item_name>$vari1->item_name</item_name>\n";
            $xml .= "\t\t<tipo>$vari1->tipo</tipo>\n";
            $xml .= "\t</raross>\n";
        }
        $select2 = $dbh->prepare("SELECT item_name,id,tipo FROM furniture WHERE tipo IN('A','B','C','D') ORDER BY tipo ASC");
        $select2->execute();
        while ($vari2 = $select2->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<raros>\n";
            $xml .= "\t\t<id>$vari2->id</id>\n";
            $xml .= "\t\t<item_name>$vari2->item_name</item_name>\n";
            $xml .= "\t\t<tipo>$vari2->tipo</tipo>\n";
            $xml .= "\t</raros>\n";
        }

        $xml .= "<adicionais><tempo>$data</tempo>\n</adicionais>";


        $xml .= "</info>\n";


        $ponteiro = fopen('C:\inetpub\HOTEIS\BETA\xml\raros.xml', 'w'); //cria um arquivo com o nome backup.xml
        fwrite($ponteiro, $xml); // salva conteúdo da variável $xml dentro do arquivo backup.xml

        $ponteiro = fclose($ponteiro); //fecha o arquivo
    }


    public static function atualizarxml4()
    {
        global $dbh;
        $xml = '<?xml version="1.0" encoding="UTF-8" ?>';     // PRECISO SALVAR  O CONTEUDO DO VERSION EM ASPAS DUPLAS E DO ENCONDING TAMBÉM prono REAAAAL BOA
        $data = time();


        $xml .= "<info> \n";


        $select1 = $dbh->prepare("SELECT a.group_id,b.name,b.owner_id,b.room_id,b.badge,c.username, COUNT(a.group_id) as resultado  FROM group_memberships A INNER JOIN groups B ON a.group_id=b.id JOIN users C ON c.id=b.owner_id GROUP BY group_id ORDER BY resultado DESC LIMIT 10;");
        $select1->execute();
        while ($vari1 = $select1->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<topmembros>\n";
            $xml .= "\t\t<group_id>$vari1->group_id</group_id>\n";
            $xml .= "\t\t<name>$vari1->name</name>\n";
            $xml .= "\t\t<owner_id>$vari1->owner_id</owner_id>\n";
            $xml .= "\t\t<room_id>$vari1->room_id</room_id>\n";
            $xml .= "\t\t<badge>$vari1->badge</badge>\n";
            $xml .= "\t\t<resultado>$vari1->resultado</resultado>\n";
            $xml .= "\t\t<username>$vari1->username</username>\n";
            $xml .= "\t</topmembros>\n";
        }
        $select2 = $dbh->prepare("SELECT a.caption,a.score,a.id,b.username FROM rooms A INNER JOIN users B ON a.owner=b.id ORDER BY a.score DESC LIMIT 10;");
        $select2->execute();
        while ($vari2 = $select2->fetch(PDO::FETCH_LAZY)) {
            $xml .= "\t<topcurtidas>\n";
            $xml .= "\t\t<caption>$vari2->caption</caption>\n";
            $xml .= "\t\t<score>$vari2->score</score>\n";
            $xml .= "\t\t<id>$vari2->id</id>\n";
            $xml .= "\t\t<username>$vari2->username</username>\n";
            $xml .= "\t</topcurtidas>\n";
        }


        $xml .= "<adicionais><tempo>$data</tempo>\n</adicionais>";


        $xml .= "</info>\n";


        $ponteiro = fopen('C:\inetpub\HOTEIS\BETA\xml\topquartos.xml', 'w'); //cria um arquivo com o nome backup.xml
        fwrite($ponteiro, $xml); // salva conteúdo da variável $xml dentro do arquivo backup.xml

        $ponteiro = fclose($ponteiro); //fecha o arquivo
    }


	public static function compbolao()
	{
		global $dbh;
		if(isset($_POST['comprar']))
		{
			$preco=500;
			if(outros::statusbolao('online') == 1)
			{
				if(User::userdata('vip_points') > 500)
				{
					if (User::userdata('online') == 0)
					{
						$compra=$dbh->prepare("INSERT INTO bolao (usuario) VALUES (:id)");
						$compra->Bindvalue(':id', User::userdata('id'));
						$compra->execute();					
						$acumular=$dbh->prepare("UPDATE bolaoconfig SET valoracu = valoracu + :preco ");
						$acumular->Bindvalue(':preco', $preco*0.35);
						$acumular->execute();					
						$desconto=$dbh->prepare("UPDATE users SET vip_points = vip_points-:preco WHERE Id = :id ");
						$desconto->Bindvalue(':preco', $preco);
						$desconto->Bindvalue(':id', User::userdata('id'));
						$desconto->execute();
						echo 'Comprado com sucesso';
					}
					else
					{
						echo 'Saia do Hotel';
					}
				}
				else 
				{
					echo 'Diamantes insuficientes';
				}
			}
			else
			{
				echo 'Bolão Offline';
			}
		}
	}
	
	public static function statusbolao($key)
	{
		global $dbh;
		$ver=$dbh->prepare("SELECT $key FROM bolaoconfig");
		$ver->execute();
		$resul=$ver->fetch();
		return filter($resul["$key"]);
	}
		
	
	
}

?>																																	