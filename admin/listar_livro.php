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
        <div class="d-flex flex-column" style="margin-top:1%; margin-right:1%;" >    
            <form action="https://google.com">
                <input type="submit" value="Go to Google" />
            </form>
            <br/>
            <form action="https://google.com">
                <input type="submit" value="Go to Google" />
            </form>
            <br/>
            <form action="https://google.com">
                <input type="submit" value="Go to Google" />
            </form> 
        </div>       
    </div><!-- fehca div conteudo livro -->
    <br/>
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
        <div class="d-flex flex-column" style="margin-top:1%; margin-right:1%;" >    
            <form action="https://google.com">
                <input type="submit" value="Go to Google" />
            </form>
            <br/>
            <form action="https://google.com">
                <input type="submit" value="Go to Google" />
            </form>
            <br/>
            <form action="https://google.com">
                <input type="submit" value="Go to Google" />
            </form> 
        </div>       
    </div><!-- fehca div conteudo livro -->
    <br/>
</div>



</div><!-- div content-->
</div><!-- div wrapper-->
