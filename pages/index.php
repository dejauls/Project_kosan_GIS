 <!DOCTYPE html>
 <html lang="id">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>AWAK KOS</title>
     <link href="../src/output.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
     <style>
         /* body * {
            border: 1px solid red;
        } */

        /* Animasi Smooth ke Atas */
        .animate-up {
            animation: slideUp 0.5s ease forwards;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        

     </style>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
 </head>

 <body>
    <section class="w-full">
        <nav class="w-full  flex justify-between ">
            <img src="../src/img/awakkoss.png" alt="awakkos" class="w-48">
                <ul class="flex flex-row justify-items-start gap-6 items-center">
                                    <li href="javascript:void(0)" class="relative group">
                                        <a href="/" class="font-semibold text-base duration-500">
                                            HOME
                                        </a>
                                        <div class="absolute left-0 w-0 duration-500 group-hover:w-full h-1 bg-orange-500">
                                        </div>
                                    </li>
                                    <li href="javascript:void(0)" class="relative group">
                                        <a href="/" class="font-semibold  text-base duration-500">
                                            CARI KOS
                                        </a>
                                        <div class="absolute   left-0 w-0 duration-500 group-hover:w-full h-1 bg-orange-500">
                                        </div>
                                    </li>                    
                                    <li href="javascript:void(0)" class="relative group">
                                        <a href="/" class="font-semibold  text-base duration-500">
                                            DAFTAR KAMPUS
                                        </a>
                                        <div class="absolute   left-0 w-0 duration-500 group-hover:w-full h-1 bg-orange-500">
                                        </div>
                                    </li>                    
                                    <li href="javascript:void(0)" class="relative group">
                                        <a href="/" class="font-semibold  text-base duration-500">
                                            KONTAK
                                        </a>
                                        <div class="absolute   left-0 w-0 duration-500 group-hover:w-full h-1 bg-orange-500">
                                        </div>
                                    </li>                    
                </ul>
            <div>
                <a href="../login.php">
                <button class="py-2 px-4 m-2 rounded-full border-2 font-semibold border-blue-300 bg-orange-500 hover:bg-orange-600 ">Masuk</button>

                </a>
            </div>
        </nav>
    </section>


  
     <section class="relative hero w-full h-screen">
         
         <div  class="overflow-hidden relative w-full px-8 rounded-xl h-[400px]">
             <div class="flex transition-transform duration-500 ease-in-out rounded-xl"  >
                 <div class="hero-slide w-full flex-shrink-0 rounded-xl">
                     <img src="../src/img/kos3.jpg" alt="Kamar 1" class="w-full h-[400px] object-cover rounded-xl">
                 </div>
                  
             </div>
         </div>

        <div class="absolute bottom-60 left-12 bg-black/20  p-4 rounded-lg shadow-lg max-w-md wow animate__animated animate__fadeInLeft">
            <p class="text-2xl md:text-3xl font-bold mb-4  leading-relaxed text-white ">
                Temukan kos terbaik <br>dengan harga terjangkau disini !!
            </p>
            <p class="text-sm md:text-base font-medium leading-relaxed text-white">
                Tidak perlu repot-repot cari lagi, <br>
                kos yang ada sudah kami cek langsung ke lokasi.
            </p>
        </div>



        <div class="absolute bottom-60 right-16 p-4  rounded-lg  wow animate__animated animate__fadeInRight">
            <button id="toggleButton" 
                class="w-60 bg-orange-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-orange-600 transition duration-300 wow animate__animated animate__fadeInRight">
                Cari Kos
            </button>
        </div>
        

        <div id="filterBox" 
            class="hidden absolute bottom-60 right-16 p-4 bg-slate-100 rounded-lg shadow-lg w-80 wow animate__animated">

            <div class="absolute top-0 flex items-center bg-black justify-center w-6 h-6 rounded-full right-0 m-2 hover:cursor-pointer" id="closeButton"> 
                <p class="text-white hover:cursor-pointer">X</p>
            </div>
            <h2 class="text-lg font-semibold text-gray-800">Temukan Kos Terbaik</h2>
            <p class="text-xs text-gray-600 mb-2">Silakan isi detail berikut untuk memulai pencarian kos.</p>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Kampus</label>
                <select 
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="unimal">Universitas Malikussaleh</option>
                    <option value="poltek">Politeknik Negeri Lhokseumawe</option>
                    <option value="iain">IAIN</option>
                    <option value="stikes">STIKES</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga Maksimum/bulan</label>
                <select 
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <option value="500000">500.000</option>
                    <option value="1000000">1.000.000</option>
                    <option value="1500000">1.500.000</option>
                    <option value="2000000">2.000.000</option>
                </select>
            </div>

            <div class="mb-4 flex space-x-2">
                <div class="flex items-center">
                    <input type="checkbox" id="wifi" 
                        class="w-4 h-4 text-orange-500 focus:ring-orange-500 border-gray-300 rounded"/>
                    <label for="wifi" class="ml-2 text-sm text-gray-700">Wi-Fi</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="kamar-mandi" 
                        class="w-4 h-4 text-orange-500 focus:ring-orange-500 border-gray-300 rounded"/>
                    <label for="kamar-mandi" class="ml-2 text-sm text-gray-700">Kamar Mandi Dalam</label>
                </div>
            </div>

            <button 
                class="w-full bg-orange-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-orange-600 transition duration-300">
                Cari Kos
            </button>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const toggleButton = document.getElementById("toggleButton");
                const filterBox = document.getElementById("filterBox");
                const closeButton = document.getElementById("closeButton");

                // Event listener untuk tombol "Cari Kos"
                toggleButton.addEventListener("click", function () {
                    // Toggle elemen tampil atau sembunyi
                    if (filterBox.classList.contains("hidden")) {
                        filterBox.classList.remove("hidden");
                        filterBox.classList.add("animate__fadeInUp", "animate-up");
                    } else {
                        filterBox.classList.add("hidden");
                        filterBox.classList.remove("animate__fadeInUp", "animate-up");
                    }
                });

                // Event listener untuk tombol "X" yang menutup filterBox
                closeButton.addEventListener("click", function () {
                    filterBox.classList.add("hidden");
                    filterBox.classList.remove("animate__fadeInUp", "animate-up");
                });
            });
        </script>



        <div class="w-full py-2 px-8 grid grid-cols-3 gap-8 ">
            <div class="bg-gray-200 flex  w-full h-36 rounded-xl shadow-lg border px-4 py-2 gap-8 justify-between col-span-1">
                <div class="flex flex-col justify-between w-1/2 wow animate__animated animate__fadeInUp "  >
                    <h2 class="font-bold text-lg">
                        Kos Sekitar Lhokseumawe
                    </h2>
                    <div class="flex flex-row items-center gap-2">
                        <div class=" w-8 h-8 bg-gray-700 px-2 py-3 rounded-full border flex items-center">
                            <svg role="img" viewBox="0 0 24 24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg"><title>AdGuard</title><path d="M12 0C8.249 0 3.725.861 0 2.755 0 6.845-.051 17.037 12 24 24.051 17.037 24 6.845 24 2.755 20.275.861 15.751 0 12 0zm-.106 15.429L6.857 9.612c.331-.239 1.75-1.143 2.794.042l2.187 2.588c.009-.001 5.801-5.948 5.815-5.938.246-.22.694-.503 1.204-.101l-6.963 9.226z"/></svg>
                        </div>
                        <p class="font-semibold text-base">
                            Aman & Bersih
                        </p>
                    </div>
                    
                </div>
                <div class="wrap flex flex-row justify-end w-1/2 wow animate__animated animate__fadeInUp " data-wow-delay="0.1s">
                    <div class="rounded-xl w-full flex justify-between h-full bg-white">
                        <div class="flex flex-col w-1/4 justify-between">
                            <h2 class="px-3 max-w-8 wrap m-2 bg-black rounded-xl text-white flex justify-center">...</h2>
                            <h1 class="font-bold text-3xl m-2">
                    
                            </h1>
                        </div>
                        <div class="rounded-xl w-3/4 h-full flex justify-end bg-gray-300 p-[1px]">
                            <img class="w-full h-full object-cover rounded-xl " src="../src/img/kamar1.png" alt="">
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="bg-gray-200 overflow-hidden flex flex-row w-full h-36 rounded-xl shadow-lg  border col-span-2">
                <div class=" w-full grid grid-cols-3 gap-6 p-2 ">
                    <div class="relative   wow animate__animated animate__fadeInUp " data-wow-delay="0.2s">
                        <img class="w-full object-cover rounded-xl " src="../src/img/depanunimal.jpeg" alt="">
                        <a href="">
                            <div class="absolute top-0 flex items-center bg-white justify-center w-8 h-8 rounded-full right-0 m-2"> 
                            <svg fill="#000000" width="70px" height="70px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>ionicons-v5-f</title><path d="M256,48h0A208.23,208.23,0,0,0,48,256c0,114.68,93.31,208,208,208h0A208.23,208.23,0,0,0,464,256C464,141.31,370.69,48,256,48Zm-8,361V264H104l-1,0,259-114.11Z"></path></g></svg>    
                        </div>
                        </a>
                        <p class="absolute w-full text-white bg-black/80 text-center font-semibold text-lg bottom-0">UNIMAL</p>
                    </div>
                    <div class="relative wow animate__animated animate__fadeInUp " data-wow-delay="0.5s">
                        <img class="w-full object-cover rounded-xl" src="../src/img/depanpolteklhok.png" alt="">
                        <a href="">
                            <div class="absolute top-0 flex items-center bg-white justify-center w-8 h-8 rounded-full right-0 m-2"> 
                            <svg fill="#000000" width="70px" height="70px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>ionicons-v5-f</title><path d="M256,48h0A208.23,208.23,0,0,0,48,256c0,114.68,93.31,208,208,208h0A208.23,208.23,0,0,0,464,256C464,141.31,370.69,48,256,48Zm-8,361V264H104l-1,0,259-114.11Z"></path></g></svg>    
                        </div>
                        </a>
                        <p class="absolute w-full text-white bg-black/80 text-center font-semibold text-lg bottom-0">POLTEK</p>
                    </div>
                    <div class="relative wow animate__animated animate__fadeInUp " data-wow-delay="0.9s">
                        <img class="w-full object-cover rounded-xl" src="../src/img/depaniain.jpeg" alt="">
                        <a href="">
                            <div class="absolute top-0 flex items-center bg-white justify-center w-8 h-8 rounded-full right-0 m-2"> 
                            <svg fill="#000000" width="70px" height="70px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>ionicons-v5-f</title><path d="M256,48h0A208.23,208.23,0,0,0,48,256c0,114.68,93.31,208,208,208h0A208.23,208.23,0,0,0,464,256C464,141.31,370.69,48,256,48Zm-8,361V264H104l-1,0,259-114.11Z"></path></g></svg>    
                        </div>
                        </a>
                        <p class="absolute w-full text-white bg-black/80 text-center font-semibold text-lg bottom-0">IAIN</p>
                    </div>
                     
                </div>
                

            </div>
        </div>
     </section>


     


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
     </section>
      


     <section id="pilih-universitas" class="p-4 w-ful mt-8">
        <div class="mb-6 flex flex-col justify-center w-full items-center">
        <h2 class="bg-gradient-to-tl from-orange-400 via-orange-700 to-orange-500 text-white text-2xl font-bold rounded-xl border border-fray-500 p-4 mb-4">
            Pilih Universitas Kamu :
        </h2>


            <select class="w-48 p-2 border-2 rounded-md" id="university-select">
                <option value="">Pilih Universitas</option>
                <option value="Universitas Malikussaleh">UNIMAL</option>
                <option value="POLTEK">POLTEK</option>
                <option value="UNSYIAH">UNSYIAH</option>
            </select>
        </div>

        <div id="kosan-list" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

        </div>
    </section>

    <script>
        document.getElementById('university-select').addEventListener('change', function () {
            const selectedUniversity = this.value;
            const kosanListContainer = document.getElementById('kosan-list');

            if (!selectedUniversity) {
                kosanListContainer.innerHTML = '<p class="col-span-full text-center text-gray-500">Silakan pilih universitas terlebih dahulu.</p>';
                return;
            }

            fetch('../get_kosan_data.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `university=${encodeURIComponent(selectedUniversity)}`,
            })
                .then((response) => response.json())
                .then((data) => {
                    kosanListContainer.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach((kosan) => {
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
                        kosanListContainer.innerHTML = '<p class="col-span-full text-center text-gray-500">Tidak ada data kosan untuk universitas yang dipilih.</p>';
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    kosanListContainer.innerHTML = '<p class="col-span-full text-center text-red-500">Terjadi kesalahan saat memuat data kosan.</p>';
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
     <script>
        new WOW().init();
    </script>
 </body>

 </html>