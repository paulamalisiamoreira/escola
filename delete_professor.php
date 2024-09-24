<?php
include 'db.php';
$id_professor = $_GET['id_professor'];

$sql = "DELETE FROM professor WHERE id_professor ='$id_professor'";
if($conn -> query($sql) === true){
    echo"Registro excluido";
}else{
    echo"Erro". $slq ."<br>".$conn -> error;
}
$conn ->close();
header("Location read.php");
exit();
?>