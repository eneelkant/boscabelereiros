<?php

/*hum, o que sera q isso faz?*/
include_once ( "pagina.php" );
include_once ( "crud-usuarios.php" );

$pagina = new Pagina ( "Usuários" );
//$pagina->adicionarCSS( "usuarios.css" ); /*não sei se vai ter css pra usuarios*/
$pagina->adicionarJS("mktree.js");

$usuarios = new CrudUsuario();

$pagina->inicio ( "Usuários" );

if ( $_POST['adicionar'] )
{
	/*cria cliente*/
	$dados = array( $_POST['nome'],
						$_POST['login'],
						$_POST['senha'],
						$_POST['email'],
						$_POST['rg'],
						$_POST['cpf'],
						$_POST['telefone_res'],
						$_POST['telefone_cel'] );
	$usuarios->adicionar( $dados );
}
elseif ( $_GET['remover'] )
{
	/*remove cliente*/
	$usuarios->getByNome( $_GET['nome'] );
	$idCliente = $usuarios->getResult();
	$usuarios->remover( $idCliente );
}
elseif( $_POST['atualizar'] )
{
	/*atualiza dados do cliente*/
	$dados = array( $_POST['nome'],
						$_POST['login'],
						$_POST['senha'],
						$_POST['email'],
						$_POST['rg'],
						$_POST['cpf'],
						$_POST['telefone_res'],
						$_POST['telefone_cel'] );
	$usuarios->atualizar( $dados );
}
elseif( $_GET['listar'] )
{
	$usuarios->listaClientes();
	while ( $cli = $usuarios->getResult() )
	{
		echo "\t<li> Nome: ",$cli['nome'],"</li><br>
				\t<li> Login: ",$cli['login'],"</li><br>
				\t<li> Telefone residencial: ",$cli['telefone_res'],"</li><br>
				\t<li> Telefone celular: ",$cli['telefone_cel'],"</li><br><hr>";
	}
}

?>

<ul class='mktree' id='tree1'>
	<li> Adicionar Cliente
		<ul>
			<li>
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
			</li>
		</ul>
	</li>
	<li> Remover Cliente
		<ul>
			<li>
				<form id='remover' action='usuarios.php' method='get'>
					Nome: <input type='text' name='nome'/><br>
					<input id='botao' type='submit' name='remover' value='Remover'/><br>
				</form>
			</li>
		</ul>
	</li>
	<li> Atualizar Dados do Cliente	<!listar os dados atuais nos campos do formulario>
		<ul>
			<li>
				<form id='atualizar' action='usuarios.php' method='post'>
					Nome: <input type='text' name="<?php$_POST['nome']?>" /><br>
					Login: <input type='text' name="<?php$_POST['login']?>" /><br>
					Senha: <input type='password' name="<?php$_POST['senha']?>"/><br>
					E-mail: <input type='text' name="<?php$_POST['email']?>"/><br>
					RG: <input type='text' name="<?php$_POST['rg']?>"/><br>
					CPF: <input type='text' name="<?php$_POST['cpf']?>"/><br> 
					Telefone residencial: <input type='text' name="<?php$_POST['telefone_res']?>"/><br>
					Telefone celular: <input type='text' name="<?php$_POST['telefone_cel']?>"/><br>
					<input id='botao' type='submit' name='atualizar' value='Atualizar'/><br>
				</form>
			</li>
		</ul>
	</li>
	</li> Listar Clientes <!como listar todos?>
		<ul>
			<li>
				<form id='listar' action='usuarios.php' method='get'>
					<input id='botao' type='submit' name='listar' value='Listar'/><br>
				</form>
			</li>
		</ul>
	</li>

</ul>



<?php
$pagina->fim();
?>