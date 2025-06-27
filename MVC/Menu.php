<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHPMVC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="body">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">DB MVC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Cadastro</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?page=cliente">Cliente</a></li>
            <li><a class="dropdown-item" href="index.php?page=fornecedor">Fornecedor</a></li>
            <li><a class="dropdown-item" href="index.php?page=produto">Produto</a></li>

          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid mt-3">
 
</div>


<main class="container">
  <?php
  $page = $_GET['page'] ?? 'home';

  switch($page)
  {
    case 'cliente':
      include 'views/Cliente_list.php';
      break;
      case 'fornecedor';
      include 'views/Fornecedor_list.php';
      break;
      case 'produto';
      include 'views/Produto_list.php';
      break;
      default;
        echo "<h1>Bem-Vindo ao meu projeto MVC</h1><p>Escolha uma opção acima.</p>";
  }
  ?>

</body>
</html>