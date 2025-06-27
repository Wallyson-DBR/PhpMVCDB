<?php
$pdo = new PDO('mysql:host=localhost; dbname=phpmvc', 'root', '');
$produtos = $pdo->prepare("select * from produto order by nome");
$produtos->execute();
?>
<link rel="stylesheet" href="static/style.css">
<body class="body">
<h2>Lista de Produtos</h2>
<table>
    <thead>
    <a class="btn1" href="index.php?action=createp">Novo</a>
        <tr class="tr">
            <th>Nome</th>
            <th>Descricão</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $produto): ?>
            <tr class="tr">
                <td class="spc"><?php echo $produto['nome']; ?></td>
                <td class="spc"><?php echo $produto['descricao']; ?></td>
                <td class="spc"><?php echo $produto['qtd']; ?></td>
                <td class="spc"><?php echo $produto['preco']; ?></td>
                <td class="spc">                    
                <a class="btn3" href="index.php?action=editp&id=<?php echo $produto['id']; ?>">Editar</a> 
                    <a class="btn2" href="index.php?action=deletep&id=<?php echo $produto['id']; ?>">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
