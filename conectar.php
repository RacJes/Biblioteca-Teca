<?php

$clinica = 'celke';
$user = 'root';
$senha = '';
$localhost = 'localhost';  
include_once('include/CRUD.php');

define('SS_DB_NAME', 'biblioteca');
define('SS_DB_USER', 'root');
define('SS_DB_PASSWORD', '');//ESSE AQUI E PARA GERAL FUNCINAR
//define('SS_DB_PASSWORD', 'simsenha123');//ISSO É PARA FUNCIONAR NO PC DO MARCO
define('SS_DB_HOST', 'localhost');

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo	=	"";

$senha = 'simsenha123';
$pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD);

$db 	=	new BancoBi($pdo);
?>
