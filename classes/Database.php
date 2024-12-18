<?php
class Database
{
    private $host = "localhost";
    private $db_name = "bdoficina";
    private $username = "root";
    private $password = "root";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host .
                ";dbname=" . $this->db_name, $this->username, $this->password);

        } catch (PDOException $exception) {
            echo "Erro de conexão: aqui " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>