<?php 
    $nm_page ="Membros";
    require("header.php");
?>
<body>
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

if(isset($_REQUEST['submit exl']) and $_REQUEST['submit exl']!=""){
    extract($_REQUEST);
    $id=$_REQUEST['idEx'];
    $drop=$db->DeleteCrud("membro",$id);
  
}

$imprime3= $db->SelectAllCrud("$tabe","*");

if(count($imprime3)>0){
    $s	=	'';
    foreach($imprime3 as $val){
     $s++;
     //idmembro	nome	data_nacimento	cpf	endereco	telefone	email	imagem_idImagem	login_idLogin 	

     $imprime4=$db->SelectCRUD("imagem","imagem","AND idImagem LIKE $val[imagem_idImagem]")
?>
   
   <div id="item" class="row border border-dark rounded">
        <div id="membro" class="row p-2 m-1">
            <div class="row m-1">
                <div class="col col-lg-4 m-1 ">
                    <img class="d-block p-2" src="$imprime4 image/gif" 
                    style="max-width:250px; max-height:150px;   margin-left: auto;  margin-right: auto;">
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
             <form action="editar_livro.php" method="post">
                <input type="hidden" name="id" value=" <?php echo"$val[idlivro]";?>"/>
                <input type="submit" name="edit" class="btn btn-warning"value="Editar livro" />
            </form>
            <br/>
            <form action="#">
                <input type="hidden" name="idEx" value=" <?php echo"$val[idlivro]";?>" id="exl"/>
                <input type="submit exl" name="exl" class="btn btn-danger" value="Excluir Livro" />
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
