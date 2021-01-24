<?php $nm_pagina = "BTeca - Teste"; ?>
<?php
 //Incluiundo o Banco
include_once('conectar.php');

?>
<!DOCTYPE html>
<html>

<head>
<!--
    Aqui e Um Teste para ver se as função estão funcionado e braver explicação de como ela funciona e como chamar
    e como os valores vem e como imprimir como Insert,Update e Deletec  vem com 0 ou 1 pode fazer uma aviso dizendo que deu certo
    já o select tem pegar os valores do array que vem para poder fazer uma comparação ou impressão.
-->
</head>

<body>

<?php

$tabe="login";


//"INSERT INTO $tableName (".implode(',', array_keys($data)).") VALUES (".implode(',', array_fill(0, count($data), '?')).")"
$login="teste";
$senha="senha1";

$userCount	=	$db->numeroLinhas('login','idLogin');
$data	=	array(
                'login'=>$login,
                'senha'=>$senha,
);

$imprime1 =$db->InsertCrud($tabe,$data);

echo"<h1>Insert</h1>";
echo"<h1>$imprime1</h1>";

$idlogin=$db->UtimoIDinserido();//pegando o Id para poder Ultimo ID
//Com Ultimo ID inserido podemos apgar e dar update

//UPDATE $tableName SET ". implode(',', $arrSet).' WHERE '. key($where). '=:'. key($where) . 'Field'

$login1="teste21";
$senha1="senha21";
$dataU1	=	array(   
    'login'=>$login1,
    'senha'=>$senha1,
);
$dataU2	=	array(   
    'idLogin'=>$idlogin,
);

$imprime2=$db->UpdateCrud($tabe, $dataU1, $dataU2);
echo"<h1>Upadate</h1>";
echo"<h1>$imprime2</h1>";

//Select($tableName, $fields='*', $cond='', $orderBy='', $limit='')
//"SELECT  $tableName.$fields FROM $tableName WHERE 1 ".$cond." ".$orderBy." ".$limit;

$imprime3= $db->SelectAllCrud("$tabe","*");
echo"<h1>Select 1</h1>";
if(count($imprime3)>0){
    $s	=	'';
    foreach($imprime3 as $val){
     $s++;
?>
    <h1><?php echo"$val[idLogin]"?></h1>
    <h1><?php echo"$val[login]"?></h1>
    <h1><?php echo"$val[senha]"?></h1>

<?php 
    }
}else{}

echo"<h1>Select 2</h1>";
$login2="teste21";
$senha2="senha21";

$condi="AND login = $login2";
$condi.="AND senha = senha2";
$imprime4= $db->SelectAllCrud("$tabe","*",$condi);
//ou
//$imprime4= $db->SelectAllCrud("$tabe","*","AND idLogin LIKE".$idlogin."");

if(count($imprime4)>0){
    $s	=	'';
    foreach($imprime4 as $val){
     $s++;
?>
    <h1><?php echo"$val[idLogin]"?></h1>
    <h1><?php echo"$val[login]"?></h1>
    <h1><?php echo"$val[senha]"?></h1>

<?php 
    }
}else{}

//DELETE FROM $tableName WHERE ".key($where) . ' = ?'

$where = array(
    'idLogin'=>$idlogin,
);
$imprime4=$db->DeleteCrud($tabe,$where);
echo"<h1>Delete</h1>";
echo"<h1>$imprime4</h1>";
?>

</body>

</html>