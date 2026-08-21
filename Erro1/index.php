<?php

include "infra/connect.php";

$sql = "SELECT id, nome, email FROM usuarios ORDER BY id DESC";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD de Usuários</title>
</head>

<body>

    <h1>Cadastro de Usuários</h1>

    <form method="POST" action="public/cadastrar.php">

            <label>Nome:</label>
            <input type="text" name="nome" required>

            <br><br> 

            <label>E-mail:</label>
            <input type="email" name="email" required>

            <br><br>

            <button type="submit" name="cadastrar">Cadastrar</button>
    </form>

    <h2>Usuários cadastrados</h2>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>

        <?php while ($usuario = mysqli_fetch_assoc($resultado)) { ?>

            <tr>

                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['nome'] ?></td>
                <td><?php echo $usuario['email'] ?></td>

                <td>

                    <a href="public/excluir.php"=<?= $usuario['id'] ?>">Excluir</a>
                    <a href="public/editar.php"=<?= $usuario['id'] ?>">Editar</a>

                </td>

            </tr>
        
        <?php } ?>
    
    </table>

</body>

</html>