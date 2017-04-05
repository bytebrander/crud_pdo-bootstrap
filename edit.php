<?php
 
 include "db.php";

 if(!isset($_GET['idTest'])){
        die("Error: ID Tidak Dimasukkan");
}
 
$query ="SELECT * FROM `datasiswa` WHERE id = :id";
$data = $link->prepare($query);
$data->bindParam(':id', $_GET['idTest']);
$data->execute();
 
if($data->rowCount() == 0){
    die("Error: ID Tidak Ditemukan");
}else{
       
    $result = $data->fetch();
}
  ?>
 
<!DOCTYPE html>
 <html>
     <head>
        <title>Edit Data</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     </head>
    <body>
        <h2><b>Edit Data</b></h2>
 
        <a href="index.php">Beranda</a>
        <form action="" method="post">
            <table><br>
                <tr>
                    <td>Nama: </td>
                    <td><input type="text" name="nama" value="<?php echo $result['nama']; ?>"></td>
                </tr>
                <tr>
                    <td>Kelas: </td>
                    <td>
                        <select name="kelas">
                            <option value="pilih kelas">Pilih Kelas</option>
                            <option value="X" <?php if ($result['kelas'] == 'X') {echo 'selected';} ?>>X
                            </option>
                            <option value="XI" <?php if ($result['kelas'] == 'XI') {echo 'selected';} ?>>XI
                            </option>
                            <option value="XII" <?php if ($result['kelas'] == 'XII') {echo 'selected';} ?>>XII
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jurusan: </td>
                    <td>
                        <select name="jurusan">
                            <option value="pilih jurusan">>Pilih Jurusan</option>
                            <option value="teknik komputer dan jaringan" <?php if ($result['jurusan'] == 'teknik komputer dan jaringan') {echo 'selected';} ?>>Teknik Komputer dan Jaringan
                            </option>
                            <option value="teknik mesin" <?php if ($result['jurusan'] == 'teknik mesin') {echo 'selected';} ?>>Teknik Mesin
                            </option>
                            <option value="kimia analisis" <?php if ($result['jurusan'] == 'kimia analisis') {echo 'selected';} ?>>Kimia Analisis
                            </option>
                            <option value="kimia industri" <?php if ($result['jurusan'] == 'kimia industri') {echo 'selected';} ?>>Kimia Industri
                            </option>
                            <option value="otomotif" <?php if ($result['jurusan'] == 'otomotif') {echo 'selected';} ?>>Otomotif</option>
                            <option value="farmasi" <?php if ($result['jurusan'] == 'farmasi') {echo 'selected';} ?>>Farmasi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin: </td>
                    <td>
                        <select name="jenis_kelamin">
                            <option value="laki-laki" <?php if ($result['jenis_kelamin'] == 'laki-laki') {echo 'selected';} ?>>Laki-laki
                            </option>
                            <option value="perempuan" <?php if ($result['jenis_kelamin'] == 'perempuan') {echo 'selected';} ?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alamat: </td>
                    <td><textarea name="alamat" cols="20" rows="5" required></textarea></td>
                </tr>
            </table>
            <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 90px;">Tambah</button>
        </form>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
 </html>

 <?php 

//Update Data
if (isset($_POST['submit'])) {
    if (is_numeric($_POST['nama'])) {
        echo "Maaf, Nama harus berkarakter huruf";
    }elseif (is_null($_POST['nama'])) {
       echo "nama tidak boleh kosong";
      } else {
        echo $nama = htmlentities($_POST['nama']);
    }
    $kelas    = htmlentities($_POST['kelas']);
    $jurusan  = htmlentities($_POST['jurusan']);
    $jenisklm = htmlentities($_POST['jenis_kelamin']);
    $alamat   = htmlentities($_POST['alamat']);
 
        $data = $link->prepare("UPDATE datasiswa SET nama = :nama, kelas = :kelas, jurusan = :jurusan, jenis_kelamin = :jenis_kelamin, alamat = :alamat WHERE id = :id");

        $data->bindParam(':nama', $nama);
        $data->bindParam(':kelas', $kelas);
        $data->bindParam(':jurusan', $jurusan);
        $data->bindParam(':jenis_kelamin', $jenisklm);
        $data->bindParam(':alamat', $alamat);
        $data->bindParam(':id', $_GET['idTest']);
 
        $data->execute();
        header('location:index.php');
}
  ?>