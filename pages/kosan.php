<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Kosan</title>
    <link href="../src/output.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <h1 class="text-2xl font-bold mb-4">Cari Kosan</h1>
    <form id="filter-form" class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <!-- Pilih Universitas -->
      <div>
        <label for="university" class="block text-sm font-medium text-gray-700 mb-1">Universitas</label>
        <select id="university-select" name="university" class="w-full border rounded-lg px-4 py-2">
          <option value="">Pilih Universitas</option>
          <option value="Universitas A">Universitas A</option>
          <option value="Universitas B">Universitas B</option>
        </select>
      </div>

      <!-- Harga Minimum -->
      <div>
        <label for="min_price" class="block text-sm font-medium text-gray-700 mb-1">Harga Minimum</label>
        <input
          type="number"
          id="min_price"
          name="min_price"
          class="w-full border rounded-lg px-4 py-2"
          placeholder="e.g., 500000"
        />
      </div>

      <!-- Harga Maksimum -->
      <div>
        <label for="max_price" class="block text-sm font-medium text-gray-700 mb-1">Harga Maksimum</label>
        <input
          type="number"
          id="max_price"
          name="max_price"
          class="w-full border rounded-lg px-4 py-2"
          placeholder="e.g., 2000000"
        />
      </div>

      <!-- Jarak Maksimum -->
      <div>
        <label for="max_distance" class="block text-sm font-medium text-gray-700 mb-1">Jarak Maksimum (km)</label>
        <input
          type="number"
          id="max_distance"
          name="max_distance"
          class="w-full border rounded-lg px-4 py-2"
          placeholder="e.g., 5"
        />
      </div>

      <!-- Tombol Cari -->
      <div class="col-span-1 md:col-span-3">
        <button
          type="submit"
          class="w-full bg-orange-500 text-white rounded-lg px-4 py-2 hover:bg-orange-600 transition"
        >
          Cari Kosan
        </button>
      </div>
    </form>

    <!-- Daftar Kosan -->
    <div id="kosan-list" class="mt-6">
      <p class="text-gray-500">Silakan pilih filter untuk melihat hasil.</p>
    </div>
  </div>

  <script>
    document.getElementById('filter-form').addEventListener('submit', function (event) {
      event.preventDefault();

      const university = document.getElementById('university-select').value;
      const minPrice = document.getElementById('min_price').value || 0;
      const maxPrice = document.getElementById('max_price').value || 1000000000;
      const maxDistance = document.getElementById('max_distance').value || 10;

      const kosanListContainer = document.getElementById('kosan-list');

      if (!university) {
        kosanListContainer.innerHTML = '<p>Silakan pilih universitas terlebih dahulu.</p>';
        return;
      }

      fetch('/pages/filter_kosan.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `university=${encodeURIComponent(university)}&min_price=${encodeURIComponent(minPrice)}&max_price=${encodeURIComponent(maxPrice)}&max_distance=${encodeURIComponent(maxDistance)}`,
      })
        .then((response) => response.json())
        .then((data) => {
          kosanListContainer.innerHTML = '';

          if (data.length > 0) {
            data.forEach((kosan) => {
              kosanListContainer.innerHTML += `
                <div class="border rounded-lg p-4 shadow-md mb-4">
                  <img src="${kosan.gambar_url}" alt="${kosan.nama_kos}" class="w-full rounded-lg mb-3">
                  <h2 class="text-lg font-bold">${kosan.nama_kos}</h2>
                  <p>${kosan.deskripsi}</p>
                  <p><strong>Harga:</strong> Rp${new Intl.NumberFormat('id-ID').format(kosan.harga)}</p>
                  <p><strong>Alamat:</strong> ${kosan.alamat}</p>
                  <p><strong>Telepon:</strong> ${kosan.no_telepon}</p>
                  <p><strong>Jarak:</strong> ${kosan.jarak} km</p>
                </div>
              `;
            });
          } else {
            kosanListContainer.innerHTML = '<p>Tidak ada data kosan sesuai filter yang dipilih.</p>';
          }
        })
        .catch((error) => {
          console.error('Error:', error);
          kosanListContainer.innerHTML = '<p>Terjadi kesalahan saat memuat data kosan.</p>';
        });
    });
  </script>
</body>
</html>
