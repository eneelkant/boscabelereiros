<?php

	include('Pagina.php');

	$home = new Pagina("Home");
	
	$home->adicionarCSS('base.css');
	
	$home->adicionarJS('base.js');
	
	$home->inicio();
	
	$home->fim();

?>