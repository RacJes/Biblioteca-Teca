<?php 
    $nm_page ="Cadastrar Livros";
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
        Aqui você cadastrar novos livros, caso não coloque data , o sistema irá preencher com a data atual do servidor.
        O titulo e o autor são necessáriamente importantes por, sem eles o livro não será cadastrado.
        </div>
    </div>
    <form class="form-group border-dark border p-2 rounded">
    <div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">
                <b><label for=titulo>*Titulo do livro</label></b>
                <input type="text" class="form-control" id="titulo"  placeholder="Titulo">
            </div>    
            <div class="form-group col-md-4">    
                <b><label for=autor>*Autor</label></b>
                <input type="text" class="form-control" id="autor" placeholder="Autor">
            </div>
            <div class="form-group col-md-4">    
                <b><label for=editor>Editora</label></b>
                <input type="text" class="form-control" id="editor" placeholder="Editora">
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
            <input id='files' type='file'  multiple/>
        </div>
        <div class="form-group col-md-6">
            <b><label for="corpoNoticia">Sinopse</label></b>
            <textarea class="form-control" id="corpoNoticia" rows="7"></textarea>
        </div>      
        <!-- https://stackoverflow.com/questions/20779983/multiple-image-upload-and-preview --> 
    </div>
    <div class="row w-100 " style="margin:auto;">
    <button type="button" class="btn btn-primary btn-lg btn-block">Enviar</button>
    </div>
    
</div>

</div><!-- div content-->
</div><!-- div wrapper-->
