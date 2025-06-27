<?php

class Database {
    private $host = "localhost";
    private $db_name = "phpmvc";
    private $username = "root"; // ou seu usuário do MySQL
    private $password = "";     // ou sua senha do MySQL
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erro na conexão com o banco de dados: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>