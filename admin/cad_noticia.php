<?php 
    $nm_page ="Cadastrar Noticias";
    require("header.php");
?>
<body>
<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
    <?php require("navbar.php"); ?>
    
<div id="conteudo" class="container  w-75 justify-content-center">

    <div id="titulo" class="row d-flex justify-content-center">
        <h2 class="text-center font-weight-bold"><ins> Publicar Noticia</ins></h2>
    </div>
    
    <div id="corpo" class="row  d-flex justify-content-center">
        <div class="col">
        Aqui você poderá colocar todas as noticias interessantes, caso não preencha o nome do autor, o sistema vai colocar o nome do seu
        usuario, caso não coloque data , o sistema irá preencher com a data atual do servidor.
        O titulo e a descrição são necessáriamente importantes por, sem eles a noticia não será postada.
        </div>
    </div>
    <form class="form-group">
    <div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">
                <b><label for=titulo>*Titulo da Noticia</label></b>
                <input type="text" class="form-control" id="titulo"  placeholder="Titulo">
            </div>    
            <div class="form-group col-md-4">    
                <b><label for=autor>Autor</label></b>
                <input type="text" class="form-control" id="autor" placeholder="Autor">
            </div>
            <div class="form-group col-md-4">    
                <b><label for=date>Data da noticia</label></b>
                <input type="date" class="form-control" id="date">
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
            <b><label for="corpoNoticia">Texto da noticia</label></b>
            <textarea class="form-control" id="corpoNoticia" rows="7"></textarea>
        </div>      
        <!-- https://stackoverflow.com/questions/20779983/multiple-image-upload-and-preview --> 
    </div>
    <div class="row">
    <button type="button" class="btn btn-primary btn-lg btn-block">Enviar</button>
    </div>
    
</div>

</div><!-- div content-->
</div><!-- div wrapper-->
