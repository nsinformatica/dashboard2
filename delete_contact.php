<?php
include 'conexao.php';

$id = $_POST['id'];
$name = $_POST['name'];

$sql = "DELETE  FROM  `agenda_dashboard`  WHERE id = $id";
$insert = mysqli_query($conexao, $sql);

header('Location: list_contacts.php?msg=2');
?>