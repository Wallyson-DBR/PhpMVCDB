<?php
$pdo = new PDO('mysql:host=localhost; dbname=phpmvc', 'root', '');
$fornecedores = $pdo->prepare("select * from fornecedor order by nome");
$fornecedores->execute();
?>
<link rel="stylesheet" href="static/style.css">
<body class="body">

<h2>Lista de Fornecedores</h2>
<table>
    <thead>
        <a class="btn1" href="index.php?action=createf">Novo</a>
        <tr class="tr">
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($fornecedores as $fornecedor): ?>
            <tr class="tr">
                <td class="spc"><?php echo $fornecedor['nome']; ?></td>
                <td class="spc"><?php echo $fornecedor['email']; ?></td>
                <td class="spc"><?php echo $fornecedor['telefone']; ?></td>
                <td class="spc"><?php echo $fornecedor['endereco']; ?></td>
                <td class="spc">                    
                    <a class="btn3" href="index.php?action=editf&id=<?php echo $fornecedor['id']; ?>">Editar</a> 
                    <a class="btn2" href="index.php?action=deletef&id=<?php echo $fornecedor['id']; ?>">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>    
</body>
