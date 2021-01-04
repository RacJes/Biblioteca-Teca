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
    require("navbar.php"); ?>
    
<div id="conteudo" class="container justify-content-center " style="block-size: 15px; writing-mode: horizontal-tb;">

    <div id="titulo" class="row d-flex justify-content-center ">
        <h2 class="text-center font-weight-bold"><ins>Livros</ins></h2>
    </div>

    <!-- inicio do livro -->    
    <div id="livro" class="row  d-flex justify-content-center border border-dark rounded">
        
        <div class="col "> 
            <div class="row ">
                <img class="d-block p-2" src="../images/teste.jpg" 
                style="max-width:300px; max-height:160px;   margin-left: auto;  margin-right: auto;">
            </div>
        </div>

        <div id="conteudo" class="col col-md-6"  style="margin-top:2%;">
            <h2>Nome do livro</h2>
            <?php $text="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum nam tempore, voluptatum aliquam placeat
             aspernatur fugiat non nihil? Laboriosam asperiores ex voluptatem fugit quaerat error rem amet culpa enim id.";
            echo mb_strimwidth($text, 0, 145, "...");
            ?>
        
        </div>

        <div class="d-flex flex-column" style="text-align: center; margin-top:2%" >
                
                <div class="p-2 ">
                    <b>Editora :</b><br/>
                    Alta Books
                </div>
            
                
                <div class="p-2 " >
                    <b>ISBN : </b><br/>
                978-8501078803
                </div>
            
        </div>
        <div class="d-flex flex-column" style="margin-top:0.5%; margin-bottom:0.5%; margin-right:1%;" >    
        <center>   
            <form action="#">
                <input type="submit" class="btn btn-success" value="Ver Livro" />
            </form>
            <br/>
            <form action="#">
                <input type="submit" class="btn btn-warning"value="Editar livro" />
            </form>
            <br/>
            <form action="#">
                <input type="submit" class="btn btn-danger" value="Excluir Livro" />
            </form>
        </center>    
        </div>       
    </div><!-- fehca div conteudo livro -->
    <br/>
   
    <br/>
</div>



</div><!-- div content-->
</div><!-- div wrapper-->
