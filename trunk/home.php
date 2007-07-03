<?php

	include_once('pagina.php');

	$home = new Pagina("Home");
	
	$home->adicionarCSS('home.css');

	$home->adicionarCSS('menu.css');
	
	$home->inicio("Sobre a empresa");?>
<p class="descricao">Lorem ipsum dolor sit amet, metus ultricies nibh phasellus tincidunt, wisi tellus pulvinar. Nulla condimentum est. Dolor suspendisse neque temporibus, quam tellus pede sit adipiscing varius, elit dictum, diam ac et pede tincidunt nunc qui, pharetra nam metus lacus tincidunt. Mi vestibulum dui. Pede ut nec tortor amet, amet est lacus pulvinar, leo vel ante vitae, et sapien rutrum id adipiscing magnis. Nullam nobis vel eros et, eum tortor pretium.</p>
<p class="descricao">Sed et massa suspendisse at enim. Vestibulum mauris, libero semper non. Maecenas id fusce suscipit suspendisse justo ante, vestibulum sollicitudin pellentesque cursus, fames fusce cursus, erat accumsan eros dignissim ullamcorper, dui sollicitudin felis. Itaque nunc, felis wisi condimentum dolor aliquam sed ac. Convallis quis, hac sit metus etiam eget. Pellentesque sit, blandit fringilla ante aenean velit eget, turpis mus morbi id fringilla sed, suspendisse egestas ac hendrerit libero nullam accumsan.</p>
<?php
	$home->fim();

?>
