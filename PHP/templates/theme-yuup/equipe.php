
<?php 
include 'model-layout/header.php';
?>
<body>
    <?php include 'model-layout/menu.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 upper bold mb-0">
                <h2 class="c-roxo">
                    Fundadores
                </h2>

            </div>
            <?php
               
               $sql = $dbh->prepare("SELECT username,look,motto,online FROM users WHERE rank = 9 ORDER BY id ");
               $sql->execute();
               while ($equipe = $sql->fetch())
               {
               	?>
 <div class="col-12 col-md-4">
                <div class="user-info mt-1">
                    <span class="title">
                                FUNDADOR
                            </span>
                            <div class="lookavatar" style="background-image: url(http://yuup.online/api/head/<?php echo $equipe['username'] ?>);    background-position: -1px -11px;"></div>
                    <p>
                    <?php echo $equipe['username'] ?>
                        <br>
                        <small>
                        <?php echo $equipe['motto'] ?>
                            </small>
                    </p>
                </div>
                <div class="user-coins">
                    <?php if( $equipe['online'] == 1){
                        echo 'Está online agora';
                    }
                    else{
                        echo 'Entrou há 999 horas';
                    }
                    ?>
                </div>
            </div>
            <?php
               
               }
               ?>
           
                           


           

            <div class="col-12 mt-5 upper bold mb-0">
                <h2 class="c-roxo">
                    Gerentes
                </h2>

            </div>
            <?php
               
               $sql = $dbh->prepare("SELECT username,look,motto,online FROM users WHERE rank = 8 ORDER BY id ");
               $sql->execute();
               while ($equipe = $sql->fetch())
               {
               	?>
 <div class="col-12 col-md-4">
                <div class="user-info mt-1">
                    <span class="title">
                                GERENTE
                            </span>
                            <div class="lookavatar" style="background-image: url(http://yuup.online/api/head/<?php echo $equipe['username'] ?>);    background-position: -1px -11px;"></div>
                    <p>
                    <?php echo $equipe['username'] ?>
                        <br>
                        <small>
                        <?php echo $equipe['motto'] ?>
                            </small>
                    </p>
                </div>
                <div class="user-coins">
                    <?php if( $equipe['online'] == 1){
                        echo 'Está online agora';
                    }
                    else{
                        echo 'Entrou há 999 horas';
                    }
                    ?>
                </div>
            </div>
            <?php
               
               }
               ?>
            <div class="col-12 mt-5 upper bold mb-0">
                <h2 class="c-roxo">
                    ADMINISTRADORES
                </h2>

            </div>
            <?php
               
            $sql = $dbh->prepare("SELECT username,look,motto,online FROM users WHERE rank = 7 ORDER BY id ");
               $sql->execute();
               while ($equipe = $sql->fetch())
               {
               	?>
 <div class="col-12 col-md-4">
                <div class="user-info mt-1">
                    <span class="title">
                                ADMINISTRADORES
                            </span>
                            <div class="lookavatar" style="background-image: url(http://yuup.online/api/head/<?php echo $equipe['username'] ?>);    background-position: -1px -11px;"></div>
                    <p>
                    <?php echo $equipe['username'] ?>
                        <br>
                        <small>
                        <?php echo $equipe['motto'] ?>
                            </small>
                    </p>
                </div>
                <div class="user-coins">
                    <?php if( $equipe['online'] == 1){
                        echo 'Está online agora';
                    }
                    else{
                        echo 'Entrou há 999 horas';
                    }
                    ?>
                </div>
            </div>
            <?php
               
               }
               ?>
           
            <div class="col-12 mt-5 upper bold mb-0">
                <h2 class="c-roxo">
                    Moderadores
                </h2>

            </div>

            <?php
               
            $sql = $dbh->prepare("SELECT username,look,motto,online FROM users WHERE rank = 6 ORDER BY id ");
               $sql->execute();
               while ($equipe = $sql->fetch())
               {
               	?>
 <div class="col-12 col-md-4">
                <div class="user-info mt-1">
                    <span class="title">
                                MODERADORES
                            </span>
                            <div class="lookavatar" style="background-image: url(http://yuup.online/api/head/<?php echo $equipe['username'] ?>);    background-position: -1px -11px;"></div>
                    <p>
                    <?php echo $equipe['username'] ?>
                        <br>
                        <small>
                        <?php echo $equipe['motto'] ?>
                            </small>
                    </p>
                </div>
                <div class="user-coins">
                    <?php if( $equipe['online'] == 1){
                        echo 'Está online agora';
                    }
                    else{
                        echo 'Entrou há 999 horas';
                    }
                    ?>
                </div>
            </div>
            <?php
               
               }
               ?>
           
        </div>
    </div>


    <?php include 'model-layout/footer.php'; ?>
</body>

</html>