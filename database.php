<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db   = "belajarpdo";

try {
	$link = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
	$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "Koneksi berhasil";

	// $result = $link->query("INSERT INTO siswa (nama, kelas, alamat) VALUES ('bagaskara', 'X', 'kajongan')");
	// $result->execute();
	// echo $result->rowCount(). " berhasil ditambahkan";

	// $result = $link->query("SELECT * FROM siswa");
	// while($row = $result->fetch()) {
	// 	echo "$row[0] $row[1] $row[2]";
	// 	echo "<br>";
	// }

	// $result = $link->prepare("INSERT INTO siswa VALUES (? ,?, ?, ?)");
	// $result->bindParam(1,$id_siswa);
	// $result->bindParam(2, $nama_siswa);
	// $result->bindParam(3, $kelas_siswa);
	// $result->bindParam(4, $alamat_siswa);

	// $id_siswa     = "";
	// $nama_siswa   = "Ahmad";
	// $kelas_siswa  = "X";
	// $alamat_siswa = "Prendeng";

	// $result->execute();
	// echo $result->rowCount(). "Berhasil ditambahkan";

	// $result = $link->prepare("INSERT INTO siswa VALUES (:id_siswa, :nama_siswa, :kelas_siswa, :alamat_siswa)");

	// $result->bindParam(':id_siswa', $id_siswa);
	// $result->bindParam(':nama_siswa', $nama_siswa);
	// $result->bindParam(':kelas_siswa', $kelas_siswa);
	// $result->bindParam(':alamat_siswa', $alamat_siswa);

	// $id_siswa     = "";
	// $nama_siswa   = "Fahrudin";
	// $kelas_siswa  = "IX";
	// $alamat_siswa = "Jakarta";

	// $result->execute();
	// echo $result->rowCount(). "berhasil ditambahkan";

	// $result = $link->prepare("INSERT INTO siswa VALUES (:id_siswa, :nama_siswa, :kelas_siswa, :alamat_siswa)");

	// $id_siswa     = "";
	// $nama_siswa   = "Ajis";
	// $kelas_siswa  = "VII";
	// $alamat_siswa = "Tangerang";

	// $result->execute(array(':id_siswa' => $id_siswa ,':nama_siswa' => $nama_siswa, ':kelas_siswa' => $kelas_siswa, ':alamat_siswa' => $alamat_siswa));

	// echo $result->rowCount(). "berhasil ditambahkan";

	// $query = "UPDATE siswa SET nama = 'vanisa', kelas = 'VI', alamat = 'Pemalang' WHERE id = 4";

	// $result = $link->query($query);
	// $result->execute();
	// echo $result->rowCount(). "berhasil diubah";

	$result = $link->query("DELETE FROM siswa WHERE id = 3");
	$result->execute();
	echo $result->rowCount(). "Penghapusan berhasil";

	// $result = $link->query("SELECT * FROM siswa");
	// $result->execute();
	// $data = $result->fetchAll();
	// foreach ($data as $key => $value) {
	// 	echo $value['id']," ", $value['nama']," ", $value['kelas']," ", $value['alamat'];
	// 	echo "<br>";
	// }
}
catch(PDOException $exception){
	echo "Koneksi error". $exception->getMessage();
}
 ?>