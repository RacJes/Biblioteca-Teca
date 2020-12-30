<!DOCTYPE html>
<html>

<head>
        <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4>Biblioteca - Teca</h4>
        </div>

        <ul class="list-unstyled components">
            
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="admin/login.php">Login</a>
            </li>
        </ul>
    </nav>

        <!-- Conteudo da pagina -->
    <div id="content">
     
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <input type="text" class="form-control" placeholder="Pesquisa">

                
            
        </nav>
 <!-- Carrosel -->
 <center> <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                  
                    
                     <img class="d-block w-25" src="images/teste.jpg" href="http://google.com" alt="First slide">
                    
                  
            </div>
            <div class="carousel-item">
                <a hrfe="#">
                <img class="d-block w-25" src="images/teste2.jpg" alt="Second slide">
                </a>
            </div>
            <div class="carousel-item">
                <a hrfe="#">
                <img class="d-block w-25" src="images/teste3.jpg" alt="Third slide">
                </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div></center>
    <!-- Fim carrosel -->
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

            <!-- jQuery CDN - Slim version (=without AJAX) -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <!-- Popper.JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <!-- Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                        $(this).toggleClass('active');
                    });
                });
            </script>
        </div>
</div>
</body>

</html>