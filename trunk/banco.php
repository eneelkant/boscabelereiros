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
	public __construct()
	{
		$mConexao = mysql_connect("localhost","root","");
		if(!$mConexao)
		{
			die("Não foi possível conectar ao BD: " . mysql_error() );
		}

		if( !mysql_select_db( "rodrigo", $mConexao ) )
		{
			die("Não foi possível encontrar a BD: " . mysql_error() );
		}
	}

	/*
		DESTRUTOR - fecha a conexao
	*/
	public __destruct()
	{
		mysql_close( $mConexao );
	}

	/*
		GETQUERY - faz a requisicao e armazena o resource em um
	atributo se quiser obter a resposta usar getResult
	*/
	public getQuery( $query )
	{
		$resultado = mysql_query( $query, $mConexao );
		if( !$resultado )
		{
			echo "Erro de SQL: " . mysql_error();
			return FALSE;
		}
		
		$mResource = $resultado;
	}

	/*
		GETRESULT - retorna um array com o resultado do ultimo
	getQuery se a ultima getQuery for um SELECT, se nao retorns
	TRUE se efetuou ou FALSE se nao efetuou
	*/
	public getResult()
	{
		if( $mResource == TRUE )
		{
			return TRUE;
		}
		else if( $mResource == FALSE )
		{
			return FALSE;
		}

		return mysql_fetch_array( $mResource );
	}
}
?>