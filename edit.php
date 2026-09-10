<?php
require_once "koneksi.php";

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];

/* ambil data siswa */
$result = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'");

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Data siswa tidak ditemukan.");
}

/* proses edit */
if (isset($_POST['edit'])) {

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $query = mysqli_query(
        $koneksi,
        "UPDATE siswa SET
            nis='$nis',
            nama='$nama',
            kelas='$kelas',
            jurusan='$jurusan'
        WHERE id='$id'"
    );

    if ($query) {
        header("Location: home.php");
        exit;
    } else {
        die("Data gagal diubah: " . mysqli_error($koneksi));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Navbar</a>

        <div class="navbar-nav">
            <a class="nav-link active" href="home.php">Home</a>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Edit Siswa
        </div>

        <div class="card-body">

            <h3 class="mb-4">Edit Siswa</h3>

            <form method="post">

                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input
                        type="text"
                        name="nis"
                        class="form-control"
                        value="<?= htmlspecialchars($row['nis'] ?? '') ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="<?= htmlspecialchars($row['nama'] ?? '') ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input
                        type="text"
                        name="kelas"
                        class="form-control"
                        value="<?= htmlspecialchars($row['kelas'] ?? '') ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input
                        type="text"
                        name="jurusan"
                        class="form-control"
                        value="<?= htmlspecialchars($row['jurusan'] ?? '') ?>"
                        required>
                </div>

                <button
                    type="submit"
                    name="edit"
                    class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a
                    href="home.php"
                    class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>