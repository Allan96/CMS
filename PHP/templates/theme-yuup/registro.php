<?php include 'model-layout/header.php'; 

	if(isset($_GET['userref'])){
		$userref = $_GET['userref'];
		$name = $dbh->prepare("SELECT username,id from users WHERE username='$userref'");
		$name->execute();
		$getUserRef = $name->fetch();
		$idref=$getUserRef['id'];
		$user_ip = User::getUserIP();
	}
	else
	{
		$userref = '';
		$idref='127.0.0.1';
		$user_ip = '127.0.0.1';
	}
?>

<body>
<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
    <section id="registro">
        <nav class="navbar navbar-expand-sm navbar-light bg-index">
            <div class="container">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                                MENU
                            </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="./">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Registrar-se</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Recuperar minha senha</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row areaderegistro d-flex align-content-center justify-content-center justify-content-lg-end">
                <div class="col-11 col-sm-4 col-lg-7 align-self-center registro-text">
                    <h1 class="c-white efeito-escrita">
                        Crie seu Yuup Hoje.
                    </h1>
                    <h3 class="c-white">
                        Você pode fazer novos amigos, <br> dar um passeio com eles nos quartos <br>em clubes, praias ou jogos.
                    </h3>
                </div>
                <div class="col-11 col-sm-8 col-lg-5 registro animated fadeInLeft">
                    <div class="frank">
                        <div class="avatar"></div>
                        <p class="mt-1">
                            Hey, Usuário,
                            <br>
                            <small>Estamos felizes em ve-lo novamente.</small>
                        </p>

                    </div>
                    <?php //User::UserExiste(); ?>
                    <form id="registroAjax" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="username" placeholder="Nome" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" id="" class="form-control" placeholder="Endereço de e-mail" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" id="" class="form-control" placeholder="Senha" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <input type="text" name="password_repeat" id="" class="form-control" placeholder="Repita sua senha" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <select required="required" class="form-control" id="exampleSelect1" data-msg-required="Por favor escolha uma opção" name="habbo-avatar" style="height: 34px;">
			                    <option value="hr-105-1035.hd-180-1.ch-215-92.lg-275-94.sh-295-1408">Sou um menino</option>
			                    <option value="hr-515-33.hd-600-1.ch-635-70.lg-716-66-62.sh-735-68">Sou uma menina</option>
                        
                            </select>

                            <div class="g-recaptcha" data-sitekey="6LdpN18UAAAAAH5jVDyRI7rfRg7gEOhgIGG479VJ" style="margin-top: 6px;"></div>
                        </div>
                        <input type="text" class="form-control" style="height: 0;border: 0;width: 0;padding: 0;" name="referrer" value="<?=$userref?>">
                        <input type="text" class="form-control" style="height: 0;border: 0;width: 0;padding: 0;" name="ip" value="<?=$user_ip?>">
                        <input type="text" class="form-control" style="height: 0;border: 0;width: 0;padding: 0;" name="nameref" value="<?=$idref?>">
                        <input type="text" class="form-control" name="motto" id="motto" style="padding: 0;height: 0;border: 0;width: 0;" value="I <3 <?= $config['hotelName'] ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-0"><button type="submit" name="register" class="btn btn-primary w-100 bgc-green bdc-green">Criar meu avatar</button></div>
                            </div>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script src="../templates/theme-yuup/assets/js/registroAjax.js?55000"></script>
</body>

</html>