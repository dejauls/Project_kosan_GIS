<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $universitas = $_POST['universitas'];
    $nama_kos = $_POST['nama_kos'];
    $jenis_kos = $_POST['jenis_kos'];
    $tipe_kos = $_POST['tipe_kos'];
    $deskripsi = $_POST['deskripsi'];
    $nomor_whatsapp = $_POST['nomor_whatsapp'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Upload foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name']; // Nama file asli
        $foto_path = "../uploads/" . $foto; // Gabungkan dengan prefix ../uploads/
    } else {
        echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
        exit;
    }

    // Debugging: Pastikan $foto_path sudah benar
    echo "Nama file yang akan disimpan: $foto_path"; // Hapus echo ini setelah debugging


    $sql = "INSERT INTO unimal (universitas, nama_kos, jenis_kos, tipe_kos, deskripsi, nomor_whatsapp, alamat, provinsi, kota, kecamatan, latitude, longitude, foto) VALUES ('$universitas', '$nama_kos', '$jenis_kos', '$tipe_kos', '$deskripsi', '$nomor_whatsapp', '$alamat', '$provinsi', '$kota', '$kecamatan', '$latitude', '$longitude', '$foto_path')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: create.php");
}
