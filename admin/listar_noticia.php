<?php 
    $nm_page ="Listar Noticias";
    require("header.php");
?>
<body>
<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
<?php 
    include("carrosel.php");
    require("navbar.php");
    include("../conectar.php") ?>
    
<div id="conteudo" class="container justify-content-center " style="block-size: 15px; writing-mode: horizontal-tb;">

    <div id="titulo" class="row d-flex justify-content-center ">
        <h2 class="text-center font-weight-bold"><ins>Listar noticias</ins></h2>
    </div>

    <!-- inicio do livro -->   
    <?php
         
$tabe="noticias";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $table=$_REQUEST['dropTab'];
    $id=array(
        'idNoticias'=>$_REQUEST['dropID'],
    );
    $drop=$db->DeleteCrud($table,$id);
}

$imprime3= $db->SelectAllCrud("$tabe","*");

if(count($imprime3)>0){
    $s	=	'';
    foreach($imprime3 as $val){
     $s++;
     //idNoticias	titulo	data_publicao	autor	texto	imagem_idImagem 	
?> 
    <div id="livro" class="row  d-flex justify-content-center border border-dark rounded">
        
        <div class="col "> 
            <div class="row ">
                <img class="d-block p-2" src="../images/teste.jpg" 
                style="max-width:300px; max-height:160px;   margin-left: auto;  margin-right: auto;">
            </div>
        </div>

        <div id="conteudo" class="col col-md-6"  style="margin-top:2%;">
            <h2><?php echo"$val[titulo]"?></h2>
            <?php 
            echo mb_strimwidth($val["texto"], 0, 145, "...");
            ?>
        
        </div>

        <div class="d-flex flex-column" style="text-align: center; margin-top:2%" >
                
                <div class="p-2 ">
                    <b>Autor :</b><br/>
                    <?php echo"$val[autor]"?>
                </div>
            
                
                <div class="p-2 " >
                    <b>Data: </b><br/>
                    <?php echo"$val[data_publicao]"?>
                </div>
            
        </div>
        <div class="d-flex flex-column" style="margin-top:0.5%; margin-bottom:0.5%; margin-right:1%;" >    
        <center>   
        
           
            <br/>
            <form action="editar_noticia.php" method="POST">
                <input type="hidden" name="id" value=" <?php echo"$val[idNoticias]";?>"/>
                <input type="submit" class="btn btn-warning"value="Editar Noticia" />
            </form>
            <br/>
            
            <form  method="POST">
                <input type="hidden" name="dropTab" value="noticias" id="exl"/>
                <input type="hidden" name="dropID" value="<?php echo"$val[idNoticias]";?>" id="exl"/>
                <input type="submit" name="submit" value="Excluir" id="submit"  class="btn btn-danger"/>
            </form>
        </center>    
        </div>       
    </div><!-- fehca div conteudo livro -->
    <br/>
    <?php 
    }
}else{}
?> 
    <br/>
</div>



</div><!-- div content-->
</div><!-- div wrapper-->