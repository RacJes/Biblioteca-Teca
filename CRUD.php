<?php

$database;
$username='root';
//$password='';//Senha do banco de Geral
$password='simsenha123';//Senha banco do Marco 
//Se utimo git for do Marco comentar a linha 6 e descomentar a linha 5

//Conexão
try{
    $pdo = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo 'Error:De Coenexão com o Banco' . $e->getMessage();
}

//Insert 
try {
 
  $stmt = $pdo->prepare('INSERT INTO minhaTabela (nome) VALUES(:nome)');
  $stmt->execute(array(
    ':nome' => 'Ricardo Arrigoni'
  ));
  echo $stmt->rowCount();
} catch(PDOException $e) {
  echo 'Error Insert Do Banco: ' . $e->getMessage();
}

//Update
$id = 5;
$nome = "Novo nome do Ricardo";

try {
  $stmt = $pdo->prepare('UPDATE minhaTabela SET nome = :nome WHERE id = :id');
  $stmt->execute(array(
    ':id'   => $id,
    ':nome' => $nome
  ));

  echo $stmt->rowCount();
} catch(PDOException $e) {
  echo 'Error No Update do Banco: ' . $e->getMessage();
}

//Select

$consulta = $pdo->query("SELECT nome, usuario FROM login;");

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']}<br />";
}

//Delete

$id = 5;

try {

  $stmt = $pdo->prepare('DELETE FROM minhaTabela WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  echo $stmt->rowCount();
} catch(PDOException $e) {
  echo 'Error no Delete do Banco: ' . $e->getMessage();
}

?>