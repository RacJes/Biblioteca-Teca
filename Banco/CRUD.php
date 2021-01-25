<?php
 //
 //Professor Não sabe que minha ideia de montar o Banco com function esta dando trabalho
 //Estou pesquisando Muito para saber como montar certo e bom para tudo sem precisar fazer sobrecarga
 //Isso Foi Feito pelo metodo PDO 
 //
class BancoBi{

    protected $pdo;
 
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function UtimoIDinserido($param = null)
    {
        return $this->pdo->lastInsertId($param);
    }

    //essa função serve para poder ver qual utimo id do tabla para poder colocaro valor do proximo no include
    public function numeroLinhas($tableName, $field, $cond='')
    {
        $stmt = $this->pdo->prepare("SELECT count($field) as total FROM $tableName WHERE 1 ".$cond);
        try {
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
           
            if (! $res || count($res) != 1) {
               return $res;
            }
            return $res;
        } catch (\PDOException $e) {
            throw new \RuntimeException("[".$e->getCode()."] : ". $e->getMessage());
        }
    }

    // Insert

    public function InsertCrud($tableName, array $data)
    {
        $ins = $this->pdo->prepare("INSERT INTO $tableName (".implode(',', array_keys($data)).")
            VALUES (".implode(',', array_fill(0, count($data), '?')).")"
        );
        try{
            $ins->execute(array_values($data));
            return $ins->rowCount();
        } catch (\PDOException $e) {
            throw new \RuntimeException("[".$e->getCode()."] : ". $e->getMessage());
        }
    }

//Update

    public function UpdateCrud($tableName, array $set, array $where)
    {
        
        $arrSet = array_map(
           function($value) {
                return $value . '=:' . $value;
           },
           array_keys($set) 
         ); //criação do campos values suficente para todos valores a ser trocado para poder trocara depois com os valores
             
        $upd = $this->pdo->prepare(
            "UPDATE $tableName SET ". implode(',', $arrSet).' WHERE '. key($where). '=:'. key($where) . 'Field'
         );
         //Ele faz isso pois update pode ser uma arry de dados como não sabemos quantos dados tem então um campo e troca os valor para poder montar o sql 
        foreach ($set as $field => $value) {
            $upd->bindValue(':'.$field, $value);//Trocar os valores dos campos $value para $field do upd
        }
        $upd->bindValue(':'.key($where) . 'Field', current($where));// Troca os valore key($where). '=:'. key($where) para ':'.key($where) . 'Field'
        try {
            $upd->execute();
 
            return $upd->rowCount();
        } catch (\PDOException $e) {
            throw new \RuntimeException("[".$e->getCode()."] : ". $e->getMessage());
        }
    }

// Select

    public function SelectCRUD($tableName, $fields='*', $cond='', $orderBy='', $limit='')
    {
        //SELECT $fields FROM $tableName WHERE 1 ".$cond." ".$orderBy." ".$limit;
        $stmt = $this->pdo->prepare("SELECT $fields FROM $tableName WHERE 1 ".$cond." ".$orderBy." ".$limit);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function SelectAllCrud($tableName, $fields='*')
    {

        //echo "SELECT  $tableName.$fields FROM $tableName;
        $sel = $this->pdo->prepare("SELECT $fields FROM $tableName");
        $sel->execute();
        $rows = $sel->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
     
 // Delete

    public function DeleteCrud($tableName, array $where)
    {
        $del = $this->pdo->prepare("DELETE FROM $tableName WHERE ".key($where) . ' = ?');
        try {
            $del->execute(array(current($where)));
 
            return $del->rowCount();
        } catch (\PDOException $e) {
            throw new \RuntimeException("[".$e->getCode()."] : ". $e->getMessage());
        }
    }
 

      
}
?>