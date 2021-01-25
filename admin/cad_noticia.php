<?php
    include("../conectar.php");

    if($_Session['biblioteca']){
        header("location: listar_noticia.php");
     }
     else{
         header("location: login.php");
     }
?>
<?php

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
    extract($_REQUEST);
// aqui vai se tudo tiver preenchido
    $titulo=$_REQUEST['titulo'];
    $autor =$_REQUEST['autor'];
    $date =$_REQUEST['date'];
    $noticia =$_REQUEST['noticia'];

    $userCount	=	$db->numeroLinhas('imagem','idImagem');
    $nomeI="NameNoticia";
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
    
            }
        }
        else {
            echo"Você não realizou o upload de forma satisfatória.";
        }
    }  
    
    $userCount	=	$db->numeroLinhas('noticias','idNoticias');
    $datanot	=	array(
                    'titulo'=>$titulo,
                    'data_publicao'=>$date,
                    'autor'=>$autor,
                    'texto'=>$noticia,
                    'imagem_idImagem'=>$idimagem,

    );
    
    $NotIn =$db->InsertCrud('noticias',$datanot);  

}      
?>
<?php 
    $nm_page ="Cadastrar Noticia";
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
        <h2 class="text-center font-weight-bold"><ins> Publicar Noticia</ins></h2>
    </div>
    
    <div id="corpo" class="row  d-flex justify-content-center">
        <div class="col">
        Aqui você poderá colocar todas as noticias interessantes, caso não preencha o nome do autor, o sistema vai colocar o nome do seu
        usuario, caso não coloque data , o sistema irá preencher com a data atual do servidor.
        O titulo e a descrição são necessáriamente importantes por, sem eles a noticia não será postada.
        </div>
    </div>
    <form class="form-group border border-dark rounded p-2" method="POST" enctype="multipart/form-data">
    <div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">
                <b><label for=titulo>*Titulo da Noticia</label></b>
                <input type="text" class="form-control" name="titulo"  placeholder="Titulo">
            </div>    
            <div class="form-group col-md-4">    
                <b><label for=autor>Autor</label></b>
                <input type="text" class="form-control" name="autor" placeholder="Autor">
            </div>
            <div class="form-group col-md-4">    
                <b><label for=date>Data da noticia</label></b>
                <input type="date" class="form-control" name="date">
            </div>
    </div>

          <div class="form-group col-md-4">    
                <b><label for= autor> Arquivo </label></b>
                <input type="file" name="arquivo"/>
            </div>

    <div class="row">
        <div class="form-group col-md-6">
            <div class="table-overflow">
                <table class="table">
                    <output id='result'>     
                </table>
            </div>    
        </div>
        <div class="form-group col-md-6">
            <b><label for="corpoNoticia">*Texto da noticia</label></b>
            <textarea class="form-control" name="noticia" rows="7"></textarea>
        </div>      
        <!-- https://stackoverflow.com/questions/20779983/multiple-image-upload-and-preview --> 
    </div>
    <div class="row justify-content-center w-100" style="margin-left:0.1%;" >    
            <div class="col ">
               
                    <input type="submit"name="submit" value="submit" id="submit" class="btn btn-primary btn-lg btn-block"   value="Cadastrar" />
                </form>
                <br/>
            </div>
        </div>
    
</div>

</div><!-- div content-->
</div><!-- div wrapper-->
