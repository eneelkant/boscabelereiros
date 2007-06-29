<?php

/*hum, o que sera q isso faz?*/
include_once ( "pagina.php" );
include_once ( "crud-usuarios.php" );

$pagina = new Pagina ( "Usuários" );
//$pagina->adicionarCSS( "usuarios.css" );
$pagina->inicio ( "Usuários" );



$pagina->fim();


?>