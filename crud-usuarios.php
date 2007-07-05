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
		//$this->getQuery( "INSERT INTO Pessoa (nome,login,senha,email,rg,cpf,telefone_res,telefone_cel)VALUES 
		$queryResource= mysql_query( "INSERT INTO Pessoa (nome,login,senha,email,rg,cpf,telefone_res,telefone_cel) VALUES 
					(
					'".mysql_real_escape_string($cliente['nome'])."',
					'".mysql_real_escape_string($cliente['login'])."',
					'".mysql_real_escape_string($cliente['senha'])."',
					'".mysql_real_escape_string($cliente['email'])."',
					'".mysql_real_escape_string($cliente['rg'])."',
					'".mysql_real_escape_string($cliente['cpf'])."',
					'".mysql_real_escape_string($cliente['telefone_res'])."',
					'".mysql_real_escape_string($cliente['telefone_cel'])."') " ) or die(mysql_error());
		$this->getQuery("SELECT MAX(id) AS id FROM Pessoa");
		$resultado = $this->getResult();
		$this->getQuery("INSERT INTO Cliente (pessoa) VALUES ( '".$resultado['id']."')");
	}
	
	/* remove dados do cliente de acordo com seu id */
	public function remover( $id )
	{
		$this->getQuery( "DELETE FROM Pessoa WHERE id = $id" );
	}
	
	/* atualiza os dados do cliente com id recebido */
	public function atualizar( $cliente )
	{
		$this->getQuery( "UPDATE Pessoa
			SET login = '".$cliente['login']."',
				senha = '".$cliente['senha']."',
				nome = '".$cliente['nome']."',
				email = '".$cliente['email']."',
				cpf = '".$cliente['cpf']."',
				rg = '" . $cliente['rg']."',
				telefone_res = '".$cliente['telefone_res']."',
				telefone_cel = '".$cliente['telefone_cel']."'
			WHERE id = '".$cliente['id']."'" );
	}
	
	public function getByNome( $nome )
	{
		$this->getQuery( "SELECT boscabelereiros.Cliente.pessoa, boscabelereiros.Pessoa.* FROM boscabelereiros.Cliente INNER JOIN boscabelereiros.Pessoa ON boscabelereiros.Cliente.pessoa = boscabelereiros.Pessoa.id WHERE boscabelereiros.Pessoa.nome LIKE '$nome'" );
	}

	/* lista os dados por cliente de acordo com seu nome */
	public function listaDados( $nome )
	{
		$this->getQuery( "SELECT Cliente.id, Pessoa.* FROM Cliente INNER JOIN Pessoa ON Cliente.pessoa = Pessoa.id WHERE Pessoa.nome = '$nome'" );
	}
	
	/* lista todos os clientes no banco */
	public function listaClientes()
	{
		$this->getQuery( "SELECT Cliente.id, Pessoa.* FROM Cliente INNER JOIN Pessoa ON Cliente.pessoa = Pessoa.id" );
	}
	

}

?>
