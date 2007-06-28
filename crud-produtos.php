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
		$this->getQuery("SELECT * FROM boscabelereiros.Produto");
	}

	public function getByName($match)
	{
		$this->getQuery("SELECT * FROM boscabelereiros.Produto WHERE nome LIKE '%$match%'");
	}

	public function getByID($id)
	{
		$this.getQuery("SELECT * FROM boscabelereiros.Produto WHERE id = $id");
	}

	/**** Remove produto pelo id *******/

	public function remover($id)
	{
		$this->getQuery("DELETE FROM boscabelereiros.Produto WHERE id = $id");
	}

	/***** Altera produto existente *******/

	public function alterar($id, $array)
	{
		$this->getQuery("UPDATE boscabelereiros.Produto SET nome= " . $array['nome'] .
						", descricao= " . $array['descricao'] . ", preco= " . $array['preco'] . 
						", imagem= " . $array['imagem'] );
	}

	/****** Adiciona novo produto ********/

	public function adicionar($array)
	{
		$this->getQuery("INSERT INTO boscabelereiros.Produto VALUES (null, " . $array['nome'] . "
						, " . $array['descricao'] . ", " . $array['preco'] . ", " . $array['imagem']);
	}
}

?>
