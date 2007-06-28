<?php


class Banco{

	private $mConexao;

	private $mResource;

	/*
		CONSTRUTOR - Conecta ao banco e ao database, nao esquecer
	de mudar ao mudar o banco
		ERROS - trata os erros em caso de não encontrar o banco
	ou de não encontrar o database
	*/
	public function __construct()
	{
		$this->mConexao = mysql_connect("localhost","root","");
		if(! $this->mConexao)
		{
			die("Não foi possível conectar ao BD: " . mysql_error() );
		}

		if( !mysql_select_db( "boscabelereiros", $this->mConexao ) )
		{
			die("Não foi possível encontrar a BD: " . mysql_error() );
		}
	}

	/*
		DESTRUTOR - fecha a conexao
	*/
	public function __destruct()
	{
		mysql_close( $this->mConexao );
	}

	/*
		GETQUERY - faz a requisicao e armazena o resource em um
	atributo se quiser obter a resposta usar getResult
	*/
	public function getQuery( $query )
	{
		$resultado = mysql_query( $query, $this->mConexao );
		if( !$resultado )
		{
			echo "Erro de SQL: " . mysql_error();
			return FALSE;
		}
		
		$this->mResource = $resultado;
	}

	/*
		GETRESULT - retorna um array com o resultado do ultimo
	getQuery se a ultima getQuery for um SELECT, se nao retorns
	TRUE se efetuou ou FALSE se nao efetuou
	*/
	public function getResult()
	{
		return mysql_fetch_array( $this->mResource );
	}
}
?>
