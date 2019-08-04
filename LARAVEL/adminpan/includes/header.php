<?php
	staffCheckHk();
	
?>
<?php 
if ($_SESSION['id'] != User::userdata('id')){
	header('Location: logout');
}
?>
<header style="    padding-top: 20px;"class="header">
	<a href="/adminpan/index.php" class="logo">
		Administração
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

	</nav>
</header>