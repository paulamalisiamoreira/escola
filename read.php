<?php
include 'db.php';

$sql = "SELECT * FROM diario 
INNER JOIN professor 
on professor.id_professor = diario.id_professor 
INNER JOIN aulas 
on aulas.id_aula= diario.id_aula";

$result = $conn-> query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Read</title>
</head>
<body class='centralizar'>
    <table>
        <tr>
            <th>Id Diario</th>
            <th>Hora Aula</th>
            <th>Turma</th>
            <th>Id Professor</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>CPF</th>
            <th>Materia</th>
            <th>Id Aula</th>
            <th>Numero Sala</th>
            <th>Tipo Sala</th>
            <th>Ações</th>
        </tr>
    <?php while($row = $result-> fetch_assoc()){
        ?>
        <tr>
                <td><?php echo $row['id_diario']?></td>
                <td><?php echo $row['hora_aula']?></td>
                <td><?php echo $row['turma']?></td>
                <td><?php echo $row['id_professor']?></td>
                <td><?php echo $row['nome_professor']?></td>
                <td><?php echo $row['data_nascimento']?></td>
                <td><?php echo $row['CPF']?></td>
                <td><?php echo $row['materia']?></td>
                <td><?php echo $row['id_aula']?></td>
                <td><?php echo $row['numero_sala']?></td>
                <td><?php echo $row['tipo_sala']?></td>
                <td>
                    <a href= "delete_diario.php?id_diario=<?php echo $row['id_diario']?>">Excluir</a>
                    <a href="update_diario.php?id_diario=<?php echo $row['id_diario']?>">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <p>Acessar os outros Read</p>
    <a href="read_aulas.php" ><button>Read aulas</button></a>
    <a href="read_professor.php" ><button>Read Professor</button></a>
    <p>Tela inicial</p>
    <a href="index.php"><button>Inicio</button></a>
</body>
</html>