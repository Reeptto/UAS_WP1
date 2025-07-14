<?php 
include '../koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM materi WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data Materi berhasil dihapus!'); window.location.href='tampilMateri.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>