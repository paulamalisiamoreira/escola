<?php

    include 'db.php';



    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_professor =  $_POST['id_professor'];
        $id_diario = $_POST['id_diario'];
        $hora_aula = $_POST['hora_aula'];
        $turma = $_POST['turma'];
     

        $sql = "UPDATE diario SET hora_aula='$hora_aula', turma='$turma' WHERE id_diario= '$id_diario';";
        
        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
            header("Location: read_professor.php");
            exit();
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        $conn ->close();
        header ("Location: read.php");
        exit();
    }
    $sql = "SELECT * FROM diario WHERE id_diario='$id_diario'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();

    $sql_professores = "SELECT id_professor, nome_professor FROM professor WHERE id_professor= '$id_professor';" ;
    $result_professores = $conn->query($sql_professores);

    $sql_aulas = "SELECT id_aula, numero_sala FROM aulas WHERE id_aula = '$id_aula';";
    $result_aulas = $conn->query($sql_aulas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Diario</title>
</head>
<body class='centralizar'>
    <form method="POST" action=" update_diario.php?id_diario=<?php echo $row['id_diario'];?>">
        <label for="hora_aula">Hora Aula</label>
        <input type="time" name="hora_aula" class='input' value="<?php echo $row['hora_aula']; ?>" required>
        <label for="turma">Turma</label>
        <input type="text" name="turma"  class='input' value="<?php echo $row['turma']; ?>" required>
        <label for="id_professor">Professor</label>
        <select name="id_professor"   class='input' required>
            <option>Selecione um professor</option>
            <?php while ($professor = $result_professores->fetch_assoc()): ?>
                <option value="<?php echo $professor['id_professor']; ?>" <?php echo ($professor['id_professor'] == $row['id_professor']) ? 'selected' : ''; ?>>
                    <?php echo $professor['nome_professor']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <select name="id_aulas"   class='input' required>
            <option>Selecione uma Sala</option>
            <?php while ($aulas = $result_aulas->fetch_assoc()): ?>
                <option value="<?php echo $aulas['id_aula']; ?>" <?php echo ($aulas['id_aula'] == $row['id_aula']) ? 'selected' : ''; ?>>
                    <?php echo $aulas['numero_sala']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="submit" class='botaozinho' value="Atualizar">
    </form>
</body>
</html>