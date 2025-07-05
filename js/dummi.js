document.addEventListener("DOMContentLoaded", function() {

    // Ganti nama variabel agar lebih sesuai
    const petaContainer = document.getElementById("peta-container"); // Gunakan container sebagai acuan
    const petaSumenep = document.getElementById("peta-sumenep");
    const infoBox = document.getElementById("kecamatanInfo");
    
    // Periksa apakah elemen ada sebelum melanjutkan
    if (!petaContainer ||!petaSumenep || !infoBox) {
        console.error("Elemen peta atau info box tidak ditemukan!");
        return;
    }

    const semuaKecamatan = petaSumenep.querySelectorAll(".kecamatan");

    // ===================================================================
    // BAGIAN 2: MENGAKTIFKAN FUNGSI ZOOM DAN PAN
    // ===================================================================
    // Kode ini akan berjalan terlebih dahulu untuk membuat peta bisa di-zoom.
    const panZoom = svgPanZoom('#peta-sumenep', {
        viewportSelector: '#peta-container', // Penting: Pastikan SVG dibungkus <div> dengan id="peta-container"
        panEnabled: true,
        controlIconsEnabled: true, // Menampilkan tombol kontrol +/-/reset
        zoomEnabled: true,
        dblClickZoomEnabled: true,
        mouseWheelZoomEnabled: true,
        preventMouseEventsDefault: true,
        fit: true,
        center: true,
        minZoom: 0.7, // Batas zoom terkecil
        maxZoom: 15   // Batas zoom terbesar
    });

    // Opsional: membuat peta responsif jika ukuran jendela browser berubah
    window.addEventListener('resize', () => {
        panZoom.resize();
        panZoom.center();
    });

    petaSumenep.addEventListener("click", function(e) {
        // Cari elemen <g> teratas dari elemen yang diklik (path atau text)
        const kecamatanGrup = e.target.closest(".kecamatan");

        // Jika yang diklik bukan bagian dari kecamatan, jangan lakukan apa-apa
        if (!kecamatanGrup) {
            return;
        }

        // 1. Hapus kelas 'active' dari semua kecamatan
        semuaKecamatan.forEach(kec => {
            kec.classList.remove("active");
        });

        // 2. Tambahkan kelas 'active' ke kecamatan yang diklik
        kecamatanGrup.classList.add("active");

        // 3. Ambil data dari dalam grup SVG
        const namaKecamatan = kecamatanGrup.querySelector("title").textContent;
        const deskripsiKecamatan = kecamatanGrup.querySelector("desc").textContent;
        const gambarKecamatan = kecamatanGrup.querySelector("image");
        
        // Dapatkan URL gambar dengan aman
        const urlGambar = gambarKecamatan ? (gambarKecamatan.getAttribute('href') || gambarKecamatan.getAttribute('xlink:href')) : '';
        const altGambar = gambarKecamatan ? gambarKecamatan.getAttribute('alt') : 'Gambar tidak tersedia';

        // 4. Bangun konten untuk info box
        // Mengosongkan info box terlebih dahulu
        infoBox.innerHTML = ""; 

        // Membuat elemen gambar jika URL-nya ada
        let gambarHTML = '';
        if (urlGambar) {
            gambarHTML = `<img src="${urlGambar}" alt="${altGambar}">`;
        }

        // Memasukkan konten baru ke info box
        infoBox.insertAdjacentHTML("beforeend", `
            ${gambarHTML}
            <h2>${namaKecamatan}</h2>
            <p>${deskripsiKecamatan}</p>
        `);

        // 5. Tampilkan info box
        infoBox.classList.add("show");
    });

    // --- BAGIAN BARU DITAMBAHKAN ---
    // Listener untuk menutup info box jika mengklik di LUAR area peta
    window.addEventListener('click', function(e){
        // Cek jika infoBox sedang tampil DAN target klik BUKAN di dalam petaContainer
        if(infoBox.classList.contains('show') && !petaContainer.contains(e.target)){
            infoBox.classList.remove('show');
            semuaKecamatan.forEach(kec => kec.classList.remove("active"));
        }
    });

});