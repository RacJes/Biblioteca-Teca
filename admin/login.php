<?php $nm_pagina = "BTeca - Login"; ?>
<?php
     session_start(); 
/*
     if($_Session['biblioteca']== true){
        header("location: listar_noticia.php");
     }*/

//Incluiundo o Banco
include_once('../conectar.php');

?>

<?php
  
  $condition    =    '';
  if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
      extract($_REQUEST);
 // aqui vai se tudo tiver preenchido
  
          $condition .=    ' AND login LIKE "'.$_REQUEST['login'].'" ';
          $condition .=    ' AND senha LIKE "'.$_REQUEST['senha'].'" ';
  
          $userData    =    $db->SelectCRUD('login','*',$condition,'ORDER BY idLogin');
  
          if(count($userData)>0){
            $s    =    '';
            foreach($userData as $val){
              $s++;
              }
              //$_SESSION['biblioteca']=true;
              header("location: listar_noticia.php");
          }


  
        }
          


?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $nm_pagina; ?></title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body style="background: linear-gradient(180deg, rgba(219,216,134,1) 13%, rgba(46,46,46,1) 100%);">
<form method="POST">
<div class="container" >
    
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="col-lg-6 col-md-8 mx-auto">
                <!-- form card login -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">
                            Bibiloteca - Teca <br> Login
                        </h3>
                    </div>
                    <div class="card-body">
                            <p class="card-text">
                            <div class="form-group row ">
                        <label for="email" class="col-sm-3 col-form-label text-info text-right">Endereço de e-mail</label>
                        <div class="col">
                            <input type="email" class="form-control" id="email" name="login" placeholder="Insira seu e-mail" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label text-info text-right">Senha</label>
                        <div class="col">
                        <input type="password" class="form-control" id="password" name="senha" placeholder="Insira sua senha" required>
                        </div>
                    </div>

                </p>
                <div class="row align-items-center">
                    <div class="col">
                        <button type="submit" name="submit" value="submit" id="submit" class="btn bg-primary">Login</button>
                    </div>
                    <!--
                        <form class="form" name="formLogin" action="#" method="POST">
                        <form class="form" name="formLogin" action="cad_livro.php" method="POST">
                            <div class="form-group">
                                <label for="uname1">Usuario</label>
                                <input type="text" class="form-control form-control-lg rounded-0" name="user" id="uname1" required="">
                                <div class="invalid-feedback">por favor colocar login</div>
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control form-control-lg rounded-0" name="senha" id="senha">
                                <div class="invalid-feedback">
                                Coloque sua senha.
                                </div>
                            </div>
                            
                            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-success btn-lg btn-block">Login</button>
                        </form> 
                        -->
                    </div>
                    <!--/card-block-->
                </div>
                <!-- /form card login -->
            </div>
        </div>
        <!--/col-->
</div>
<!--/container--></form></html>