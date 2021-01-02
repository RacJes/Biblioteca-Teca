<?php 
    $nm_page ="Cadastrar Livros";
    require("header.php");
?>
<body>
<div class="wrapper">
        <!-- Conteudo da pagina -->
<div id="content">
    <?php require("navbar.php"); ?>
    
<div id="conteudo" class="container  w-75 justify-content-center">

    <div id="titulo" class="row d-flex justify-content-center">
        <h2 class="text-center font-weight-bold"><ins> Emprestar Livro</ins></h2>
    </div>
    
    <div id="corpo" class="row  d-flex justify-content-center">
        <div class="col">
        Cadastro dos alugueis de livros, o sistema vai pegar o livro e cadastrar junto com um membro.
        Após isso ele vai coletar a data atual e a data de entrega para calcular a devolução.
        </div>
    </div>
    <form class="form-group">
    <div id="formulario" class="form-row" style="margin-top:2rem;">
            <div class="form-group col-md-4">
                <b><label for=codLivro>*Codigo do livro</label></b>
                <input type="number" class="form-control" id="codLivro"  placeholder="0000">
            </div>    
            <div class="form-group col-md-4">    
                <b><label for=autor>*CPF do Membro</label></b>
                <input type="number" class="form-control" id="cpf" placeholder="000.000.000-00">
            </div>
            <div class="form-group col-md-4">    
                <b><label for=editor>Data da devolução</label></b>
                <input type="date" class="form-control" id="editor" placeholder="Editora">
            </div>
    </div>
   
    
    <div class="row">
    <button type="button" class="btn btn-primary btn-lg btn-block">Enviar</button>
    </div>
    
</div>

</div><!-- div content-->
</div><!-- div wrapper-->