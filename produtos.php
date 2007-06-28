<?php

/* definicoes */
$produtos_por_pagina = 5;

/* inclui */
include_once("pagina.php");
include_once("crud-produtos.php");

/* instancia pagina */
$pagina = new Pagina("Produtos");

/* instancia banco */
$produtos = new CrudProduto();

/* Inicia corpo do conteudo da pagina */
$pagina->inicio("Produtos");


/* verifica qual pagina ira imprimir */
if ($_GET['pag'])
	$pag = $_GET['pag'];
else
	$pag = 1;

/* pega do banco os produtos */
$produtos->getByIDRange($pag, $pag + $produtos_por_pagina);

/* Imprime como lista de produtos */
echo "<ul id='produtos'>\n";
while ($item = $produtos->getResult()) {
	
	echo "\t<li><img src=" . $item["imagem"] . ">" . $item["nome"] . "</img><h1>" . $item["nome"] . 
	"</h1><p class='descricao'>" . $item["descricao"] . "</p><p class='preco'>" . $item["preco"] . "</p></li>\n";
}
echo "</ul>\n";

/* Imprime anterior e proximo, se houver */
echo "<div id='navegador'>\n";

$anterior = $pag-1;
$proximo = $pag+1;

$produtos->getByID($anterior);
if ($produtos->getResult())
{
	echo "<a id='anterior' src='produtos.php?pag=$anterior'>Anterior</a>\n";
}
$produtos->getByID($proximo);
if ($produtos->getResult())
{
	echo "<a id='anterior' src='produtos.php?pag=$proximo'>Proximo</a>\n";
}

echo "</div>\n";

$pagina->fim();

?>
