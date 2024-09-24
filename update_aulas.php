<?php
    include 'db.php';

    $id_aula = $_GET['id_aula'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $numero_sala = $_POST['numero_sala'];
        $tipo_sala = $_POST['tipo_sala'];

        $sql = "UPDATE aulas SET numero_sala='$numero_sala', tipo_sala='$tipo_sala' WHERE id_aula= '$id_aula'";

        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        $conn ->close();
        header ("Location: read.php");
        exit();
    }
    $sql = "SELECT * FROM aulas WHERE id_aula = '$id_aula'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Aulas</title>
</head>
<body class='centralizar'>
    <form method="POST" action=" update_aulas.php?id=<?php echo $row['id_aula'];?>">
        <label for="numero_sala">Numero Sala</label>
        <input type="number" name="numero_sala" class='input' value="<?php echo $row['numero_sala']; ?>" required>
        <label for="tipo_sala">Tipo Sala</label>
        <input type="text" name="tipo_sala" class='input' value="<?php echo $row['tipo_sala']; ?>" required>
        <input type="submit"  class='botaozinho' value="Atualizar">
    </form>

</body>
</html>