<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM unimal WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

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

    // Upload foto jika ada
    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        $sql = "UPDATE unimal SET universitas='$universitas', nama_kos='$nama_kos', jenis_kos='$jenis_kos', tipe_kos='$tipe_kos', deskripsi='$deskripsi', nomor_whatsapp='$nomor_whatsapp', alamat='$alamat', provinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', latitude='$latitude', longitude='$longitude', foto='$target_file' WHERE id=$id";
    } else {
        $sql = "UPDATE unimal SET universitas='$universitas', nama_kos='$nama_kos', jenis_kos='$jenis_kos', tipe_kos='$tipe_kos', deskripsi='$deskripsi', nomor_whatsapp='$nomor_whatsapp', alamat='$alamat', provinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', latitude='$latitude', longitude='$longitude' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kos</title>
    <link rel="stylesheet" href="../src/output.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10 px-4 w-2/3">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Edit Data Kos</h1>
        <form action="" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            <!-- Universitas -->
            <div class="mb-4">
                <label for="universitas" class="block text-sm font-medium text-gray-700 mb-1">Universitas:</label>
                <select name="universitas" id="universitas" class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="UNIVERSITAS MALIKUSSALEH" <?php echo ($row['universitas'] == 'UNIVERSITAS MALIKUSSALEH') ? 'selected' : ''; ?>>UNIVERSITAS MALIKUSSALEH</option>
                    <option value="POLTEK LHOKSEUMAWE" <?php echo ($row['universitas'] == 'POLTEK LHOKSEUMAWE') ? 'selected' : ''; ?>>POLTEK LHOKSEUMAWE</option>
                    <option value="STIE LHOKSEUMAWE" <?php echo ($row['universitas'] == 'STIE LHOKSEUMAWE') ? 'selected' : ''; ?>>STIE LHOKSEUMAWE</option>
                    <option value="STIAN LHOKSEUMAWE" <?php echo ($row['universitas'] == 'STIAN LHOKSEUMAWE') ? 'selected' : ''; ?>>STIAN LHOKSEUMAWE</option>
                    <option value="UNIVERSITAS BUMI PERSADA" <?php echo ($row['universitas'] == 'UNIVERSITAS BUMI PERSADA') ? 'selected' : ''; ?>>UNIVERSITAS BUMI PERSADA</option>
                </select>
            </div>

            <!-- Nama Kos -->
            <div class="mb-4">
                <label for="nama_kos" class="block text-sm font-medium text-gray-700 mb-1">Nama Kos:</label>
                <input type="text" name="nama_kos" id="nama_kos" value="<?php echo $row['nama_kos']; ?>" class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Jenis Kos -->
            <div class="mb-4">
                <label for="jenis_kos" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kos:</label>
                <select name="jenis_kos" id="jenis_kos" class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="Pria" <?php echo ($row['jenis_kos'] == 'Pria') ? 'selected' : ''; ?>>Pria</option>
                    <option value="Wanita" <?php echo ($row['jenis_kos'] == 'Wanita') ? 'selected' : ''; ?>>Wanita</option>
                </select>
            </div>

            <!-- Tipe Kos -->
            <div class="mb-4">
                <label for="tipe_kos" class="block text-sm font-medium text-gray-700 mb-1">Tipe Kos:</label>
                <select name="tipe_kos" id="tipe_kos" class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="Bulanan" <?php echo ($row['tipe_kos'] == 'Bulanan') ? 'selected' : ''; ?>>Bulanan</option>
                    <option value="Tahunan" <?php echo ($row['tipe_kos'] == 'Tahunan') ? 'selected' : ''; ?>>Tahunan</option>
                </select>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" required><?php echo $row['deskripsi']; ?></textarea>
            </div>

            <!-- Nomor WhatsApp -->
            <div class="mb-4">
                <label for="nomor_whatsapp" class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp:</label>
                <input type="text" name="nomor_whatsapp" id="nomor_whatsapp" value="<?php echo $row['nomor_whatsapp']; ?>" class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat:</label>
                <input type="text" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>" class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Foto Kos -->
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto Kos:</label>
                <input type="file" name="foto" id="foto" class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" accept="image/*">
                <?php if (!empty($row['foto'])): ?>
                    <img src="<?php echo $row['foto']; ?>" alt="Foto Kos" class="mt-2 rounded-lg shadow-md w-36">
                <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded-md shadow hover:bg-orange-700 focus:ring focus:ring-orange-500">Update</button>
            </div>
        </form>
    </div>
</body>

</html>