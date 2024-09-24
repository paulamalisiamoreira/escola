<?php 
include 'db.php';

$professores = array();
$response = $conn->query("SELECT nome_professor, id_professor from professor;");
while ($row = $response->fetch_assoc()) {
    $id_professor = array_push($professores, $row);
}

$aulas = array();
$response_aulas = $conn->query("SELECT numero_sala, id_aula from aulas;");
while($row = $response_aulas->fetch_assoc()){
    $id_aula = array_push($aulas,$row);
}

if(isset($_POST['create_diario'])){
    $hora_aula = $_POST['hora_aula'];
    $turma = $_POST['turma'];
    // $id_professor = $_POST['id_professor'];


    $sql = "INSERT INTO diario (hora_aula, turma, id_professor, id_aula ) values ('$hora_aula', '$turma', ' $id_professor', '$id_aula');";

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
    <title>Adicionar Diário</title>
</head>
<body class="centralizar">
    <!-- Adicionar Diário -->
    <h2>Adicionar Diário</h2>
    <form method="POST" name="adicionar_diario">
     Hora aula: <input type="time" name="hora_aula" required> <br><br>
     Turma: <input type="text" name="turma" required > <br><br>
     Selecione o professor: 
        <select name="professor" id="id_professor">
            <?php foreach ($professores as $professor): ?>
                <option value="<?= $professor["id_professor"] ?>"> <?= $professor["nome_professor"] ?></option> <br><br>
            <?php endforeach ?> <br><br>
        </select> <br><br>
     Selecione a Sala de Aula (Aula):
        <select name="aulas" id="id_aula">
            <?php foreach ($aulas as $aula):?>
                <option value="<?= $aula["id_aula"]?>"> <?= $aula["numero_sala"]?></option><br><br>
            <?php endforeach?> 
        </select> <br><br>
     <input type="SUBMIT" class='botao_Input' name="create_diario" value="Adicionar Diario"> <br><br>
    </form>
    <p>Tela inicial</p>
    <a href="index.php"><button>Inicio</button></a>
</body>
</html>