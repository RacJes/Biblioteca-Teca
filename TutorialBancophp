<?php $nm_pagina = "BTeca - Teste"; ?>
<?php
 //Incluiundo o Banco
include_once('conectar.php');

?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>

<?php

$tabe="login";
$login="teste";
$senha="senha1";

$userCount	=	$db->numeroLinhas('login','idLogin');
$data	=	array(
                'login'=>$login,
                'senha'=>$senha,
);

//"INSERT INTO $tableName (".implode(',', array_keys($data)).") VALUES (".implode(',', array_fill(0, count($data), '?')).")"
$imprime1 =$db->InsertCrud($tabe,$data);
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
echo"<h1>$imprime2</h1>";

//Select($tableName, $fields='*', $cond='', $orderBy='', $limit='')
//"SELECT  $tableName.$fields FROM $tableName WHERE 1 ".$cond." ".$orderBy." ".$limit;
//$imprime3=$db->SelectCrud($tabe, $fields='*');
//echo"<h1>$imprime3</h1>";

//DELETE FROM $tableName WHERE ".key($where) . ' = ?'

$where = array(
    'idLogin'=>$idlogin,
);
$imprime4=$db->DeleteCrud($tabe,$where);
echo"<h1>$imprime4</h1>";
?>

</body>

</html>