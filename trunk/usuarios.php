<?php

/*hum, o que sera q isso faz?*/
include_once ( "pagina.php" );
include_once ( "crud-usuarios.php" );

/*instancia da página*/
$pagina = new Pagina ( "Usuários" );

/*adicionando as paradinha*/
$pagina->adicionarCSS( "produtos.css" );
$pagina->adicionarJS("mktree.js");

/*instancia do banco*/
$usuarios = new CrudUsuario();

/*inicio da página...*/
$pagina->inicio ( "Usuarios" );


if ( $_POST['adicionar'] )	/* é para adicinar alguém? */
{
	/*cria cliente*/
	$dados = array( 'nome'=>$_POST['nome'],
						'login'=>$_POST['login'],
						'senha'=>$_POST['senha'],
						'email'=>$_POST['email'],
						'rg'=>$_POST['rg'],
						'cpf'=>$_POST['cpf'],
						'telefone_res'=>$_POST['telefone_res'],
						'telefone_cel'=>$_POST['telefone_cel']);
	$usuarios->adicionar( $dados );
}
elseif ( $_GET['remover'] )	/* é pra deletar alguém pela lista de clientes cadastrados? */
{
	/*remove cliente*/
	$usuarios->remover( $_GET['id'] );
}
elseif ( $_GET['removerPorNome'])	/* é pra deletar alguem? */
{
	/*remove cliente*/
	$usuarios->getByNome( $_GET['nome'] );
	$idCliente = $usuarios->getResult();
	$usuarios->remover( $idCliente['pessoa'] );
}
elseif ( $_POST['buscar'] )
{
	$usuarios->listaDados( $_POST['nome'] );
	$resultado = $usuarios->getResult();
	echo "\t<form id='atualizar' action='usuarios.php' method='post'>\n
			\t\tNome: <input type='text' value=", $resultado['nome'], " /><br>\n
			\t\tLogin: <input type='text' value=", $resultado['login'], " /><br>\n
			\t\tSenha: <input type='password' value=", $resultado['senha'], " /><br>\n
			\t\tE-mail: <input type='text' value=", $resultado['email'], " /><br>\n
			\t\tRG: <input type='text' value=", $resultado['rg'], " /><br>\n
			\t\tCPF: <input type='text' value=", $resultado['cpf'], " /><br> \n
			\t\tTelefone residencial: <input type='text' value=", $resultado['telefone_res'], " /><br>\n
			\t\tTelefone celular: <input type='text' value=", $resultado['telefone_cel'], " /><br>\n
			\t\t<input id='botao' type='submit' name='atualizar' value='Atualizar'/><br>\n
			\t</form>";
}
elseif( $_POST['atualizar'] )	/* é pra atulizar alguma coisa? */
{
	/*atualiza dados do cliente*/
	$dados = array( 'id'=>$_POST['id'],
						'nome'=>$_POST['nome'],
						'login'=>$_POST['login'],
						'senha'=>$_POST['senha'],
						'email'=>$_POST['email'],
						'rg'=>$_POST['rg'],
						'cpf'=>$_POST['cpf'],
						'telefone_res'=>$_POST['telefone_res'],
						'telefone_cel'=>$_POST['telefone_cel']);
	$usuarios->atualizar( $dados );
}
elseif( $_GET['listar'] )	/* é pra listar todos? */
{
	$usuarios->listaClientes();
	if ($usuarios->getRows())	/* verifica se tem alguém no banco */
	{
		echo "<table width='100%' border='2px' >
				<thead>
					<tr>
					<th></th>
					<th>Nome</th>
					<th>Login</th>
					<th>Tel. Residencial</th>
					<th>Tel. Celular</th>
					</tr>
				</thead><tbody>";
		while ( $cli = $usuarios->getResult() )	/* imprime os resultados */
		{
			echo "<tr>";
			echo "<td align='center'><a href='usuarios.php?remover=Remover&id=".$cli['id']."'>apagar</a></td>";
			echo "<td align='center'>".$cli['nome'] ."</td>";
			echo "<td align='center'>".$cli['login'] ."</td>";
			echo "<td align='center'>".$cli['telefone_res']." </td>";
			echo "<td align='center'>".$cli['telefone_cel'] ."</td>";
			echo "</tr>";
		}
	}
	else	/* banco vazio sem clientes */
	{
		echo "<h3>Nenhum resultado encontrado!</h3><br>";
	}

	echo "</tbody></table>";
}

?>

<<<<<<< .mine
<ul>
	<li><input type="button" id="btnAdiciona" onclick="abrefechaaba(document.getElementById('divAdiciona'),this);" value="+" /> Adicionar Cliente
		<ul>
			<li>
				<div id="divAdiciona"></div>
			</li>
		</ul>
	</li>
<div>&nbsp;</div>
	<li><input type="button" id="btnRemove" onclick="abrefechaaba(document.getElementById('divRemove'),this);" value="+" /> Remover Cliente
		<ul>
			<li>
				<div id="divRemove"></div>
			</li>
		</ul>
	</li>
<div>&nbsp;</div>
	<li> <input type="button" id="btnAtualiza" onclick="abrefechaaba(document.getElementById('divAtualiza'),this);" value="+" />Atualizar Dados do Cliente	<!--listar os dados atuais nos campos do formulario-->
		<ul>
			<li><form method='post' action=''>
				<div id="divAtualiza"></div><div id='dados'></div>
			</li>
		</ul>
	</li>
<div>&nbsp;</div>
	<li> Listar Clientes <!como listar todos?>
		<ul>
			<li>
				<form id='listar' action='usuarios.php' method='get'>
					<input id='botao' type='submit' name='listar' value='Listar'/><br>
				</form>
			</li>
		</ul>
	</li>
=======
<ul class='mktree' id='tree1'>
	<li> Adicionar Cliente <ul><li>
		<form id='adicionar' action="usuarios.php" method="post">
			Nome: <input type='text' name='nome' /><br>
			Login: <input type='text' name='login' /><br>
			Senha: <input type='password' name='senha'/><br>
			E-mail: <input type='text' name='email'/><br>
			RG: <input type='text' name='rg'/><br>
			CPF: <input type='text' name='cpf'/><br> 
			Telefone residencial: <input type='text' name='telefone_res'/><br>
			Telefone celular: <input type='text' name='telefone_cel'/><br>
			<input id='botao' type='submit' name='adicionar' value='Adicionar'/><br> 
		</form>
	</li></ul></li>
</ul>
>>>>>>> .r45

<ul class='mktree' id='tree1'>
	<li> Listar Clientes	<ul><li>
		<form id='listar' action="usuarios.php" method="get">
			<input id='botao' type='submit' name='listar' value='Listar'/><br>
		</form>
	</li></ul></li>
</ul>


<ul class='mktree' id='tree1'>
	<li> Remover Cliente	<ul><li>
		<form id='remover' action="usuarios.php" method="get">
			Nome: <input type='text' name='nome'/><br>
			<input id='botao' type='submit' name='removerPorNome' value='Remover'/><br>
		</form>
	</li></ul></li>
</ul>

<ul class='mktree' id='tree1'>
	<li> Atualizar Dados do Cliente<ul><li>
		<form id='atualizar' action='usuarios.php' method='post'>
			Nome: <input type='text' name='nome' /><br>
			<input id='botao' type='submit' name='buscar' value='Buscar'/><br>
	</li></ul></li>
</ul>




<?php
$pagina->fim();
?>
