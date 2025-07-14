<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
   
    </style>
</head>
<body>
<button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">X</button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

  </div>
</div>

<div class="container mt-5 border p-4 mb-5 rounded">

    <center>
        <div class="rounded p-3 mb-5"  style="width: 100%; background-color:rgb(42, 125, 207); color: azure;">
            <h3>Data Materi</h3>
        </div>
    </center>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Materi</th>
            <th>Pertemuan</th>
            <th>Mata Kuliah</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../koneksi.php';
        $sql = "SELECT a.id, a.kode_materi, a.nama_materi, a.pertemuan_ke, b.nama, a.status_aktif FROM materi a LEFT JOIN matkul b ON a.matkul_id = b.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        $i = 1;
            while ( $row = $result->fetch_assoc() ) {
                echo "<tr>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $row['kode_materi'] . "</td>";
                echo "<td>" . $row['nama_materi'] . "</td>";
                echo "<td>" . $row['pertemuan_ke'] . "</td>";
                echo "<td>" . $row['nama']. "</td>";
                echo "<td>" . $row['status_aktif'] . "</td>";
                echo "<td>
                        <a href='ubahMateri.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a> |
                        <a href='hapusMateri.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } 
        
        ?>
    </tbody>
</table>

<a href="tambahMateri.php" class="form-control btn btn-success">Tambah Data</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>