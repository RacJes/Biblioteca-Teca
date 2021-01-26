<?php 
    $nm_page ="Membros";
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
    include("../conectar.php");

    ?>  
<div id="conteudo" class="container justify-content-center " style="block-size: 15px; writing-mode: horizontal-tb;">

    <div id="titulo" class="row d-flex justify-content-center ">
        <h2 class="text-center font-weight-bold"><ins>Membros da Biblioteca</ins></h2>
    </div>

     <!-- inicio do membro e livro --> 
<?php
         
$tabe="membro";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $table=$_REQUEST['dropTab'];
    $id=array(
        'idmembro'=>$_REQUEST['dropID'],
    );
    $drop=$db->DeleteCrud($table,$id);
}

$imprime3= $db->SelectAllCrud("$tabe","*");

if(count($imprime3)>0){
    $s	=	'';
    foreach($imprime3 as $val){
     $s++;
     //idmembro	nome	data_nacimento	cpf	endereco	telefone	email	imagem_idImagem	login_idLogin 	
     $imprime4=$db->SelectCRUD("imagem","imagem","AND idImagem = $val[imagem_idImagem]");
     
?>
   
   <div id="item" class="row border border-dark rounded">
        <div id="membro" class="row p-2 m-1">
            <div class="row m-1">
                <div class="col col-lg-4 m-1 ">
                <?php 
                    
                    $caminho="getImagem.php?PicNum=$val[imagem_idImagem]";
                
                ?>
                    <img class="d-block p-2" src="<?php echo"$caminho"?>" style="max-width:250px; max-height:150px; margin-left: auto; margin-right:auto;">
                </div>
                <div class="col">
                    <h3> <?php echo"$val[nome]"?> </h3>
                    <div class="row">   
                        <div class="col"> <b>Tel : </b><?php echo"$val[telefone]"?></div>
                        <div class="w-100"></div>
                        <div class="col"> <b>CPF : </b> <?php echo"$val[cpf]"?></div>
                        <div class="w-100"></div>
                        <div class="col"><b>End : </b> <?php echo"$val[endereco]"?>5</div>
                        <div class="w-100"></div>
                        <div class="col"><b>Aniversário : </b>  <?php echo"$val[data_nacimento]"?></div>
                        <div class="w-100"></div>
                        <div class="col"><b>Email : </b> <?php echo"$val[email]"?></div>
                    </div>
                </div>
                <div class="d-flex flex-column" style="margin-top:0.5%; margin-bottom:0.5%; margin-right:1%;" >    
        <center>   
             <form action="editar_membro.php" method="post">
                <input type="hidden" name="id" value=" <?php echo"$val[idmembro]";?>"/>
                <input type="submit" name="edit" class="btn btn-warning"value="Editar Membro" />
            </form>
            <br/>
            <form  method="POST">
                <input type="hidden" name="dropTab" value="membro" id="exl"/>
                <input type="hidden" name="dropID" value="<?php echo"$val[idmembro]";?>" id="exl"/>
                <input type="submit" name="submit" value="Excluir" id="submit"  class="btn btn-danger"/>
            </form>
        </center>    
        </div>          
        </div><!-- fecha membro e livro -->                        
        <!-- fecha botao -->
    </div>
   </div><br>

<?php 
    }
}else{}
?> 
        <!-- fecha item -->
</div><!-- div content-->
</div><!-- div wrapper-->
