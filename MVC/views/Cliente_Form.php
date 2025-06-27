<link rel="stylesheet" href="static/style.css">
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    header("Location: index.php?page=cliente");
    exit;
}
?>
<form class="form" method="POST">
    <input type="text" name="nome" placeholder="Nome" value="<?php echo $cliente['nome'] ?? ''; ?>" required><br>
    <input type="email" name="email" placeholder="Email" value="<?php echo $cliente['email'] ?? ''; ?>" required><br>
    <input type="text" name="telefone" placeholder="Telefone" value="<?php echo $cliente['telefone'] ?? ''; ?>"><br>
    <textarea name="endereco" placeholder="Endereço"><?php echo $cliente['endereco'] ?? ''; ?></textarea><br>
    <button class="btn1" type="submit">Salvar</button>
</form>
