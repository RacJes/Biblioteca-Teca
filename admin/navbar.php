<?php
 
?>
<nav class="navbar navbar-expand-md navbar-light bg-light" style="margin-top:10px">
    <div class="d-flex w-50 order-0">
        <a class="navbar-brand mr-1" href="../index.php">BTeca Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse justify-content-center order-2" id="collapsingNavbar">
    <ul class="navbar-nav ">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Livros
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="listar_livro.php">Listar livros</a>
                <a class="dropdown-item" href="cad_livro.php">Cadastrar livros</a>
            </div>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Alugados
            </a>
            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                <a class="dropdown-item " href="listar_alugado.php">Listar todos alugueis</a>
                <a class="dropdown-item" href="aluguel_atrasado.php">Listar Atrasados</a>
                <a class="dropdown-item" href="cad_aluguel.php">Cadastrar aluguel</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Membros
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="listar_membro.php">Listar membros</a>
                <a class="dropdown-item" href="cad_membro.php">Cadastrar membros</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Noticias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="listar_noticia.php">Listar noticias</a>
                <a class="dropdown-item" href="cad_noticia.php">Cadastrar noticias</a>
            </div>
        </li>
     </ul>
     
    </div>
    <span class="navbar-text small text-truncate w-50 text-right order-1 order-md-last">
        <a href="DesefazerLogin.php" >
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                    <path d="M7.5 1v7h1V1h-1z"/>
                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                </svg>
        </a>
    </span>
</nav>
