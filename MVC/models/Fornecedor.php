<?php 

class Fornecedor {
    private $conn;
    private $table_name = "fornecedor";

    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $endereco;
    public $data_cadastro;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name .
        " (nome, email, telefone, endereco) VALUES (:nome, :email, :telefone, :endereco)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":endereco", $this->endereco);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT id, nome, email, telefone, endereco, data_cadastro FROM " . $this->table_name;
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, email = :email, telefone = :telefone, endereco = :endereco WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);


        if ($stmt->execute())  {
            return true;
        }

        return false;
    }

    public function individual() 
    {
        $query = "SELECT * FROM " . $this->table_name . "WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$this->id);

        return $stmt;
    }
}
?>
