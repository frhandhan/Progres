<?php
include "koneksi.php";

// Periksa apakah 'id' ada dalam URL
$id_peserta = isset($_GET['id']) ? $_GET['id'] : '';

if ($id_peserta) {
    // Hapus data mahasiswa dari database
    $proses_delete_data = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id_peserta") 
        or die(mysqli_error($koneksi));

    if ($proses_delete_data) {
        echo "<script>
                alert('Data Berhasil Dihapus');
                window.location.href='index.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location.href='index.php';
            </script>";
    }
} else {
    echo "<script>
        alert('Parameter tidak valid');
        window.location.href='index.php';
    </script>";
}
?>