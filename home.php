<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END OF NAVBAR -->
  <!-- MAIN CONTENT -->
  <div class="container my-5">
    <div class="card">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="tambah.php" class="btn btn-primary">Go somewhere</a>
        <table class="table">
          <table class="table table-bordered border-primary">
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">NIS</th>
                <th scope="col">NAMA</th>
                <th scope="col">KELAS</th>
                <th scope="col">JURUSAN</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once 'koneksi.php';

              $query = "SELECT * FROM siswa";
              $result = mysqli_query($koneksi, $query);
              $i = 1;
              ?>

              <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>

                  <td><?= htmlspecialchars($row['nis'] ?? ''); ?></td>

                  <td><?= htmlspecialchars($row['nama'] ?? ''); ?></td>

                  <td><?= htmlspecialchars($row['kelas'] ?? ''); ?></td>

                  <td><?= htmlspecialchars($row['jurusan'] ?? ''); ?></td>

                  <td>
                    <a href="edit.php?id=<?= $row['id']; ?>"
                      class="btn btn-warning">
                      EDIT
                    </a>

                    <a href="hapus.php?id=<?= $row['id']; ?>"
                      class="btn btn-danger"
                      onclick="return confirm('Yakin ingin menghapus data ini?')">
                      HAPUS
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>

  <!-- END OF MAIN CONTENT -->
  <!-- FOOTER -->
  <footer class="bg-primary text-center text-lg-start mt-auto">
    <div class="container p-4">
      <p>&copy; 2026 StudentAPP, ALL rightr reserved</p>
    </div>
  </footer>
  <!-- END OF FOOTER-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>