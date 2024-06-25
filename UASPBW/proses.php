<?php
include "koneksi.php";

// Mengambil data inputan
$nama_mhs = mysqli_real_escape_string($koneksi, $_POST['nama']);
$npm_mhs = mysqli_real_escape_string($koneksi, $_POST['npm']);
$prodi_mhs = mysqli_real_escape_string($koneksi, $_POST['prodi']);
$gender = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);

// Proses penyimpanan data ke database
$stmt = $koneksi->prepare("INSERT INTO mahasiswa (nama_mahasiswa, npm_mahasiswa, prodi, jenis_kelamin) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sss", $nama_mhs, $npm_mhs, $prodi_mhs, $gender);

if ($stmt->execute()) {
    echo "
        <script>
            alert('Data Berhasil Disimpan');
            window.location.href='index.php';
        </script>";
} else {
    echo "
        <script>
            alert('Data Gagal Disimpan');
            window.location.href='index.php';
        </script>";
}

$stmt->close();
$koneksi->close();
?>