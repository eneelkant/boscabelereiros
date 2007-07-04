<?php

	/* inclui */
	include_once("pagina.php");
	include_once("crud-funcionarios.php");
		
	/* instancia pagina */
	$pagina = new Pagina("Funcionários");
	$pagina->adicionarCSS("produtos.css");
	$pagina->adicionarJS("mktree.js");
	
	/* instancia banco */
	$funcionarios = new CrudFuncionario();
	
	/* Inicia corpo do conteudo da pagina */
	$pagina->inicio("Produtos");
	
	/* Verifica se eh pra remover algum item */
	if ($_GET['remove']) {
		/* pega imagem para deleta-la */
		$funcionarios->getByID($_GET['remove']);
		$item = $funcionarios->getResult();
	
		/* deleta imagem */
		unlink('C:\Desenvolvimento\xampp\htdocs\Boscabelereiros\img\funcionarios\ ' . $item['foto']);
	
		/* deleta do banco de dados */
		$funcionarios->remover($_GET['remove']);
	}	
	
	/* Verifica se eh pra adicionar algum item */
	if ($_POST['adicionar']) {
		
		/* testa extensao do arquivo */
		if ($_FILES['foto']['type'] == "image/gif" ||
			$_FILES['foto']['type'] == "image/jpg" ||
			$_FILES['foto']['type'] == "image/png" ||
			$_FILES['foto']['type'] == "image/jpeg")
		{
			/* upload arquivo */
			move_uploaded_file($_FILES['foto']['tmp_name'], 'C:\Desenvolvimento\xampp\htdocs\Boscabelereiros\img\funcionarios\ ' . $_FILES['foto']['name'])
			or die("nao foi possivel carregar arquivo: " . $_FILES['foto']['name']);
	
			/* insere no bd */
			$dados = array('nome' => $_POST['nome'], 'login' => $_POST['login'], 'senha' => $_POST['senha'],
							'email' => $_POST['email'], 'rg' => $_POST['rg'], 'cpf' => $_POST['cpf'],
							'tel_res' => $_POST['tel_res'], 'tel_cel' => $_POST['tel_cel'], 'funcao' => $_POST['funcao'],
							'salario' => $_POST['salario'], 'foto' => $_FILES['foto']['name']);
	
			$funcionarios->adicionar($dados);
			
			
		}
		else
		{
			echo "<p>Tipo de arquivo de imagem invalido: " . $_FILES['foto']['name'] . "</p>\n";
		}
	}
	
	$funcionarios->getTodos();

	echo "<ul id='produtos'>\n";
	while ($func = $funcionarios->getResult()) {
		echo "\t<li><img src='img/funcionarios/" . $func["foto"] . "' width=120 height=120 /><h1>" . $func["nome"] . 
		"</h1><p>" . $func["email"] . "</p><p>" . $func["funcao"] . "</p>" .
		"<div class='admin'><a href='funcionarios.php?remove=$func[0]'>remover</a></div></li>\n";
	}
	echo "</ul>\n";
?>

<ul class='mktree' id='tree1'> 
<li>Adicionar Funcionário <ul> <li>
<form id='adicionar' enctype="multipart/form-data" action="funcionarios.php" method="post">
	<p>Adicionar novo funcionario</p><br>
	<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
	Nome: <input type=text name='nome' /><br>
	Login: <input type=text name='login' /><br>
	Senha: <input type=password name='senha' /><br>
	email: <input type=text name='email' /><br>
	RG: <input type=text name='rg' /><br>
	CPF: <input type=text name='cpf' /><br>
	Telefone Residencial: <input type=text name='tel_res' /><br>
	Telefone Celular: <input type=text name='tel_cel' /><br>
	Função: <input type=text name='funcao' /><br>
	Salario: <input type=text name='salario' /><br>	
	Foto: <input type=file name='foto' /><br><br>
	<input id='botao' type=submit name='adicionar' value='Adicionar'/><br>
</form>
</li></ul></li></ul>

<?php

	$pagina->fim();
?>