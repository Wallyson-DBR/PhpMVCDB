<link rel="stylesheet" href="static/style.css">
<body class='body'>
<h2>Lista de Clientes</h2>
<table>
    <thead >
        <a class="btn1" href="index.php?action=create">Novo</a>
        <tr class="tr">
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th class="spc">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr class="tr">
                <td class="spc"><?php echo $cliente['nome']; ?></td>
                <td class="spc"><?php echo $cliente['email']; ?></td>
                <td class="spc"><?php echo $cliente['telefone']; ?></td>
                <td class="spc"><?php echo $cliente['endereco']; ?></td>
                <td class="spc">                    
                    <a class="btn3" href="index.php?action=edit&id=<?php echo $cliente['id']; ?>">Editar</a> 
                    <a class="btn2" href="index.php?action=delete&id=<?php echo $cliente['id']; ?>">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>