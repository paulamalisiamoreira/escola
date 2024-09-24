<?php
include 'db.php';
$id_diario = $_GET['id_diario'];

$sql = "DELETE FROM diario WHERE id_diario ='$id_diario'";
if($conn -> query($sql) === true){
    echo"Registro excluido";
}else{
    echo"Erro". $slq ."<br>".$conn -> error;
}
$conn ->close();
header("Location read.php");
exit();
?>