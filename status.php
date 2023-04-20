<?php
include('config/db.php');

$id=$_GET['id'];
$status=$_GET['status'];

$q=$conn->prepare("UPDATE bbcal1 SET status = :status WHERE id = :id");
$q->bindParam(':status', $status);
$q->bindParam(':id', $id);
$q->execute();

header('location:nextcal.php');
?>