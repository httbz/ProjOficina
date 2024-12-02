<?php
class Usuario
{
    private $conn;
    private $table_name = "usuarios";


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function registrar($nome, $tipo, $sexo, $dataNasc, $celular, $email, $cpf, $endCidade, $endBairro, $endRua, $endNum, $endComplemento, $senha)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, tipo, sexo, dataNasc, celular, email, cpf, endCidade, endBairro, endRua, endNum, endComplemento, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashed_password = password_hash($senha, PASSWORD_BCRYPT);
        $stmt->execute([$nome, $tipo, $sexo, $dataNasc, $celular, $email, $cpf, $endCidade, $endBairro, $endRua, $endNum, $endComplemento, $hashed_password]);
    
        return $stmt;
    }
    
    public function login($nome, $senha)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nome = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nome]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }
    public function criar($nome, $tipo, $sexo, $dataNasc, $celular, $email, $cpf, $endCidade, $endBairro, $endRua, $endNum, $endComplemento, $senha)
    {
        return $this->registrar($nome, $tipo, $sexo, $dataNasc, $celular, $email, $cpf, $endCidade, $endBairro, $endRua, $endNum, $endComplemento, $senha);
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


    public function atualizar($id, $nome, $tipo, $sexo, $dataNasc, $celular, $email, $cpf, $endCidade, $endBairro, $endRua, $endNum, $endComplemento, $senha)
    {
        $query = "UPDATE " . $this->table_name . " SET nome = ?, tipo = ?, sexo = ?, dataNasc = ?, celular = ?, email = ?, cpf = ?, endCidade = ?, endBairro = ?, endRua = ?, endNum = ?, endComplemento = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nome, $tipo, $sexo, $dataNasc, $celular, $email, $cpf, $endCidade, $endBairro, $endRua, $endNum, $endComplemento, $senha, $id]);
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
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>