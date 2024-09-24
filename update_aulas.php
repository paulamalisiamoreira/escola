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
        header ("Location: read_aulas.php");
        exit();
    }


    include 'db.php';
    $id_professor = $_GET['id_professor'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_professor = $_POST['nome_professor'];
        $data_nascimento = $_POST['data_nascimento'];
        $CPF = $_POST['CPF'];
        $materia = $_POST['materia'];
    
        $sql = "UPDATE professor SET nome_professor='$nome_professor', data_nascimento='$data_nascimento', CPF='$CPF', materia='$materia' WHERE id_professor='$id_professor'";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: read_professor.php");
            exit();
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }
    $sql = "SELECT * FROM aulas WHERE id_aula = '$id_aula'";;
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Registro não encontrado.");
    }
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
    <form method="POST" action=" update_aulas.php?id_aulas=<?php echo $row['id_aula'];?>">
        <label for="numero_sala">Numero Sala</label>
        <input type="number" name="numero_sala" class='input' value="<?php echo $row['numero_sala']; ?>" required>
        <label for="tipo_sala">Tipo Sala</label>
        <input type="text" name="tipo_sala" class='input' value="<?php echo $row['tipo_sala']; ?>" required>
        <input type="submit"  class='botaozinho' value="Atualizar">
    </form>

</body>
</html>