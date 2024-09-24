<?php
    include 'db.php';
    $id_professor = $_GET['id_professor'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_professor = $_POST['id_professor'];
        $nome_professor = $_POST['nome_professor'];
        $data_nascimento = $_POST['data_nascimento'];
        $CPF = $_POST['CPF'];
        $materia = $_POST['materia'];


        $sql = "UPDATE professor SET nome_professor='$nome_professor', data_nascimento='$data_nascimento', CPF='$CPF', materia='$materia' WHERE id_professor= '$id_professor'";

        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        $conn ->close();
        header ("Location: read.php");
        exit();
    }
    $sql = "SELECT * FROM professor WHERE id_professor='$id_professor'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Professor</title>
</head>
<body class='centralizar'>
    <form method="POST" action=" update_professor.php?id=<?php echo $row['id_professor'];?>">
        <label for="nome_professor">Nome Professor</label>
        <input type="text" name="nome_professor" class='input' value="<?php echo $row['nome_professor']; ?>" required>
        <label for="data_nascimento">Data Nascimento</label>
        <input type="date" name="data_nascimento" class='input' value="<?php echo $row['data_nascimento']; ?>" required>
        <label for="CPF">CPF</label>
        <input type="text" name="CPF" class='input' value="<?php echo $row['data_nascimento']; ?>" required>
        <label for="materia">Materia</label>
        <input type="text" name="materia" class='input' value="<?php echo $row['data_nascimento']; ?>" required>
        <input type="submit" class='botaozinho' value="Atualizar">
    </form>

</body>
</html>