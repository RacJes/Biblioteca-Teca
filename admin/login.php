<?php $nm_pagina = "BTeca - Login"; ?>
<?php
 
//Incluiundo o Banco
include_once('../conectar.php');

?>

<?php
  

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

<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="login"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Login é obrigatório!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="senha"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Senha é obrigatório!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Usuário incorreto. <strong>Tente novamente!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Usuário (privilégio) não encontrado! </div>';

		}

?>

<body style="background: linear-gradient(180deg, rgba(219,216,134,1) 13%, rgba(46,46,46,1) 100%);">
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
<!--/container--></html>