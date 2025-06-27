<?php

include_once 'config/database.php';
include_once 'models/Cliente.php';

class ClienteController {

    private $db;
    private $cliente;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->cliente = new Cliente($this->db);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->cliente->nome = $_POST['nome'];
            $this->cliente->email = $_POST['email'];
            $this->cliente->telefone = $_POST['telefone'];
            $this->cliente->endereco = $_POST['endereco'];

            if ($this->cliente->create()) {
                echo "Cliente cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar cliente.";
            }
        }

        include_once 'views/cliente_form.php';
    }

    public function index() {
        $stmt = $this->cliente->read();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

       include_once 'Menu.php';
       //include_once 'views/cliente_list.php';
    }

    public function edit($id) {
        $this->cliente->id = $id;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->cliente->nome = $_POST['nome'];
            $this->cliente->email = $_POST['email'];
            $this->cliente->telefone = $_POST['telefone'];
            $this->cliente->endereco = $_POST['endereco'];

            if ($this->cliente->update()) {
                echo "Cliente atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar cliente.";
            }
        } else {
            // Pega os dados do cliente para editar
            $stmt = $this->cliente->individual();
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            include_once 'views/cliente_form.php';
        }
    }

    public function delete($id) {
        $this->cliente->id = $id;

        if ($this->cliente->delete()) {
            echo "Cliente deletado com sucesso!";
        } else {
            echo "Erro ao deletar cliente.";
        }

        header('Location: index.php');
    }
    
}
?>
