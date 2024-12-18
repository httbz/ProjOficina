<?php
class Produtos
{
    private $conn;
    private $table_name = "produtos";


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function registrar($descricao, $valorCusto, $valorVenda, $referencia)
    {
        $query = "INSERT INTO " . $this->table_name . " (descricao, valorCusto, valorVenda, referencia) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
       
        $stmt->execute([$descricao, $valorCusto, $valorVenda, $referencia]);
        return $stmt;
    }

    
    public function criar($descricao, $valorCusto, $valorVenda, $referencia)
    {
        return $this->registrar($descricao, $valorCusto, $valorVenda, $referencia);
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


    public function atualizar($id,$descricao, $valorCusto, $valorVenda, $referencia)
    {
        $query = "UPDATE " . $this->table_name . " SET descricao = ?, valorCusto = ?, valorVenda = ?, referencia = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$descricao, $valorCusto, $valorVenda, $referencia, $id]);
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
        $sql = "SELECT * FROM produtos";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function pesquisarProdutos($termo)
    {
        if (empty($termo)) {
            return []; // Se o termo estiver vazio, retorna um array vazio
        }

        $query = "SELECT * FROM produtos WHERE referencia LIKE :termo OR descricao LIKE :termo";
        $stmt = $this->conn->prepare($query);
        // Utiliza o bindValue para garantir que o valor seja corretamente escapado e evitamos SQL Injection
        $stmt->bindValue(':termo', '%' . $termo . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>