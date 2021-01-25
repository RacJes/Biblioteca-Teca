<?php

include_once('Banco/CRUD.php');

define('SS_DB_HOST', 'localhost');
define('SS_DB_NAME', 'biblioteca');
define('SS_DB_USER', 'root');
define('SS_DB_PASSWORD', '');//ESSE AQUI E PARA GERAL FUNCINAR
//define('SS_DB_PASSWORD', 'simsenha123');//ESSE AQUI E PARA Marco

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD);

$db 	=	new BancoBi($pdo);
?>
