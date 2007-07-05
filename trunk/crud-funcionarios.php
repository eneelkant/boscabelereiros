<?php
include_once ( "banco.php" );

class CrudFuncionario extends Banco
{
	public function adicionar($funcionario)
	{
		$this->getQuery("INSERT INTO Pessoa VALUES (null,'".$funcionario['nome']."','".$funcionario['login']."','".$funcionario['senha'].
					"','".$funcionario['email']."','".$funcionario['rg']."','".$funcionario['cpf']."','".$funcionario['tel_res'].
					"','".$funcionario['tel_cel']."');");

		$this->getQuery("SELECT id FROM Pessoa WHERE login='".$funcionario['login']."';");
		$idpessoa = $this->getResult();
		$this->getQuery("INSERT INTO Funcionario VALUES (null,'".$idpessoa['id']."','".$funcionario['salario']."','".$funcionario['funcao']."','".$funcionario['foto']."');");
	
	}
	
	/* lista os funcionarios com base no id fornecido */
	public function getById($id)
	{
		$this->getQuery("SELECT * FROM Funcionario WHERE id=$id");
	}
	public function getTodos(){
		$this->getQuery("SELECT Funcionario.*, Pessoa.* FROM Funcionario INNER JOIN Pessoa ON Funcionario.pessoa = Pessoa.id;");
	}
	
	/*remove funcionario do banco com base no id fornecido */
	public function remover($id)
	{
		$this->getQuery("SELECT pessoa FROM Funcionario WHERE id=$id");
		$resultado = $this->getResult();
		$this->getQuery("DELETE FROM Pessoa WHERE id=".$resultado['pessoa'].";");
		$this->getQuery("DELETE FROM Funcionario WHERE id=$id");
	}
}

?>
