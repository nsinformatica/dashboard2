<?php
include 'conexao.php';

$id = $_POST['id'];
$name = $_POST['name'];
$mail = $_POST['mail'];
$telefone = $_POST['telefone'];
$business = $_POST['business'];

$sql = "UPDATE `agenda_dashboard` SET `name`= '$name',`mail`='$mail',`telefone`='$telefone',`business`='$business' WHERE id = $id";
$insert = mysqli_query($conexao, $sql);

header('Location: list_contacts.php?msg=1');
?>