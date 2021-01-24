<?php echo htmlspecialchars($_POST['nome']); ?><br>
<?php echo htmlspecialchars($_POST['cpf']); ?><br>
<?php echo htmlspecialchars($_POST['telefone']); ?><br>
<?php echo htmlspecialchars($_POST['endereco']); ?><br>
<?php echo htmlspecialchars($_POST['email']); ?><br>
<?php echo htmlspecialchars($_POST['nascimento']); ?><br>
<?php echo htmlspecialchars($_POST['files']); ?><br>
<?php include("../conectar.php");

$tabe="membro";
$nome=$_POST['nome'];
$cpf =$_POST['cpf'];
$telefone =$_POST['telefone'];
$endereco =$_POST['endereco'];
$email=$_POST['email'];
$arquivo =$_POST['files'];
$nascimento =$_POST['nascimento'];



$userCount	=	$db->numeroLinhas($nome,$cpf,$telefone,$endereco,$email,$nascimento,$arquivo);
$data	=	array(
                'idmembro'=>"",
                'nome'=>$nome,
                'data_nacimento'=>$nascimemtno,
                'cpf'=>$cpf,
                'endereco'=>$endereco,
                'telefone'=>$telefone,
                'email'=>$email,
                'imagem_idImagem'=>1,
                'login_idLogin'=>1,
);

//"INSERT INTO $tableName (".implode(',', array_keys($data)).") VALUES (".implode(',', array_fill(0, count($data), '?')).")"
$imprime1 =$db->InsertCrud($tabe,$data);    
echo"<h1>$imprime1</h1>";
$idlogin=$db->UtimoIDinserido();
?>

