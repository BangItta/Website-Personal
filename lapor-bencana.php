<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Lapor Bencana - SiagaBencana</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <?php
                include('header.php');
            ?>

            <!-- Header Start -->
            <div class="container-fluid bg-breadcrumb">
                <div class="container text-center py-5" style="max-width: 900px;">
                    <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Lapor Bencana</h4>
                    <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item"><a>Beranda</a></li>
                        <li class="breadcrumb-item active text-primary">Lapor Bencana</li>
                    </ol>    
                </div>
            </div>
            <!-- Header End -->
        </div>
        <!-- Navbar & Hero End -->

        <!-- lapor Start -->
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Panduan Pengisian -->
                    <div class="bg-light p-4 rounded shadow-sm mb-4 mt-4 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-primary mb-3">📌 Panduan Pengisian Formulir</h5>
                        <ul class="mb-0">
                            <li>Masukkan <strong>nama lengkap</strong> pelapor sesuai identitas.</li>
                            <li>Isi <strong>email aktif</strong> dan <strong>nomor HP</strong> yang dapat dihubungi.</li>
                            <li>Pilih <strong>kecamatan</strong> dan <strong>desa</strong> tempat kejadian secara tepat.</li>
                            <li>Tuliskan <strong>alamat lengkap</strong> lokasi kejadian secara detail (jalan, RT/RW, patokan lokasi).</li>
                            <li>Klik tombol <strong>"Buka Kamera"</strong> untuk mengaktifkan kamera, lalu klik <strong>"Ambil Foto"</strong> secara langsung di lokasi kejadian.</li>
                            <li>Isi kolom <strong>Keterangan</strong> dengan informasi kronologi kejadian, kondisi terkini, dan bantuan yang dibutuhkan (jika ada).</li>
                            <li>Pastikan semua data telah diisi sebelum menekan tombol <strong>"Kirim Laporan"</strong>.</li>
                        </ul>
                    </div>
                </div>
                <!-- Formulir Laporan -->
                <div class="col-lg-10">
                    <div class="bg-light p-5 rounded shadow wow fadeInUp" data-wow-delay="0.2s">
                        <h4 class="text-primary mb-4">Formulir Laporan Bencana</h4>
                        <form action="action/aksi-lapor.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <!-- Email dan HP dalam satu row -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Nomor HP</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>

                            <!-- Kecamatan dan Desa dalam satu row -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <select class="form-select" id="kecamatan" name="kecamatan" required>
                                        <option value="" disabled selected>Pilih Kecamatan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="desa" class="form-label">Desa</label>
                                    <select class="form-select" id="desa" name="desa" required>
                                        <option value="" disabled selected>Pilih Desa</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="2" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Kejadian</label><br>
                                <button type="button" class="btn btn-primary mb-3" id="bukaKamera">Buka Kamera</button>
                                <div id="cameraContainer" style="display:none;">
                                    <video id="video" width="100%" autoplay class="rounded shadow mb-3"></video>
                                    <button type="button" class="btn btn-sm btn-secondary mb-3" id="snap">Ambil Foto</button>
                                    <canvas id="canvas" style="display:none;"></canvas>
                                    <input type="hidden" name="foto_base64" id="foto_base64" required>
                                    <img id="preview" class="img-fluid rounded shadow mt-3" style="display:none;" />
                                    <button type="button" class="btn btn-sm btn-warning mt-2" id="ulang" style="display:none;">Ambil Ulang Foto</button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan Kejadian</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-3">Kirim Laporan</button>

                            <div class="text-center mt-4">
                                <a href="https://forms.gle/Yan4ecgRNr7QRUfr6" target="_blank" class="btn btn-outline-primary px-4 py-2">
                                    📝 Beri Penilaian Website
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- lapor End -->

        <?php include("footer.php") ?>

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <script src="data-sumenep.js"></script>
        <script>
            const kecamatanSelect = document.getElementById("kecamatan");
            const desaSelect = document.getElementById("desa"); 
            // Isi pilihan kecamatan
            Object.entries(districtData).forEach(([id, info]) => {
                const opt = document.createElement("option");
                opt.value = id;
                opt.textContent = info.name;
                kecamatanSelect.appendChild(opt);
            });
        
            // Event: ketika kecamatan dipilih
            kecamatanSelect.addEventListener("change", function () {
                const desaList = districtData[this.value]?.villages || [];
                desaSelect.innerHTML = `<option disabled selected>Pilih Desa</option>`;
                desaList.forEach(desa => {
                    const opt = document.createElement("option");
                    opt.value = desa;
                    opt.textContent = desa;
                    desaSelect.appendChild(opt);
                });
            });
        </script>

        <script>
            const bukaKameraBtn = document.getElementById('bukaKamera');
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const snapBtn = document.getElementById('snap');
            const preview = document.getElementById('preview');
            const ulangBtn = document.getElementById('ulang');
            const fotoBase64 = document.getElementById('foto_base64');
            const cameraContainer = document.getElementById('cameraContainer');

            let stream = null;

            // Tombol Buka Kamera
            bukaKameraBtn.addEventListener('click', () => {
                cameraContainer.style.display = 'block';
                bukaKameraBtn.style.display = 'none';
            
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(s => {
                        stream = s;
                        video.srcObject = stream;
                    })
                    .catch(err => {
                        alert('Tidak dapat membuka kamera.');
                        console.error(err);
                    });
            });
        
            // Ambil Foto
            snapBtn.addEventListener('click', () => {
                const ctx = canvas.getContext('2d');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                ctx.drawImage(video, 0, 0);
            
                const imageData = canvas.toDataURL('image/jpeg');
                fotoBase64.value = imageData;
            
                preview.src = imageData;
                preview.style.display = "block";
                video.style.display = "none";
                snapBtn.style.display = "none";
                ulangBtn.style.display = "inline-block";
            
                // Hentikan kamera
                stream.getTracks().forEach(track => track.stop());
            });
        
            // Ambil Ulang Foto
            ulangBtn.addEventListener('click', () => {
                preview.style.display = "none";
                video.style.display = "block";
                snapBtn.style.display = "inline-block";
                ulangBtn.style.display = "none";
                fotoBase64.value = "";
            
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(s => {
                        stream = s;
                        video.srcObject = stream;
                    });
            });
        </script>

        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        
    </body>

</html>