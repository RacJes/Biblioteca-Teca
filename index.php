<?php require("header.php"); ?>
<body>

<div class="wrapper">
<?php require("sidebar.php"); ?>    

        <!-- Conteudo da pagina -->
    <div id="content">
     <?php include("pesquisaEcarrosel.php");?>

        <h2>Utilmas noticias</h2>
       
        <div class="row">
            <?php
            for ($i = 1; $i <= 3; $i++) {
                $text =" Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque saepe quasi recusandae quo labore praesentium ";
            echo"     <div class='col-1 col-sm-4'>
                        <img src='images/teste.jpg' class='img-thumbnail'>".mb_strimwidth($text, 0, 100, "...")."</div>";
                } ?>
    
        </div>
        <div style="color:#00a86b; text-align: right;">
            <a href="#" ><u>Ver mais ••></u></a>              
        </div>

        <br>
        <h2>Livros mais lidos</h2>
       
       <div class="row">
       <?php
       for ($i = 1; $i <= 3; $i++) {
           $text =" Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque saepe quasi recusandae quo labore praesentium ";
     echo"     <div class='col-1 col-sm-4'>
                   <img src='images/teste.jpg' class='img-thumbnail'>".mb_strimwidth($text, 0, 100, "...")."</div>";
            } ?>
         
       </div>
       <div style="color:#00a86b; text-align: right;">
             <a href="#" ><u>Ver mais ••></u></a>              
        </div>

        <br>
        <h2>Adicionados Recentemente</h2>
       
       <div class="row">
       <?php
       for ($i = 1; $i <= 3; $i++) {
           $text =" Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque saepe quasi recusandae quo labore praesentium ";
     echo"     <div class='col-1 col-sm-4'>
                   <img src='images/teste.jpg' class='img-thumbnail'>".mb_strimwidth($text, 0, 100, "...")."</div>";
            } ?>
         
       </div>
       <div style="color:#00a86b; text-align: right;">
             <a href="#" ><u>Ver mais ••></u></a>              
        </div>

          
        </div>
</div>
</body>

</html>