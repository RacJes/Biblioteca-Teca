<?php 

    session_start();
        
    if( !empty($_SESSION['biblioteca']) ){

    }else{
        header("location: login.php");
    }

    $nm_page ="Alugueis";
    require("header.php");
?>

<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
<?php 
    include("carrosel.php");
    require("navbar.php"); ?>
    
<div id="conteudo" class="container justify-content-center " style="block-size: 15px; writing-mode: horizontal-tb;">

    <div id="titulo" class="row d-flex justify-content-center ">
        <h2 class="text-center font-weight-bold"><ins>Todos livros Alugados</ins></h2>
    </div>

     <!-- inicio do membro e livro -->      
    <div id="item" class="row border border-dark rounded">
        
    <div class="col m-1 d-flex justify-content-center">
        <pre><b>Data de retirada :</b> <u>12/12/2020</u>      <b>Data de entrega :</b> <u>08/01/2020</u></pre>
    </div>
             
        <div class="row p-2 m-1 " >
        
            <div id="livro" class="row m-1">
                <div class="col">
                    <img class="d-block p-2" src="../images/teste.jpg" 
                    style="max-width:300px; max-height:160px;   margin-left: auto;  margin-right: auto;">
                </div>
                <div class="col ">
                    <h3> Sr. Ardiloso Cortes </h3><br/>
                    <b>ISBN:</b><br/>
                    978-8501078803
                </div>
            
            <div id="membro"class="col">
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
                    <center><b><label for="validar" >Situação: <b class="bg-info">No prazo</b></label></b></center>
                    <input type="submit" id="validar" class="btn btn-primary btn-lg btn-block"   value="Validar" />
                </form>
                <br/>
            </div>
        </div>                            
        <!-- fecha botao -->
    </div>
        <!-- fecha item --> 
    <br/>
</div><!-- div content-->
</div>
</div><!-- div wrapper-->
