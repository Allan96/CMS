
<?php include 'model-layout/header.php'; ?>
<body>
    <?php include 'model-layout/menu.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 upper bold mb-0">
                <h2 class="c-roxo">
                    Embaixadores
                </h2>

            </div>
            <?php
               
               $sql = $dbh->prepare("SELECT username,look,motto,online FROM users WHERE real_name = 102 ORDER BY id ");
                  $sql->execute();
                  while ($equipe = $sql->fetch())
                  {
                      ?>
    <div class="col-12 col-md-4">
                   <div class="user-info mt-1">
                       <span class="title">
                       Embaixadores
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
                    Guardiões
                </h2>

            </div>
            <?php
               
               $sql = $dbh->prepare("SELECT username,look,motto,online FROM users WHERE real_name = 101 ORDER BY id ");
                  $sql->execute();
                  while ($equipe = $sql->fetch())
                  {
                      ?>
    <div class="col-12 col-md-4">
                   <div class="user-info mt-1">
                       <span class="title">
                       Guardiões
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
                Ajudantes
                </h2>

            </div>
            <?php
               
               $sql = $dbh->prepare("SELECT username,look,motto,online FROM users WHERE real_name = 100 ORDER BY id ");
                  $sql->execute();
                  while ($equipe = $sql->fetch())
                  {
                      ?>
    <div class="col-12 col-md-4">
                   <div class="user-info mt-1">
                       <span class="title">
                       Ajudantes
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
                Construtores
                </h2>

            </div>
            <?php
               
               $sql = $dbh->prepare("SELECT username,look,motto,online FROM users WHERE real_name = 2 ORDER BY id ");
                  $sql->execute();
                  while ($equipe = $sql->fetch())
                  {
                      ?>
    <div class="col-12 col-md-4">
                   <div class="user-info mt-1">
                       <span class="title">
                       Construtores
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
                Designer
                </h2>

            </div>
            <?php
               
               $sql = $dbh->prepare("SELECT username,look,motto,online FROM users WHERE real_name = 104 ORDER BY id ");
                  $sql->execute();
                  while ($equipe = $sql->fetch())
                  {
                      ?>
    <div class="col-12 col-md-4">
                   <div class="user-info mt-1">
                       <span class="title">
                       Designer
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