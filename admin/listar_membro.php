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
    require("navbar.php"); ?>
    
<div id="conteudo" class="container justify-content-center " style="block-size: 15px; writing-mode: horizontal-tb;">

    <div id="titulo" class="row d-flex justify-content-center ">
        <h2 class="text-center font-weight-bold"><ins>Membros da Biblioteca</ins></h2>
    </div>

     <!-- inicio do membro e livro -->      
    <div id="item" class="row border border-dark rounded">
        <div id="membro" class="row p-2 m-1">
            <div class="row m-1">
                <div class="col col-lg-4 m-1 ">
                    <img class="d-block p-2" src="../images/teste.jpg" 
                    style="max-width:250px; max-height:150px;   margin-left: auto;  margin-right: auto;">
                </div>
                <div class="col">
                    <h3> Rafael Jesus </h3>
                    <div class="row">   
                        <div class="col"> <b>Tel : </b>(12) 98888-0000</div>
                        <div class="w-100"></div>
                        <div class="col"> <b>CPF : </b> 000.000.000.00</div>
                        <div class="w-100"></div>
                        <div class="col"><b>End : </b>SJC, Rua apolo, 45</div>
                        <div class="w-100"></div>
                        <div class="col"><b>Aniversário : </b> 26/01/1995</div>
                        <div class="w-100"></div>
                        <div class="col"><b>Email : </b>Raf.Jes@hotmail.com</div>
                    </div>
                </div>
            <div class="col col-mx" style=" margin-bottom:auto; margin-top:auto;" >
            <center>
                <form action="#">
                    <input type="submit" class="btn btn-warning"value="Editar membro" />
                </form>
                <br/>
                <form action="#">
                    <input type="submit" class="btn btn-danger" value="Excluir Membro" />
                </form>
            </center>
            </div>           
        </div><!-- fecha membro e livro -->                        
        <!-- fecha botao -->
    </div>
        <!-- fecha item -->
</div><!-- div content-->
</div><!-- div wrapper-->
