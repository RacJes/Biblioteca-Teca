<?php
    include("../conectar.php");
    
    session_start();
    
    if( !empty($_SESSION['biblioteca']) ){

    }else{
        header("location: login.php");
    }
    
?>
<?php
    $mensagemModal='';
    $TituloModal='';

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
    extract($_REQUEST);

    $cpf=$_REQUEST['cpf'];
    $codLivro=$_REQUEST['codLivro'];
    $cond1='AND cpf ="'.$cpf.'"';
    $cond2='AND livro_idlivro ="'.$codLivro.'"';
    $idmembro=$db->SelectCRUD('membro','idmembro',$cond1,'');
    $estoque=$db->SelectCRUD('estoque','idEstoque',$cond2,'');

    //$idmembro=$idmembroS['idmembro'];
    //$estoque=$estoqueS['idEstoque'];

    $data_Inc=date('Y/m/d');;
    $data_Fin=date('Y/m/d', strtotime('+15 days'));;

    $userCount	=	$db->numeroLinhas('emprestimo','idemprestimo');
    $dataMem	=	array(
                    'data_incial'=>$data_Inc,
                    'data_enterga'=>$data_Fin,
                    'status'=>1,
                    'estoque_idEstoque'=>$estoque,
                    'membro_idmembro'=>$idmembro,
    );
    
    $mebroIn =$db->InsertCrud('emprestimo',$dataMem);  

}else{
    $TituloModal='ERRO';
    $mensagemModal='Erro No Cadastro';

}       
?>
<?php 
    $nm_page ="Alugueis";
    require("header.php");
?>

<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
<?php 
    include("carrosel.php");
    require("navbar.php"); ?>
    
<div id="conteudo" class="container  w-75 justify-content-center">

    <div id="titulo" class="row d-flex justify-content-center">
        <h2 class="text-center font-weight-bold"><ins> Emprestar Livro</ins></h2>
    </div>
    
    <div id="corpo" class="row  d-flex justify-content-center">
        <div class="col">
        Cadastro dos alugueis de livros, o sistema vai pegar o livro e cadastrar junto com um membro.
        Após isso ele vai coletar a data atual e a data de entrega para calcular a devolução.
        </div>
    </div>
    <form class="form-group border border-dark rounded p-2" method="POST">
    <div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">
                <b><label for=codLivro>*Codigo do livro</label></b>
                <input type="number" class="form-control" name="codLivro"  placeholder="0000">
            </div>    
            <div class="form-group col-md-4">    
                <b><label for=autor>*CPF do Membro</label></b>
                <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00">
            </div>
    </div>
   
    <div class="row justify-content-center w-100" style="margin-left:0.1%;" >    
            <div class="col ">
                <form action="#">
                    <button type="button submit" name="submit" value="submit" id="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Validar</button>
                </form>
                <br/>
            </div>
        </div>
    
</div>

</div><!-- div content-->
</div><!-- div wrapper-->
