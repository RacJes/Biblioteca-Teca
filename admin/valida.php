<?php 

    session_start();
        
    if( !empty($_SESSION['biblioteca']) ){

    }else{
        header("location: login.php");
    }

    $nm_page ="Alugueis";
    require("header.php");

  
    header( "refresh:5;url=listar_livro.php" );
?>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#modal').modal('show');
    });
</script>


<div class="modal text-center" tabindex="-1" role="dialog" id="modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ">Bem vindo!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Escolha o que deseja fazer ou aguarde</p>
      </div>
      <div class="text-center p-3 ">
       <a href="cad_membro.php" class=" border border-success 
       bg-success radius p-2 rounded text-white">Cadastrar Membros</a>
       <a href="cad_livro.php" class=" border border-success 
       bg-success radius p-2 rounded text-white">Cadastrar Livros</a>
       <a href="cad_noticia.php" class=" border border-success 
       bg-success radius p-2 rounded text-white">Cadastrar Noticias</a>
      </div>
    </div>
  </div>
</div>
