<?php include "koneksi.php";?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Tanggap Bencana - SiagaBencana</title>
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
                    <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Tanggap Bencana</h4>
                    <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item"><a>Beranda</a></li>
                        <li class="breadcrumb-item active text-primary">Tanggap Bencana</li>
                    </ol>    
                </div>
            </div>
            <!-- Header End -->
        </div>
        <!-- Navbar & Hero End -->
        
        <!-- Tindakan Pencegahan Bencana Start -->
        <div class="container-fluid py-5 bg-light">
            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
                    <h4 class="text-primary">Tindakan Pencegahan</h4>
                    <h1 class="display-6 mb-4">Langkah Pencegahan untuk Mengurangi Risiko Bencana</h1>
                </div>
                <div class="row g-4">
                    <!-- Pencegahan Banjir -->
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-white text-center p-4 border rounded shadow-sm h-100">
                            <div class="mb-3">
                                <i class="fas fa-water fa-2x text-primary"></i>
                            </div>
                            <h5 class="mb-3">Cegah Banjir</h5>
                            <ul class="text-start ps-3 mb-0">
                                <li>Jangan buang sampah sembarangan.</li>
                                <li>Periksa saluran air secara rutin.</li>
                                <li>Lakukan penghijauan di lingkungan sekitar.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Pencegahan Angin Kencang -->
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="bg-white text-center p-4 border rounded shadow-sm h-100">
                            <div class="mb-3">
                                <i class="fas fa-wind fa-2x text-primary"></i>
                            </div>
                            <h5 class="mb-3">Cegah Risiko Angin Kencang</h5>
                            <ul class="text-start ps-3 mb-0">
                                <li>Periksa kekuatan atap dan jendela rumah.</li>
                                <li>Potong ranting pohon besar dekat rumah.</li>
                                <li>Hindari membangun rumah di tempat terbuka.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Pencegahan Longsor -->
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-white text-center p-4 border rounded shadow-sm h-100">
                            <div class="mb-3">
                                <i class="fas fa-mountain fa-2x text-primary"></i>
                            </div>
                            <h5 class="mb-3">Cegah Tanah Longsor</h5>
                            <ul class="text-start ps-3 mb-0">
                                <li>Jangan menebang pohon di lereng.</li>
                                <li>Tanam pohon penahan tanah di bukit.</li>
                                <li>Jangan bangun rumah dekat tebing.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Pencegahan Kebakaran Hutan -->
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="bg-white text-center p-4 border rounded shadow-sm h-100">
                            <div class="mb-3">
                                <i class="fas fa-fire fa-2x text-primary"></i>
                            </div>
                            <h5 class="mb-3">Cegah Kebakaran Hutan</h5>
                            <ul class="text-start ps-3 mb-0">
                                <li>Jangan membakar lahan sembarangan.</li>
                                <li>Laporkan asap ke pihak berwenang.</li>
                                <li>Sediakan jalur evakuasi di pemukiman.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tindakan Pencegahan Bencana End -->
        
        <!-- Pembelajaran Berdasarkan Jenis Bencana Start -->
        <div class="container py-5">
            <div class="text-center mb-5">
                <h4 class="text-primary">Langkah Tanggap Bencana</h4>
                <h1 class="display-6 mb-4">Apa yang Harus Dilakukan Saat Bencana Terjadi?</h1>
            </div>
            <div class="row g-4">
                <?php
                $sql = "SELECT * FROM edukasi_bencana ORDER BY id_edukasi ASC";
                $result = mysqli_query($conn, $sql);
                $delay = 0.1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="<?= $delay ?>s">
                    <div class="bg-white border rounded shadow-sm p-4 h-100">
                        <div class="mb-3 text-center">
                            <h5 class="mt-2"><?= htmlspecialchars($row['jenis_bencana']) ?></h5>
                        </div>
                        <div class="mb-0 ps-3">
                            <?= $row['isi'] ?>
                        </div>
                    </div>
                </div>
                <?php
                $delay += 0.1;
                }
                ?>
            </div>
        </div>
        <!-- Pembelajaran Berdasarkan Jenis Bencana End -->

        <!-- Video Edukasi Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h2 class="text-primary">Galeri Video Edukasi</h2>
                    <p class="mb-0">Pelajari tindakan tanggap bencana dari berbagai kejadian melalui video edukatif berikut ini.</p>
                </div>
                <?php
                $query = "SELECT * FROM video_edukasi ORDER BY created_at DESC";
                $result = mysqli_query($conn, $query);
                ?>
                <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="blog-item p-4">
                                <div class="mb-4">
                                    <iframe src="<?= htmlspecialchars($row['url_video']) ?>" class="img-fluid w-100 rounded" title="<?= htmlspecialchars($row['judul']) ?>" allowfullscreen></iframe>
                                </div>
                                <a href="<?= htmlspecialchars($row['url_video']) ?>" target="_blank" class="h4 d-inline-block mb-3">
                                    <?= htmlspecialchars($row['judul']) ?>
                                </a>
                                <?php if (!empty($row['deskripsi'])): ?>
                                    <p class="mb-0"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="text-muted text-center">Belum ada video edukasi yang tersedia.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Video Edukasi End -->

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
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>