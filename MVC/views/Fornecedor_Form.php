<?php
$pdo = new PDO('mysql:host=localhost; dbname=phpmvc', 'root', '');
$produtos = $pdo->prepare("select * from fornecedor order by nome");
$produtos->execute();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    header("Location: index.php?page=fornecedor");
    exit;
}
?>
<link rel="stylesheet" href="static/style.css">
<form class="form" method="POST">
    <input type="text" name="nome" placeholder="Nome" value="<?php echo $fornecedor['nome'] ?? ''; ?>" required><br>
    <input type="email" name="email" placeholder="Email" value="<?php echo $fornecedor['email'] ?? ''; ?>" required><br>
    <input type="text" name="telefone" placeholder="Telefone" value="<?php echo $fornecedor['telefone'] ?? ''; ?>"><br>
    <textarea name="endereco" placeholder="Endereço"><?php echo $fornecedor['endereco'] ?? ''; ?></textarea><br>
    <button type="submit">Salvar</button>
</form>
