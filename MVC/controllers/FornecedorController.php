<?php

include_once 'config/database.php';
include_once 'models/Fornecedor.php';

class FornecedorController {
    private $db;
    private $fonecedor;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->fornecedor = new Fornecedor($this->db);
    }

    public function createf() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->fornecedor->nome = $_POST['nome'];
            $this->fornecedor->email = $_POST['email'];
            $this->fornecedor->telefone = $_POST['telefone'];
            $this->fornecedor->endereco = $_POST['endereco'];

            if ($this->fornecedor->create()) {
                echo "Fornecedor cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar fornecedor.";
            }
    }
        include_once 'views/fornecedor_form.php';
    }

    public function index() {
        $stmt = $this->fornecedor->read();
        $fornecedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        include_once 'Menu.php';
       // include_once 'views/fornecedor_list.php';
    }

    public function editf($id) {
        $this->fornecedor->id = $id;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->fornecedor->nome = $_POST['nome'];
            $this->fornecedor->email = $_POST['email'];
            $this->fornecedor->telefone = $_POST['telefone'];
            $this->fornecedor->endereco = $_POST['endereco'];

            if ($this->fornecedor->update()) {
                echo "fornecedor atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar fornecedor.";
            }
        } else {
            $stmt = $this->fornecedor->individual();
            $fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);
            include_once 'views/fornecedor_form.php';
        }
    }

    public function deletef($id) {
        $this->fornecedor->id = $id;

        if ($this->fornecedor->delete()) {
            echo "Fornecedor deletado com sucesso!";
        } else {
            echo "Erro ao deletar Fornecedor.";
        }

        header('Location: index.php');
    }

    
}
?>