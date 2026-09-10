<?php
require_once "koneksi.php";

if (!isset($_GET['id'])) {
    die("ID siswa tidak ditemukan.");
}

$id = $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "DELETE FROM siswa WHERE id='$id'"
);

if ($query) {
    header("Location: home.php");
    exit;
} else {
    echo "Data gagal dihapus: " . mysqli_error($koneksi);
}
?>