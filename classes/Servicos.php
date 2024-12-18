<?php
class Servicos
{
    private $conn;
    private $table_name = "servicos";


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function registrar($descricao, $valor, $tipo)
    {
        $query = "INSERT INTO " . $this->table_name . " (descricao, valor, tipo) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$descricao, $valor, $tipo]);
        return $stmt;
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


    public function atualizar($descricao, $valor, $tipo, $id)
    {
        $query = "UPDATE " . $this->table_name . " SET descricao = ?, valor = ?, tipo = ? where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$descricao, $valor, $tipo, $id]);
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
        $sql = "SELECT * FROM servicos";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pesquisarServicos($termo)
    {
        if (empty($termo)) {
            return []; // Se o termo estiver vazio, retorna um array vazio
        }

        $query = "SELECT * FROM servicos WHERE descricao LIKE :termo OR tipo LIKE :termo";
        $stmt = $this->conn->prepare($query);
        // Utiliza o bindValue para garantir que o valor seja corretamente escapado e evitamos SQL Injection
        $stmt->bindValue(':termo', '%' . $termo . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>