<?php
include 'db.php';

$sql = "SELECT * FROM professor";

$result = $conn-> query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Read Professor</title>
</head>
<body class="centralizar">
    <table>
        <tr>
            <th>Id Professor</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>CPF</th>
            <th>Materia</th>
            <th>Ações</th>
        </tr>
    <?php while($row = $result-> fetch_assoc()){
        ?>
        <tr>
                <td><?php echo$row['id_professor']?></td>
                <td><?php echo $row['nome_professor']?></td>
                <td><?php echo $row['data_nascimento']?></td>
                <td><?php echo $row['CPF']?></td>
                <td><?php echo$row['materia']?></td>
                <td>
                    <a href= "delete.php? id_professor=<?php echo $row['id_professor']?>">Excluir</a>
                    <a href="update_professor.php?id_professor=<?php echo $row['id_professor']?>">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <p>Acessar os outros Read</p>
    <a href="read_aulas.php" ><button>Read aulas</button></a>
    <a href="read.php" ><button>Read Professor</button></a>
    <p>Tela inicial</p>
    <a href="index.php"><button>Inicio</button></a>
</body>
