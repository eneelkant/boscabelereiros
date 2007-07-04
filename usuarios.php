<?php

/*hum, o que sera q isso faz?*/
include_once ( "pagina.php" );
include_once ( "crud-usuarios.php" );

$pagina = new Pagina ( "Usuários" );
//$pagina->adicionarCSS( "usuarios.css" ); /*não sei se vai ter css pra usuarios*/
$pagina->adicionarJS("mktree.js");
$pagina->adicionarJS("abinhas.js");
$usuarios = new CrudUsuario();

$pagina->inicio ( "Usuários" );

if ( $_POST['adicionar'] )
{
	/*cria cliente*/
	$dados = array( 'nome'=>$_POST['Nome'],
						 'login'=>$_POST['Login'],
						 'senha'=>$_POST['Senha'],
						 'email'=>$_POST['Email'],
						'rg'=>$_POST['RG'],
						'cpf'=>$_POST['CPF'],
						 'telefone_res'=>$_POST['Telefone'],
						'telefone_cel'=>$_POST['Celular']);
	$usuarios->adicionar( $dados );
}
elseif ( $_GET['remover'] )
{
	/*remove cliente*/
//	$usuarios->getByNome( $_GET['nome'] );
//	$idCliente = $usuarios->getResult();
	$usuarios->remover( $_GET['id'] );
}
elseif ( $_GET['removerPorNome'])
{
	/*remove cliente*/
	$usuarios->getByNome( $_GET['nome'] );
	$idCliente = $usuarios->getResult();
	$usuarios->remover( $idCliente['pessoa'] );
}
elseif( $_POST['atualizar'] )
{
	/*atualiza dados do cliente*/
	$dados = array( 'nome'=>$_POST['nome'],
						 'login'=>$_POST['login'],
						 'senha'=>$_POST['senha'],
						 'email'=>$_POST['email'],
						'rg'=>$_POST['rg'],
						'cpf'=>$_POST['cpf'],
						 'telefone_res'=>$_POST['telefone_res'],
						'telefone_cel'=>$_POST['telefone_cel']);
	$usuarios->atualizar( $_POST['id'], $dados );
}
elseif( $_GET['listar'] )
{
	$usuarios->listaClientes();
	if ($usuarios->getRows())
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
		while ( $cli = $usuarios->getResult() )
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
	else
		echo "<h3>Nenhum resultado encontrado!</h3>";

/*"\t<li> Nome: ",$cli['nome'],"</li><br>
				\t<li> Login: ",$cli['login'],"</li><br>
				\t<li> Telefone residencial: ",$cli['telefone_res'],"</li><br>
				\t<li> Telefone celular: ",$cli['telefone_cel'],"</li><br><hr>";*/
	echo "</tbody></table>";
}

?>

<ul>
	<li><input type="button" id="btnAdiciona" onclick="abrefechaaba(document.getElementById('divAdiciona'),this);" value="+" /> Adicionar Cliente
		<ul>
			<li>
				<div id="divAdiciona"></div>
				<!--<form id='adicionar' action="usuarios.php" method="post">
					Nome: <input type='text' name='nome' /><br>
					Login: <input type='text' name='login' /><br>
					Senha: <input type='password' name='senha'/><br>
					E-mail: <input type='text' name='email'/><br>
					RG: <input type='text' name='rg'/><br>
					CPF: <input type='text' name='cpf'/><br> 
					Telefone residencial: <input type='text' name='telefone_res'/><br>
					Telefone celular: <input type='text' name='telefone_cel'/><br>
					<input id='botao' type='submit' name='adicionar' value='Adicionar'/><br> 
				</form> -->
			</li>
		</ul>
	</li>
<div>&nbsp;</div>
	<li><input type="button" id="btnRemove" onclick="abrefechaaba(document.getElementById('divRemove'),this);" value="+" /> Remover Cliente
		<ul>
			<li>
				<div id="divRemove"></div>
				<!--<form id='remover' action='usuarios.php' method='get'>
					Nome: <input type='text' name='nome'/><br>
					<input id='botao' type='submit' name='remover' value='Remover'/><br>
				</form>-->
			</li>
		</ul>
	</li>
<div>&nbsp;</div>
	<li> <input type="button" id="btnAtualiza" onclick="abrefechaaba(document.getElementById('divAtualiza'),this);" value="+" />Atualizar Dados do Cliente	<!--listar os dados atuais nos campos do formulario-->
		<ul>
			<li><form method='post' action=''>
				<div id="divAtualiza"></div><div id='dados'></div>
				<!--<form id='atualizar' action='usuarios.php' method='post'>
					Nome: <input type='text' name="<?php$_POST['nome']?>" /><br>
					Login: <input type='text' name="<?php$_POST['login']?>" /><br>
					Senha: <input type='password' name="<?php$_POST['senha']?>"/><br>
					E-mail: <input type='text' name="<?php$_POST['email']?>"/><br>
					RG: <input type='text' name="<?php$_POST['rg']?>"/><br>
					CPF: <input type='text' name="<?php$_POST['cpf']?>"/><br> 
					Telefone residencial: <input type='text' name="<?php$_POST['telefone_res']?>"/><br>
					Telefone celular: <input type='text' name="<?php$_POST['telefone_cel']?>"/><br>
					<input id='botao' type='submit' name='atualizar' value='Atualizar'/><br>
				</form>-->
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

</ul>



<?php
$pagina->fim();
?>