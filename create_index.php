
<?php 

include 'db.php'; 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Página Inicial</title>
</head>
<body class="centralizar">
    <form action="create_professor.php"><button type="submit" class='botao_Paula'>Adicionar Professor</button></form>  <br><br>
    <form action="create_aula.php"><button type="submit" class='botao_Paula' >Adicionar Aula</button></form>  <br><br>
    <form action="create_diario.php"><button type="submit" class='botao_Input'>Adicionar Diário</button></form>  <br><br>
</body>
</html>