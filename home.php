<?php

	include_once('pagina.php');

	$home = new Pagina("Home");
	
	$home->adicionarCSS('home.css');
	
	$home->inicio("Sobre a empresa");
	
	$home->fim();

?>
