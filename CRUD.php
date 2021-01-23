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
    function insert($tabela,$valor)
    {
        try {
        //INSERT INTO minhaTabela (nome) VALUES(:nome)'
        $inseri = $this->pdo->prepare('INSERT INTO '.$tabela.' VALUES '.$valor.'');
        $inseri->execute();
        echo $inseri->rowCount();
        } catch(PDOException $e) {
        echo 'Error Insert Do Banco: ' . $e->getMessage();
        }
    }

    //Update
    function Update($tabela,$campo,$valor,$condicao)
    {
        
        try {
            //'UPDATE minhaTabela SET nome = :nome WHERE id = :id'
        $update = $this->pdo->prepare('UPDATE '.$tabela.' SET '.$campo.' = '.$valor.' WHERE '.$condicao.'');
        $update->execute();

        return $update;

        echo $update->rowCount();
        } catch(PDOException $e) {
        echo 'Error No Update do Banco: ' . $e->getMessage();
        }
    }

    //Select
    function Select($tabela,$campo){
        //"SELECT nome, usuario FROM login WHERE id= :id;"
        $consulta = $this->pdo->prepare("SELECT '.$tabela.' FROM '.$campo.';");
        $consulta->execute();

        $rows = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }  
    function SelectCondi($tabela,$campo,$condicao){
        //"SELECT nome, usuario FROM login WHERE id= :id;"
        $consulta = $this->pdo->prepare("SELECT '.$tabela.' FROM '.$campo.' WHERE '.$condicao.';");
        $consulta->execute();

        $rows = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    
    //Delete
    function Delete($tabela,$condicao)
    {
        //'DELETE FROM minhaTabela WHERE id = :id'
        try {

            $del = $this->pdo->prepare('DELETE FROM '.$tabela.' WHERE '.$condicao.'');
            $del ->execute();
        
            echo $del ->rowCount();
            return $del;

        } catch(PDOException $e) {
            echo 'Error no Delete do Banco: ' . $e->getMessage();
        }
    }

    public function UtimoIdInserido($param = null)
    {
        return $this->pdo->lastInsertId($param);
    }

}
?>