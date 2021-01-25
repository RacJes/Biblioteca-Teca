<?php 
    $nm_page ="Livros";
    require("header.php");
?>
<body>
<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
<?php 
    include("carrosel.php");
    require("navbar.php"); 
    include("../conectar.php");?>
    
<div id="conteudo" class="container justify-content-center " style="block-size: 15px; writing-mode: horizontal-tb;">

    <div id="titulo" class="row d-flex justify-content-center ">
        <h2 class="text-center font-weight-bold"><ins>Livros</ins></h2>
    </div>

    <!-- inicio do livro -->    

    <?php
         
$tabe="livro";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $table=$_REQUEST['dropTab'];
    $id=array(
        'idlivro'=>$_REQUEST['dropID'],
    );
    $drop=$db->DeleteCrud($table,$id);
}

$imprime3= $db->SelectAllCrud("$tabe","*");

if(count($imprime3)>0){
    $s	=	'';
    foreach($imprime3 as $val){
     $s++;
     //idlivro	titulo	autor	editora	isbn	sinopse	imagem_idImagem 	
?>
    <div id="livro" class="row  d-flex justify-content-center border border-dark rounded">
        
        <div class="col "> 
            <div class="row ">
                <img class="d-block p-2" src="../images/teste.jpg" 
                style="max-width:300px; max-height:160px;   margin-left: auto;  margin-right: auto;">
            </div>
        </div>

        <div id="conteudo" class="col col-md-6"  style="margin-top:2%;">
            <h2><?php echo"$val[titulo]"?> </h2>
            <?php echo mb_strimwidth($val["sinopse"], 0, 145, "...");
            ?>
        
        </div>

        <div class="d-flex flex-column" style="text-align: center; margin-top:2%" >
                
                <div class="p-2 ">
                    <b>Editora :</b><br/>
                    <?php echo"$val[editora]"?> 
                </div>
            
                
                <div class="p-2 " >
                    <b>ISBN : </b><br/>
                    <?php echo"$val[isbn]"?> 
                </div>
            
        </div>
        <div class="d-flex flex-column" style="margin-top:0.5%; margin-bottom:0.5%; margin-right:1%;" >    
        <center>   
             <form action="editar_livro.php" method="post">
                <input type="hidden" name="id" value=" <?php echo"$val[idlivro]";?>"/>
                <input type="submit" class="btn btn-warning"value="Editar livro" />
            </form>
            <br/>
            <form  method="POST">
                <input type="hidden" name="dropTab" value="livro" id="exl"/>
                <input type="hidden" name="dropID" value="<?php echo"$val[idlivro]";?>" id="exl"/>
                <input type="submit" name="submit" value="Excluir" id="submit"  class="btn btn-danger"/>
            </form>
        </center>    
        </div>  
       
                
    </div><!-- fehca div conteudo livro -->
        <br>
    <?php 
            }
        }else{}
        ?> 
</div>



</div><!-- div content-->
</div><!-- div wrapper-->
