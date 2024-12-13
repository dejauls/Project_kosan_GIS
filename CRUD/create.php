<?php
include 'koneksi.php'; // Pastikan file koneksi sudah benar

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


    // Masukkan data ke database
    $sql = "INSERT INTO unimal (universitas, nama_kos, jenis_kos, tipe_kos, deskripsi, nomor_whatsapp, alamat, provinsi, kota, kecamatan, latitude, longitude, foto) 
            VALUES ('$universitas', '$nama_kos', '$jenis_kos', '$tipe_kos', '$deskripsi', '$nomor_whatsapp', '$alamat', '$provinsi', '$kota', '$kecamatan', '$latitude', '$longitude', '$foto_path')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect jika berhasil
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../src/output.css">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEbVW5Lg6Lq791gdiOboFQHEo1Qur4LjA&callback=initialize" async defer></script>

    <script>
        var marker;

        function taruhMarker(peta, posisiTitik) {
            // Check if a marker already exists, then update its position
            if (marker) {
                marker.setPosition(posisiTitik);
            } else {
                // Create a new marker
                marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: peta
                });
            }
            // Update the input fields with latitude and longitude values
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();
        }

        function initialize() {
            // Map properties
            var propertiPeta = {
                center: new google.maps.LatLng(5.120842, 97.158348), // Proper LatLng constructor
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // Create the map
            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

            // Add a click event listener to place a marker
            google.maps.event.addListener(peta, 'click', function(event) {
                taruhMarker(this, event.latLng);
            });
        }

        // Use standard `addEventListener` instead of deprecated `addDomListener`
        window.addEventListener('load', initialize);
    </script>

</head>

<style>
    /* body * {
            border: 1px solid red;
        } */
</style>

<body>
    <div class="container max-w-4xl mx-auto shadow-lg bg-white p-8 rounded-xl mt-8">
        <h2 class="text-center font-bold text-3xl text-gray-800 mb-8">Form Input Data Kos</h2>
        <form action="save.php" method="post" enctype="multipart/form-data" class="grid grid-cols-2 gap-6">

            <!-- Universitas Dropdown -->
            <div class="flex flex-col  ">
                <label for="universitas" class="font-semibold   mb-2">Universitas:</label>
                <select name="universitas" id="universitas" required class="border border-gray-300 rounded-md p-2">
                    <option value="UNIVERSITAS MALIKUSSALEH">UNIVERSITAS MALIKUSSALEH</option>
                    <option value="POLTEK LHOKSEUMAWE">POLTEK LHOKSEUMAWE</option>
                    <option value="STIE LHOKSEUMAWE">STIE LHOKSEUMAWE</option>
                    <option value="STIAN LHOKSEUMAWE">STIAN LHOKSEUMAWE</option>
                    <option value="UNIVERSITAS BUMI PERSADA">UNIVERSITAS BUMI PERSADA</option>
                    <option value="INSTITUT AGAMA ISLAM NEGERI LHOKSEUMAWE">INSTITUT AGAMA ISLAM NEGERI LHOKSEUMAWE</option>
                    <option value="UNIVERSITAS ISLAM KEBANGSAAN INDONESIA">UNIVERSITAS ISLAM KEBANGSAAN INDONESIA</option>
                    <option value="STIKKES DARUSSALAM LHOKSEUMAWE">STIKKES DARUSSALAM LHOKSEUMAWE</option>
                    <option value="STIKKES MUHAMMADIYAH LHOKSEUMAWE">STIKKES MUHAMMADIYAH LHOKSEUMAWE</option>
                    <option value="SEKOLAH TINGGI ILMU HUKUM AL-BANNA">SEKOLAH TINGGI ILMU HUKUM AL-BANNA</option>
                    <option value="STIKES GETSEMPANA LHOKSUKON">STIKES GETSEMPANA LHOKSUKON</option>
                    <option value="STAI JAMIATUT TARBIYAH LHOKSUKON">STAI JAMIATUT TARBIYAH LHOKSUKON</option>
                </select>
            </div>

            <!-- Nama Kos -->
            <div class="flex flex-col  ">
                <label for="nama_kos" class="font-semibold   mb-2">Nama Kos*</label>
                <input type="text" name="nama_kos" id="nama_kos" required class="border border-gray-300 rounded-md p-2">
            </div>

            <!-- Jenis Kos -->
            <div class="flex flex-col  ">
                <label for="jenis_kos" class="font-semibold   mb-2">Jenis Kos:</label>
                <select name="jenis_kos" id="jenis_kos" required class="border border-gray-300 rounded-md p-2">
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <!-- Tipe Kos -->
            <div class="flex flex-col  ">
                <label for="tipe_kos" class="font-semibold   mb-2">Tipe Kos:</label>
                <select name="tipe_kos" id="tipe_kos" required class="border border-gray-300 rounded-md p-2">
                    <option value="Bulanan">Bulanan</option>
                    <option value="Tahunan">Tahunan</option>
                </select>
            </div>

            <!-- Deskripsi -->
            <div class="flex flex-col  ">
                <label for="deskripsi" class="font-semibold   mb-2">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="border border-gray-300 rounded-md p-2"></textarea>
            </div>

            <!-- WhatsApp & Alamat -->
            <div class="flex flex-col  ">
                <label for="nomor_whatsapp" class="font-semibold   mb-2">Nomor WhatsApp:</label>
                <input type="text" name="nomor_whatsapp" id="nomor_whatsapp" class="border border-gray-300 rounded-md p-2 mb-4">

                <label for="alamat" class="font-semibold   mb-2">Alamat:</label>
                <input type="text" name="alamat" id="alamat" required class="border border-gray-300 rounded-md p-2">
            </div>

            <!-- Provinsi, Kota, Kecamatan -->
            <div class="flex flex-col sm:grid sm:grid-cols-3 gap-2   ">
                <div class="flex flex-col">
                    <label for="provinsi" class="font-semibold   mb-2">Provinsi:</label>
                    <select name="provinsi" id="provinsi" required class="border border-gray-300 rounded-md p-2">
                        <option value="Aceh">Aceh</option>
                    </select>
                </div>

                <div class="flex flex-col  ">
                    <label for="kota" class="font-semibold   mb-2">Kota:</label>
                    <select name="kota" id="kota" required class="border border-gray-300 rounded-md p-2">
                        <option value="Lhokseumawe">Lhokseumawe</option>
                        <option value="Aceh Utara">Aceh Utara</option>
                    </select>
                </div>

                <div class="flex flex-col  ">
                    <label for="kecamatan" class="font-semibold   mb-2">Kecamatan:</label>
                    <select name="kecamatan" id="kecamatan" required class="border border-gray-300 rounded-md p-2">
                        <option value="Banda Sakti">Banda Sakti</option>
                        <option value="Muara Satu">Muara Satu</option>
                        <option value="Muara Dua">Muara Dua</option>
                        <option value="Blang Mangat">Blang Mangat</option>
                        <option value="Tanah Pasir">Tanah Pasir</option>
                        <option value="Lhoksukon">Lhoksukon</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col   ">
                <div class=" ">
                    <img id="imagePreview" src="" alt=" " class="hidden w-40   object-cover  rounded-md" />
                </div>
                <label for="foto" class="font-semibold   mb-2">Foto Kos:</label>
                <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png" required class="border border-gray-300 rounded-md p-2" onchange="previewImage(event)">

                <!-- Image Preview Box -->

            </div>
            <script>
                function previewImage(event) {
                    const file = event.target.files[0];
                    const reader = new FileReader();

                    reader.onload = function() {
                        const imagePreview = document.getElementById('imagePreview');
                        imagePreview.src = reader.result;
                        imagePreview.classList.remove('hidden');
                    }

                    if (file) {
                        reader.readAsDataURL(file);
                    }
                }
            </script>

            <!-- Google Map Marker -->
            <div class="flex flex-col mt-6  ">
                <label for="marker" class="font-semibold   mb-2">Geser Marker Sesuai Posisi Properti:</label>
                <div id="googleMap" class="w-full h-96 border border-gray-300 rounded-md"></div>

            </div>
            <div class="flex flex-col mt-4 gap-4">
                <div class="flex flex-col mr-6 ">
                    <label for="latitude" class="font-semibold   mb-2">Latitude:</label>
                    <input type="number" id="latitude" name="latitude" required class="border border-gray-300 rounded-md p-2">
                </div>
                <div class="flex flex-col mr-6">
                    <label for="longitude" class="font-semibold   mb-2">Longitude:</label>
                    <input type="number" id="longitude" name="longitude" required class="border border-gray-300 rounded-md p-2">
                </div>
            </div>
            <!-- Foto Kos -->
            <div class="mt-8"></div>
            <!-- Submit Button -->
            <div class="flex justify-center mt-12 cols-span-2 w-full">
                <button type="submit" class="bg-orange-500 w-full text-white font-semibold py-2 px-6 rounded-lg hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50">Simpan</button>
            </div>

        </form>

    </div>

</body>

</html>