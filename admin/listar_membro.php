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

$imprime3= $db->SelectAllCrud("$tabe","*");

if(count($imprime3)>0){
    $s	=	'';
    foreach($imprime3 as $val){
     $s++;
     //idmembro	nome	data_nacimento	cpf	endereco	telefone	email	imagem_idImagem	login_idLogin 	
?>
   
   <div id="item" class="row border border-dark rounded">
        <div id="membro" class="row p-2 m-1">
            <div class="row m-1">
                <div class="col col-lg-4 m-1 ">
                    <img class="d-block p-2" src="../images/teste.jpg" 
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
            <div class=" " style=" margin-bottom:auto; margin-top:auto;" >
            <center>
                
               
                <form action="editar_membro.php" method="post">
                <input type="hidden" name="id" value=" <?php echo"$val[idmembro]";?>"/>
                <input type="submit" class="btn btn-warning" value="Editar" />
                </form>
                <br>
                <form action="editar_membro.php" method="post">
                <input type="hidden" name="id" value=" <?php echo"$val[idmembro]";?>"/>
                <input type="submit" class="btn btn-danger" value="Excluir" />
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
