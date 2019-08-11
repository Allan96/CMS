<?php
if(isset($_POST['LoginAjax'])){
    User::login();
}
else if(isset($_POST['ValidaUser'])){
    User::UserExiste();
}
else{
    echo 'Ops';
}

?>