function abrefechaaba( obj , butaum )
{

	if(butaum.getAttribute("id") == "btnAdiciona")
	{
		if(butaum.value=="+")
		{
			butaum.value="-";
			var objsNames = new Array ("Nome","Login","Senha","Email","RG","CPF","Telefone","Celular");
			var form = document.createElement("form");
			form.setAttribute('id','adicionar');
			form.setAttribute('action','usuarios.php');
			form.setAttribute('method','post');
			for(var i = 0; i < objsNames.length; i++)
			{
				var label = document.createElement('label');
				label.innerHTML=objsNames[i]+": ";
				label.setAttribute('for',objsNames[i]);
				var input = document.createElement('input');
				input.setAttribute('type','text');
				input.setAttribute('name',objsNames[i]);
				input.setAttribute('id',objsNames[i]);
				var br = document.createElement('br');
				form.appendChild(label);
				form.appendChild(input);
				form.appendChild(br);
			}
			var send = document.createElement('input');
			send.setAttribute('type','submit');
			send.setAttribute('name','adicionar');
			send.setAttribute('value','Adicionar');
			form.appendChild(send);
			obj.appendChild(form);
			//obj.innerHTML = "<form id='adicionar' action='usuarios.php' method='post'>Nome: <input type='text' name='nome' /><br>Login: <input type='text' name='login' /><br>Senha: <input type='password' name='senha'/><br>E-mail: <input type='text' name='email'/><br>RG: <input type='text' name='rg'/><br>CPF: <input type='text' name='cpf'/><br> Telefone residencial: <input type='text' name='telefone_res'/><br>Telefone celular: <input type='text' name='telefone_cel'/><br><input id='botao' type='submit' name='adicionar' value='Adicionar'/><br> </form> "
		}
		else
		{
			obj.removeChild(obj.firstChild);
			butaum.value="+";
		}	
	}
	if(butaum.getAttribute("id") == "btnRemove")
	{
		if(butaum.value=="+")
		{
			butaum.value="-";
			var form = document.createElement("form");
			form.setAttribute('id','remover');
			form.setAttribute('action','usuarios.php');
			form.setAttribute('method','post');
			
			var label = document.createElement('label');
			label.innerHTML="Nome: ";
			label.setAttribute('for','nomeAt');
			
			var input = document.createElement('input');
			input.setAttribute('type','text');
			input.setAttribute('name','nome');
			input.setAttribute('id','nomeAt');
			
			var br = document.createElement('br');
			form.appendChild(label);
			form.appendChild(input);
			form.appendChild(br);
			
			var send = document.createElement('input');
			send.setAttribute('type','submit');
			send.setAttribute('name','removerPorNome');
			send.setAttribute('value','remover');
			
			form.appendChild(send);
			obj.appendChild(form);
		}
		else
		{
			obj.removeChild(obj.firstChild);
			butaum.value="+";
		}	
	}
	if(butaum.getAttribute("id") == "btnAtualiza")
	{
		if(butaum.value=="+")
		{
			butaum.value="-";
			var form = document.createElement("form");
			form.setAttribute('id','remover');
			form.setAttribute('action','usuarios.php');
			form.setAttribute('method','post');
			
			var label = document.createElement('label');
			label.innerHTML="Nome: ";
			label.setAttribute('for','nomeAt');
			
			var input = document.createElement('input');
			input.setAttribute('type','text');
			input.setAttribute('name','nome');
			input.setAttribute('id','nomeAt');
			
			form.appendChild(label);
			form.appendChild(input);
			
			var send = document.createElement('input');
			send.setAttribute('type','submit');
			send.setAttribute('name','buscar');
			send.setAttribute('value','Buscar');
			send.setAttribute('onclick',"atualizarCampos(document.getElementById('nomeAt').value);return false;");
			form.appendChild(send);
			obj.appendChild(form);
			//obj.innerHTML = "<form id='atualizar' action='usuarios.php' method='post'>Nome: <input type='text' name='nome' /><br>Login: <input type='text' name='login' /><br>Senha: <input type='password' name='password'/><br>E-mail: <input type='text'name='email'/><br>RG: <input type='text' name='rg'/><br>CPF: <input type='text' name=''/><br>Telefone residencial: <input type='text' name='tel'/><br>Telefone celular: <input type='text' name='cel'/><br><input id='botao' type='submit' name='atualizar' value='Atualizar'/><br></form>"xmlhttprequest(this.parentNode.childNode[1])
		}
		else
		{
			obj.innerHTML="";
			document.getElementById('dados').innerHTML="";
			butaum.value="+";
		}	
	}
}

function atualizarCampos(text)
{
	var request = new XMLHttpRequest();
	request.open("GET","usuariosFlow.php?action=buscaCampos&nome="+text);
	request.onreadystatechange=function() {
		if(request.readyState == 4) {
			interprerter(request.responseText);
  		}
	}
	request.send(null);
}

function interprerter(text)
{
	dados = document.getElementById('dados');
	dados.innerHTML = text;
	
}