<?php 

class Produto {
    private $conn;
    private $table_name = "produto";

    public $id;
    public $nome;
    public $descricao;
    public $qtd;
    public $preco;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name .
        " (nome, descricao, qtd, preco) VALUES (:nome, :descricao, :qtd, :preco)";
       
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":qtd", $this->qtd);
        $stmt->bindParam(":preco", $this->preco);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT id, nome, descricao, qtd, preco FROM " . $this->table_name;
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, descricao = :descricao, qtd = :qtd, preco = :preco WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":qtd", $this->qtd);
        $stmt->bindParam(":preco", $this->preco);
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