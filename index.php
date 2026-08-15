<?php

require_once "koneksi.php";

$result = mysqli_query($koneksi, "SELECT * FROM siswa");

?>

<h2>Data Siswa</h2>

<a href="tambah.php">Tambah Siswa</a>

<br><br>

<table border="1" cellpadding="8" cellspacing="0">

<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Aksi</th>
</tr>

<?php

$no = 1;

while ($row = mysqli_fetch_assoc($result)) {

    echo "<tr>
        <td>".$no++."</td>
        <td>".$row['nama']."</td>
        <td>".$row['kelas']."</td>
        <td>
            <a href='edit.php?id=".$row['id']."'>Edit</a> |
            <a href='hapus.php?id=".$row['id']."'
               onclick=\"return confirm('Yakin ingin menghapus data ini?')\">
               Hapus
            </a>
        </td>
    </tr>";

}

?>

</table>