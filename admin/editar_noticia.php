<?php

    session_start();
    
    if( !empty($_SESSION['biblioteca']) ){

    }else{
        header("location: login.php");
    }
    

    $nm_page ="Cadastrar Noticia";
    require("header.php");
?>
<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
<?php
    include("carrosel.php");
    require("navbar.php");
    include("../conectar.php");

    $condition =    ' AND idNoticias = "'.$_POST["id"].'" ';
    $imprime4  =    $db->SelectCRUD('noticias','*',$condition,'');
    if(count($imprime4)>0){
        $s	=	'';
        foreach($imprime4 as $val){
         $s++;
    ?>

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
    <form class="form-group border border-dark rounded p-2" method="POST" action="valida_noticia.php">
    <div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">
                <b><label for=titulo>*Titulo da Noticia</label></b>
                <input type="text" class="form-control" name="titulo"  value="<?php echo"$val[titulo]"?>">
            </div>    
            <div class="form-group col-md-4">    
                <b><label for=autor>Autor</label></b>
                <input type="text" class="form-control" name="autor" value="<?php echo"$val[autor]"?>">
            </div>
            <div class="form-group col-md-4">    
                <b><label for=date>Data da noticia</label></b>
                <input type="date" class="form-control" name="date" value="<?php echo"$val[data_publicao]"?>">
            </div>
            <div class="form-group col-md-6">
                <b><label for="corpoNoticia">*Texto da noticia</label></b>
                <textarea class="form-control" name="noticia" rows="7" value="<?php echo"$val[texto]"?>">"<?php echo"$val[texto]"?>"</textarea>
            </div>

            <input type="hidden" name="IdNoti" value="<?php echo"$val[idNoticias]"?>"/>
            <input type="hidden" name="idImag" value="<?php echo"$val[imagem_idImagem]"?>"/>
    </div>
  
    <div class="row justify-content-center w-100" style="margin-left:0.1%;" >    
            <div class="col ">
               
                    <input type="submit" id="validar" class="btn btn-primary btn-lg btn-block"   value="Altera" />
                </form>
                <br/>
            </div>
        </div>
    
</div>
<?php 
    }
}else{}
?> 
</div><!-- div content-->
</div><!-- div wrapper-->
