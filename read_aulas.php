<?php
include 'db.php';

$sql = "SELECT * FROM aulas";

$result = $conn-> query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Read Aulas</title>
</head>
<body class="centralizar">
    <table>
        <tr>
            <th>Id Aula</th>
            <th>Numero Sala</th>
            <th>Tipo Sala</th>
            <th>Ações</th>
        </tr>
    <?php while($row = $result-> fetch_assoc()){
        ?>
        <tr>
                <td><?php echo $row['id_aula']?></td>
                <td><?php echo $row['numero_sala']?></td>
                <td><?php echo $row['tipo_sala']?></td>
                <td>
                    <a href= "delete_aulas.php? id_aula=<?php echo $row['id_aula']?>">Excluir</a>
                    <a href="update_aulas.php?id_aula=<?php echo $row['id_aula']?>">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <p>Acessar os outros Read</p>
    <a href="read.php" ><button>Read</button></a>
    <a href="read_professor.php" ><button>Read Professor</button></a>
    <p>Tela inicial</p>
    <a href="index.php"><button>Inicio</button></a>
</body>
</html>