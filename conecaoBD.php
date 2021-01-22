<?php
$servidor ='127.0.0.1';//servidor localhost
$usuario='root';//usuario do mysql
//$senha='';//senha do mysql
$senha='simsenha123';//senha do mysql Marco
$bancoDados='biblioteca';//database do banco de dados

$conexao = mysqli_connect($servidor,$usuario,$senha,$bancoDados);

if(mysqli_connect_errno($conexao))
{
    echo"Problema na conexão do Banco";
}
else
{
    echo"Conexão realizada";
}


?>