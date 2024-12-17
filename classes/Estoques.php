<?php
class Estoques
{
    private $conn;
    private $table_name = "estoque";


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function registrar($qtd, $qtdMax, $qtdMin)
    {
        $query = "INSERT INTO " . $this->table_name . " (qtd, qtdMax, qtdMin) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$qtd, $qtdMax, $qtdMin]);
        return $stmt;
    }


    
    public function criar($qtd, $qtdMax, $qtdMin)
    {
        return $this->registrar($qtd, $qtdMax, $qtdMin);
    }
    public function ler()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function lerPorId($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function atualizar($id,$qtd,$qtdMax, $qtdMin)
    {
        $query = "UPDATE " . $this->table_name . " SET qtd = ?, qtdMax = ?, qtdMin = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$qtd, $qtdMax, $qtdMin,$id]);
        return $stmt;
    }


    public function deletar($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

    public function listarTodos(){
        $sql = "SELECT * FROM estoque";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>