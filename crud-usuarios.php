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
		$this->getQuery( "INSERT INTO Pessoa VALUES 
					( null,", 
					$cliente['nome'],
					$cliente['login'],
					$cliente['senha'],
					$cliente['email'],
					$cliente['rg'],
					$cliente['cpf'],
					$cliente['telefone_res'],
					$cliente['telefone_cel']," ); " );
		$this->getQuery("SELECT AUTO_INCREMENT FROM information_schema.`TABLES` WHERE TABLE_NAME LIKE 'Pessoa'");
		$resultado = $this->getResult();
		$this->getQuery("INSERT INTO Cliente VALUES ( NULL, ",$resultado['id']-1,")");
	/*lembrar de adicionar tb na tabela cliente*/
	//SELECT TABLE_NAME,AUTO_INCREMENT FROM information_schema.`TABLES` WHERE TABLE_NAME LIKE 'Pessoa'
	// query acima usada para obter o indice do AUTO_INCREMENT, ou seja, o ultimo dado inserido	
	}
	
	/* remove dados do cliente de acordo com seu id */
	public function remover( $id )
	{
		$this->getQuery( "DELETE FROM Cliente WHERE id = $id" );
	}
	
	/* atualiza os dados do cliente com id recebido */
	public function atualizar( $id, $cliente )
	{/*tambem vai precisar saber qual é o id da pessoa, o id recebido é do cliente*/
		$this->getQuery( "SELECT pessoa FROM Cliente WHERE id = $id" );
		$resultado = $this->getResult();
		$this->getQuery( "UPDATE Pessoa WHERE id = ",$resultado['pessoa']," 
			SET login = " . $cliente['login'] . 
			"senha = " . $cliente['senha'] . 
			"nome = " . $cliente['nome'] . 
			"cpf = " . $cliente['cpf'] .
			"rg = " . $cliente['rg'] .
			"telefone_res = " . $cliente['telefone_res'] . 
			"telefone_cel = " . $cliente['telefone_cel'] .
			"email = " . $cliente['email'] );
	}
	
	public function getByNome( $nome )
	{
		$this->getQuery( "SELECT boscabelereiros.Cliente.id, boscabelereiros.Pessoa.* FROM boscabelereiros.Cliente INNER JOIN boscabelereiros.Pessoa ON boscabelereiros.Cliente.pessoa = boscabelereiros.Pessoa.id WHERE boscabelereiros.Pessoa.nome LIKE $nome" );
	}

	/* lista os dados por cliente de acordo com seu id */
	public function listaDados( $id )
	{
		$this->getQuery( "SELECT Cliente.id, Pessoa.* FROM Cliente INNER JOIN Pessoa ON Cliente.pessoa = Pessoa.id WHERE Cliente.id = $id" );
	}
	
	/* lista todos os clientes no banco */
	public function listaClientes()
	{
		$this->getQuery( "SELECT Cliente.id, Pessoa.* FROM Cliente INNER JOIN Pessoa ON Cliente.pessoa = Pessoa.id" );
	}
	
	
}


?>
