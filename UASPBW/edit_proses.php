<?php
include "koneksi.php";

// Periksa apakah 'id' ada dalam URL
$id_peserta = isset($_GET['id']) ? $_GET['id'] : '';

if ($id_peserta && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form POST
    $nm_mhs = isset($_POST['nama_mahasiswa']) ? $_POST['nama_mahasiswa'] : '';
    $npm_mhs = isset($_POST['npm_mahasiswa']) ? $_POST['npm_mahasiswa'] : '';
    $prodi_mhs = isset($_POST['prodi']) ? $_POST['prodi'] : '';
    $gender = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';

    // Pastikan data tidak kosong sebelum melakukan update
    if ($nm_mhs && $prodi_mhs) {
        // Update data mahasiswa
        $proses_update_data = mysqli_query($koneksi, "UPDATE mahasiswa SET 
            nama_mahasiswa = '".mysqli_real_escape_string($koneksi, $nm_mhs)."',  
            prodi = '".mysqli_real_escape_string($koneksi, $prodi_mhs)."',
            jenis_kelamin = '".mysqli_real_escape_string($koneksi, $gender)."'
            WHERE id = '".mysqli_real_escape_string($koneksi, $id_peserta)."'")
            or die(mysqli_error($koneksi));

        // Cek apakah update berhasil
        if ($proses_update_data) {
            echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href='index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data Gagal Disimpan');
                window.location.href='index.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Data tidak lengkap');
            window.location.href='index.php';
        </script>";
    }
} else if (!$id_peserta) {
    echo "<script>
        alert('Parameter tidak valid');
        window.location.href='index.php';
    </script>";
}
?>