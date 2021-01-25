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
// aqui vai se tudo tiver preenchido

    $titulo=$_REQUEST['titulo'];
    $autor=$_REQUEST['autor'];
    $editora=$_REQUEST['editor'];
    $isbn=$_REQUEST['isbn'];
    $sinopse=$_REQUEST['sinopse'];
    $estoque=$_REQUEST['estoque'];

    $userCount	=	$db->numeroLinhas('imagem','idImagem');
    $nomeI="NameLivro";
    //MEU DEUS NUNCA QUERO TRABLHAR COM IMAGEM NA MINHA VIDA POIS QUE COISA CHATA
    if (isset($_FILES['arquivo'])) {
        $imagem = $_FILES["arquivo"];

        if($imagem != NULL) {
            $nomeFinal = time().'.jpg';
            if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
                $tamanhoImg = filesize($nomeFinal);
                
                $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
                
                $dataima	=	array(
                    'nome'=>$nomeI,
                    'imagem'=>"'$mysqlImg'",
                
                );
    
                $imaIn =$db->InsertCrud('imagem',$dataima);
                //mysql_query("INSERT INTO PESSOA (PES_IMG) VALUES ('$mysqlImg')") or
                $idimagem=$db->UtimoIDinserido();
                unlink($nomeFinal);


                $userCount	=	$db->numeroLinhas('livro','idlivro');
                $dataLiv	=	array(
                                'titulo'=>$titulo,
                                'autor'=>$autor,
                                'editora'=>$editora,
                                'isbn'=>$isbn,
                                'sinopse'=>$sinopse,
                                'imagem_idImagem'=>$idimagem,
    
                );
            
                $LivIn =$db->InsertCrud('livro',$dataLiv);  
                $idLivro=$db->UtimoIDinserido();
    
                $userCount	=	$db->numeroLinhas('estoque','idEstoque');
                $dataEst	=	array(
                                'quantidade'=>$estoque,
                                'livro_idlivro'=>$idLivro,
    
                );
                $EstIn =$db->InsertCrud('estoque',$dataEst);
                if($EstIn>0)
                {
                    $mensagemModal='Sucesso';
                    $TituloModal='Deu Certo Sucesso';
                }

 
                
            }
        }
        else {
               echo"Você não realizou o upload de forma satisfatória.";
        }
    }


}else{
    $TituloModal='ERRO';
    $mensagemModal='Erro No Cadastro';

}       
?>
<?php
    $nm_page ="Cadastrar Livros";
    require("header.php");
?>


<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
<?php 
    include("carrosel.php");
    require("navbar.php"); 
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
<form class="form-group border-dark border p-2 rounded" method="POST" enctype="multipart/form-data">

<div id="formulario" class="form-row" style="margin-top:2rem;">
        <div class="form-group col-md-3">
            <b><label for=titulo>*Titulo do livro</label></b>
            <input type="text" class="form-control" name="titulo"  placeholder="Titulo">
        </div>    
        <div class="form-group col-md-3">    
            <b><label for=autor>*Autor</label></b>
            <input type="text" class="form-control" name="autor" placeholder="Autor">
        </div>
        <div class="form-group col-md-3">    
            <b><label for=editor>Editora</label></b>
            <input type="text" class="form-control" name="editor" placeholder="Editora">
        </div>
        <div class="form-group col-md-3">    
            <b><label for=editor>ISBN</label></b>
            <input type="number" class="form-control" name="isbn" placeholder="isbn">
        </div>
        <div class="form-group col-md-3">    
            <b><label for=editor>Estoque</label></b>
            <input type="text" class="form-control" name="estoque" placeholder="estoque">
        </div>
</div>
<div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">    
                <b><label for=autor>Arquivo</label></b>
                <input type="file" name="arquivo"/>
            </div>
            
    </div>
<div class="row">
    <div class="form-group col-md-6">
        <b><label for="corpoNoticia">Sinopse</label></b>
        <textarea class="form-control" name="sinopse" id="corpoNoticia" rows="7"></textarea>
    </div>      
    <!-- https://stackoverflow.com/questions/20779983/multiple-image-upload-and-preview --> 
</div>
<div class="row w-100 " style="margin:auto;">
<!--<button type="sumit" name="submit" value="submit" id="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Enviar</button>-->
<button type="button submit" name="submit" value="submit" id="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Enviar</button>
</div>
</form>

</div>
</div><!-- div content-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo "$TituloModal";?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo "$mensagemModal";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div><!-- div wrapper-->
