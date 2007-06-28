<?php

/* definicoes */
$produtos_por_pagina = 5;
$pag = 1;


function printNavegador($produtos, $pag, $produtos_por_pagina)
{
	$anterior = $pag-$produtos_por_pagina;
	$proximo = $pag+$produtos_por_pagina;

	/* Imprime anterior e proximo, se houver */
	echo "<div class='navegador'>\n";
	if ($anterior < 1 && $pag > 1)
		$anterior = 1;

	$produtos->getByID($anterior);
	if ($produtos->getResult())
	{
		echo "<a class='anterior' href='produtos.php?pag=$anterior'>&laquo; Anterior</a>\n";
	}
	$produtos->getByID($proximo);
	if ($produtos->getResult())
	{
		echo "<a class='proximo' href='produtos.php?pag=$proximo'>Proximo &raquo;</a>\n";
	}
	echo "</div>\n";
}

/* inclui */
include_once("pagina.php");
include_once("crud-produtos.php");

/* instancia pagina */
$pagina = new Pagina("Produtos");
$pagina->adicionarCSS("style/produtos.css");

/* instancia banco */
$produtos = new CrudProduto();

/* Inicia corpo do conteudo da pagina */
$pagina->inicio("Produtos");

/* verifica qual pagina ira imprimir */
if ($_GET['pag'])
	$pag = $_GET['pag'];

printNavegador($produtos, $pag, $produtos_por_pagina);

/* pega do banco os produtos */
$produtos->getByIDRange($pag, $pag + $produtos_por_pagina - 1);

/* Imprime como lista de produtos */
echo "<ul id='produtos'>\n";
while ($item = $produtos->getResult()) {
	
	echo "\t<li><img src='img/produtos/" . $item["imagem"] . "' /><h1>" . $item["nome"] . 
	"</h1><p class='descricao'>" . $item["descricao"] . "</p><p class='preco'> R$ " . $item["preco"] . "</p></li>\n";
}
echo "</ul>\n";

printNavegador($produtos, $pag, $produtos_por_pagina);

$pagina->fim();

?>
