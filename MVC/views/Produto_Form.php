<link rel="stylesheet" href="static/style.css">
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $qtd = $_POST['qtd'] ?? '';
    $preco = $_POST['preco'] ?? '';
    header("Location: index.php?page=produto ");
    exit;
}
?>
<form class="form" method="POST">
    <input type="text" name="nome" placeholder="Nome" value="<?php echo $cliente['nome'] ?? ''; ?>" required><br>
    <input type="descricao" name="descricao" placeholder="descricao" value="<?php echo $cliente['descricao'] ?? ''; ?>" required><br>
    <input type="qtd" name="qtd" placeholder="qtd" value="<?php echo $cliente['qtd'] ?? ''; ?>"><br>
    <textarea name="preco" placeholder="preco"><?php echo $cliente['preco'] ?? ''; ?></textarea><br>
    <button type="submit">Salvar</button>
</form>
