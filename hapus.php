<?php 

include "db.php";

$id = $_GET['idTest'];
$tampung = "DELETE FROM datasiswa WHERE id = :id";
$data = $link->prepare($tampung);

$data->bindParam(':id', $id);

if ($data->execute()) {
	header("location:index.php");
} else {
	die ("Hapus Error");
}
 ?>