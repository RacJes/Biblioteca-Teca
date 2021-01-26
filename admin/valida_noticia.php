<?php echo htmlspecialchars($_POST['titulo']); ?><br>
<?php echo htmlspecialchars($_POST['autor']); ?><br>
<?php echo htmlspecialchars($_POST['date']); ?><br>
<?php echo htmlspecialchars($_POST['noticia']); ?><br>
<?php echo htmlspecialchars($_POST['idImag']); ?><br>
<?php echo htmlspecialchars($_POST['IdNoti']); ?><br>

<?php include("../conectar.php");

$tabe="noticias";

$titulo=$_POST['titulo'];
$autor =$_POST['autor'];
$date =$_POST['date'];
$noticia =$_POST['noticia'];
$idImag=$_POST['idImag'];
$idNoti =$_POST['IdNoti'];

$data	=	array(
                'titulo'=>$titulo,
                'data_publicao'=>$date,
                'autor'=>$autor,
                'texto'=>$noticia,
                'imagem_idImagem'=>$idImag,
    
);

$imprime3=$db->UpdateCrud($tabe, $data,array('idNoticias'=>$idNoti,));   

if($imprime3>0)
{
    $mensagemModal='Sucesso';
    $TituloModal='Deu Certo Sucesso';
    header("Location: listar_noticia.php");
}


?>

