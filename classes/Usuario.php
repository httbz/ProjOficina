<?php
class Usuario
{
    private $conn;
    private $table_name = "usuarios";


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function registrar($nome, $tipo, $senha, $sexo, $dataNasc, $email, $endCidade, $endBairro, $endNum, $endComplemento, $endrua, $celular, $cpf)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, tipo, senha, sexo, dataNasc, email, endCidade, endBairro, endNum, endComplemento, endrua, celular, cpf) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashed_password = password_hash($senha, PASSWORD_BCRYPT);
        $stmt->execute([$nome, $tipo, $hashed_password, $sexo, $dataNasc, $email, $endCidade, $endBairro, $endNum, $endComplemento,  $endrua, $celular, $cpf]);

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

    public function ler()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function lerPorId($id)
    {
        if (!is_numeric($id)) {
            return false; // ID inválido
        }

        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ?: false; // Retorna false se não encontrar
    }


    public function atualizar( $nome, $tipo, $sexo, $dataNasc, $email, $endCidade, $endBairro, $endNum, $endComplemento, $endrua, $celular, $cpf, $id)
    {
        $query = "UPDATE " . $this->table_name . " SET nome = ?, tipo = ?,  sexo = ?, dataNasc = ?, email = ?, endCidade = ?, endBairro = ?, endNum = ?, endComplemento = ?, endrua = ?, celular = ?, cpf = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
     
        $stmt->execute([$nome, $tipo, $sexo, $dataNasc, $email, $endCidade, $endBairro, $endNum, $endComplemento, $endrua, $celular, $cpf, $id]);
        return $stmt;
    }


    public function deletar($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pesquisarUsuarios($termo)
    {
        if (empty($termo)) {
            return []; // Se o termo estiver vazio, retorna um array vazio
        }

        $query = "SELECT * FROM usuarios WHERE nome LIKE :termo";
        $stmt = $this->conn->prepare($query);
        // Utiliza o bindValue para garantir que o valor seja corretamente escapado e evitamos SQL Injection
        $stmt->bindValue(':termo', '%' . $termo . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function gerarCodigoVerificacao($email){

        $codigo = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvxyz"), 0, 10);

        $query = "UPDATE " . $this->table_name . " SET codigo_verificacao = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$codigo, $email]);

        return ($stmt->rowCount() > 0) ? $codigo : false;

    }

    public function verificarCodigo($codigo){
        $query = "SELECT * FROM " . $this->table_name . " WHERE codigo_verificacao = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$codigo]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function redefinirSenha($codigo, $senha) {
        $query = "UPDATE " . $this->table_name . " SET senha = ?, codigo_verificacao = NULL WHERE codigo_verificacao = ?";
        $stmt = $this->conn->prepare($query);
        $hashed_password = password_hash($senha, PASSWORD_BCRYPT);
        $stmt->execute([$hashed_password, $codigo]);
        return $stmt->rowCount() > 0;
    }

}
?>