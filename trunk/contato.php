<?php
	include_once('pagina.php');

	$home = new Pagina("Home");

	$home->adicionarCSS('contato.css');

	$home->inicio("Contato");
?>

			<img src='img/contato.jpg' class='left'>
			<div id='contatos'>
				<p>(43)555-6666</p>
				<p>leandroboscariol@gmail.com</p>
			</div>
			<p class='right'><!-- gambi --></p>
<?php
	$home->fim();

?>