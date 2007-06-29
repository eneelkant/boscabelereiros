<?php

/* inclui */
include_once("pagina.php");
include_once("crud-produtos.php");

/* definicoes */
$produtos_por_pagina = 5;
$pag = 1;

/**
 * Imprime o navegador (<< anterior 1 2 3 4 5 proximo >>)
 */
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
		echo "\t<a class='anterior' href='produtos.php?pag=$anterior'>&laquo; Anterior</a>\n";
	}
	$produtos->getByID($proximo);
	if ($produtos->getResult())
	{
		echo "\t<a class='proximo' href='produtos.php?pag=$proximo'>Proximo &raquo;</a>\n";
	}

	/* Imprime paginas */
	echo "\t<ul class='paginas'>\n";

	$pag_count = 1;
	$item = 1;
	$produtos->getByID($pag_count);
	while ($produtos->getResult())
	{
		if ($pag >= $pag_count && $pag < $pag_count+$produtos_por_pagina)
			echo "\t\t<li>$item</li>\n";
		else
			echo "\t\t<li><a href='produtos.php?pag=$pag_count'>$item</a></li>\n";

		$pag_count += $produtos_por_pagina;
		$item++;
		$produtos->getByID($pag_count);
	}

	echo "\t</ul>\n";
	echo "</div>\n";
}

/* instancia pagina */
$pagina = new Pagina("Produtos");
$pagina->adicionarCSS("produtos.css");

/* instancia banco */
$produtos = new CrudProduto();

/* Inicia corpo do conteudo da pagina */
$pagina->inicio("Produtos");

/* Verifica se eh pra remover algum item */
if ($_GET['remove']) {
	$produtos->remover($_GET['remover']);
}	

/* Verifica se eh pra adicionar algum item */
if ($_POST['nome'] && $_POST['descricao'] && $_POST['preco'] && $_POST['imagem']) {
	$produtos->adicionar($_POST);
}

/* verifica qual pagina ira imprimir */
if ($_GET['pag'])
	$pag = $_GET['pag'];

/* Imprime formulario de adicionar produto */
?>

<form class='admin action='produtos.php' method='post'>	
	<p>Inserir produto</p><br>
	Nome o produto: <input type=text name='nome'><br>
	Descrição: <input type=text name='descricao'><br>
	Preço: <input type=text name='preco'><br>
	Imagem: <input type=file name='imagem'><br><br>
	<input type=submit><br>
</form>

<?php
printNavegador($produtos, $pag, $produtos_por_pagina);

/* pega do banco os produtos */
$produtos->getByIDRange($pag, $pag + $produtos_por_pagina - 1);

/* Imprime como lista de produtos */
echo "<ul id='produtos'>\n";
while ($item = $produtos->getResult()) {
	
	echo "\t<li><img src='img/produtos/" . $item["imagem"] . "' /><h1>" . $item["nome"] . 
	"</h1><p class='descricao'>" . $item["descricao"] . "</p><p class='preco'> R$ " . $item["preco"] . "</p>" .
	"<div class='admin' class='remover'><a href='produtos.php?remove=$item[0]'>remover</a></div></li>\n";
}
echo "</ul>\n";

printNavegador($produtos, $pag, $produtos_por_pagina);

$pagina->fim();

?>
