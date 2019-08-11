<?php include 'model-layout/header.php'; ?>

<body>
    <?php include 'model-layout/menu.php'; ?>


    <div class="container">
        <div class="row mt-3">
            <div class="col-12 col-sm-3 order-2 order-sm-1  mt-3 mt-sm-0">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Minhas configurações

                    </li>

                </ul>
            </div>
            <div class="col-12 col-sm-9 order-1 order-sm-2">
                <div class="boxnews">
                    <div class="data">
                        Ajustes
                    </div>
                    <h2 class="c-roxo mb-3">
                        Mudar senha
                    </h2>
                    <hr>
                    <?php User::editPassword(); ?>
                    <form method="POST">
                        <b>Digite sua senha atual:</b>
                        <input name="oldpassword" type="password" placeholder="Insira sua senha antiga" class="form-control">
                        <small>Digite sua senha antiga</small>
                        <br><br>

                        <b>Digite sua nova senha:</b>
                        <input name="newpassword" type="password" placeholder="Insira sua nova senha" class="form-control">
                        <small>Escolha uma senha forte, certifique-se que ninguém aqui pode descobrir a sua senha</small>
                        <br><br>
                        <button class="btn btn-primary bgc-roxo bdc-roxo w-100" type="submit" name="password"> Entrar </button>
                    </form>

                    <hr>


                </div>

            </div>


        </div>
    </div>
    </div>


    <?php include 'model-layout/footer.php'; ?>
</body>

</html>