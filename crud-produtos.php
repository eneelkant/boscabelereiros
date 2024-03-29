<?php

include_once ("banco.php");

/**
 Extende a classe de acesos ao banco para
 especializa-la em uma classe de acesso a tabela
 de produtos
*/
class CrudProduto extends Banco {

	/***** Conjunto de metodos para selecionar produtos *********/

	public function getTodos()
	{
		$this->getQuery("SELECT * FROM Produto");
	}

	public function getByName($match)
	{
		$this->getQuery("SELECT * FROM Produto WHERE nome LIKE '%$match%'");
	}

	public function getByID($id)
	{
		$this->getQuery("SELECT * FROM Produto WHERE id = $id");
	}

	public function getByIDRange($min, $max)
	{
		$this->getQuery("SELECT * FROM Produto WHERE id >= $min AND id <= $max");
	}

	/**** Remove produto pelo id *******/

	public function remover($id)
	{
		$this->getQuery("DELETE FROM Produto WHERE id=$id");
	}

	/***** Altera produto existente *******/

	public function alterar($id, $array)
	{
		$this->getQuery("UPDATE Produto SET nome= " . $array['nome'] .
						", descricao= " . $array['descricao'] . ", preco= " . $array['preco'] . 
						", imagem= " . $array['imagem'] . " WHERE id = $id");
	}

	/****** Adiciona novo produto ********/

	public function adicionar($array)
	{
		$this->getQuery("INSERT INTO Produto VALUES (null, '" . $array['nome'] . 
						"', '" . $array['descricao'] . "', " . $array['preco'] . ", '" . $array['imagem'] . "')");
	}
}

?>
