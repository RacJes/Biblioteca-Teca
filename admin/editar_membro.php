<?php 
    $nm_page ="Editar Membro";
    require("header.php");

    session_start();
    
    if( !empty($_SESSION['biblioteca']) ){

    }else{
        header("location: login.php");
    }
    
?>

<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
    <?php 
    include("carrosel.php");
    require("navbar.php");
    include("../conectar.php");

    $condition =    ' AND idmembro = "'.$_POST["id"].'" ';
    $imprime4  =    $db->SelectCRUD('membro','*',$condition,'');
    if(count($imprime4)>0){
        $s	=	'';
        foreach($imprime4 as $val){
         $s++;
   
   
   
   ?>



<div id="conteudo" class="container  w-75 justify-content-center">

    <div id="titulo" class="row d-flex justify-content-center">
        <h2 class="text-center font-weight-bold"><ins> Cadastrar Membro</ins></h2>
    </div>
    
    <div id="corpo" class="row  d-flex justify-content-center">
        <div class="col">
        Aqui você cadastrar novos membros, é necessário adicionar Nome, Cpf, Telefone e endereço, se não o membro não será adicionado.
        Sem cadastro não é possivel alugar livros.
        </div>
    </div>
    <form class="form-group border border-dark p-2 rounded" method="POST" action="valida_membro.php">
        <div id="formulario" class="form-row" style="margin-top:2rem;">
                <div class="form-group col-md-4">
                    <b><label for=nome>*Nome Completo</label></b>
                    <input type="text" class="form-control"  name="nome" value="<?php echo"$val[nome]";?>">
                </div>    
                <div class="form-group col-md-4">    
                    <b><label for=cpf>*Cpf</label></b>
                    <input type="number" class="form-control" name="cpf" value="<?php echo"$val[cpf]";?>">
                </div>
                <div class="form-group col-md-4">    
                    <b><label for=telefone>*Telefone</label></b>
                    <input type="number" class="form-control" name="telefone"  value="<?php echo"$val[telefone]";?>">
                </div>
        </div>
    <div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">
                <b><label for=Endereco>*Endereço</label></b>
                <input type="text" class="form-control" name="endereco"   value="<?php echo"$val[endereco]";?>">
            </div>    
            <div class="form-group col-md-4">    
                <b><label for=autor>Email</label></b>
                <input type="email" class="form-control" name="email"  value="<?php echo"$val[email]";?>">
            </div>
            <div class="form-group col-md-4">    
                <b><label for=editor>Nascimento</label></b>
                <input type="date" class="form-control" name="nascimento"  value="<?php echo"$val[data_nacimento]";?>">
            </div>
            <input type="hidden" name="IdMemb" value="<?php echo"$val[idmembro]"?>"/>
            <input type="hidden" name="idImag" value="<?php echo"$val[imagem_idImagem]"?>"/>
            <input type="hidden" name="idlogi" value="<?php echo"$val[login_idLogin]"?>"/>
    </div>

    <div class="row">
    </div>
        <div class="row justify-content-center w-100" style="margin-left:0.1%;" >    
            <div class="col ">
                    <button type="submit" action="11.php" name="files" class="btn btn-primary btn-lg btn-block">Enviar</button>
            </div>
        </div>
          
                    
    </form>
    <?php 
    }
}else{}
?> 
</div><!-- div Conteudo-->
</div><!-- div Content-->
</div><!-- div Wrapper-->