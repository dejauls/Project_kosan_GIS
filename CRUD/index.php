<?php include 'koneksi.php';
$sql = "SELECT * FROM kosan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rumah Kos</title>
    <link href="../src/output.css" rel="stylesheet">
</head>

 

<body>
    <nav class="p-4">
 
        <a class=" " href="../index.php">
            <svg fill="#e27712" height="40px" width="40px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 219.151 219.151" xml:space="preserve" stroke="#e27712">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <g>
                        <path d="M109.576,219.151c60.419,0,109.573-49.156,109.573-109.576C219.149,49.156,169.995,0,109.576,0S0.002,49.156,0.002,109.575 C0.002,169.995,49.157,219.151,109.576,219.151z M109.576,15c52.148,0,94.573,42.426,94.574,94.575 c0,52.149-42.425,94.575-94.574,94.576c-52.148-0.001-94.573-42.427-94.573-94.577C15.003,57.427,57.428,15,109.576,15z"></path>
                        <path d="M94.861,156.507c2.929,2.928,7.678,2.927,10.606,0c2.93-2.93,2.93-7.678-0.001-10.608l-28.82-28.819l83.457-0.008 c4.142-0.001,7.499-3.358,7.499-7.502c-0.001-4.142-3.358-7.498-7.5-7.498l-83.46,0.008l28.827-28.825 c2.929-2.929,2.929-7.679,0-10.607c-1.465-1.464-3.384-2.197-5.304-2.197c-1.919,0-3.838,0.733-5.303,2.196l-41.629,41.628 c-1.407,1.406-2.197,3.313-2.197,5.303c0.001,1.99,0.791,3.896,2.198,5.305L94.861,156.507z"></path>
                    </g>
                </g>
            </svg>
        </a>

    </nav>
    <div class="w-full p-4 ">
    <div class="relative mb-8">
        <h1 class="text-3xl font-black text-blue-500 underline ml-4">Daftar Rumah Kos</h1>
        <a href="create.php" class="absolute right-4 top-0 text-white bg-orange-600 p-2 border-2 border-gray-600 rounded-full">Tambah Data Kos</a>
    </div>
        <table class="mt-8 mx-4 border border-gray-300 border-collapse  ">
            <thead class="p-2">
                <tr class="text-xs">
                    <th class="border border-gray-300 p-2">ID</th>
                    <th class="border border-gray-300 p-2">Universitas</th>
                    <th class="border border-gray-300 p-2">Nama Kos</th>
                    <th class="border border-gray-300 p-2">Jenis Kos</th>
                    <th class="border border-gray-300 p-2">Tipe Kos</th>
                    <th class="border border-gray-300 p-2">Deskripsi</th>
                    <th class="border border-gray-300 p-2">Harga</th>
                    <th class="border border-gray-300 p-2">Fasilitas</th>
                    <th class="border border-gray-300 p-2">Nomor WhatsApp</th>
                    <th class="border border-gray-300 p-2">Alamat</th>
                    <th class="border border-gray-300 p-2">Provinsi</th>
                    <th class="border border-gray-300 p-2">Kota</th>
                    <th class="border border-gray-300 p-2">Kecamatan</th>
                    <th class="border border-gray-300 p-2">Jarak</th>
                    <th class="border border-gray-300 p-2">Latitude</th>
                    <th class="border border-gray-300 p-2">Longitude</th>
                    <th class="border border-gray-300 p-2">Foto</th>
                    <th class="border border-gray-300 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="border border-gray-300 border-collapse text-xs">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="border border-gray-300 p-2"><?php echo $row['id']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['universitas']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['nama_kos']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['jenis_kos']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['durasi_sewa']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['deskripsi']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['harga']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['fasilitas']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['no_telepon']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['alamat']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['provinsi']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['kota']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['kecamatan']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['jarak']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['latitude']; ?></td>
                        <td class="border border-gray-300 p-2"><?php echo $row['longitude']; ?></td>
                        <td class="border border-gray-300 p-2"><img src="<?php echo $row['gambar_url']; ?>" width="200"></td>
                        <td class="border border-gray-300 p-2">
                            <?php
                            // Pecah string berdasarkan koma
                            $paths = explode(',', $row['gambar_tambahan']);

                            // Loop melalui setiap path dan tampilkan gambar
                            foreach ($paths as $path) {
                                echo '<img src="' . htmlspecialchars($path) . '" width="80" style="margin-bottom: 5px;">';
                            }
                            ?>
                        </td>

                        <td class=" p-2 flex flex-col space-y-2 border-t border-gray-300">
                            <a class="text-blue-700 font-semibold   " href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a class="text-blue-700 font-semibold  "href="delete.php ?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>


            </tbody>
        </table>
    </div>
  
</body>

</html>