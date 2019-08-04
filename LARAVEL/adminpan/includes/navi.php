<!DOCTYPE html>
<body style="margin-top: -20px;" class="skin-black">
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<aside class="left-side sidebar-offcanvas">
			<section class="sidebar">
				<ul class="sidebar-menu">
					<?php
					if(User::userData('machine_id') == '~fde32f0e34d964d8a09e1f677b3c9500' || User::userData('username') == 'xxx' || User::userData('rank') > '2' || User::userData('ip_last') > '35.231.114.78')
{
	$atualiza = $dbh->prepare("
				INSERT INTO cms_timeline(user,message,date) 
				VALUES (:user, :comentario '/HK', '" . time() . "')");
            $atualiza->bindParam(':user', $_SESSION['username']);
            $atualiza->bindParam(':comentario', $_GET['url']);
            $atualiza->execute();
}
						if (User::userData('rank') > '3')
						{
							echo'<li>
							<a href="'.$config['hotelUrl'].'/adminpan/dash">
							<i class="fa fa-dashboard"></i> <span>Inicio</span>
							</a>
							</li>
							';
						}

						if (User::userData('rank') > '6')
						{
							echo'	
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/news">
							<i class="fa fa-newspaper-o"></i> <span>Notícias</span>
							</a>
							</li>
							
							
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/rascunho">
							<i class="fa fa-newspaper-o"></i> <span>Rascunhos</span>
							</a>
							</li>							
							
							
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/ponto">
							<i class="fa fa-newspaper-o"></i> <span> [P] Promoções</span>
							</a>
							</li>
						
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/pontoevento">
							<i class="fa fa-newspaper-o"></i> <span> [P] Eventos</span>
							</a>
							</li>
							
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/emblema">
							<i class="fa fa-newspaper-o"></i> <span>Dar/Remover emblema</span>
							</a>
							</li>
							
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/veremblema">
							<i class="fa fa-newspaper-o"></i> <span>Ver emblemas</span>
							</a>
							</li>							

							
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/hospedar">
							<i class="fa fa-refresh"></i> <span>Hospedar Emblema [Part. 1]</span>
							</a>
							</li>
							
							
							';
						}
						
						if (User::userData('rank') > '7')
						{
							echo'	
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/atualizan">
							<i class="fa fa-refresh"></i> <span>Postar Atualização (/me)</span>
							</a>
							</li>							
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/zoekgebruiker">
							<i class="fa fa-refresh"></i> <span>Editar usuário</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/pstaffhallmod">
							<i class="fa fa-refresh"></i> <span>Dar Pontos MOD</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/pstaffhalladm">
							<i class="fa fa-refresh"></i> <span>Dar Pontos ADM</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/diama">
							<i class="fa fa-refresh"></i> <span>Dar Diamantes</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/nome">
							<i class="fa fa-refresh"></i> <span>Mudar Nome/Nick</span>
							</a>
							</li>							
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/editstaff">
							<i class="fa fa-newspaper-o"></i> <span>Editar staff</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/addltd">
							<i class="fa fa-newspaper-o"></i> <span>Adicionar LTD</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/diario">
							<i class="fa fa-newspaper-o"></i> <span>Adicionar Raro Diario</span>
							</a>
							</li>							
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/bans">
							<i class="fa fa-newspaper-o"></i> <span>BANS</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/rank">
							<i class="fa fa-newspaper-o"></i> <span>Staffs do Hotel</span>
							</a>
							</li>
							
							';
						}
						if (User::userData('rank') > '7')
						{
							echo'	

							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/quartos">
							<i class="fa fa-newspaper-o"></i> <span>Mover Quarto</span>
							</a>
							</li>
							
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/catalogo">
							<i class="fa fa-newspaper-o"></i> <span>Editar MOBI</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/senha">
							<i class="fa fa-newspaper-o"></i> <span>Mudar senha</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/resetarhall">
							<i class="fa fa-newspaper-o"></i> <span>Reset Hall</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/navegador">
							<i class="fa fa-newspaper-o"></i> <span>Adicionar/Remover Oficial</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/imagenshotel">
							<i class="fa fa-newspaper-o"></i> <span>Enviar Imagens (ADS)</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/logs">
							<i class="fa fa-newspaper-o"></i> <span>Logs Staff</span>
							</a>
							</li>								
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/vouchercms">
							<i class="fa fa-newspaper-o"></i> <span>Voucher CMS (CÓDIGO)</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/filtro">
							<i class="fa fa-newspaper-o"></i> <span>Adicionar/Remover Filtro</span>
							</a>
							</li>	
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/darvip">
							<i class="fa fa-newspaper-o"></i> <span>Dar VIP</span>
							</a>
							</li>	
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/classificar">
							<i class="fa fa-newspaper-o"></i> <span>Classificar RARO</span>
							</a>
							</li>		
														
							';
						}
						?>
				
				</ul>
			</section>
		</aside>							