<?php echo htmlspecialchars($_POST['nome']); ?><br>
<?php echo htmlspecialchars($_POST['cpf']); ?><br>
<?php echo htmlspecialchars($_POST['telefone']); ?><br>
<?php echo htmlspecialchars($_POST['endereco']); ?><br>
<?php echo htmlspecialchars($_POST['email']); ?><br>
<?php echo htmlspecialchars($_POST['nascimento']); ?><br>
<?php include("../conectar.php");

$tabe="membro";
$nome=$_POST['nome'];
$cpf =$_POST['cpf'];
$telefone =$_POST['telefone'];
$endereco =$_POST['endereco'];
$email=$_POST['email'];
$nascimento =$_POST['nascimento'];
$idmemb=$_POST['IdMemb'];
$idImge=$_POST['idImag'];
$idLogin=$_POST['idlogi'];


$data	=	array(
                'nome'=>$nome,
                'data_nacimento'=>$nascimento,
                'cpf'=>$cpf,
                'endereco'=>$endereco,
                'telefone'=>$telefone,
                'email'=>$email,
                'imagem_idImagem'=>$idImge,
                'login_idLogin'=>$idLogin,
);

//"INSERT INTO $tableName (".implode(',', array_keys($data)).") VALUES (".implode(',', array_fill(0, count($data), '?')).")"
$imprime3=$db->UpdateCrud($tabe, $data,array('idmembro'=>$idmemb,));   

if($imprime3>0)
{
    $mensagemModal='Sucesso';
    $TituloModal='Deu Certo Sucesso';
    header("Location: listar_membro.php");
}

?>

