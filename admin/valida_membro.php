<?php echo htmlspecialchars($_POST['nome']); ?><br>
<?php echo htmlspecialchars($_POST['cpf']); ?><br>
<?php echo htmlspecialchars($_POST['telefone']); ?><br>
<?php echo htmlspecialchars($_POST['endereco']); ?><br>
<?php echo htmlspecialchars($_POST['email']); ?><br>
<?php echo htmlspecialchars($_POST['nascimento']); ?><br>
<?php echo htmlspecialchars($_POST['files']); ?><br>
<?php include("../conectar.php");


$tabe="membro";
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
$idlogin=$db->UtimoIDinserido();
?>

