<?php

include_once 'config/database.php';
include_once 'models/Produto.php';

class produtoController {

    private $db;
    private $produto;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->produto = new produto($this->db);
    }

    public function createp() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->produto->nome = $_POST['nome'];
            $this->produto->descricao = $_POST['descricao'];
            $this->produto->qtd = $_POST['qtd'];
            $this->produto->preco = $_POST['preco'];

            if ($this->produto->create()) {
                echo "Produto cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar produto.";
            }
        }

        include_once 'views/produto_form.php';
    }

    public function indexp() {
        $stmt = $this->produto->read();
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

       include_once 'Menu.php';
       //include_once 'views/produto_list.php';
    }

    public function editp($id) {
        $this->produto->id = $id;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->produto->nome = $_POST['nome'];
            $this->produto->descricao = $_POST['descricao'];
            $this->produto->qtd = $_POST['qtd'];
            $this->produto->preco = $_POST['preco'];

            if ($this->produto->update()) {
                echo "Produto atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar produto.";
            }
        } else {
            // Pega os dados do produto para editar
            $stmt = $this->produto->individual();
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
            include_once 'views/produto_form.php';
        }
    }

    public function deletep($id) {
        $this->produto->id = $id;

        if ($this->produto->delete()) {
            echo "produto deletado com sucesso!";
        } else {
            echo "Erro ao deletar produto.";
        }

        header('Location: index.php');
    }
    
}
?>
