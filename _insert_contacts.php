<?php
include 'conexao.php';
$name = $_POST['name'];
$mail = $_POST['mail'];
$telefone = $_POST['telefone'];
$business = $_POST['business'];

$sql = "INSERT INTO agenda_dashboard(name, mail, telefone, business) values ('$name','$mail', '$telefone', '$business')";
$insert = mysqli_query($conexao, $sql);
header('Location: form_contact.php?msg=1');
?>