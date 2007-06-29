<?php
include_once ( "banco.php" );

/**
Como eu so chupeta vo fazer o mesmo esquema do baguiu
do super. Classe herda o banco e etc...
*/
class CrudUsuario extends Banco
{
	/* adiciona cliente */
	public function adicionar( $cliente )
	{
		$this->getQuery( "INSERT INTO boscabelereiros.Pessoa VALUES 
					( null, 
					$cliente['nome'], 
					$cliente['login'], 
					$cliente['senha'], 
					$cliente['email'],
					$cliente['rg'],
					$cliente['cpf'],
					$cliente['telefone_res'],
					$cliente['telefone_cel'] ); " );
	/*lembrar de adicionar tb na tabela cliente*/
	//SELECT TABLE_NAME,AUTO_INCREMENT FROM information_schema.`TABLES` WHERE TABLE_NAME LIKE 'Pessoa'
	// query acima usada para obter o indice do AUTO_INCREMENT, ou seja, o ultimo dado inserido	
	}
	
	/* remove dados do cliente de acordo com seu id */
	public function remover( $id )
	{
		$this->getQuery( "DELETE FROM boscabelereiros.Cliente WHERE id = $id" );
	}
	
	/* atualiza os dados do cliente com id recebido */
	public function atualizar( $id, $cliente )
	{/*tambem vai precisar saber qual é o id da pessoa, o id recebido é do cliente*/
		$this->getQuery( "UPDATE boscabelereiros.Pessoa WHERE id = $id 
			SET login = " . $cliente['login'] . 
			"senha = " . $cliente['senha'] . 
			"nome = " . $cliente['nome'] . 
			"cpf = " . $cliente['cpf'] .
			"rg = " . $cliente['rg'] .
			"telefone_res = " . $cliente['telefone_res'] . 
			"telefone_cel = " . $cliente['telefone_cel'] .
			"email = " . $cliente['email'] );
	}
	
	/* lista os dados por cliente de acordo com seu id */
	public function listaDados( $id )
	{/*idem funcao acima*/
		$this->getQuery( "SELECT * FROM boscabelereiros.Cliente WHERE id = $id" );
		$this->getQuery(  );
	}
	
	/* lista todos os clientes no banco */
	public function listaClientes()
	{/*idem funcao acima*/
		$this->getQuery( "SELECT * FROM boscabelereiros.Cliente" );
	}
	
	
}


?>