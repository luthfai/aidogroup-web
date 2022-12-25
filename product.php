<?php
session_start();

if (!isset($_SESSION["login"])) {
  echo $_SESSION["login"];
  header("Location:login.php");
  exit;
}
require 'functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aido Group</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="wrapper">
    <!-- header start -->
    <section class="header">
      <a href="index.php" class="logo">
        <img src="/img/aidogroup.jpg" alt="logo">
        AIDO<span>GROUP</span>
      </a>
      <div class="admin-profile">
        <div class="admin-image">
          <img src="/img/user.jpg" alt="admin">
        </div>
        <div class="admin-name">
          <h4>Admin</h4>
          <small><a href="logout.php">Logout</a></small>
        </div>
      </div>
    </section>
    <!-- header end -->
    <!-- sidebar start -->
    <section class="sidebar">
      <ul>
        <li>
          <a href="dashboard.php">
            <span><i class="fas fa-gauge"></i></span>
            <span>Dashboard</span>
          </a>
        <li>
          <a href="admin.php">
            <span><i class="fas fa-user"></i></span>
            <span>Admin List</span>
          </a>
        </li>
        <li class="active">
          <a href="product.php">
            <span><i class="fas fa-database"></i></span>
            <span>Product Data</span>
          </a>
        </li>
        <li>
          <a href="banner.php">
            <span><i class="fas fa-image"></i></span>
            <span>Banner Data</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- sidebar end -->
    <!-- main container start -->
    <!-- main container start -->
    <section class="main-container">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card outer">
              <div class="card-header">
                <h4>List Produk</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tabel" class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Rating</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php $produk = mysqli_query($connection, "SELECT * FROM product"); ?>
                      <?php foreach ($produk as $row) : ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $row["nama"]; ?></td>
                          <td><?= $row["deskripsi"]; ?></td>
                          <td><?= $row["rating"]; ?>/5</td>
                          <td><?= $row["kategori"]; ?></td>
                          <td><img src="img/<?= $row["gambar"]; ?>" width="100"></td>
                          <td>
                            <a href="editProduk.php?id=<?= $row["id"]; ?>" class="badge bg-success">Edit</a>
                            <a href="hapusProduk.php?id=<?= $row["id"]; ?>" class="badge bg-danger" onclick="return confirm('Are you sure?');">Delete</a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <!-- tambah admin -->
                  <div class="tambah">
                    <a href="tambahProduk.php" class="badge bg-success"><i class="fa-solid fa-plus"></i>Tambah Produk</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- main container end -->
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
  <script src="tabel.js"></script>
</body>

</html>
