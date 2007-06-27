<?php

	include('pagina.php');

	$home = new Pagina("Home");
	
	$home->adicionarCSS('base.css');
	
	$home->inicio();
	
	$home->fim();

?>