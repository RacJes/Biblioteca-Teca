<?php 
    $nm_page ="Livros";
    require("header.php");
    
    session_start();
    
    if( !empty($_SESSION['biblioteca']) ){

    }else{
        header("location: login.php");
    }
    
?>

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
    $idtable=$_REQUEST['dropID'];

    $condition = ' AND livro_idlivro = "'.$idtable.'"';;
    $idestoque=$db->SelectCRUD('estoque','idEstoque',$condition,'');
    $idEstoques;
    if(count($idestoque)>0){
    $s	=	'';
        foreach($idestoque as $val1){
        $s++;
        $idEstoques=$val1['idEstoque'];

        $imprime3=$db->DeleteCrud('estoque',array('idEstoque'=>$idEstoques,));
           
        }
    }else{}

    $id=array(
        'idlivro'=>$idtable,
    );
    $drop=$db->DeleteCrud($tabe,$id);
}

?>
<?php
$imprime3= $db->SelectAllCrud("livro","*");
$cont=0;
if(count($imprime3)>0){
    $s	=	'';
    foreach($imprime3 as $val){
     $s++;
     //idlivro	titulo	autor	editora	isbn	sinopse	imagem_idImagem 	
?>
    <div id="livro" class="row  d-flex justify-content-center border border-dark rounded">
        
    <div class="col col-lg-4 m-1 ">
                <?php 
                    
                    $caminho="getImagem.php?PicNum=$val[imagem_idImagem]";
                
                ?>
                    <img class="d-block p-2" src="<?php echo"$caminho"?>" style="max-width:250px; max-height:150px; margin-left: auto; margin-right:auto;">
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
                <input type="hidden" name="id" value="<?php echo"$val[idlivro]";?>"/>
                <input type="submit" class="btn btn-warning"value="Editar livro" />
            </form>
            <br/>

       
            <form  method="POST">
                        <input type="hidden" name="dropID" value="<?php echo"$val[idlivro]"?> "/>
                        <input type="submit" name="submit" 
                        id="excluir" value="Excluir Livro" class="btn btn-danger"/>
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
