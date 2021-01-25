<?php
    include("../conectar.php");
?>
<?php

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
    extract($_REQUEST);
// aqui vai se tudo tiver preenchido
    $nome=$_REQUEST['nome'];
    $cpf =$_REQUEST['cpf'];
    $telefone =$_REQUEST['telefone'];
    $endereco =$_REQUEST['endereco'];
    $email=$_REQUEST['email'];
    $nascimento =$_REQUEST['nascimento'];
    
    $login=$_REQUEST['login'];
    $senha=$_REQUEST['senha'];

    //$imagem = $_REQUEST["arquivo"];
   //$imagem = $_FILES["arquivo"];


    $userCount	=	$db->numeroLinhas('imagem','idImagem');
    $nomeI="NameMembro";
    //MEU DEUS NUNCA QUERO TRABLHAR COM IMAGEM NA MINHA VIDA POIS QUE COISA CHATA
    if (isset($_FILES['arquivo'])) {
        $imagem = $_FILES["arquivo"];

        if($imagem != NULL) {
            $nomeFinal = time().'.jpg';
            if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
                $tamanhoImg = filesize($nomeFinal);
                
                $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
                
                $dataima	=	array(
                    'nome'=>$nomeI,
                    'imagem'=>"'$mysqlImg'",
                
                );
    
                $imaIn =$db->InsertCrud('imagem',$dataima);
                //mysql_query("INSERT INTO PESSOA (PES_IMG) VALUES ('$mysqlImg')") or
                $idimagem=$db->UtimoIDinserido();
                unlink($nomeFinal);
    
            }
        }
        else {
            echo"Você não realizou o upload de forma satisfatória.";
        }
    } 
    
    
    $userCount	=	$db->numeroLinhas('login','idLogin');
    $datalog	=	array(
        'login'=>$login,
        'senha'=>$senha,
    );
    $loginIn =$db->InsertCrud('login',$datalog);   
    $idlogin=$db->UtimoIDinserido();
    
    
    $userCount	=	$db->numeroLinhas('membro','idmembro');
    $dataMem	=	array(
                    'nome'=>$nome,
                    'data_nacimento'=>$nascimento,
                    'cpf'=>$cpf,
                    'endereco'=>$endereco,
                    'telefone'=>$telefone,
                    'email'=>$email,
                    'imagem_idImagem'=>$idimagem,
                    'login_idLogin'=>$idlogin,
    );
    
    $mebroIn =$db->InsertCrud('membro',$dataMem);  

}

    $nm_page ="Cadastrar Membro";
    require("header.php");
?>
<body>
<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
    <?php 
    include("carrosel.php");
    require("navbar.php"); ?>
    
<div id="conteudo" class="container  w-75 justify-content-center">

    <div id="titulo" class="row d-flex justify-content-center">
        <h2 class="text-center font-weight-bold"><ins> Cadastrar Livro</ins></h2>
    </div>
    
    <div id="corpo" class="row  d-flex justify-content-center">
        <div class="col">
        Aqui você cadastrar novos membros, é necessário adicionar Nome, Cpf, Telefone e endereço, se não o membro não será adicionado.
        Sem cadastro não é possivel alugar livros.
        </div>
    </div>
    <form class="form-group border border-dark p-2 rounded" method="POST" enctype="multipart/form-data">
        <div id="formulario" class="form-row" style="margin-top:2rem;">
                <div class="form-group col-md-4">
                    <b><label for=nome>*Nome Completo</label></b>
                    <input type="text" class="form-control"  name="nome"  placeholder="Nome Completo">
                </div>    
                <div class="form-group col-md-4">    
                    <b><label for=cpf>*Cpf</label></b>
                    <input type="number" class="form-control" name="cpf" placeholder="000.000.000-00">
                </div>
                <div class="form-group col-md-4">    
                    <b><label for=telefone>*Telefone</label></b>
                    <input type="number" class="form-control" name="telefone" placeholder="0+ddd+Telefone">
                </div>
        </div>
    <div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">
                <b><label for=Endereco>*Endereço</label></b>
                <input type="text" class="form-control" name="endereco"  placeholder="Cidade,Bairro,N°casa">
            </div>    
            <div class="form-group col-md-4">    
                <b><label for=autor>Email</label></b>
                <input type="email" class="form-control" name="email" placeholder="Contato@Bteca.com">
            </div>
            <div class="form-group col-md-4">    
                <b><label for=editor>Nascimento</label></b>
                <input type="date" class="form-control" name="nascimento">
            </div>
    </div>
    <div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">
                <b><label for=Endereco>*Login</label></b>
                <input type="email" class="form-control" name="login">
            </div>    
            <div class="form-group col-md-4">    
                <b><label for=autor>Senha</label></b>
                <input type="text" class="form-control" name="senha" >
            </div>
    </div>
    <div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">    
                <b><label for=autor>Arquivo</label></b>
                <input type="file" name="arquivo"/>
            </div>
            
    </div>
    
    <br>

        <div class="row justify-content-center w-100" style="margin-left:0.1%;" >    
            <div class="col ">
                    <button type="submit" action="11.php" name="submit" value="submit" id="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
            </div>
        </div>
          
                    
    </form>
</div><!-- div Conteudo-->
</div><!-- div Content-->
</div><!-- div Wrapper-->