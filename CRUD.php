<?php
class BancoBi
{
    protected $pdo;
    
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    //Insert 
    function insert()
    {
        try {
        
        $stmt = $this->pdo->prepare('INSERT INTO minhaTabela (nome) VALUES(:nome)');
        $stmt->execute(array(
            ':nome' => 'Ricardo Arrigoni'
        ));
        echo $stmt->rowCount();
        } catch(PDOException $e) {
        echo 'Error Insert Do Banco: ' . $e->getMessage();
        }
    }

    //Update
    function Update()
    {
        
        $id = 5;
        $nome = "Novo nome do Ricardo";

        try {
        $stmt = $this->pdo->prepare('UPDATE minhaTabela SET nome = :nome WHERE id = :id');
        $stmt->execute(array(
            ':id'   => $id,
            ':nome' => $nome
        ));

        echo $stmt->rowCount();
        } catch(PDOException $e) {
        echo 'Error No Update do Banco: ' . $e->getMessage();
        }
    }
    //Select
    function Select(){

        $consulta = $this->pdo->query("SELECT nome, usuario FROM login;");

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']}<br />";
        }
    }
    //Delete
    function Delete()
    {
        $id = 5;
        try {

            $stmt = $this->pdo->prepare('DELETE FROM minhaTabela WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        
            echo $stmt->rowCount();
        } catch(PDOException $e) {
            echo 'Error no Delete do Banco: ' . $e->getMessage();
        }
    }

}
?>