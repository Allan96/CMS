
<?php include 'model-layout/header.php'; ?>
<body>
    <?php include 'model-layout/menu.php'; ?>


    <div class="container">
        <div class="row mt-3">
            <div class="col-12 col-sm-3 order-2 order-sm-1  mt-3 mt-sm-0">
                <ul class="list-group">
                <?php
						$getArticles = $dbh->prepare("SELECT id,author,title,image FROM cms_news ORDER BY id DESC LIMIT 20");
						$getArticles->execute();
						$count = $getArticles->RowCount();
						if ($count >= 0)
						{
							while ($a = $getArticles->fetch())
							{
									echo '
                                    <a href="/news/' .$a['id'].'">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                    ' .$a['title'] . ' »
                        <span class="badge badge-secondary badge-pill bgc-roxo light">' .$a['author'] . '</span>
                    </li>
										</a>';
								}
							}
				?>

                </ul>
            </div>
            <div class="col-12 col-sm-9 order-1 order-sm-2">
            <?php
            $id = $_GET['id'];
            if(!empty($id) && is_numeric($id)){
                $news = $dbh->prepare("SELECT id,title,image,author,date,shortstory,longstory,form,formdate FROM cms_news WHERE id = :news LIMIT 1");
				$news->bindParam(':news', $id);
				$news->execute();
				
				if ($news->RowCount() == 1)
				{
					while ($news2 = $news->fetch())
					{
            ?>
                <div class="boxnews">
                    <div class="data"><?php echo filter(gmdate("d M Y", $news2["date"])); ?></div>
                    <h2 class="c-roxo mb-3">
                        <?php echo filter($news2["title"])?>
                    </h2>
                    <hr>
                    <?php echo html_entity_decode($news2['shortstory']); ?>

                    <hr>

                    <div class="autorbox">
                        <div class="avatarinfo"></div>
                        <p>
                            Publicado por     <?php echo filter($news2["author"])?> <br> Data de postagem: <?php echo filter(gmdate("d M Y", $news2["date"])); ?>
                        </p>
                        <img src="../templates/theme-yuup/assets/images/like.svg" width="32" align="right" alt="" class="d-none d-sm-block">
                        <img src="../templates/theme-yuup/assets/images/unlike.svg" width="32" align="right" alt="" class="d-none d-sm-block">
                    </div>

                </div>
                <?php }
            }
         }
         else{
             ?>

<div class="boxnews">
                    <div class="data">00 000 0000</div>
                    <h2 class="c-roxo mb-3">
                        Noticia não encontrada
                    </h2>
                    <hr>
                   Parece que essa noticia não existe, procure outra noticia disponivel ao lado.

                    <hr>

                    <div class="autorbox">
                        <div class="avatarinfo"></div>
                        <p>
                            Publicado por EquipeYuup <br> Data de postagem: 00 000 0000
                        </p>
                        <img src="../templates/theme-yuup/assets/images/like.svg" width="32" align="right" alt="" class="d-none d-sm-block">
                        <img src="../templates/theme-yuup/assets/images/unlike.svg" width="32" align="right" alt="" class="d-none d-sm-block">
                    </div>

                </div>


             <?php
         } ?>
            </div>


        </div>
    </div>
    </div>


    <?php include 'model-layout/footer.php'; ?>
</body>

</html>