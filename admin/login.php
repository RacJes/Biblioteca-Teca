<?php $nm_pagina = "BTeca - Login"; ?>
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
                        <form class="form" name="formLogin" action="#" method="POST">
                            <div class="form-group">
                                <label for="uname1">Usuario</label>
                                <input type="text" class="form-control form-control-lg rounded-0" name="user" id="uname1" required="">
                                <div class="invalid-feedback">por favor colocar l ogin</div>
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control form-control-lg rounded-0" name="senha">
                                <div class="invalid-feedback">
                                Coloque sua senha.
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-lg btn-block" id="btnLogin">Login</button>
                        </form> 
                    </div>
                    <!--/card-block-->
                </div>
                <!-- /form card login -->
            </div>
        </div>
        <!--/col-->
</div>
<!--/container--></html>