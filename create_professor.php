<?php 
include 'db.php';

if(isset($_POST['create_professor'])){
    $nome_professor = $_POST['nome_professor'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $materia = $_POST['materia'];


    $sql = "INSERT INTO professor (nome_professor, data_nascimento, cpf, materia ) values ('$nome_professor', '$data_nascimento', '$cpf', '$materia');";

    if ($conn->query($sql) === TRUE){
        echo "Novo registro realizado com sucesso!";
    } else{
        echo "Registro não realizado!";
    }
}

$conn-> close();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Adicionar Professor</title>
</head>
<body class="centralizar">
    <!-- Adicionar Professor -->
    <h2>Adicionar professor</h2>
    <form method="POST" name="adicionar_professor">
     Nome Professor: <input type="text" name="nome_professor" required> <br><br>
     Data de Nascimento: <input type="date" name="data_nascimento" required> <br><br>
     CPF: <input type="number" name="cpf" required> <br><br>
     Matéria: <input type="text" name="materia" required> <br><br>
     <input type="SUBMIT" class='botao_Input' name="create_professor" value="Adicionar Professor"> <br><br>
    </form>
    <p>Tela inicial</p>
    <a href="index.php"><button>Inicio</button></a>
</body>
</html>