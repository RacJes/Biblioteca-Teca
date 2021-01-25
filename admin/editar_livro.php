<?php 
    $nm_page ="Editar Livros";
    require("header.php");

    include("../conectar.php");

    session_start();
    
    if( !empty($_SESSION['biblioteca']) ){
        $idlivro=$_SESSION['id'];
    }else{
        header("location: login.php");
    }


?>
<?php
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
    extract($_REQUEST);
            // aqui vai se tudo tiver preenchido
                $titulo=$_REQUEST['titulo'];
                $autor=$_REQUEST['autor'];
                $editora=$_REQUEST['editor'];
                $isbn=$_REQUEST['isbn'];
                $sinopse=$_REQUEST['sinopse'];
                $estoque=$_REQUEST['estoque'];


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

                $condition =    ' AND livro_idlivro LIKE "'.$idlivro.'" ';
                $idestoque=$db->SelectCRUD('estoque','idEstoque',$condition,'');

                $imprime3=$db->UpdateCrud('estoque', $dataEst,array('idEstoque'=>$idestoque,));
                if($imprime3>0)
                {
                    $mensagemModal='Sucesso';
                    $TituloModal='Deu Certo Sucesso';
                }
     }


?>
<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
<?php 
    include("carrosel.php");
    require("navbar.php");

    
    $condition =    ' AND idlivro = "'.$idlivro.'" ';
    $imprime4  =    $db->SelectCRUD('livro','*',$condition,'');
    if(count($imprime4)>0){
        $s	=	'';
        foreach($imprime4 as $val){
         $s++;
    ?>

    
    <div id="conteudo" class="container  w-75 justify-content-center">

    <div id="titulo" class="row d-flex justify-content-center">
        <h2 class="text-center font-weight-bold"><ins> Cadastrar Livro</ins></h2>
    </div>

    <div id="corpo" class="row  d-flex justify-content-center">
        <div class="col">
        Aqui você cadastrar novos livros, caso não coloque data , o sistema irá preencher com a data atual do servidor.
        O titulo e o autor são necessáriamente importantes por, sem eles o livro não será cadastrado.
        </div>
    </div>
    <form class="form-group border-dark border p-2 rounded"  method="POST">

        <div id="formulario" class="form-row" style="margin-top:2rem;">
                <div class="form-group col-md-3">
                    <b><label for=titulo>*Titulo do livro</label></b>
                    <input type="text" class="form-control" name="titulo"  value="<?php echo"$val[titulo]"?>">
                </div>    
                <div class="form-group col-md-3">    
                    <b><label for=autor>*Autor</label></b>
                    <input type="text" class="form-control" name="autor" value="<?php echo"$val[autor]"?>">
                </div>
                <div class="form-group col-md-3">    
                    <b><label for=editor>Editora</label></b>
                    <input type="text" class="form-control" name="editor" value="<?php echo"$val[editora]"?>">
                </div>
                <div class="form-group col-md-3">    
                    <b><label for=editor>ISBN</label></b>
                    <input type="text" class="form-control" name="isbn" value="<?php echo"$val[isbn]"?>">
                </div>
                <div class="form-group col-md-3">    
                    <b><label for=editor>Estoque</label></b>
                    <input type="text" class="form-control" name="estoque" placeholder="estoque">
                </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <b><label for="corpoNoticia">Sinopse</label></b>
                <textarea class="form-control" name="sinopse" id="corpoNoticia" rows="7"><?php echo"$val[sinopse]"?></textarea>
            </div>      
            <!-- https://stackoverflow.com/questions/20779983/multiple-image-upload-and-preview --> 
        </div>
        <div class="row w-100 " style="margin:auto;">
            <button type="sumit" name="files" class="btn btn-primary btn-lg btn-block">Enviar</button>
        </div>
    </form>
</div>
<?php 
    }
}else{}
?> 
</div><!-- div content-->
</div><!-- div wrapper-->