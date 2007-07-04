<?php
include_once('crud-usuarios.php');
$usuarios = new CrudUsuario();




if(isset($_GET['nome']))
{	
	$usuarios->getByNome($_GET['nome']);
	//if($usuarios->getRows == 1)
	//{
		$result = $usuarios->getResult();
		echo "
<input type='hidden' name='id' value='".$result['id']."'>
Login: <input type='text' name='login' value=".$result['login']."><br />
Senha: <input type='text' name='senha' value=".$result['senha']."><br />
Email: <input type='text' name='email' value=".$result['email']."><br />
RG: <input type='text' name='rg' value=".$result['rg']."><br />
CPF: <input type='text' name='cpf' value=".$result['cpf']."><br />
Telefone: <input type='text' name='telefone_res' value=".$result['telefone_res']."><br />
Celular: <input type='text' name='telefone_cel' value=".$result['telefone_cel']."><br />
<input type='submit' name='atualizar' value='Atualizar'></form>
";

}
else
{
	echo "<div id='error'>erro!!!!</div>";

}








?>