
<?php include 'model-layout/header.php'; ?>
<body>
    <?php include 'model-layout/menu.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="user-info">
                <a href="../ajustes"> <img src="../templates/theme-yuup/assets/images/settings.svg" width="16" alt="" srcset=""></a>
                    <div class="lookavatar" style="background-image: url(http://yuup.online/api/head/<?= User::userData('username') ?>);    background-position: -1px -4px;"></div>
                    <p>
                    <?= User::userData('username') ?>
                        <br>
                        <small>
                        <?= User::userData('motto') ?>
                        </small>
                    </p>
                </div>
                <div class="user-coins">
                <?= round(User::userData('credits')/1000) ?>M moedas | <?= User::userData('vip_points') ?> diamantes | <?= User::userData('gotw_points') ?> sorvetinhos
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="loteria-info">
                    <span class="title">
                        LOTERIA
                    </span>
                    <div class="raro">
                        <div class="time">
                            5 dias
                        </div>
                    </div>
                    <p>
                        <span class="bold">
                              Como funciona?
                        </span>

                        <br> Você compra seu ticket contendo 2 números aleatórios. Quanto mais tickets comprar, maiores são as suas chances de GANHAR.
                        <br>
                        <a class="d-none d-md-block" href="#"> Ir para a loteria <img src="../templates/theme-yuup/assets/images/arrow-right.svg" width="10" alt=""></a>
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="leilao-info">
                    <span class="title">LEILÃO DE RAROS</span>
                    <div class="container">
                        <div class="row">
                            <div class="raro d-none d-md-block">
                                <div class="time">
                                    5 dias
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <p class="c-white">
                                    <span class="bold">
                                                Como funciona?
                                          </span>
                                    <br> Lance é o valor que você está disposto a pagar pelo raro que está sendo leiloado. A pessoa que faz o maior lance é quem fica com o raro. Existe também uma oferta inicial, que é estipulada pela nossa equipe.
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group c-white">
                                    <label for="">Dar meu lance ( Você tem 987 diamantes )</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Insira o valor que você está disposto a pagar pelo raro leiloado</small>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-12">
                <div id="noticias">
                <?php
               
               $sql = $dbh->prepare("SELECT id,title,image,shortstory,longstory,author FROM cms_news ORDER BY id DESC LIMIT 20");
               $sql->execute();
               while ($news = $sql->fetch())
               {
               	echo'
                   <a class="noticias-items"  href="./news/'.filter($news["id"]).'"  style="background-image:linear-gradient(rgba(89, 61, 129, .4), rgba(89, 61, 129, .4)), url('.filter($news["image"]).');background-position: center;background-size: cover;">
                   <div class="autor-noticia"  style="background-image: url(http://yuup.online/api/head/'.$news['author'].');background-position: 0 -5px;height: 62px;width: 62px;"></div>
                   <div class="data">Hoje</div>
                   <div class="titulo-noticia">'.filter($news["title"]).'</div>
               </a>
               ';
               
               }
               ?>

                

                </div>
            </div>
            <div class="col-12">
                <div class="bolao-info">
                    <span class="title d-block d-md-none">BOLÃO</span>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <p class="c-black">
                                    <span class="bold">
                                                    Como funciona?
                                              </span>
                                    <br> Quando você clicar no botão "participar", será debitado do seu saldo o valor de 500 diamantes. Logo após será adicionado no valor do bolão um total 175 diamantes. No final do tempo estipulado será feito um sorteio
                                    e o usuário sorteado levará pra casa o valor de total do bolão. Isso mesmo, Todo o bolão será do vencedor.
                                </p>
                            </div>
                            <div class="col-8 col-md-3">
                                <div class="form-group c-white">
                                    <label for="">Último vencedor: <span class="bold">Usuário</span> </label>
                                    <br>
                                    <button type="button" class="btn btn-primary bgc-roxo bdc-roxo w-100">Participar</button>
                                    <br>
                                    <small id="helpId" class="text-muted">Vicê jogou um total de <span class="bold">5</span> vezes no bolão!</small>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="raro">
                                    <p>
                                        14K <br>
                                        <small>
                                        diamantes
                                    </small>
                                    </p>

                                    <div class="time">
                                        5 dias
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
            <div class="container">
                <div id="hallmore" class="row">
                <div class="col-3 d-none d-md-block">
                        <div class="users-list">
                <?php
                    foreach (Admin::hall('credits') as $resultado1)
                     {
                ?>
                    
                          
                        <div class="list-item">
                                <div class="tag">Moedas</div>
                                <div class="list-avatar"></div>
                                <p class="c-black">
                                <?=$resultado1['username'] ?> <br>
                                    <small><?=$resultado1['credits'] ?> moedas</small>
                                </p>
                            </div>    
                <?php
                    }
                ?> </div>
                </div>
                    <div class="col-3 d-none d-md-block">
                        <div class="users-list">
                        <?php
                        foreach (Admin::hall('vip_points') as $resultado2)
                        {
                        ?>
                            <div class="list-item">
                                <div class="tag">Diamantes</div>
                                <div class="list-avatar"></div>
                                <p class="c-black">
                                    <?=$resultado2['username']?> <br>
                                    <small><?=$resultado2['vip_points']?> diamantes</small>
                                </p>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-3 d-none d-md-block">
                        <div class="users-list">
                        <?php
                        foreach (Admin::hall('gotw_points') as $resultado3)
                        {
                        ?>
                            <div class="list-item">
                                <div class="tag">Sorvetinhos</div>
                                <div class="list-avatar"></div>
                                <p class="c-black">
                                    <?=$resultado3['username']?><br>
                                    <small><?=$resultado3['gotw_points']?> sorvetinhos</small>
                                </p>
                            </div>
                        <?php
                        }
                        ?>


                        </div>
                    </div>
                    <div class="col-3 d-none d-md-block">
                        <div class="users-list">
                        <?php
                        foreach (Admin::hall('activity_points') as $resultado4)
                        {
                        ?>
                            <div class="list-item">
                                <div class="tag">Duckets</div>
                                <div class="list-avatar"></div>
                                <p class="c-black">
                                <?=$resultado4['username']?> <br>
                                    <small><?=$resultado4['activity_points']?> duckets</small>
                                </p>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include 'model-layout/footer.php'; ?>
</body>

</html>