<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>

<?php

include '../koneksi.php';

if (isset($_POST['submit'])) {
    $kode_materi = $_POST['kode_materi'];
    $nama_materi = $_POST['nama_materi'];
    $deskripsi = $_POST['deskripsi'];
    $pertemuan = $_POST['pertemuan'];
    $matkul = $_POST['matkul'];
    $tujuan = $_POST['tujuan'];
    $referensi = $_POST['referensi'];
    $media = $_POST['media'];
    $status = $_POST['status'];
    $link = $_POST['link_materi'];

    // Insert query
    $sql = "INSERT INTO materi (kode_materi, nama_materi, deskripsi, pertemuan_ke, matkul_id, tujuan, referensi, media, status_aktif, link_materi) VALUES ('$kode_materi', '$nama_materi', '$deskripsi', '$pertemuan', '$matkul', '$tujuan', '$referensi', '$media', '$status', '$link')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data Materi berhasil ditambahkan!'); window.location.href='tampilMateri.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function buildMatkulOptions($conn) {
    $options = '';
    $sql = "SELECT id, nama FROM matkul";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['nama']) . "</option>";
        }
    }
    return $options;
}

?>

<button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">X</button>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  </div>
</div>

<div class="container mt-5 border rounded p-4 mb-5">

    <center>
        <div class="rounded p-3 mb-3" style="width: 100%; background-color: rgb(42, 125, 207); color: azure;">
            <h3>Tambah Data Materi</h3>
        </div>
    </center>

    

    <form action="" method="POST">
    <center>
    </center>
        <div class="mb-3">
            <label for="kode_materi" class="form-label">Kode Materi</label>
            <input type="text" class="form-control" id="kode_materi" name="kode_materi" required>
        </div>
        <div class="mb-3">
            <label for="nama_materi" class="form-label">Nama Materi</label>
            <input type="text" class="form-control" id="nama_materi" name="nama_materi" required>
        </div>
        <div class="mb-3">
            <label for="nama_materi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="nama_materi" class="form-label">Pertemuan</label>
            <select name="pertemuan" class="form-control" id="">
                <option value="#">-- Pertemuan --</option>
                <option value="Pertemuan 1">Pertemuan 1</option>
                <option value="Pertemuan 2">Pertemuan 2</option>
                <option value="Pertemuan 3">Pertemuan 3</option>
                <option value="Pertemuan 4">Pertemuan 4</option>
                <option value="Pertemuan 5">Pertemuan 5</option>
                <option value="Pertemuan 6">Pertemuan 6</option>
                <option value="Pertemuan 7">Pertemuan 7</option>
                <option value="Pertemuan 8">Pertemuan 8</option>
                <option value="Pertemuan 9">Pertemuan 9</option>
                <option value="Pertemuan 10">Pertemuan 10</option>
                <option value="Pertemuan 11">Pertemuan 11</option>
                <option value="Pertemuan 12">Pertemuan 12</option>
                <option value="Pertemuan 13">Pertemuan 13</option>
                <option value="Pertemuan 14">Pertemuan 14</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pertemuan_ke" class="form-label">Mata Kuliah</label>
            <select name="matkul" class="form-control" id="">
                <option value="#">Pilih Mata Kuliah</option>
                <?php echo buildMatkulOptions($conn); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_materi" class="form-label">Tujuan</label>
            <textarea class="form-control" id="deskripsi" name="tujuan" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="nama_materi" class="form-label">Referensi</label>
            <textarea class="form-control" id="deskripsi" name="referensi" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="media" class="form-label">Media</label>
            <select name="media" class="form-control" id="" required>
                <option value="#">-- Pilih Media --</option>
                <option value="Ebook">Ebook</option>
                <option value="Video">Video</option>
                <option value="Video Tutorial">Video Tutorial</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="">File Materi (PDF, PPT, MP4, MOV)</label>
            <input type="file" class="form-control" name="" id="">
        </div>
        <div class="mb-3">
            <label for="">Status</label>
            <select name="status" class="form-control" id="">
                <option value="#">-- Pilih Status --</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_materi" class="form-label">Link Materi</label>
            <input type="text" class="form-control" id="nama_materi" name="link_materi" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
        <a href="tampilMateri.php" class="btn btn-secondary">Kembali</a>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>