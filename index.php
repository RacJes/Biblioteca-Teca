<?php 
    $nm_page ="Biblioteca-Teca"; 
    require("header.php");
 ?>
<body>
<div class="wrapper">
<?php require("sidebar.php"); ?>    

        <!-- Conteudo da pagina -->
    <div id="content">
     <?php 
     include("pesquisa.php");
     include("carrosel.php");
     include("conectar.php");?>

        <h2>Utilmas noticias</h2>
        <div class="row">
       <?php
        $limit=3;
        $imprime3= $db->SelectAllCrud("noticias","*",$limit);
        
        if(count($imprime3)>0){
            $s	=	'';
            foreach($imprime3 as $val){
            $s++;
       
        ?>

            <?php
          
                $text =" Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque saepe quasi recusandae quo labore praesentium ";
            echo"     <div class='col-1 col-sm-4'>
                        <img src='images/teste.jpg' class='img-thumbnail'>".mb_strimwidth($val["texto"], 0, 100, "...")."</div>";
               ?>  
        <?php 
            }
        }else{}
        ?>
         </div>
        <div style="color:#00a86b; text-align: right;">
            <a href="#" ><u>Ver mais ••></u></a>              
        </div>

      
        <br>
        <h2>Livros mais lidos</h2>
       
       <div class="row">
       <?php
        $limit=3;
        $imprime3= $db->SelectAllCrud("livro","*",$limit);
        
        if(count($imprime3)>0){
            $s	=	'';
            foreach($imprime3 as $val){
            $s++;
       
        ?>
       <?php
      
           
     echo"   
                <div class='col-1 col-sm-4'>
                <img src='images/teste.jpg' class='img-thumbnail'>".mb_strimwidth($val["titulo"], 0, 100, "...")."</div>";

           ?>
         <?php 
            }
        }else{}
        ?>
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