<?php

require_once "koneksi.php";

if (isset($_POST['tambah'])) {

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $query = mysqli_query( $koneksi, "INSERT INTO 
    siswa (nama, kelas)
         VALUES ('$nama', '$kelas')"
    );

    if ($query) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data gagal ditambahkan";
    }
}

?>

<h2>Tambah Siswa</h2>

<form method="post">

    Nama:
    <input type="text" name="nama" required>

    <br><br>

    Kelas:
    <input type="text" name="kelas" required>

    <br><br>

    <button type="submit" name="tambah">
        Tambah
    </button>

</form>

<br>

<a href="index.php">Kembali</a>