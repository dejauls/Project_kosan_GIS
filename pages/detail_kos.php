<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'universitas'); // Ganti dengan database yang sesuai

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


// Ambil ID kosan dari URL
$id = intval($_GET['id']); // Pastikan ID adalah angka untuk keamanan

// Query data kosan berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM kosan WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$kosan = $result->fetch_assoc();

// Tampilkan data kosan jika tersedia
if ($kosan): 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kosan</title>
    <link href="../src/output.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
         /* body * {
            border: 1px solid red;
        } */
    </style>
</head>
<body class="bg-gray-100 p-4 w-full font-montserrat">
    <section class="  bg-gray-200 rounded-xl px-16  py-8 ">
        <div class="grid grid-cols-3 space-x-12">
            <div class="w-96">
                <img id="mainImage" src="../uploads/<?= htmlspecialchars($kosan['gambar_url']) ?>" alt="Foto Kosan" class="w-full h-80 object-cover rounded-md border-2 border-gray-500 mb-4">
                <div class="flex space-x-2 mt-4">
                    <?php
                    $gambarTambahan = explode(',', $kosan['gambar_tambahan']); 
                    foreach ($gambarTambahan as $gambar):
                    ?>
                    <img src="../uploads/<?= htmlspecialchars(trim($gambar)) ?>" alt="Thumbnail" class="w-16 h-16 object-cover rounded-md cursor-pointer border-2 border-gray-500 hover:ring-2 hover:ring-orange-500" onclick="changeMainImage(this)">
                    <?php endforeach; ?>
                </div>
                <script>
                    function changeMainImage(thumbnail) {
                        const mainImage = document.getElementById('mainImage');
                        mainImage.src = thumbnail.src;
                    }
                </script>
            </div>
            <div class="flex flex-col w-96 ">
                <div>
                    <h1 class="text-3xl font-bold "> <?= htmlspecialchars($kosan['nama_kos']) ?></h1>
                </div>
                <div>
                    <p class=" font-bold text-lg mt-4">Harga: Rp <?= number_format($kosan['harga'], 0, ',', '.') ?> / Tahun</p>
                    <p class="text-gray-800 font-medium my-4"><?= htmlspecialchars($kosan['deskripsi']) ?></p>
                </div>
                <div class="mt-4">
                    <div class="flex flex-row w-full gap-4 justify-evenly px-8 py-2 border-y border-gray-500">
                        <div id="detailTab" class="cursor-pointer">
                            <h2>Detail</h2>
                        </div>
                        <div id="fasilitasTab" class="cursor-pointer">
                            <h2>Fasilitas</h2>
                        </div>
                    </div>
                    <div id="detailkos" class=" mt-4 space-y-[4px]">
                        
                        <p><span class="font-bold text-gray-500">Jenis Kos:</span> <?= htmlspecialchars($kosan['jenis_kos']) ?></p>
                        <p><span class="font-bold text-gray-500">Durasi Sewa:</span> <?= htmlspecialchars($kosan['durasi_sewa']) ?></p>
                        <p><span class="font-bold text-gray-500">Jarak ke Universitas:</span> <?= htmlspecialchars($kosan['jarak']) ?> km</p>
                        <p><span class="font-bold text-gray-500">Alamat:</span> <?= htmlspecialchars($kosan['alamat']) ?></p>
                        <p><span class="font-bold text-gray-500">Jarak dari kampus: </span> <?= htmlspecialchars($kosan['jarak']) ?> km</p>
                        <p class="text-sm ">
                            <span class="font-semibold text-gray-800"> Kecamatan:</span> <?= htmlspecialchars($kosan['kecamatan']) ?>, <span class="font-semibold text-gray-800"> Kota: </span><?= htmlspecialchars($kosan['kota']) ?>,<span class="font-semibold text-gray-800"> Provinsi:</span> <?= htmlspecialchars($kosan['provinsi']) ?>
                        </p>
                    </div>
                    <div id="fasilitaskos" class="hidden mt-4">
                        <ul class="">
                            <?php
                            // Ubah string fasilitas menjadi array
                            $fasilitasArray = explode(',', $kosan['fasilitas']);

                            // Loop melalui array fasilitas dan tampilkan sebagai list dengan SVG
                            foreach ($fasilitasArray as $fasilitas) {
                                echo '<li class="flex items-center mb-2">';
                                // Tambahkan SVG di sebelah kiri teks
                                echo '<svg class="w-5 h-5 text-blue-500 mr-2" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <defs>
                                                <style>
                                                    .cls-1 { fill: none; }
                                                    .cls-2 { fill: #bdeeff; }
                                                    .cls-3 { fill: #02a0e1; }
                                                    .cls-4 { fill: #ffffff; }
                                                </style>
                                            </defs>
                                            <rect class="cls-1" height="32" id="wrapper" width="32" x="0.05"></rect>
                                            <circle class="cls-2" cx="16.05" cy="15.59" r="13.72"></circle>
                                            <path class="cls-3" d="M16.05,30.31A14.72,14.72,0,1,1,30.77,15.59,14.74,14.74,0,0,1,16.05,30.31Zm0-27.43A12.72,12.72,0,1,0,28.77,15.59,12.73,12.73,0,0,0,16.05,2.88Z"></path>
                                            <circle class="cls-4" cx="16.05" cy="15.59" r="9.82"></circle>
                                            <path class="cls-3" d="M16.05,26.41A10.82,10.82,0,1,1,26.87,15.59,10.83,10.83,0,0,1,16.05,26.41Zm0-19.64a8.82,8.82,0,1,0,8.82,8.82A8.83,8.83,0,0,0,16.05,6.77Z"></path>
                                            <path class="cls-3" d="M14.43,19.69a1,1,0,0,1-.61-.22l-2.88-2.25a1,1,0,1,1,1.23-1.57l2.18,1.7,5.49-5.56a1,1,0,0,1,1.42,1.41l-6.12,6.19A1,1,0,0,1,14.43,19.69Z"></path>
                                        </g>
                                    </svg>';
                                // Tampilkan teks fasilitas
                                echo '<span class="text-gray-700">' . htmlspecialchars(trim($fasilitas)) . '</span>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>




                </div>

                <script>
                    // Ambil elemen yang diperlukan
                    const detailTab = document.getElementById('detailTab');
                    const fasilitasTab = document.getElementById('fasilitasTab');
                    const detailKos = document.getElementById('detailkos');
                    const fasilitasKos = document.getElementById('fasilitaskos');

                    // Fungsi untuk menampilkan bagian Detail
                    function showDetail() {
                        detailKos.classList.remove('hidden');
                        fasilitasKos.classList.add('hidden');
                        detailTab.classList.add('font-bold', 'text-orange-600');
                        fasilitasTab.classList.remove('font-bold', 'text-orange-600');
                    }

                    // Fungsi untuk menampilkan bagian Fasilitas
                    function showFasilitas() {
                        fasilitasKos.classList.remove('hidden');
                        detailKos.classList.add('hidden');
                        fasilitasTab.classList.add('font-bold', 'text-orange-600');
                        detailTab.classList.remove('font-bold', 'text-orange-600');
                    }

                    // Tambahkan event listener
                    detailTab.addEventListener('click', showDetail);
                    fasilitasTab.addEventListener('click', showFasilitas);

                    // Default: Tampilkan bagian Detail saat pertama kali dimuat
                    showDetail();
                </script>
            </div>
            
            <div class="w-68 h-96 rounded-xl border-2 border-gray-300 shadow-md bg-white overflow-hidden relative left-8">
                <!-- Bagian Atas -->
                <div class="relative bg-orange-500 h-12 flex items-center justify-center">
                    <p class="absolute   text-white font-bold text-lg">Lokasi Kos</p>
                </div>
                <div class="border-2 border-blue-400 m-1 rounded-xl h-48">
                    <div id="map" class="w-full h-full"></div>
                    
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        // Ambil latitude dan longitude dari PHP
                        const latitude = <?= json_encode($kosan['latitude']); ?>;
                        const longitude = <?= json_encode($kosan['longitude']); ?>;

                        // Inisialisasi peta
                        const map = L.map('map').setView([latitude, longitude], 13);

                        // Tambahkan tile layer dari OpenStreetMap
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '© OpenStreetMap contributors'
                        }).addTo(map);

                        // Tambahkan marker pada lokasi
                        L.marker([latitude, longitude]).addTo(map)
                            .bindPopup("Lokasi Kos")
                            .openPopup();
                    });
                </script>

                <!-- Konten Tengah -->
                <div class="p-2">
                    <a href="<?= htmlspecialchars($kosan['google_maps_link']) ?>" target="_blank" class="flex flex-col items-center text-blue-500 font-semibold ">
                        <p class="text-gray-700 text-xs mb-2">
                            Klik untuk melihat lokasi kos di Google Maps.
                        </p>
                        <div class="flex flex-row items-center gap-2 hover:underline">
                            <svg fill="#000000" width="30px" height="30px" viewBox="0 0 24 24" id="maps-location" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="secondary" d="M19.32,9.84a1,1,0,0,0-1-.84H15.69A16.41,16.41,0,0,1,12,15,16.41,16.41,0,0,1,8.31,9H5.67a1,1,0,0,0-1,.84L3,19.84A1,1,0,0,0,4,21H20a1,1,0,0,0,1-1.16Z" style="fill: #2ca9bc; stroke-width: 2;"></path><path id="primary" d="M16,9h2.33a1,1,0,0,1,1,.84l1.67,10A1,1,0,0,1,20,21H4a1,1,0,0,1-1-1.16l1.67-10a1,1,0,0,1,1-.84H8" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="primary-2" data-name="primary" d="M16,7A4,4,0,0,0,8,7c0,4,4,8,4,8S16,11,16,7Z" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></g></svg>
                            Lihat di Google Maps
                        </div>
                        
                    </a>
                </div>

                <!-- Separator -->
                <div class="border-t border-gray-300"></div>

                <!-- Bagian Bawah -->
                <div class="p-2 flex flex-col items-center">
                    <button class="w-full py-2 mb-2 bg-green-600 rounded-lg text-white font-semibold shadow hover:bg-green-700 transition">
                        Hubungi Kos
                    </button>
                     
                </div>
            </div>

                
        </div>

    </section >

    <hr class="w-4/5 h-1 bg-orange-500 mx-auto mt-10">
    <hr class="w-3/5 h-1 bg-orange-500 mx-auto mt-2 ">

    <section class="p-8 w-11/12 mt-8 mx-auto">
        <!-- Judul -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6">
            Cari Kos Lainnya di Sekitar Kampusmu
        </h2>

        <div class="flex flex-row items-start gap-4 items-end ml-20">
            <!-- Box Filter: Universitas -->
            <div class="flex flex-col w-1/4">
                <label for="universitas" class="text-sm font-medium text-gray-700 mb-1">Universitas</label>
                <select id="universitas" class="border border-gray-300 rounded p-2 text-sm">
                    <option value="">Pilih Universitas</option>
                    <option value="UNIVERSITAS MALIKUSSALEH">UNIMAL</option>
                    <option value="POLTEK">POLTEK</option>
                    <option value="UNSYIAH">UNSYIAH</option>
                </select>
            </div>
            
            <!-- Tombol Terdekat -->
            <button id="terdekatButton" class=" border border-gray-300  w-24   px-4 py-2 rounded font-medium ">
                Terdekat
            </button>

            <!-- Tombol Terjauh -->
            <button id="terjauhButton" class=" border border-gray-300 w-24  px-4 py-2 rounded font-medium ">
                Terjauh
            </button>

            <!-- Box Filter: Jarak -->
            <div class="flex flex-col w-1/4">
                <label for="jarak" class="text-sm font-medium text-gray-700 mb-1">Jarak (km)</label>
                <input type="number" id="jarak" class="border border-gray-300 rounded p-2 text-sm" placeholder="Masukkan jarak">
            </div>

            <!-- Box Filter: Harga -->
            <div class="flex flex-col w-1/4">
                <label for="harga" class="text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" id="harga" class="border border-gray-300 rounded p-2 text-sm" placeholder="Masukkan harga">
            </div>

            <!-- Box Filter: Fasilitas -->
            <div class="flex flex-col w-1/4 relative">
                <label id="fasilitasLabel" class="text-sm font-medium text-gray-700 cursor-pointer">
                    Fasilitas
                    <div class="w-24 bg-white border border-gray-300 rounded-md h-9"></div>
                </label>
                <!-- Box dengan Checkbox -->
                <div id="fasilitasBox" class="hidden absolute top-6 left-0 bg-white flex flex-col gap-2 border-x border-b border-gray-300 rounded p-2 shadow-lg z-10 w-24">
                    <!-- Checkbox Wi-Fi -->
                    <label class="flex items-center">
                        <input type="checkbox" value="wifi" class="mr-2 fasilitas-checkbox">
                        Wi-Fi
                    </label>
                    <!-- Checkbox AC -->
                    <label class="flex items-center">
                        <input type="checkbox" value="ac" class="mr-2 fasilitas-checkbox">
                        AC
                    </label>
                    <!-- Checkbox Parkir -->
                    <label class="flex items-center">
                        <input type="checkbox" value="parkir" class="mr-2 fasilitas-checkbox">
                        Parkir
                    </label>
                </div>
            </div>

            <!-- Tombol Cari -->
            <button id="cariButton" class="bg-orange-500 w-24 text-white px-4 py-2 rounded font-medium hover:bg-orange-600">
                Cari
            </button>

            <!-- Tombol Reset -->
            <button id="resetButton" class="bg-gray-400 w-24 text-white px-4 py-2 rounded font-medium hover:bg-gray-500">
                Reset
            </button>
        </div>

        <div id="kosan-list" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mt-6"></div>

        <script>
            const fasilitasLabel = document.getElementById('fasilitasLabel');
            const fasilitasBox = document.getElementById('fasilitasBox');
            const cariButton = document.getElementById('cariButton');
            const resetButton = document.getElementById('resetButton');
            const terdekatButton = document.getElementById('terdekatButton');
            const terjauhButton = document.getElementById('terjauhButton');
            const kosanListContainer = document.getElementById('kosan-list');
            const universitasDropdown = document.getElementById('universitas');

            // Toggle fasilitas box
            fasilitasLabel.addEventListener('click', () => {
                fasilitasBox.classList.toggle('hidden');
            });

            // Fungsi untuk memastikan tombol "Terdekat" dan "Terjauh" hanya aktif jika universitas dipilih
            const updateButtonState = () => {
                const universitasSelected = universitasDropdown.value !== '';
                terdekatButton.disabled = !universitasSelected;
                terjauhButton.disabled = !universitasSelected;

                if (universitasSelected) {
                    terdekatButton.classList.remove('bg-gray-300', 'cursor-not-allowed');
                    terdekatButton.classList.add('bg-white', 'hover:bg-gray-300');
                    terjauhButton.classList.remove('bg-gray-300', 'cursor-not-allowed');
                    terjauhButton.classList.add('bg-white', 'hover:bg-gray-300');
                } else {
                    terdekatButton.classList.add('bg-gray-300', 'cursor-not-allowed');
                    terdekatButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                    terjauhButton.classList.add('bg-gray-300', 'cursor-not-allowed');
                    terjauhButton.classList.remove('bg-blue-500', 'hover:bg-blue-600');
                }
            };

            // Perbarui status tombol saat dropdown universitas berubah
            universitasDropdown.addEventListener('change', updateButtonState);

            // Fetch data berdasarkan filter
            cariButton.addEventListener('click', () => {
                const universitas = document.getElementById('universitas').value;
                const jarak = document.getElementById('jarak').value;
                const harga = document.getElementById('harga').value;

                // Ambil fasilitas yang dipilih
                const fasilitasCheckboxes = document.querySelectorAll('.fasilitas-checkbox:checked');
                const fasilitas = Array.from(fasilitasCheckboxes).map(checkbox => checkbox.value);

                // Jika tidak ada filter yang dipilih
                if (!universitas && !jarak && !harga && fasilitas.length === 0) {
                    kosanListContainer.innerHTML = '<p class="col-span-full text-center text-gray-500">Silakan pilih minimal satu filter untuk mencari kosan.</p>';
                    return;
                }

                // Kirim request ke server
                fetch('../get_filter_kos_univ.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `universitas=${encodeURIComponent(universitas)}&jarak=${encodeURIComponent(jarak)}&harga=${encodeURIComponent(harga)}&fasilitas=${encodeURIComponent(fasilitas.join(','))}`,
                })
                    .then(response => response.json())
                    .then(data => {
                        kosanListContainer.innerHTML = '';

                        if (data.length > 0) {
                            data.forEach(kosan => {
                                kosanListContainer.innerHTML += `
                                    <a href="detail_kos.php?id=${kosan.id}" 
                                    class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                        <img src="${kosan.gambar_url}" alt="${kosan.nama_kos}" class="w-full h-40 object-cover">
                                        <div class="p-4">
                                            <h3 class="text-lg font-semibold mb-2">${kosan.nama_kos}</h3>
                                            <p class="text-sm text-gray-500">${kosan.deskripsi}</p>
                                            <p class="mt-2 text-sm"><strong>Harga:</strong> Rp${new Intl.NumberFormat('id-ID').format(kosan.harga)}</p>
                                            <p class="text-sm"><strong>Alamat:</strong> ${kosan.alamat}</p>
                                            <p class="text-sm"><strong>Telepon:</strong> ${kosan.no_telepon}</p>
                                        </div>
                                    </a>
                                `;
                            });
                        } else {
                            kosanListContainer.innerHTML = '<p class="col-span-full text-center text-gray-500">Tidak ada data kosan sesuai filter.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        kosanListContainer.innerHTML = '<p class="col-span-full text-center text-red-500">Terjadi kesalahan saat memuat data kosan.</p>';
                    });
            });

            // Fungsi untuk mendapatkan data kosan berdasarkan urutan jarak
            const fetchKosanByDistance = (order) => {
                const universitas = universitasDropdown.value;

                // Kirim request ke server
                fetch('../get_filter_kos_univ.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `universitas=${encodeURIComponent(universitas)}&order=${encodeURIComponent(order)}`,
                })
                    .then(response => response.json())
                    .then(data => {
                        kosanListContainer.innerHTML = '';

                        if (data.length > 0) {
                            data.forEach(kosan => {
                                kosanListContainer.innerHTML += `
                                    <a href="detail_kos.php?id=${kosan.id}" 
                                    class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                        <img src="${kosan.gambar_url}" alt="${kosan.nama_kos}" class="w-full h-40 object-cover">
                                        <div class="p-4">
                                            <h3 class="text-lg font-semibold mb-2">${kosan.nama_kos}</h3>
                                            <p class="text-sm text-gray-500">${kosan.deskripsi}</p>
                                            <p class="mt-2 text-sm"><strong>Harga:</strong> Rp${new Intl.NumberFormat('id-ID').format(kosan.harga)}</p>
                                            <p class="text-sm"><strong>Alamat:</strong> ${kosan.alamat}</p>
                                            <p class="text-sm"><strong>Telepon:</strong> ${kosan.no_telepon}</p>
                                        </div>
                                    </a>
                                `;
                            });
                        } else {
                            kosanListContainer.innerHTML = '<p class="col-span-full text-center text-gray-500">Tidak ada data kosan sesuai filter.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        kosanListContainer.innerHTML = '<p class="col-span-full text-center text-red-500">Terjadi kesalahan saat memuat data kosan.</p>';
                    });
            };

            // Event listener untuk tombol "Terdekat"
            terdekatButton.addEventListener('click', () => {
                if (!terdekatButton.disabled) {
                    fetchKosanByDistance('asc'); // Kirim order = 'asc' untuk urutan terdekat
                }
            });

            // Event listener untuk tombol "Terjauh"
            terjauhButton.addEventListener('click', () => {
                if (!terjauhButton.disabled) {
                    fetchKosanByDistance('desc'); // Kirim order = 'desc' untuk urutan terjauh
                }
            });

            // Reset filter
            resetButton.addEventListener('click', () => {
                document.getElementById('universitas').value = '';
                document.getElementById('jarak').value = '';
                document.getElementById('harga').value = '';
                document.querySelectorAll('.fasilitas-checkbox').forEach(checkbox => {
                    checkbox.checked = false;
                });
                kosanListContainer.innerHTML = '<p class="col-span-full text-center text-gray-500">Silakan pilih filter untuk melihat kosan.</p>';
                updateButtonState(); // Perbarui status tombol setelah reset
            });

            // Inisialisasi awal tombol
            updateButtonState();
        </script>



    </section>

     
</body>
</html>
<?php
endif;

$stmt->close();
$conn->close();
?>
