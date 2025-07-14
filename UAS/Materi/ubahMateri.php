<?php 
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM materi WHERE id=$id";
    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }else {
        echo "<script>alert('Data Materi tidak ditemukan!'); window.location.href='tampilMateri.php';</script>";
    }
}else {
    echo "<script>alert('ID Materi tidak valid!'); window.location.href='tampilMateri.php';</script>";
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
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

    // Update query
    $sql = "UPDATE materi SET kode_materi='$kode_materi', nama_materi='$nama_materi', deskripsi='$deskripsi', pertemuan_ke='$pertemuan', matkul_id='$matkul', tujuan='$tujuan', referensi='$referensi', media='$media', status_aktif='$status', link_materi='$link' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data Materi berhasil diubah'); window.location.href='tampilMateri.php';</script>";
        $conn->close();
        header("Location: tampilMateri.php");
        exit();
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function optionSelect($table, $idField, $nameField, $selectedId) {
    global $conn;
    $options = "";
    $query = "SELECT $idField, $nameField FROM $table";
    $res = $conn->query($query);
    while ($r = $res->fetch_assoc()) {
        $selected = ($r[$idField] == $selectedId) ? "selected" : "";
        $options .= "<option value='". $r[$idField]."' $selected>". $r[$nameField]. "</option>";
    }
    return $options;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

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

<div class="container mt-5 border rounded p-4 mb-5">

    <center>
        <div class="rounded p-3 mb-3" style="width: 100%; background-color: rgb(42, 125, 207); color: azure;">
            <h3>Ubah Data Materi</h3>
        </div>
    </center>

    <form action="" method="POST">
    <center>
    </center>
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="mb-3">
            <label for="kode_materi" class="form-label">Kode Materi</label>
            <input type="text" class="form-control" id="kode_materi" name="kode_materi" value="<?= $row['kode_materi'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama_materi" class="form-label">Nama Materi</label>
            <input type="text" class="form-control" id="nama_materi" name="nama_materi" value="<?= $row['nama_materi'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama_materi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= $row['deskripsi'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="nama_materi" class="form-label">Pertemuan</label>
            <select name="pertemuan" class="form-control" id="">
                <option value="#">-- Pertemuan --</option>
                <option value="Pertemuan 1" >Pertemuan 1</option>
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
                <option value="#">-- Pilih Mata Kuliah --</option>
                <?= optionSelect("matkul", "id", "nama", $row['matkul_id']); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="nama_materi" class="form-label">Tujuan</label>
            <textarea class="form-control" id="deskripsi" name="tujuan" rows="3" value="" required><?= $row['tujuan'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="nama_materi" class="form-label">Referensi</label>
            <textarea class="form-control" id="deskripsi" name="referensi" rows="3" required><?= $row['referensi'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="media" class="form-label">Media</label>
            <select name="media" class="form-control" id="" required>
                <option value="#">-- Pilih Media --</option>
                <option value="Ebook" <?= ($row['media'] == 'Ebook') ? 'selected' : '' ?>>Ebook</option>
                <option value="Video" <?= ($row['media'] == 'Video') ? '    selected' : '' ?>>Video</option>
                <option value="Audio" <?= ($row['media'] == 'Video Tutorial') ? 'selected' : '' ?>>Video Tutorial</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="">File Materi (PDF, PPT, MP4, MOV)</label>
            <input type="file" class="form-control" name="" id="">
        </div>

        <div class="mb-3">
            <label for="">Status</label>
            <select name="status" class="form-control" id="" required>
                <option value="#">-- Pilih Status --</option>
                <option value="Aktif" <?= ($row['status_aktif'] == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
                <option value="Tidak Aktif" <?= ($row['status_aktif'] == 'Tidak Aktif') ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nama_materi" class="form-label">Link Materi</label>
            <input type="text" class="form-control" id="nama_materi" name="link_materi" value="<?= $row['link_materi'] ?>">
        </div>

        <button type="submit" class="btn btn-warning" name="update">Update</button>
        <a href="tampilMateri.php" class="btn btn-secondary">Kembali</a>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>