<?php
class Estoques
{
    private $conn;
    private $table_name = "estoque";


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function registrar($fkProduto, $qtd, $qtdMax, $qtdMin)
    {
        $query = "INSERT INTO " . $this->table_name . " (fkProduto, qtd, qtdMax, qtdMin) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$fkProduto, $qtd, $qtdMax, $qtdMin]);
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


    public function atualizar($id, $fkProduto, $qtd, $qtdMax, $qtdMin)
    {
        $query = "UPDATE " . $this->table_name . " SET fkProduto =?, qtd = ?, qtdMax = ?, qtdMin = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$fkProduto, $qtd, $qtdMax, $qtdMin,$id]);
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
    public function pesquisarEstoque($termo)
    {
        if (empty($termo)) {
            return []; // Se o termo estiver vazio, retorna um array vazio
        }
    
        // Atualizando o SQL para incluir um JOIN entre estoque e produtos
        $query = "
            SELECT estoque.*, produtos.descricao 
            FROM estoque
            INNER JOIN produtos ON estoque.fkProduto = produtos.id
            WHERE produtos.descricao LIKE :termo OR estoque.qtd LIKE :termo
        ";
    
        $stmt = $this->conn->prepare($query);
        // Utiliza o bindValue para garantir que o valor seja corretamente escapado e evitar SQL Injection
        $stmt->bindValue(':termo', '%' . $termo . '%', PDO::PARAM_STR);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>