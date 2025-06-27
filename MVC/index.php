<!DOCTYPE html>
<link rel="stylesheet" href="static/style.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto MVC</title>
</head>
<body class="body">
<?php
include_once 'controllers/ClienteController.php';
include_once 'controllers/FornecedorController.php';
include_once 'controllers/ProdutoController.php';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = new ClienteController();
$controllerf = new FornecedorController();
$controllerp = new ProdutoController();
    

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;

    case 'createf':
        $controllerf->createf();
        break;
    case 'editf':
        $controllerf->editf($_GET['id']);
        break;
    case 'deletef':
        $controllerf->deletef($_GET['id']);
        break;

    case 'createp':
        $controllerp->createp();
        break;
    case 'editp':
        $controllerp->editp($_GET['id']);
        break;
    case 'deletep':
        $controllerp->deletep($_GET['id']);
        break;


    default:
        $controller->index();
        break;
}
?>
</body>
</html>