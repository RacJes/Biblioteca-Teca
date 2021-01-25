<?php include("../conectar.php");

$titulo=$_REQUEST['titulo'];
$autor=$_REQUEST['autor'];
$editora=$_REQUEST['editor'];
$isbn=$_REQUEST['isbn'];
$sinopse=$_REQUEST['sinopse'];
$estoque=$_REQUEST['estoque'];
$idlivro=$_REQUEST['id'];

$dataLiv	=	array(
                'titulo'=>$titulo,
                'autor'=>$autor,
                'editora'=>$editora,
                'isbn'=>$isbn,
                'sinopse'=>$sinopse,

);
$imprime2=$db->UpdateCrud('livro', $dataLiv,array('idlivro'=>$idlivro,));


$dataEst	=	array(
                'quantidade'=>$estoque,
                'livro_idlivro'=>$idlivro,

);

$condition = ' AND livro_idlivro = "'.$idlivro.'"';;
$idestoque=$db->SelectCRUD('estoque','idEstoque',$condition,'');
$idEstoques;
if(count($idestoque)>0){
    $s	=	'';
    foreach($idestoque as $val1){
     $s++;
     $idEstoques=$val1['idEstoque'];
    }
}else{}

$imprime3=$db->UpdateCrud('estoque', $dataEst,array('idEstoque'=>$idEstoques,));

if($imprime3>0)
{
    $mensagemModal='Sucesso';
    $TituloModal='Deu Certo Sucesso';
    header("Location: listar_livro.php");
}

//$imprime3=$db->UpdateCrud('estoque', $dataEst,array('idEstoque'=>$idestoque,));


?>

