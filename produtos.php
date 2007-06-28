<?php

/* inclui */
include_once("pagina.php");
include_once("crud-produtos.php");

/* instancia pagina */
$pagina = new Pagina("Produtos");

/* instancia banco */
$produto = new CrudProduto();

/* Inicia corpo do conteudo da pagina */
$pagina->inicio("Produtos");




$pagina->fim();

?>
