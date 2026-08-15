<?php

require_once "koneksi.php";

$id = $_GET['id'];

if (isset($_POST['edit'])) {

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $query = mysqli_query( $koneksi,"UPDATE siswa  SET 
    nama='$nama', kelas='$kelas' WHERE id=$id"
    );

    if ($query) {
        echo "Data berhasil diubah";
    } else {
        echo "Data gagal diubah";
    }
}

$result = mysqli_query(
    $koneksi,
    "SELECT * FROM siswa WHERE id=$id"
);

$row = mysqli_fetch_assoc($result);

?>

<h2>Edit Siswa</h2>

<form method="post">

    Nama:
    <input
        type="text"
        name="nama"
        value="<?= $row['nama']; ?>"
        required
    >

    <br><br>

    Kelas:
    <input
        type="text"
        name="kelas"
        value="<?= $row['kelas']; ?>"
        required
    >

    <br><br>

    <button type="submit" name="edit">
        Edit
    </button>

</form>

<br>

<a href="index.php">Kembali</a>
