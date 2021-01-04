<?php 
    $nm_page ="Alugueis";
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
        <h2 class="text-center font-weight-bold"><ins>Livros Atrasados</ins></h2>
    </div>

     <!-- inicio do membro e livro -->      
    <div id="item" class="row border border-dark rounded">
        <div class="row p-2" >
            <div class="row m-1">
                <div class="col ">
                    <img class="d-block p-2" src="../images/teste.jpg" 
                    style="max-width:300px; max-height:160px;   margin-left: auto;  margin-right: auto;">
                </div>
                <div class="col ">
                    <h3> Sr. Ardiloso Cortes </h3><br/>
                    <b>ISBN:</b><br/>
                    978-8501078803
                </div>
            
            <div class="col  ">
                    <img class="d-block p-2" src="../images/teste.jpg" 
                    style="max-width:300px; max-height:160px;   margin-left: auto;  margin-right: auto;">
                </div>
                <div class="col">
                    <h3> Rafael Jesus </h3><br/>
                    Tel : (12)9888-0000<br/>
                    End : SJC, Apolo, 15
                </div>
            </div>       
        </div><!-- fecha membro e livro -->
        
       <!-- botao --> 
        <div class="row justify-content-center w-100" style="margin-left:0.1%;" >    
            <div class="col ">
                <form action="#">
                    <center><b><label for="validar" >Entregue :</label></b></center>
                    <input type="submit" id="validar" class="btn btn-primary btn-lg btn-block"   value="Validar" />
                </form>
            </div>
        </div>                            
        <!-- fecha botao -->
    </div>
        <!-- fecha item -->
</div><!-- div content-->
</div><!-- div wrapper-->
