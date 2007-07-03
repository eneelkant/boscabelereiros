<?php

class Pagina{

	public function __construct($vTitulo)
	{
		/* validacao da W3Consortium */
		echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";

		echo "<html>\n\t<head>\n\t\t<title>$vTitulo</title>\n";
		echo "\t\t<meta http-equiv='Content-type' content='text/html; charset=utf-8'>\n";
		echo "\t\t<link rel='stylesheet' type='text/css' href='style/base.css' />\n";
		echo "\t\t<link rel='stylesheet' type='text/css' href='style/menu.css' />\n";
	}

	public function adicionarCSS($vCss)
	{
		echo "\t\t<link rel='stylesheet' type='text/css' href='style/$vCss' />\n";
	}

	public function adicionarJS($vJs)
	{
		echo "\t\t<script type='text/javascript' src='script/$vJs'></script>\n";
	}

	public function inicio($titulo)
	{
		echo "\t</head>\n\t<body>\n";
		echo "\t\t<div id='pagina'>\n";
		echo "\t\t\t<div id='topo'>\n\t\t\t\t<h1 id='logo'><div id='banner'></div></h1>\n";
		echo "\t\t\t\t<ul id='menu'>\n";
		echo "\t\t\t\t\t<li><a href=\"index.php\">Home</a></li>\n";
		echo "\t\t\t\t\t<li><a href=\"produtos.php\">Produtos</a></li>\n";
		echo "\t\t\t\t\t<li><a href=\"#\">Agenda</a></li>\n";
		echo "\t\t\t\t\t<li><a href=\"#\">Profissionais</a></li>\n";
		echo "\t\t\t\t\t<li><a href=\"contato.php\">Contato</a></li>\n";
		echo "\t\t\t\t</ul>\n";
		echo "\t\t\t\t<div id='login'>\n";
		include("login.php");
		echo "\t\t\t\t</div>\n";
		echo "\t\t\t</div>\n";
		echo "\t\t\t<div id='conteudo'>\n";
		echo "\t\t\t\t<h1 id='tituloConteudo' class='fundoAzul'>$titulo</h1>\n";
	}
	
	public function fim()
	{
		echo "\t\t\t</div>\n";
		echo "\t\t\t<div id='rodape'>\n";
		echo "\t\t\t\t<ul id='menuRodape' class='fundoAzul'>\n";
		echo "\t\t\t\t\t<li><a href=\"#\">Home</a></li>\n";
		echo "\t\t\t\t\t<li><a href=\"#\">Produtos</a></li>\n";
		echo "\t\t\t\t\t<li><a href=\"#\">Agenda</a></li>\n";
		echo "\t\t\t\t\t<li><a href=\"#\">Profissionais</a></li>\n";
		echo "\t\t\t\t\t<li><a href=\"#\">Contato</a></li>\n";
		echo "\t\t\t\t</ul>\n";
		echo "\t\t\t</div>\n";
		echo "\t\t</div>\n";
		echo "\t</body>\n";
		echo "</html>\n";
	}

	public function __destruct()
	{

	}

}

?>
