<?php 
    $nm_page ="Editar Membro";
    require("header.php");

    if($_Session['biblioteca']){
        header("location: listar_noticia.php");
     }
     else{
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
    <form class="form-group border border-dark p-2 rounded" method="POST" enctype="multipart/form-data">
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
    </div>
    <script>

        window.onload = function() {
        //Check File API support
        if (window.File && window.FileList && window.FileReader) {
            var filesInput = document.getElementById("files");
            filesInput.addEventListener("change", function(event) {
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                //Only pics
                if (!file.type.match('image'))
                continue;
                var picReader = new FileReader();
                picReader.addEventListener("load", function(event) {
                var picFile = event.target;
                var div = document.createElement("div");
                div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                    "title='" + picFile.name + "'/>";
                output.insertBefore(div, null);
                });
                //Read the image
                picReader.readAsDataURL(file);
            }
            });
        } else {
            console.log("Your browser does not support File API");
        }
        }

    </script>
    <div class="row">
        <div class="form-group col-md-6">
            <div class="table-overflow">
                <table class="table">
                    <output id='result'>     
                </table>
            </div>    
        
            <label for='files'>Enviar as fotos </label>
            <input name='files' type='file' >
        </div> 
        <!-- https://stackoverflow.com/questions/20779983/multiple-image-upload-and-preview --> 
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