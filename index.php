 <!DOCTYPE html>
 <html lang="id">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>AWAK KOS</title>
     <link href="./src/output.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
     <style>
         /* body * {
            border: 1px solid red;
        } */
     </style>
 </head>

 <body>
     <section class="wrap w-full h-16  px-6 py-2 border-b-2">
         <header class="flex flex-row justify-between">
             <img src="src/img/awakkoss.png" alt="awakkos" class="w-48">
             <nav class="flex items-center gap-8 justify-center font-semibold">
                 <a class=" " href="#">HOME</a>
                 <a href=" ">UNIVERSITAS</a>
                 <a href="login.php">KOS</a>
             </nav>
         </header>
     </section>


     <!-- Hero Section -->
     <section class="relative hero w-full h-full">
         <!-- Hero Slider dengan tinggi setengah layar -->
         <div class="hero-slider overflow-hidden relative w-full  h-96">
             <div class="flex transition-transform duration-500 ease-in-out" id="slider">
                 <div class="hero-slide w-full flex-shrink-0">
                     <img src="src/img/kamar1.png" alt="Kamar 1" class="w-full   object-center">
                 </div>
                 <div class="hero-slide w-full flex-shrink-0">
                     <img src="src/img/islamic.png" alt="Kamar 2" class="w-full   object-cover">
                 </div>
                 <div class="hero-slide w-full flex-shrink-0">
                     <img src="src/img/mahasiswa.png" alt="Kamar 3" class="w-full l object-cover">
                 </div>
             </div>
         </div>

         <!-- Form Pencarian Lokasi atau Nama Kos dengan tinggi setengah layar -->
         <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-full   text-center  p-4">
             <input type="text" placeholder="Ketik Lokasi atau Nama Kos" class="px-4 py-4 w-2/3 md:w-1/2 lg:w-1/3 rounded-lg shadow-md  " />
             <button class="bg-orange-500 text-white px-6 py-4 rounded-lg shadow-md hover:bg-orange-700 transition-colors">Cari Kos</button>
         </div>

         <!-- Navigasi Slide -->
         <button class="prev absolute top-1/2 left-4 transform -translate-y-1/2 text-lg  bg-orange-800 px-2 py-2 rounded-full shadow-lg hover:bg-gray-600 transition-colors">
             <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                 <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                 <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                 <g id="SVGRepo_iconCarrier">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3956 19.7691C19.0541 20.2687 20 19.799 20 18.9724L20 5.02764C20 4.20106 19.0541 3.73137 18.3956 4.23095L9.20476 11.2033C8.67727 11.6035 8.67727 12.3965 9.20476 12.7967L18.3956 19.7691ZM22 18.9724C22 21.4521 19.1624 22.8612 17.1868 21.3625L7.99598 14.3901C6.41353 13.1896 6.41353 10.8104 7.99599 9.60994L17.1868 2.63757C19.1624 1.13885 22 2.5479 22 5.02764L22 18.9724Z" fill="#ffffff"></path>
                     <path d="M2 3C2 2.44772 2.44772 2 3 2C3.55228 2 4 2.44772 4 3V21C4 21.5523 3.55228 22 3 22C2.44772 22 2 21.5523 2 21V3Z" fill="#ffffff"></path>
                 </g>
             </svg>
         </button>
         <button class="next absolute top-1/2 right-4 transform -translate-y-1/2  bg-orange-800 px-2 py-2 rounded-full shadow-lg hover:bg-gray-600 transition-colors">
             <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)" stroke="#ffffff">
                 <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                 <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                 <g id="SVGRepo_iconCarrier">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3956 19.7691C19.0541 20.2687 20 19.799 20 18.9724L20 5.02764C20 4.20106 19.0541 3.73137 18.3956 4.23095L9.20476 11.2033C8.67727 11.6035 8.67727 12.3965 9.20476 12.7967L18.3956 19.7691ZM22 18.9724C22 21.4521 19.1624 22.8612 17.1868 21.3625L7.99598 14.3901C6.41353 13.1896 6.41353 10.8104 7.99599 9.60994L17.1868 2.63757C19.1624 1.13885 22 2.5479 22 5.02764L22 18.9724Z" fill="#ffffff"></path>
                     <path d="M2 3C2 2.44772 2.44772 2 3 2C3.55228 2 4 2.44772 4 3V21C4 21.5523 3.55228 22 3 22C2.44772 22 2 21.5523 2 21V3Z" fill="#ffffff"></path>
                 </g>
             </svg>
         </button>
     </section>


     <script>
         const slider = document.getElementById('slider');
         const slides = document.querySelectorAll('.hero-slide');
         const nextButton = document.querySelector('.next');
         const prevButton = document.querySelector('.prev');

         let currentSlide = 0;
         const totalSlides = slides.length;

         // Fungsi untuk pindah ke slide berikutnya
         function nextSlide() {
             currentSlide = (currentSlide + 1) % totalSlides;
             updateSliderPosition();
         }

         // Fungsi untuk pindah ke slide sebelumnya
         function prevSlide() {
             currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
             updateSliderPosition();
         }

         // Fungsi untuk memperbarui posisi slider
         function updateSliderPosition() {
             const slideWidth = slides[0].offsetWidth;
             slider.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
         }

         // Mengatur interval untuk pindah slide otomatis setiap 3 detik
         setInterval(nextSlide, 3000);

         // Menambahkan event listener untuk tombol navigasi
         nextButton.addEventListener('click', nextSlide);
         prevButton.addEventListener('click', prevSlide);
     </script>


     <section class="w-full">
         <h2 class="text-center text-2xl font-bold mt-8">Cari Kos di Sekitar Kampus</h2>
         <div class="grid grid-cols-4 py-4 gap-4 items-center justify-center px-20 space-y-8 ">
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 mt-8 cursor-pointer">
                 <img class="" src="https://pendaftaran.unimal.ac.id/assets/unimal.png" alt="unimal">
                 <a class="pt-2">
                     <span class="text-center">UNIVERSITAS MALIKUSSALEH</span>
                 </a>
             </div>

             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="https://upload.wikimedia.org/wikipedia/commons/8/8a/Logo_Politeknik_Negeri_Lhokseumawe.png" alt="poltek">
                 <a class="pt-2" href="" alt="univ" class="univkotak">
                     <span>POLTEK LHOKSEUMAWE</span>
                 </a href="" alt="univ" class="univkotak">
             </div>
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="https://akupintar.id/documents/20143/0/STIE+LHOK.jpg/8786c752-0a02-64e5-ecb2-4e1e82c57eb2?version=1.0&t=1518877648647&imageThumbnail=1" alt="stie">
                 <a class="pt-2" href="" alt="univ" class="univkotak">
                     <span>STIE LHOKSEUMAWE</span>
                 </a href="" alt="univ" class="univkotak">
             </div>
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="https://stianasional.ac.id/wp-content/uploads/2017/08/logo-stia.png.webp" alt="stian">
                 <a href="" alt="univ" class="univkotak">
                     <span>STIAN LHOKSEUMAWE</span>
                 </a href="" alt="univ" class="univkotak">
             </div>
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa343647sQQhDyecxat6w6tLRZfeF79BIeCQ&s" alt="unbp">
                 <a href="" alt="univ" class="univkotak">
                     <span>UNIVERSITAS BUMI PERSADA</span>
                 </a href="" alt="univ" class="univkotak">
             </div>
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="https://assets.nsd.co.id/images/kampus/logo/ODBBQjQxMTgtQzBCMS00RUMzLTg4QkYtOTU1RUVDMEUzRTRF.png" alt="iain">
                 <a href="" alt="univ" class="univkotak">
                     <span>INSTITUT AGAMA ISLAM NEGERI LHOKSEUMAWE</span>
                 </a href="" alt="univ" class="univkotak">
             </div>
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="https://upload.wikimedia.org/wikipedia/commons/6/6d/Logo_Resmi_UNIKI.png" alt="uniki">
                 <a href="" alt="univ" class="univkotak">
                     <span>UNIVERSITAS ISLAM KEBANGSAAN INDONESIA</span>
                 </a href="" alt="univ" class="univkotak">
             </div>
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="https://sdl.ac.id/images/atribut/logosdl.png" alt="stikkes_darsa">
                 <a href="" alt="univ" class="univkotak">
                     <span>STIKKES DARUSSALAM LHOKSEUMAWE</span>
                 </a href="" alt="univ" class="univkotak">
             </div>
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTikCGCk_kYaPgs8dy2396ZeQ234NkFWBkxf_gWjvQcv_QRLxdMv2XjHUfDn9V21UQrwtM&usqp=CAU" alt="stikkes_muhammadiyah">
                 <a href="" alt="univ" class="univkotak">
                     <span>STIKKES MUHAMMADIYAH LHOKSEUMAWE</span>
                 </a href="" alt="univ" class="univkotak">
             </div>
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="https://stihalbanna.ac.id/wp-content/uploads/2024/04/cropped-logo-albanna-01-scaled-1.jpg" alt="albanna">
                 <a href="" alt="univ" class="univkotak">
                     <span>SEKOLAH TINGGI ILMU HUKUM AL-BANNA</span>
                 </a href="" alt="univ" class="univkotak">
             </div>
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="https://assets.nsd.co.id/images/kampus/logo/download20.png" alt="getsempana_lhoksukon">
                 <a href="" alt="univ" class="univkotak">
                     <span>STIKES GETSEMPANA LHOKSUKON</span>
                 </a href="" alt="univ" class="univkotak">
             </div>
             <div class=" h-20 flex flex-row justify-center gap-4 bg-gray-200 shadow-xl py-2 pl-8 cursor-pointer">
                 <img src="IMG/staii.png" alt="stai">
                 <a href="" alt="univ" class="univkotak">
                     <span>STAI JAMIATUT TARBIYAH LHOKSUKON </span>
                 </a href="" alt="univ" class="univkotak">
             </div>
         </div>



         <script>
             let currentSlide = 0;

             function showSlide(index) {
                 const slides = document.querySelectorAll('.hero-slide');
                 const slider = document.querySelector('.hero-slider');

                 if (index >= slides.length) currentSlide = 0;
                 else if (index < 0) currentSlide = slides.length - 1;
                 else currentSlide = index;

                 slider.style.transform = `translateX(-${currentSlide * 100}%)`;
             }

             document.querySelector('.prev').addEventListener('click', () => {
                 showSlide(currentSlide - 1);
             });

             document.querySelector('.next').addEventListener('click', () => {
                 showSlide(currentSlide + 1);
             });

             setInterval(() => {
                 showSlide(currentSlide + 1);
             }, 3000);

             // Tambahkan event listener untuk scroll
             window.addEventListener('scroll', () => {
                 const searchBar = document.querySelector('.search-bar');
                 const headerHeight = document.querySelector('.header').offsetHeight;

                 // Cek jika posisi scroll lebih besar dari tinggi header
                 if (window.scrollY > headerHeight) {
                     searchBar.classList.add('fixed'); // Tambahkan kelas 'fixed' untuk memindahkan search bar
                 } else {
                     searchBar.classList.remove('fixed'); // Hapus kelas 'fixed' jika scroll kembali ke atas
                 }
             });
         </script>
     </section>
     <section class="fotouniv">
         <div class="pilihuniv">
             <h2>Pilih Universitas Kamu :</h2>
             <select class="custom-select">
                 <option value="">Pilih Opsi</option>
                 <option value="1">UNIMAL</option>
                 <option value="2">POLTEK</option>
                 <option value="3">UNSYIAH</option>
             </select>
         </div>
         <div class="fotouniv5">
             <div class="unive1">
                 <img src="IMG/kamar1.png" alt="">
                 <h2>
                     Universitas Ternama
                 </h2>
             </div>
             <div class="unive1">
                 <img src="IMG/kamar1.png" alt="">
                 <h2>
                     Universitas Ternama
                 </h2>
             </div>
             <div class="unive1">
                 <img src="IMG/kamar1.png" alt="">
                 <h2>
                     Universitas Ternama
                 </h2>
             </div>
             <div class="unive1">
                 <img src="IMG/kamar1.png" alt="">
                 <h2>
                     Universitas Ternama
                 </h2>
             </div>
             <div class="unive1">
                 <img src="IMG/kamar1.png" alt="">
                 <h2>
                     Universitas Ternama
                 </h2>
             </div>

         </div>
         <div class="fotouniv5">
             <div class="unive1">
                 <img src="IMG/kamar1.png" alt="">
                 <h2>
                     Universitas Ternama
                 </h2>
             </div>
             <div class="unive1">
                 <img src="IMG/kamar1.png" alt="">
                 <h2>
                     Universitas Ternama
                 </h2>
             </div>
             <div class="unive1">
                 <img src="IMG/kamar1.png" alt="">
                 <h2>
                     Universitas Ternama
                 </h2>
             </div>
             <div class="unive1">
                 <img src="IMG/kamar1.png" alt="">
                 <h2>
                     Universitas Ternama
                 </h2>
             </div>
             <div class="unive1">
                 <img src="IMG/kamar1.png" alt="">
                 <h2>
                     Universitas Ternama
                 </h2>
             </div>

         </div>

     </section>


     <section id="pilih-universitas" class="fotouniv">
         <div class="pilihuniv">
             <h2>Pilih Universitas Kamu :</h2>
             <select class="custom-select" id="university-select">
                 <option value="">Pilih Opsi</option>
                 <option value="Universitas Malikussaleh">UNIMAL</option>
                 <option value="POLTEK">POLTEK</option>
                 <option value="UNSYIAH">UNSYIAH</option>
             </select>
         </div>

         <div class="fotouniv5" id="kosan-list">
             <!-- Data kosan akan dimuat di sini -->
         </div>
     </section>
     <script>
         document.getElementById('university-select').addEventListener('change', function() {
             const selectedUniversity = this.value; // Ambil nilai universitas yang dipilih
             const kosanListContainer = document.getElementById('kosan-list');

             // Jika tidak ada universitas yang dipilih, kosongkan data
             if (!selectedUniversity) {
                 kosanListContainer.innerHTML = '<p>Silakan pilih universitas terlebih dahulu.</p>';
                 return;
             }

             // Kirim permintaan AJAX ke server
             fetch('get_kosan_data.php', {
                     method: 'POST',
                     headers: {
                         'Content-Type': 'application/x-www-form-urlencoded',
                     },
                     body: `university=${encodeURIComponent(selectedUniversity)}`,
                 })
                 .then((response) => response.json()) // Parsing respons JSON
                 .then((data) => {
                     // Kosongkan kontainer data
                     kosanListContainer.innerHTML = '';

                     // Tampilkan data kosan
                     if (data.length > 0) {
                         data.forEach((kosan) => {
                             kosanListContainer.innerHTML += `
            <div class="unive1">
              <img src="${kosan.gambar_url}" alt="${kosan.nama_kos}">
              <h2>${kosan.nama_kos}</h2>
              <p>${kosan.deskripsi}</p>
              <p><strong>Harga:</strong> Rp${new Intl.NumberFormat('id-ID').format(kosan.harga)}</p>
              <p><strong>Alamat:</strong> ${kosan.alamat}</p>
              <p><strong>Telepon:</strong> ${kosan.no_telepon}</p>
            </div>
          `;
                         });
                     } else {
                         kosanListContainer.innerHTML = '<p>Tidak ada data kosan untuk universitas yang dipilih.</p>';
                     }
                 })
                 .catch((error) => {
                     console.error('Error:', error);
                     kosanListContainer.innerHTML = '<p>Terjadi kesalahan saat memuat data kosan.</p>';
                 });
         });
     </script>
     <!-- Footer -->
     <footer class="bg-orange-700 text-white pt-12">
         <div class="container mx-auto px-4 md:px-8">
             <!-- Platform Info Section -->
             <div class="mb-8">
                 <h1 class="text-4xl font-bold text-center mb-4">AWAK KOS</h1>
                 <p class="  leading-relaxed mb-4 text-center">
                     Awak Kos adalah sebuah platform yang menyajikan informasi mengenai properti kos yang disewakan di daerah Kota Lhokseumawe dan Aceh Utara yang berada di sekitaran kampus negeri maupun swasta dilengkapi dengan jarak terdekat harga kos, fasilitas kos dan gambar kos yang diunggah langsung oleh developer. Platform kami memberikan kemudahan bagi kamu yang mencari info kos terdekat di sekitaran kampus yang kamu inginkan.
                 </p>
                 <p class="  leading-relaxed text-center">
                     Informasi kos yang disewakan juga langsung diberikan oleh pemilik, yang pastinya sudah terakurasi kebenarannya oleh developer. Kemudahan juga pastinya diberikan tidak hanya kepada pencari kos, tapi juga kepada pihak pemilik kos-kosan untuk dapat memasang informasi kos yang disewakan. Dengan adanya Awak Kos, transaksi antara pemilik dan penyewa dijamin lebih cepat dan mudah. Kami selalu berusaha dengan baik untuk dapat memberikan informasi mengenai kos-kosan dari seluruh daerah Universitas yang ada di Kota Lhokseumawe dan Aceh Utara.
                 </p>
             </div>

             <!-- Social Links Section -->
             <div class="text-center border-t border-gray-100 pb-4">
                 <p class="text-lg text-gray-200 my-2">Cari Kos Terdekat Cepat & Mudah Kunjungi Awak Kos</p>
                 <div class="flex justify-center space-x-6">
                     <a href="https://www.instagram.com/althoriqamda_" target="_blank" class="text-white hover:text-pink-600 transition-colors">
                         <i class="fab fa-instagram text-3xl"></i>
                     </a>
                     <a href="https://wa.me/6285214970768" target="_blank" class="text-white hover:text-green-500 transition-colors">
                         <i class="fab fa-whatsapp text-3xl"></i>
                     </a>
                     <a href="https://www.tiktok.com/@amda__14?_t=ZS-8rbpaALn9rE&_r=1" target="_blank" class="text-white hover:text-black transition-colors">
                         <i class="fab fa-tiktok text-3xl"></i>
                     </a>
                 </div>
             </div>
         </div>
     </footer>
 </body>

 </html>