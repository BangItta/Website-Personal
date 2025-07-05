document.addEventListener("DOMContentLoaded", function() {

    // Mengambil elemen-elemen DOM yang diperlukan
    const petaContainer = document.getElementById("peta-container");
    const petaSumenep = document.getElementById("peta-sumenep");
    const infoBox = document.getElementById("kecamatanInfo");
    const popupCloseBtn = document.getElementById("popup-close"); 

    // Memeriksa apakah semua elemen ditemukan
    if (!petaContainer || !petaSumenep || !infoBox || !popupCloseBtn) {
        console.error("Elemen peta, info box, atau tombol tutup tidak ditemukan!");
        return; 
    }

    // Mengambil semua grup kecamatan di dalam SVG
    const semuaKecamatan = petaSumenep.querySelectorAll(".kecamatan");

    // Menginisialisasi fungsi zoom dan pan untuk peta SVG
    const panZoom = svgPanZoom('#peta-sumenep', {
        viewportSelector: '#peta-container',
        panEnabled: true,
        controlIconsEnabled: true,
        zoomEnabled: true,
        dblClickZoomEnabled: true,
        mouseWheelZoomEnabled: true,
        preventMouseEventsDefault: true,
        fit: true,
        center: true,
        minZoom: 0.7, 
        maxZoom: 15 
    });

    // Membuat peta responsif saat ukuran jendela browser berubah
    window.addEventListener('resize', () => {
        panZoom.resize();
        panZoom.center();
    });

    // Loop melalui semua kecamatan dan atur warna fill langsung berdasarkan data PHP
    // Ini akan mengatur warna awal setiap kecamatan berdasarkan tingkat kerawanan
    semuaKecamatan.forEach(kec => {
        const namaKecamatan = kec.querySelector("title").textContent; // Mengambil nama kecamatan dari tag <title>
        const data = kecamatanData[namaKecamatan]; // Mengambil data kerawanan dari objek global (dari PHP)

        if (data && data.kerawanan) {
            let fillColor;
            // Menentukan warna berdasarkan tingkat kerawanan
            switch (data.kerawanan) {
                case 'Sangat Rendah': fillColor = '#8BC34A'; break; // Hijau Terang
                case 'Rendah': fillColor = '#CDDC39'; break;    // Kuning Kehijauan
                case 'Sedang': fillColor = '#FFEB3B'; break;    // Kuning
                case 'Tinggi': fillColor = '#FF9800'; break;    // Oranye
                case 'Sangat Tinggi': fillColor = '#F44336'; break; // Merah
                default: fillColor = '#cccccc'; // Warna default jika tidak ada data atau tidak cocok
            }
            // Mengatur atribut 'fill' pada elemen <path> di dalam grup kecamatan
            kec.querySelector("path").setAttribute('fill', fillColor);
        }
    });

    // Menambahkan event listener untuk klik pada peta SVG
    petaSumenep.addEventListener("click", function(e) {
        // Mencari elemen grup kecamatan terdekat dari elemen yang diklik
        const kecamatanGrup = e.target.closest(".kecamatan");

        // Jika yang diklik bukan bagian dari kecamatan, sembunyikan info box
        if (!kecamatanGrup) {
            infoBox.classList.remove("show");
            semuaKecamatan.forEach(kec => kec.classList.remove("active")); // Menghapus kelas 'active' dari semua kecamatan
            return;
        }

        // Menghapus kelas 'active' dari semua kecamatan sebelum menambahkannya ke yang baru diklik
        semuaKecamatan.forEach(kec => {
            kec.classList.remove("active");
        });

        // Menambahkan kelas 'active' ke kecamatan yang baru diklik
        kecamatanGrup.classList.add("active");

        // Mengambil nama kecamatan dari tag <title> di dalam grup SVG
        const namaKecamatan = kecamatanGrup.querySelector("title").textContent;

        // Mengambil data kerawanan dari objek global yang sudah dimuat dari PHP
        const data = kecamatanData[namaKecamatan];

        // Menyiapkan variabel untuk konten info box dengan nilai default
        let deskripsiKecamatan = "Informasi bencana tidak tersedia.";
        let urlGambar = '';
        let altGambar = 'Gambar tidak tersedia';
        let tingkatKerawananTeks = "Tingkat kerawanan tidak diketahui."; // Default text

        // Jika data ditemukan, perbarui variabel dengan data dari database
        if (data) {
            deskripsiKecamatan = data.desc || deskripsiKecamatan;
            urlGambar = data.image || urlGambar;
            tingkatKerawananTeks = data.kerawanan || tingkatKerawananTeks;
        }

        // Mengosongkan info box sebelum memasukkan konten baru
        infoBox.innerHTML = "";

        // Membuat elemen gambar jika URL gambar tersedia
        let gambarHTML = '';
        if (urlGambar) {
            gambarHTML = `<img src="${urlGambar}" alt="${altGambar}">`;
        }

        // Memasukkan konten baru ke info box
        infoBox.insertAdjacentHTML("beforeend", `
            ${gambarHTML}
            <h2>${namaKecamatan}</h2>
            <p><strong>Tingkat Kerawanan:</strong> ${tingkatKerawananTeks}</p>
            <p>${deskripsiKecamatan}</p>
        `);

        // Menampilkan info box
        infoBox.classList.add("show");
    });

    // Menambahkan event listener untuk tombol tutup info box
    popupCloseBtn.addEventListener('click', function() {
        infoBox.classList.remove('show'); // Sembunyikan info box
        semuaKecamatan.forEach(kec => kec.classList.remove("active")); // Hapus kelas 'active' dari semua kecamatan
    });

    // Listener untuk menutup info box jika mengklik di LUAR area peta dan info box
    window.addEventListener('click', function(e){
        // Memeriksa jika infoBox sedang tampil DAN target klik BUKAN di dalam petaContainer
        // DAN target klik BUKAN di dalam infoBox itu sendiri atau turunannya
        if(infoBox.classList.contains('show') && !petaContainer.contains(e.target) && !infoBox.contains(e.target)){
            infoBox.classList.remove('show'); // Sembunyikan info box
            semuaKecamatan.forEach(kec => kec.classList.remove("active")); // Hapus kelas 'active' dari semua kecamatan
        }
    });
});
