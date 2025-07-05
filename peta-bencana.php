<?php include("koneksi.php"); ?>

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

        <link href="css/custom.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/svg-pan-zoom@3.6.1/dist/svg-pan-zoom.min.js"></script>
    </head>

    <body>

        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
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
        
        <!-- Peta Wilayah Start -->
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="text-primary">Informasi Wilayah & Peta Bencana</h2>
                <!-- <p>Berikut adalah daftar peta visual yang menunjukkan wilayah Kabupaten Sumenep dan daerah rawan bencana.</p> -->
            </div>
            <div class="row g-4">
                
                <div class="col-12 wow fadeInUp">
                    <!-- <div class="card shadow-sm border-0"> -->
                        <div class="map-container">
                            <div class="peta-container" id="peta-container" >
                                    <svg id="peta-sumenep" xmlns="http://www.w3.org/2000/svg" width="1215.005" height="530.986" viewBox="0 0 911.254 398.239">
                                        <clipPath id="a"><path d="M0 398.24V0h911.222v398.24H0z" /></clipPath>

                                        <?php
                                            $sql = "SELECT * FROM peta_bencana";
                                            $result = mysqli_query($conn, $sql);

                                            $kecamatanData = [];
                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $kecamatanData[$row['nama_kecamatan']] = [
                                                        'desc' => $row['deskripsi_bencana'],
                                                        'image' => $row['gambar_kecamatan'],
                                                        'kerawanan' => $row['tingkat_kerawanan']
                                                    ];
                                                }
                                            }
                                        ?>

                                        <g id="kec-gulukguluk" class="kecamatan">
                                            <title>Guluk-Guluk</title>
                                            <desc>Ini adalah keterangan untuk Kecamatan Guluk-Guluk. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                            <image xlink:href="images.jpg" class="hidden-image" />
                                            <path
                                                fill="#73AB26"
                                                fill-rule="evenodd"
                                                stroke="#6E6E6E"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-miterlimit="10"
                                                stroke-width=".48"
                                                d="M242.625 349.81h.72v.24h1.92v.241h.24v-.24h.72l.24.24.24.24h.24v.24h.48v-.24h.24v.24h1.44l.24.24h.72v-.24h.239v-.24h-.24v-.24h.24v-.24H253.424l.24.24h.96l.24.24-.24.72.48-.24v.24l-.24.24h.24V353.172h.24l-.24.24v.24l.48.48h.24l.24.24h.48l.24.24h.48v.24h-.24v.48l.24.241v-.24.24h.24l.24.24v-.24h.48v.24l.24.24h.24v.48h.24v.72h-.24v1.201h-.24v.24h-.24v.24l-.24.24h.24-.24v.24h.24v1.2l-.24.24v.481h-.96v.24l-.24.24-.24.24-.24-.24h-.48l-.24-.24h-.72l-.24-.24h-.48v-.24l-.24-.24h-.96v.24h-.24l-.24.24h-.72v.48h-.24v.48h-.48v-.72h.24v-.24h-.24l-.24-.24h-.24l-.24-.24v-.24h-.96l-.24-.24h-.24l-.24-.24h-.24l-.24-.24h-.96v-.24h-.48v-.24h-1.44v.24-.24h-.48l-.24.24h-.24v-.24h-.24v.24-.24h-.72v-.24h-.96v-.24h-.24v.24h-.24v-.24h-.24v-.24h.24v-.241h.24v-.24h.24v-.48h.24v-.48h.24l.24-.24h.24v-.24h.24v-.72h.72v-.24h-.24v-.241h-.24v-.24h-.24v.24h-.48v-.48h-1.2v-.24.24h-.72v.24h-.24v.24h-.72v.24h-.24v-.24h-.24v-.24h-.24v.24-1.2h-.24v-.24h-.24.24v-.48h-.24.24v-.24h.24v-.721h.24v-.24h-.24v-.24h-.24.24v-.24.24-.24h.24v-.48h.96v-.24.24h.24v-.24h.24-.24v-.24h.24v.24h.72v-.72h-.24v-.481h.24v-.24h.72z"
                                                clip-path="url(#a)"
                                            />
                                        </g>
                                        <g id="kec-pasongsongan" class="kecamatan">
                                            <title>Pasongsongan</title>
                                            <desc>Ini adalah keterangan untuk Kecamatan Pasongsongan. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                            <image xlink:href="images.jpg" class="hidden-image" />
                                            <path
                                                fill="#923D9C"
                                                fill-rule="evenodd"
                                                stroke="#6E6E6E"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-miterlimit="10"
                                                stroke-width=".48"
                                                d="M257.744 327.482h.24v.24h1.44v.24-.24h.96v.24h.72v.24h-.24v.48h-.24v.481l.24.24v.72h-.24v.24l-.24.24v.24h-.24v.721h-.24.24-.24v.48h-.24l-.24.24h.24v.48h.24v.24h.24v.24h.72l.24.24h.48v-.24h.96v.24h.48v.24h-.24.48v.24h.48v.241h.48v.24l.24.24v.72l-.24.24v.48l-.24.24v1.201l-.24.24h-.24v.48l-.24.24.24.24v1.201h.24v.24h-.24v.24l-.24-.24h-.24v.24h-.48v.24h.24v.24h-.24.24v.48h-.24.24v.24h-.24v.48h-.24v.241h-.24v.24h-.24v.96l.24.24h-.24.24v.24h-.24v-.24l-.24.24v.24h-.24v.24-.24.24h-.24v.24h-.48v.241h-.24.24v.24h-.24v.48h.24l-.24.24h.24l.24.24v.24h.24l.24.24h-.48v.24h-1.2v.24h-.72l-.24.24h-.96v.241h-.48v.24h-.48l-.24.24h-.24v-.24.24h-.24l-.24.24v.24h-.24v.48h-.24v.24h-.24v.24h.24v.721h-.24v.24l-.24.24v.24h.24l-.48.24.24-.72-.24-.24h-.96l-.24-.24h-3.12v.24h-.24v.24h.24v.24h-.24v.24h-.72l-.24-.24h-1.44v-.24h-.24v.24h-.48v-.24h-.24l-.24-.24-.24-.24h.24v-.24h.24v-.24h-.72v-.24h-.24.24v-.24h-.48l-.24-.24v-.24h-.24v-.24h-.24v-.24h.24v-.24h-.24v-.481h.24v-.24h-.24v-.48h.24v-.72h.24v-.961h.24v-.24h-.48v-.72l-.24-.24v-.48h.24v-.24h.24v-.48h.24v-.241h.72v-.24h1.68v-.48h-.48v-.96h.24v-.24h-.24v-.961h.24v-.48h.24v-.24h.24v-.48h.24v-.48h.24v-.24h.24v-.24h.48v.24h.72v-.24h-.24v-.721h.24v-.72h.24v-.48h.48v-.24h.48v-.24h.24v-.24h.24v-.481h.24v-.48h-.96v-.24h-.48v.24h-.96v-1.92h.24v-.721h.24v-.48h.24v-.24h.24v-1.2h.24v-.721h1.92v-.48l.24.24v.24h.24v-.24h.72v-.24.24h.24v-.24h.96v-.24h2.16v-.24h.48z"
                                                clip-path="url(#a)"
                                            />
                                        </g>
                                        <g id="kec-ambunten" class="kecamatan">
                                            <title>Ambunten</title>
                                            <desc>Ini adalah keterangan untuk Kecamatan Ambunten. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                            <image xlink:href="images.jpg" class="hidden-image" />
                                            <path
                                                fill="#94A831"
                                                fill-rule="evenodd"
                                                stroke="#6E6E6E"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-miterlimit="10"
                                                stroke-width=".48"
                                                d="m273.583 327.723.24.24h2.16l-.24.24v1.44l-.24.24v.48h.24v.72h.48v.24h.24v1.201h-.24v.48h-.24v.48h-.24v.48h-.24v.481h-.24v.24h-.48v.24l-.24-.24v.24h-.24v.72l-.24.24v.72h.24-.24l-.24-.24h-.72l-.24.24-.24-.24h-.48v.24l-.24.241v.48l-.24.24-.24.24h-.48v.24h-.96v-.24.24l-.24-.24h-.48v-.24h-.72l-.24-.24v.24h-.48v-.24h-.48l-.24-.24h-.48v-.48h-.24v-.24h-.48v.24-.24h-.72l-.24-.24h-.48l-.24-.24v-.24l.24-.24v-.72l-.24-.24v-.241h-.48v-.24h-.48v-.24h-.48.24v-.24h-.48v-.24h-.96v.24h-.48l-.24-.24h-.72v-.24h-.24v-.24h-.24v-.48h-.24l.24-.24h.24v-.481h.24-.24.24v-.72h.24v-.24l.24-.24v-.24h.24v-.72l-.24-.24v-.481h.24v-.48h.24v-.24h.24v.24h2.16v.24h.48v-.24h.24v.24H267.103v-.24h.48v-.24H270.943v.24h1.44v-.24h.48v-.24h.72z"
                                                clip-path="url(#a)"
                                            />
                                        </g>
                                        <g id="kec-dasuk" class="kecamatan">
                                            <title>Dasuk</title>
                                            <desc>Ini adalah keterangan untuk Kecamatan Dasuk. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                            <image xlink:href="images.jpg" class="hidden-image" />
                                            <path
                                                fill="#B5C72A"
                                                fill-rule="evenodd"
                                                stroke="#6E6E6E"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-miterlimit="10"
                                                stroke-width=".48"
                                                d="M290.141 325.562v.24h.24v.24h-.24v.24h-.24v.24-.24h-.24v.24h-.24v.24h-.24v.48l-.24.24-.24.24v.24h-.24v.24l-.24.24v.24h-.24v.241h.24v.24h-.24.24-.24v.96h-.48v.24h-.24.24v.24h.24v.961h.24v.24h.24v.48h.24v.24h.24v.24h.24v.24h.24v.24l.24.24v.721h.24v.72h.24v.48h.24v.24h-.24v.24h-.24v.24l-.24.24v.24h.24v.481h-.24v.24h-.24v-.24h-.48v-.24h-.48v.24h-.96v-.48h-.24v-.24l-.24-.24-.24-.24h-.24v-.48h-.24l-.24-.24-.24.48h-.24v-.24h-.48v-.24h-.48v.96l-.24.24v.24l-.24.24v.72l.24.24v.24h.48v.24h.24v.72h.48v.24h.24v1.201h-.24l-.24-.24h-1.2v.24h-.24v.48h-.48v-.24h-.479v-.96h-.24v-.24h.24v-.48h-.24v-.24h-.48v-.24h-.72v-.24h-.48v-.24h-.24v.24h-.24v.48h-.24l.24.24v.24h.24-.24.24v.24h.24v.48h.24v.24h.24v.48h.24-.24v.24l-.24-.24v.48h-.24v.24h-.72v-.24h-.48v.24h.24v.24h-.72v-.24h-.24v-.24h-.24v-.24h-1.2v-.24h-.24v-.48h-.24v-.72l-.24.24v-.72h-.24v-.24h-.24.24v-.24h-.24v-.24h-.24v-.24h-.24v-.24h-.72v-.24h-.48l-.24.24v-.24h-.24.24v-.24h-.24v-.721h.24-.24v-.72l.24-.24v-.72h.24v-.24l.24.24v-.24h.48v-.24h.24v-.481h.24v-.48h.24v-.48h.24v-.48h.24v-1.201h-.24v-.24h-.48v-.72h-.24v-.48l.24-.24V328.202l.24-.24h.24v.24h1.68v-.24h.96v-.24h.96v-.24h1.68l.24-.24h.96v-.24h.96v-.24h.72v-.24h.96v-.241h1.44v-.24h.72v-.24h1.68v-.24h.96z"
                                                clip-path="url(#a)"
                                            />
                                        </g>
                                        <g id="kec-batuputih" class="kecamatan">
                                            <title>Batuputih</title>
                                            <desc>Ini adalah keterangan untuk Kecamatan Batuputih. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                            <image xlink:href="images.jpg" class="hidden-image" />
                                            <path
                                                fill="#3D27BA"
                                                fill-rule="evenodd"
                                                stroke="#6E6E6E"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-miterlimit="10"
                                                stroke-width=".48"
                                                d="M297.341 324.361h1.68v.24h.48v.24h.24v-.24h.48v.24h1.92v.24h.72v.24h.24v-.24h.48v.24h.96v.24h.24v-.24l.24.24h.24v.24h.24v-.24.24-.24h.24v.24-.24.24h.96v.24-.24h.24v.24h.96v.241h.24l.24.24h.72v.24h.24v.24h.24l.24.24h.72v.24h.48v.24h.72v.24h.24v-.24.24h.24l.24.24h.479v.24h.72v.24h.48v.241h.48l.24.24h.24v.24h.48v.24h.24v.48l-.24.24v.24h.24v.48h-.24v.24h-.24v.481h-.24v.24h-.24v.48h-.24v.24h-.24v.24l-.24.24v.24h-.24v.721h.24v.72h-1.2v-.24h-.24l-.24.24h-.48v-.24h-.24l.24-.24h-.96v-.24l-.24-.24h-.24v-.24h-.24v.24h-.24v.48h-.72v.24l-.24.24.24.24h-.48v.24l-.24.24h-.48l-.24.24h-.48v-.24h-1.44l-.24-.24h-.48l-.24.24v.24h-.24v.72h.24l.24.241v.48h-.24v.48h.24v.72l-.24.24v.24h-.24v.24h-.24v.481h-.24v.72h.24v.24h.24-.24v.24h-.24v.48h.24l.24.24v-.24.72h-.24v-.24.24-.24l-.24.24h-.48v.241h-.24v.48h-.24v.48h-.48.24v-.24h-.24l.24-.24h-.24v-.24h.24-.24v-.24h-.24v-.24h-.48l-.24-.24h-.96v-.24h-.24v-.24h-.24v-.24h.24v-.72.24-.24h.24v-.721h.24v-1.2h.24v-.24h-.24l-.24-.24v-.24l.24-.24h-.24v-.24h-.96v-.24h-.48.24-.24v-.241h-.24v.24h-.719v-.24h-.48v.24h-.48v.24-.48h.24v-.48l.24-.24h-.24v-.24h-.24v-.24h-.24v-.48h-.24v-.24h-.24l-.24-.24h-.24v.24h-.24v.24h-.24v.24h-.24l.24.24v.24h-.24v.24-.24h-.24v-.24.24h-.48l-.24-.24h-.48v1.2h-.24v.24l-.24.24v.72l-.24-.24v.24l-.24.24v.24h-.24v-.24h-.24v-.24h-.72v-.24h-.24v-.24h-.24v-.48h.24-.24v-.48h.24v-.24h.24v-.24l.24-.24v-.48l.24-.24v-.24l.24-.48h.24l.24-.241v-.96l-.24-.24-.24.24v-.24h-.48v.24-.48h-.48l-.24.24v.24h-.24v.24l-.24.24v.48l-.24.24-.24.24.24.24v.24h-.24v.48h-.48v-.24h-.24v-.48h-.24v-.72h-.24v-.72l-.24-.24v-.24h-.24v-.24h-.24v-.24h-.24v-.24h-.24v-.48h-.24v-.241h-.24v-.96h-.24v-.24h-.24.24v-.24h.48v-.96h.24-.24.24v-.241h-.24v-.24h.24v-.24l.24-.24v-.24h.24v-.24l.24-.24.24-.24v-.48h.24v-.24h.24v-.241h.24v.24-.24h.24v-.24h.24v-.24h.24v-.24h.48v-.24h.24v-.24h.96l.24-.24h.48l.24-.24h.48v.24h.96v-.24h.72v-.24h1.92z"
                                                clip-path="url(#a)"
                                            />
                                        </g>
                                        <g id="kec-batangbatang" class="kecamatan">
                                        	<title>Batang-Batang</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Batang-Batang. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#7043B0"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M318.7 331.084h.24v.24h.48v.24h.24l.24.24h.48v.24h.48v.24h.48v.24h.48l.24.24h.48v.24h.48v.24h.48v.24h.48v.24h.72v.24h.48v.241h.72v.24h.48l.24.24h.48l.24.24h.24l.24.24h.48v.24h.239v.24h-.24v.24h-.24v.24h-.24v.48h-.24v.241h-.72l-.24-.24v.24l-.24-.24v.24l-.24.72-.24.24v.48h-.24v.24h-.24v.24-.24l-.24.24h-.24l-.72-.24-.48-.24h-.72l-.48-.24-.24.24-.24.48-.24.72-.24.241v.24l-.24.24v.48h-.24v.24h-.48l-.24-.24h-.24l-.24-.24h-.24v.72h-.48l-.24.24v.24h-.24v.24h-.24.24v.24h.24v.481h.24v.24h-.24v.48l.24-.24v.48l-.24.24v.24l-.24.24v.48l-.48.721-.48.72v-.24h-.48v-.24H314.62v-.24h-.719v-.24h.24v-.24l.24-.24-.24-.24h.24v-.48h-.24v-.24.24-.24.24h-.72v.24h-.72v.24h-.24l-.24.24h-.24l-.24-.24h-.72v-.24h-1.2l-.24-.24h-.24l-.24-.24v-.48l-.24-.24v-.24h-.24v.24-.24h-.24v.24h-.48v.24h-.48l-.24-.24v.24h-.24.24-.24v.24h-.48v-.24h-.24.24v-.24h-.24v-.24h-.24v-.24h-.48v-.241h-.48v-.24h-.24v-.72.24l-.24-.24h-.24v-.48h.24v-.24h.24-.24v-.24h-.24v-.721h.24v-.48h.24v-.24h.24v-.24l.24-.24v-.72h-.24v-.48h.24v-.481l-.24-.24h-.24v-.72h.24v-.24l.24-.24h.48l.24.24h1.44v.24h.48l.24-.24h.48l.24-.24v-.24h.48l-.24-.24.24-.24v-.24h.72v-.481h.24v-.24h.24v.24h.24l.24.24v.24h.96l-.24.24h.24v.24h.48l.24-.24h.24v.24h1.2v-.72h-.24v-.72h.24v-.24l.24-.24v-.24h.24v-.24h.24v-.48h.24v-.24h.24v-.481h.24v-.24h.24v-.48h-.24v-.24l.24-.24v-.48l.24.24h.24v.24h.24l.24.24h.24v.24h.72v.24h.72v.24h.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-dungkek" class="kecamatan">
                                        	<title>Dungkek</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Dungkek. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#30A5B3"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="m345.338 342.608.24.24.24.24.24.24v1.681h-.24v.72l-.24.24v.72h-.24v.961l.24.24-.24.24v.48h-.24v.24h-.24v.24h-.72l-.24-.24h-.48v-.24h-1.2v-.24h-.48v-.24h-.24v-.72h.24v-.48l.24-.24v-.72h.24v-1.441l.24-.24v-.72h.24v-.48h.24v-.48h.24v-.241h.24l.24-.24h1.2v.24h.48v.24zm-16.559-6.962h.48v.24h.24l.24.24h.24v.24h.48v.24h.24v.24h.24v.24h.24l.24.24.24.24.24.24v.24h.24v.48h.24v.24l.24.24v.48h.24v.481h.24v.48h.24v.72-.24.24h.24v.48h.24v.48h.24v.481l.24.24v.48h.24v.24l.24.24v.24h.24v.48h-.24l-.24.24h-.24l-.24.241h-1.2v-.24h-.72l-.24-.24h-1.2v.24h-.24v-.24h.24-.48l-.24.24v-.24.24-.24h-.24v.24h-.48l-.24.24h-.24v.24h-.24l-.24.24-.24.24-.24.24h-.24v.24h-.24v.24h-.48v.24h-.24v.24h-.48v.24h-.24v.24h-.24v.241h-.48v.24h-.24v.24h-.48v.24h-.48v.24h-.24v.24h-.72v.24h-1.2v.24h-.72v.24h-1.2v.24h-1.2v-.24.24h-.24v-.24h-.48v-.24h-.24.24v-1.44l.24-.24v-.72l-.24-.48h-.24v-.24l.48-.72.48-.721v-.48l.24-.24v-.24l.24-.24v-.48l-.24.24v-.48h.24v-.24h-.24v-.481h-.24v-.24h-.24.24v-.24h.24v-.24l.24-.24h.48v-.72h.24l.24.24h.24l.24.24h.48v-.24h.24v-.48l.24-.24v-.241l.24-.24.24-.72.24-.48.24-.24.48.24h.72l.48.24.72.24h.24l.24-.24v.24-.24h.24v-.24h.24v-.48l.24-.24.24-.721v-.24l.24.24v-.24l.24.24h.72v-.24h.24v-.48h.24v-.24h.24v-.24h.24v-.24h.24v.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-gapura" class="kecamatan">
                                        	<title>Gapura</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Gapura. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#34C23B"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M304.54 341.888v.24h.48v.24h.48v.24h.48v.24h.24v.24h.24v.24h-.24.24v.24h.48v-.24h.24-.24.24v-.24l.24.24h.48v-.24h.48v-.24h.24v.24-.24h.24v.24l.24.24v.48l.24.24h.24l.24.24h1.2v.24h.72l.24.24h.24l.24-.24h.24v-.24h.72v-.24h.72v-.24.24-.24.24h.24v.48h-.24l.24.24-.24.241v.24h-.24v.24h.72v.24H317.26v.24h.48v.48h.24l.24.48v.721l-.24.24v1.44h-1.92v.24h-.24v-.24h-.24v-.24h-.48v.24-.24.24h-.24v-.24.24l-.24-.24h-.24v.24h-.24v-.24h-.24v.24-.24h-.48v.24h-.48l-.24.24h-.24v.24-.24h-.48v-.24.24h-.72v.24h-.24v.24h-.24v.241h-.24v.24h-.24v.24h-.24v.24h-.24v.24h-.24v.24h-.24v.24h-.24v.24h-.24v.24h-.24v.48h-.24v.481h-.24v.48h-.24v.24l-.24.24v.48-.24h-.24v.48h-.24v.24h-.24l-.24.24h-.24l-.24-.48-.24.24-.24.24h-1.44l-.24.241v-.24l.24-.24h-.24l.24-.24v-.48h.24v-.24h-.24v.24l-.48.24-.24.24h-.24v-.24h-.48v-.24h-.24l-.24-.24v-.24h.48v-.24h.24v-.24h-.24.24v-.481h-.24v-.24h-.24l.24-.24h-.24v-.24h-.48v-.24h-.72v-.24.24h-.48v-.24h-.48v-.24.24-.24h-.72.24-.24v.48h.24v.24h-.24v.24-.24h-.48l-.24.24h-.24v-.24h-.719v-.24h-.24l-.24-.24h.48v-.24h-.24v-.24h-.24v.48l-.24.24h-.48v.24h-.24v-.24h-.96v-.24h-.24v-.48l.24-.24v-.48h.24v-1.201l.24-.24v-.96h-.24v-.961h-.24v-.24.24-.24h.24v-.24h-.96v-.24.24h-.24v-.24h-.24v-.24h-.24.24-.24v-.24h.24-.24v-.48h.24-.24v-.24h.24-.24.24v-.241h1.2v-.24h.24v.24h.24v-.24.24h.24l.24.24h.24v.24h1.92v-.24l.24-.24h.24v-.48h.48v.24h.48v.24h.24v-.24.24h1.2l.24-.24v-.24h.24v-1.2h1.2v-.48h.24v-.481h.24v-.24h.48l.24-.24v.24-.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-kalianget" class="kecamatan">
                                        	<title>Kalianget</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Kalianget. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#25A872"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M297.821 351.491h.24v.24h-.48l.24.24h.24v.24h.72v.24h.24l.24-.24h.48v.48l-.24.241v.24h-.24v.24h.24v.24-.24h.24v.24h.24v.24h.24v.24h.24v.24h.48v.24h.48v.24-.24h.24v.24h.24v.24h.48v.24h.72v.241h.48v.24h.24v.24h.24-.24v.24h.24v.24h.24v.72h-.24v.24h-.24v.24l-.24.24v.24h-.72l.24-.24h-.48v-.24h-.24l-.24-.24h-.24v-.24h-.24v-.24h-.24v-.24h-.48v-.24h-.24v-.24h-.48v-.24h-.48v-.24h-.48v.24-.24h-.72l-.48.24h-.48l-.24.48h-.48.24-.24v.24l-.24.24-.72.48-.48.24v.24l-.24.24h-.24l-.24.481-.24.24-.72.48v.24h-.24v.24h-.24v.24h-.24v.48h-.24v.24h-.24v.241h-.24v.24h-.24v.48h-.24v.24h-.24v.48h-.24v.48h-.24v.721h-.24v.72h-.24l-.24.24-.24-.24h-1.44v-.96l.24-.72v-.72l.24-.48-.72-.24-.24-.241h-.24v-.48h.24v-.24l.24-.24.24-.24v-.24h.24l.24-.24h.48l.24-.24h.48v-.24h.24l-.24-.24-.24-.241h-.24l-.24-.24v-.24h.24-.24v-.24h.24l-.24-.24h-.24v-.24h.24v-.24h-.24.24v-.48l.24.24h.48l.24-.24v-.24l.24-.48.24-.241.24-.24v-.24h.24v-.48h.24l.24-.24h.24v-.24.24-.24h.24v-.24h.24v-.24l.24.24v-.24h-.24.24-.24v-.24h.72v.24h.48v.24h.24v.24h.24v.24h.24v.24h.48v.24h.24l.24-.48.24-.48v-.24h-.24l-.24-.24h-.24v-.24h-.24l-.72-.481h.24v-.48h.72v.24-.24h.24v-.48h.24v.24h.96v.24h.24v-.24h.48l.24-.24v-.48h.24v.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-saronggi" class="kecamatan">
                                        	<title>Saronggi</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Guluk-Guluk. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#4656B3"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M283.902 355.573v-.24l.24-.24h.24v.24h.24v.24l.24.24v.48h.24v.24l.24.24h.24l.24.24h.48v.24h.24v.24l.24-.24h.48l.24-.24v.24h.48l.24.24h.72v-.24h.24v-.24h.48v.24h-.24v.24h.24l.24.24h-.24v.24h.24-.24v.24l.24.241h.24l.24.24.24.24h-.24v.24h-.48l-.24.24h-.48l-.24.24h-.24v.24l-.24.24-.24.24v.24h-.24v.481h.24l.24.24.72.24-.24.48v.72l-.24.72v.961h1.44l.24.24v.48h.48v.24h.48v.24l.24.24h.48l.24.24v-.24h.48v.24h.24v.241h.24v.24-.24h.48v.24h-.24.24v.48h.24v1.2h-.24v.24h.24v.481h.24v.24h.24v.24h.24v.24h.24-.24v.24h-.24v1.2h.24-.24v.24h-.48v.241H286.301v-.24h-.72l-.24.24-.24-.24h-.72v-.72h.24v-.24l-.24-.24v-.24h.48v-.48h-.24v-.481h-.24l-.24-.24h-.48v-.24h-.48l-.24-.24h-.48v-.24h-.48v-.24h-.24l-.24-.24v-.24h.24v-.24l.24-.24h.24v-.481h-.48v-.24h-.72l-.24-.24h-.24v-.72h.24v-.48h.24v-.48l.24-.24h-.24v-.241h-.48l-.24-.24h-.48v-.24l-.24.24-.24-.24h-.24l-.24-.24-.24-.24h-.96v.24h-.24v.24h-.48v.24l-.24.24h-.96l-.24-.24h.24v-.48l.24-.24h-.24l.24-.24h-.48v-.24h-.24v-.24h-.24v-.24h.24v-.721h.24v-.48h.24v-.48h.24v-.48h.24v-1.201h.24v-.24l.24-.24v-1.2h-.48v-.24h.24v-.24h.24l.24.24H279.822v-.24.24h.48l.24.24h.48l.24.24h.48v.24h.96v-.24h.24v-1.2l.24-.241v-.96.24h.24v.24h.24v.24l.24.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-bluto" class="kecamatan">
                                        	<title>Bluto</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Bluto. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#A66928"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M275.742 362.536h.24l-.24.24h.24l-.24.24v.48h-.24l.24.24h.96l.24-.24v-.24h.48v-.24h.24v-.24h.96l.24.24.24.24h.24l.24.24.24-.24v.24h.48l.24.24h.48v.24h.24l-.24.24v.48h-.24v.48h-.24v.72h.24l.24.24h.72v.241h.48v.48h-.24l-.24.24v.24h-.24v.24l.24.24h.24v.24h.48v.24h.48l.24.24h.48v.24h.48l.24.241h.24v.48h.24v.48h-.48v.24l.24.24v.24h-.24v.72h-1.2v.241h-.96v-.24h-.24v.24h-.24v-.24.24-.24h-.96v-.48h-.24l-.24-.24h-.72l-.24-.24v.24-.24.24-.24h-1.2v-.24h-.48v-.24h-1.68v.24h-.48v-.24h-.72v-.24.24h-.24v-.24h-1.44v-.24h-1.44v-.24h-.48v-.241h-.96v.24l-.24-.24h-.24v-.24h-.24v-.24h-.96v-.24h-1.439v.24h-.72l-.24-.24h-.72v.24h-.48l-.24-.24h-.24v-.24h-.72v-.24h-.72v-.72h.24v-.721l.24-.24.24-.24h.24v-.48h.24v-.24h.72v-.48l.24-.24v-1.681h-.24v-.96h.24v.24h.48v.24h.24v.24h.24v.48h.24v.48h.24v.24l.24.24h.24l.24.24h.24v.24h.24l.24-.24h.24l.48-.48.24-.48h.24l.24-.24h.24v-.24l.24-.48.24-.24.24-.24v-.24h.24v-.24l.24-.241h.24v-.24h.24v-.24h.24v-.48h.24v-.48h1.2v.24h.24v.72h.24l.24.24h.24l.24.24h.24v.24h.24v.24h.24v.48h.24v.24h.24v.24h.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-pragaam" class="kecamatan">
                                        	<title>Pragaan</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Pragaan. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#A6417F"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M243.344 359.174v.24h.72v.24-.24h.24v.24h.24l.24-.24h.48v.24-.24h1.44v.24h.48v.24h.96l.24.24h.24l.24.24h.24l.24.24h.96v.24l.24.241h.24l.24.24h.24v.24h-.24v.72h.48v-.48h.24v-.48h.72l.24-.24h.24v-.24h.96l.24.24v.24h.48l.24.24h.72l.24.24h.48l.24.24.24-.24.24-.24v-.24h.96l.24.24h.24l.24.24v.24h.48v.24l.24-.24H262.303l.24-.24h.48v-.24h.24l.24.24h.24v.24h.24v-.24.24l.24-.24h.24v.24h.48v.72h.24v1.681l-.24.24v.48h-.72v.24h-.24v.48h-.24l-.24.24-.24.241v.72h-.24v.72h-1.2l-.24-.24h-2.16.24-.48l-.24-.24h.24-.72l-.24.24v-.24.24-.24h-.24v-.24h-.24l-.24.24v-.24.24h-1.2v.24h-.48v.24h-.24v.48h-.24.24-.24v.24h-.48v-.24.24h-.48v.24h-.24v.241h-.24v.48h-.48v.48h-.24v.24h-.48v.24h-1.2v.24h-.24v.24h-.48v-.24h-.24v-.24h-.24v-.48h-.24v-.24h-.96v.24h-2.16v.24h-2.16v.24h-.24v-.24h-.24v.24h-.48v.24h-.24v-.72h.24v-.24h.24v-.24h.24v-.72h.24v-.24h.24v-.48h.24v-.72h.24v-.72h.48l.24-.241h1.2v-1.92.24-.24h-.24.24v-.24l-.24-.24v-.961h-.24v-.24h-.24v-.24h-.24l-.24-.24v-.24h-.24v.24-.24h-.24v-.48h-.24v-.24h-.24v-.241l-.24-.24h-.24v-.48h-.24.24-.24v-.24h-.24v-.24h-.48v-.24h-.24v-.48z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-ganding" class="kecamatan">
                                            <title>Ganding</title>
                                            <desc>Ini adalah keterangan untuk Kecamatan Ganding. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                            <image xlink:href="images.jpg" class="hidden-image" />
                                            <path
                                                fill="#C74E5C"
                                                fill-rule="evenodd"
                                                stroke="#6E6E6E"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-miterlimit="10"
                                                stroke-width=".48"
                                                d="m262.063 346.69-.24.24v.24h.24v.48h.24-.24v.24h1.44v-.24l.24-.24h.48v.24h1.44v.24h.48v.24l.24.24.24.24v.96h-.24v.24h-.24v1.201h-.72v.24l-.24.24v.48l-.24-.24v.24h-.24v-.24h-.24v.24h-.24v.24l-.24-.24v.24h-.24v.721l-.24.24v.48l.24.24h.24v.24h.24l.24-.24h.24v.72l-.24.24h.24v.48h.24v-.24.24l.24.241v.24l.24-.24v.24h-.24.24l.24.24h.48v-.48h1.2l.24.24v1.68l-.24.24v.24h-.24l.24.24v.241l-.24.24-.24.24v.48l-.24.24v.72h-.24v.24h.24v.24h.24v.241l-.24.24v.24l-.24.24v.24l-.24.24-.24.24v-.24h-.24v-.24h-.48v-.24h-.24v.24h-.48v-.24h-.24l-.24.24v-.24.24h-.24v-.24h-.24l-.24-.24h-.24v.24h-.48l-.24.24H259.423l-.24.24v-.24h-.48v-.24l-.24-.24h-.24l-.24-.24v-.48l.24-.24v-1.2h-.24v-.24h.24-.24l.24-.24v-.24h.24v-.241h.24v-1.2h.24v-.72h-.24v-.48h-.24l-.24-.24v-.241h-.48v.24l-.24-.24h-.24v-.24.24l-.24-.24v-.48h.24v-.24h-.48l-.24-.24h-.48l-.24-.24h-.24l-.48-.48v-.24l.24-.24h-.24v-1.681h-.24l.24-.24v-.24h-.24v-.24l.24-.24v-.241h.24v-.72h-.24v-.24h.24v-.24h.24v-.48h.24v-.24l.24-.24h.24v-.24.24h.24l.24-.24h.48v-.241h.48v-.24h.96l.24-.24h.72v-.24h1.2v-.24h.48v-.24h.72v.24z"
                                                clip-path="url(#a)"
                                            />
                                        </g>
                                        <g id="kec-lenteng" class="kecamatan">
                                            <title>Lenteng</title>
                                            <desc>Ini adalah keterangan untuk Kecamatan Lenteng. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                            <image xlink:href="images.jpg" class="hidden-image" />
                                            <path
                                              fill="#C29E29"
                                              fill-rule="evenodd"
                                              stroke="#6E6E6E"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-miterlimit="10"
                                              stroke-width=".48"
                                              d="M265.903 347.41h.72v.24-.24.24h.24v-.24h.96v.24h.48v.24-.24h.48v.24h1.44v.24-.24l.24.24H273.583v.24h1.2v.24h.24v.24h1.44l.24-.24h1.44v.48h.24v.48h.24l.24.24.24.24.24.481.24.24v.48l.24.24v.72h-.24l.24.24v.721h.72v.24h.48v-.72H282.221v.24h.24l.24.24h.48v.24l.24.24.24.24v.24h.24v.48l.24.24v.24l-.24.24v.241l-.24-.24v-.24h-.24v-.24h-.24v-.24.96l-.24.24v1.2h-.24v.24h-.96v-.24h-.48l-.24-.24h-.48l-.24-.24h-.48v-.24.24H276.942l-.24-.24h-.24v.24h-.24v.24h.48v1.2l-.24.24v.241h-.24v1.2h-.24v.48h-.24v.48h-.24v.481h-.24v.72h-.24v-.24h-.24v-.24h-.24v-.24h-.24l-.24-.24h-.24l-.24-.24h-.24v-.72h-.24v-.24h-1.2v.48h-.24v.48h-.24v.24h-.24v.24h-.24l-.24.24v.24h-.24v.24l-.24.24-.24.24-.24.48v.24h-.24l-.24.24h-.24l-.24.481-.48.48h-.24l-.24.24h-.24v-.24h-.24l-.239-.24h-.24l-.24-.24v-.24h-.24v-.48h-.24v-.48h-.24l.24-.24.24-.24v-.24l.24-.24v-.24l.24-.241v-.24h-.24v-.24h-.24v-.24h.24v-.72l.24-.24v-.48l.24-.24.24-.241v-.24l-.24-.24h.24v-.24l.24-.24v-1.68l-.24-.241h-1.2v.48h-.48l-.24-.24h-.24.24v-.24l-.24.24v-.24l-.24-.24v-.24.24h-.24v-.48h-.24l.24-.24v-.72h-.24l-.24.24h-.24v-.24h-.24l-.24-.24v-.48l.24-.241v-.72h.24v-.24l.24.24v-.24h.24v-.24h.24v.24h.24v-.24l.24.24v-.48l.24-.24v-.24h.72v-1.201h.24v-.24h.24v-.96l-.24-.24-.24-.24v-.24h-.48v-.481h.24z"
                                              clip-path="url(#a)"
                                            />
                                        </g>
                                        <g id="kec-batuan" class="kecamatan">
                                        	<title>Batuan</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Batuan. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#9E8639"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M284.862 346.69v.24h.48v.24l.24.24-.24.24v.24h.24v.48h.24v.24h.48v.72l-.24.24v.24h.24-.24l.24.24v-.24h.24v.24h.24v.721h.48v.24h.48v.48-.24.72h.48v.24l-.24.24v.24h.24v.241h.24v.24h.24v.24-.24.24h.24v-.24h.24l-.24.24h.48v.24h.72l.24.24h.48-.24.24v.24h.24v.24l.24.24h.24v-.24h.24-.24l.24-.24.24.24v-.24.24-.24h.24v.24h-.24l-.24.24h-.24v.48h-.24v.24l-.24.241-.24.24-.24.48v.24l-.24.24h-.48l-.24-.24v.48h-.48v.24h-.24v.24h-.72l-.24-.24h-.48v-.24l-.24.24h-.48l-.24.24v-.24h-.24v-.24h-.48l-.24-.24h-.24l-.24-.24v-.24h-.24v-.48l-.24-.24v-.24h-.24v-.24h-.24v-.24l-.24-.24v-.48h-.24v-.24l-.24-.24-.24-.24v-.24h-.48l-.24-.241h-.24v-.24h-1.2v.72h-.48v-.24h-.72v-.72l-.24-.24h.24v-.72l-.24-.24v-.48l-.24-.24-.24-.481-.24-.24-.24-.24h-.24v-.48h-.24v-.48h1.44v-.24h.48v.24h.96v-.24h.24v-1.201h.48v-.24H284.142l.24-.24h.48z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-kotasumenep" class="kecamatan">
                                        	<title>Kota Sumenep</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Kota Sumenep. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#BC44C7"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M291.101 345.009h.24v.24h.24v.24h1.2l.24-.24h.72v-.24h.48v.24-.24h.24v.24h-.24.24-.24v.24h.24-.24v.48h.24-.24v.24h.24-.24.24v.24h.24v.24h.24v-.24.24h.96v.24h-.24v.24-.24.24h.24v.961h.24v.96l-.24.24v1.201h-.24v.48l-.24.24v.96h-.24v.24-.24h-.72v.48h-.24l.72.481h.24v.24h.24l.24.24h.24v.24l-.24.48-.24.48h-.24v-.24h-.48v-.24h-.24v-.24h-.24v-.24h-.24v-.24h-.48v-.24h-.72v.24h.24-.24.24v.24l-.24-.24v.24h-.24v.24h-.24v.24-.24h-.24v.24-.24.24l-.24-.24-.24.24h.24-.24v.24h-.24l-.24-.24v-.24h-.24v-.24h-.24.24-.48l-.24-.24h-.72v-.24h-.48l.24-.24h-.24v.24h-.24v-.24.24-.24h-.24v-.24h-.24v-.24h-.24v-.24l.24-.24v-.24h-.48v-.72.24-.48h-.48v-.24h-.48v-.721h-.24v-.24h-.24v.24l-.24-.24h.24-.24v-.24l.24-.24v-.72h-.48v-.24h-.24v-.48h-.24v-.241l.24-.24-.24-.24v-.24l.24-.24h.48v-.24h.48v-.24l.24-.24h.24v-.24h.24-.24.48v.24h1.2v-.24h.24v-.24h.48v-.24h.96v.24h.24v-.24h.24v-.241h.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-rubaru" class="kecamatan">
                                        	<title>Rubaru</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Rubaru. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#42C2B1"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M264.703 336.126h.24l.24.24h.72v.24-.24h.48v.24h.24v.48h.48l.24.24h.48v.24h.48v-.24l.24.24h.72v.24h.48l.24.24v-.24.24h.96v-.24h.48l.24-.24.24-.24v-.48l.24-.24v-.24h.48l.24.24.24-.24h.72l.24.24v.72h.24v.24h-.24.24v.24l.24-.24h.48v.24h.72v.24h.24v.24h.24v.24h.24v.24h-.24.24v.24h.24v.721l.24-.24v.72h.24v.48h.24v.24h1.2v.24h.24v.24h.24v.24h.72v-.24h-.24v-.24h.48v.24h.72v-.24h.24v-.48l.24.24v-.24h.239-.24v-.48h-.24v-.24h-.24v-.48h-.24v-.24h-.24.24-.24v-.24l-.24-.24h.24v-.48h.24v-.24h.24v.24h.48v.24h.72v.24h.48v.24h.24v.48h-.24v.24h.24v.96h.48v.24h.72v.24h-.24.24v.48h.24v.24h-.24v.481l-.24.24v.24h-.24v.24l-.24.24v.72l-.24.24v.721l.24.24v.96l.24.24h-.24l.24.24h-.24v.24h-1.44v.24h-.48v1.201h-.24v.24h-.96v-.24h-.48v.24H276.702l-.24.24h-1.44v-.24h-.24v-.24h-1.2v-.24H270.463l-.24-.24v.24-.24h-1.44v-.24h-.48v.24-.24h-.48v-.24h-.959v.24h-.24v-.24.24-.24h-.96v.24h-1.44v-.24h-.48l-.24.24v.24h-1.44v-.24h.24-.24v-.48h-.24v-.24l.24-.24v-.24h-.72v.24l-.24-.24h-.24v-.24l-.24-.24h-.24l.24-.24h-.24v-.48h.24v-.241h-.24.24v-.24h.48v-.24h.24v-.24.24-.24h.24v-.24l.24-.24v.24h.24v-.24h-.24.24l-.24-.24v-.96h.24v-.241h.24v-.24h.24v-.48h.24v-.24h-.24.24v-.48h-.24.24v-.24h-.24v-.24h.48v-.24h.24l.24.24v-.24h.24v-.24h-.24v-1.201l-.24-.24.24-.24v-.48h.24l.24-.24v-1.201l.24-.24v-.24l.24.24h.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-manding" class="kecamatan">
                                        	<title>Manding</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Manding. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#C76636"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M292.301 332.764v.48-.24h.48v.24l.24-.24.24.24v.961l-.24.24h-.24l-.24.48v.24l-.24.24v.48l-.24.24v.24h-.24v.24h-.24v.481h.24-.24v.48h.24v.24h.24v.24h.72v.24h.24v.24h.24v-.24l.24-.24v-.24l.24.24v-.72l.24-.24v-.24h.24v-1.2h.48l.24.24h.48v-.24.24h.24v.24-.24h.24v-.24l-.24-.24h.24v-.24h.24v-.24h.24v-.24h.24l.24.24h.24v.24h.24v.48h.24v.24h.24v.24h.24l-.24.24v.48h-.24v.48-.24h.48v-.24h.48v.24h.72v-.24h.24v.24h.24-.24.48v.24h.96v.24h.24l-.24.24v.24l.24.24h.24v.24h-.24v1.201h-.24v.72h-.24v.24-.24.72h-.24v.24h.24v.24h.24v.24h.96l.24.24h.48v.241h.24v.24h.24-.24v.24h.24l-.24.24h.24v.24h-.96v1.2h-.24v.24l-.24.241h-1.2v-.24.24h-.24v-.24h-.48v-.24h-.48v.48h-.24l-.24.24v.24h-1.92v-.24h-.24l-.24-.24h-.24v-.24.24h-.24v-.24h-.24v.24h-1.44v.24-.24h-.48v.24h-.72l-.24.24h-1.2v-.24h-.24v-.24h-.48v.24h-.24v.24h-.24v-.24h-.96v.24h-.48v.24h-.24v.24h-1.2v-.24h-.48.24-.24v.24h-.24l-.24.24v.24h-.48v.24h-.48l-.24.24h-.48v-.24h-.48l-.24.24h-.96v-.24h.24l-.24-.24h.24l-.24-.24v-.96l-.239-.24v-.72l.24-.24v-.72l.24-.24v-.24h.24v-.24l.24-.241v-.48h.24v-.24h-.24v-.48h-.24.24v-.24h-.24v-.48h.24v-.24h1.2l.24.24h.24v-1.201h-.24v-.24h-.48v-.72h-.24v-.24h-.48v-.24l-.24-.24v-.721l.24-.24v-.24l.24-.24v-.96h.48v.24h.48v.24h.24l.24-.48.24.24h.24v.48h.24l.24.24.24.24v.24h.24v.48h.96v-.24h.48v.24h.48v.24h.24v-.24h.24v-.48h-.24v-.24l.24-.24v-.24h.24v-.24h.72v-.48h.24v-.24l-.24-.24.24-.24.24-.241v-.48l.24-.24v-.24h.24v-.24l.24-.24h.48z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-talango" class="kecamatan">
                                        	<title>Talango</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Talango. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#99224B"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M321.34 384.384v-.24h-.24v-.48h.24v-.24h.24v.24h.24l-.24.24v.24h-.24v.24zm-16.56-26.41h.24v.72h.24v.24h.24v.24l.24.24h.24v.24h.24l.24.24h.24l.24.24h.24l.24.24h.48l.24.24h.72v.24H313.42v-.24h2.16v-.24h.24l.24.24h1.68v.24h1.68l.24.241h1.92l.24.24h.48v.24l.24.24.24.24v.24l.24.24v.24l.24.24v.721h.24v.72h.24v.48l.24.24v.24h.24v.48h.24v.481h.24v.24l-.24.24v.48h.24v.24h-.48v.24h-.24v-.24l-.24.24h-1.2v.24l-.24-.24-.24.24h-.96v-.24h-.96v-.24h-.72l-.24-.24h-.96l-.24-.24h-1.44v-.24h-.72v-.24h-.72v.24H310.78l-.24-.24h-.48v-.48h-.72v-.24h-.24v-.24h-.96v-.24h-.24v-.24h-1.44l-.24-.24v-.24h-.24v-.24h-.48v-.24h-.24l-.24-.24h-.24l-.24-.241h-.24v-.24h-.72v.24h-.48v.24-.24h-.24.24v-.96l-.24-.48v-.24h-.24v-.24h-.24v-.24l-.24-.24v-1.201l.24-.24v-.24h.24v-.48h.24v-.24h.48v-.24h.24v-.241h.24v-.24h.24v-.24h.72z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-giliginting" class="kecamatan">
                                        	<title>Giliginting</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Giliginting. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#C42B99"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M254.624 392.307h-.24.24v-.24h.24v-.24h.24-.24v.24l-.24.24zm11.04-.24h.239-.24v.24h-.72v-.72h.24l.24.24h.24v.24zm-5.28-1.44v-.241.24zm-4.32-.721h.24v.24h-.24v-.24zm15.839-5.042h.72l.24.24v-.24h.48v.24-.24h.48v.24-.24h.72l.24.24h.48v.24l.24-.24v.24h.48v.24h.48v.24h.24v.24h.96v-.24h.48v-.24h.24v.24h.24l.24-.24.24.24h.48l.24.24h.24l.24.24v.72h-.24l-.24.24-.24.24h-.48l-.24.241-.24.24-.24.24h-.24l-.24.24-.24.24v.72h-.24v.24l-.24-.24h-.48v-.24h-.24v-.24h-.24l-.24-.24h-.24l-.24-.24h-.48v-.24h-1.44l-.24-.24-.24-.24-.24-.24h-.24v-.24h-.48v-.24h-.24v-.24h-.24l-.24-.24h-.24l-.24-.24h-.96l-.24.24h-.24l-.24-.24h.24v-.48l.24-.24v-.24h.24v-.241l.24-.24v-.48h.48l.24.24h.48l.24.24h.24zm27.838-6.242h.24v.24h.24v-.24.24h.24v.24h.24v.48h.24v.24h-.24v.24h.24v.72l.24.24v.24h.24v.48h.24-.24.24v-.24.24h.24v.24l.24.24h.24v.481h.24v.24h.24v.96h.24-.24v.96h-.24v.961h.24v.24h.24v.24l.24.24v.24h.96v.24h.24l.24.24h.24v.24h.24v.721h.24v.72h-.48v-.24h-.24v-.24h-.72v-.24h-.24v-.24h-.24v-.24h-.24v-.96h-.24v-.24l-.24-.24-.24-.24-.24-.24-.24-.24v-.24h.24-.24v-.481l-.24-.24v-.24h-.24v-.24h-.24l-.24-.24h-.48v-.24h-.96v.24h-.48v.24h-.24v.24h-.48v.24h-.72v.24h-.72v.24h-.72v-.24h-.72v.24h-1.2v.24h-.96v-.24h-.24v-.24h-.24v-.24l-.24-.24v-.24h-.24v-.72h-.24l.24-.24v-.48h.24v-.721h.48v-.24h.24v-.24h.24l.24-.24h.24v-.24h.24l.24-.24h.48v-.24h.24l.24-.24h.72v-.24h.24v-.241h.24v.24h.72v-.24h.48l.24-.24h.24v-.24h.24v-.24h.72v-.24h.24v-.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-nonggunong" class="kecamatan">
                                        	<title>Nonggunong</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Nonggunong. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#752AC9"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M371.256 357.974h.72v.24h.24l.24.24h.24v.24h.24v.24h.24v.24h.24v.24h.24v.24h.24v.48h.48v.24h.24v.24h.24l.24.24.24.241.24.24h.24v.24h.24v.24h.24v.24h.24l.24.24h.24v.24h.24v.24h.48v.24h.24v.24h.24v.481h.24v.48h.24v.72h.24V367.097h-.24l-.24-.24h-.48v-.24h-.48l-.24.24h-.72l-.24.24v.24h-1.2v-.24.24h-.48v-.24.24h-.24l-.24-.24h-.72v-.48l.24-.24v-.72h-.48v-.48h-.72l-.24-.24h-.24v-.24h-.24l-.24.24h-.48l-.24.24h-.72l-.24.24h-.24v.24h-.24l-.24.24h-1.2l-.24-.24h-.24v-.24h-.24l-.24-.24v-.48l-.24-.24v-.24h-.24v-.24h-.96v-.241.24h-.48v.24h-.24v.24h-.24v.24h-.24v-.24h-.24v-.24h-.72v-.24h-.96v-.24l-.24.24-.24-.24h-.24l-.24-.48h-.239.24v-.48h.24v-.24h.24v-.24h.24v-.24h.24v-.24h.24v-.24h.24v-.24h.24v-.241h.24v-.24h.24v-.24h.24v-.24h.24v-.24h.24v-.24h.24v-.24h.24v-.24h.24l.24-.24h.24l.24-.24h.24v-.24h.72v-.241h1.92v-.24h.96v-.24h1.68zm27.839-9.844h-.96.24v-.24l.24-.24v-.24h.24v-.24l.24-.24v-.48h.24v-.72h.24v.24l.24.24h.24v.96h-.24v.24l-.24.24v.24h-.24v.24h-.24zm-9.6-5.522v-.24h.24v.48h-.24v.72h-.24v.96h-.24v.24h-.24v-.24l-.24-.24v-.48h-.24v-1.2h.24v-.24l.24-.24v-.24h.24v-.24l.24.24v.72h.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-gayam" class="kecamatan">
                                        	<title>Gayam</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Gayam. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#37C45F"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="m362.137 363.976.24-.24v.24h.96v.24h.72v.24h.24v.24h.24v-.24h.24v-.24h.24v-.24h.48v-.24.24h.96v.24h.24v.24l.24.24v.48l.24.24h.24v.24h.24l.24.24h1.2l.24-.24h.24v-.24h.24l.24-.24h.72l.24-.24h.48l.24-.24h.24v.24h.24l.24.24h.72v.48h.48v.721l-.24.24v.48h.72l.24.24h.24v-.24.24h.48v-.24.24H376.295v-.24l.24-.24h.72l.24-.24h.48v.24h.48l.24.24h.24v.96l.24.24v.24-.24h.24v.48h.24v.481h.24v.24h.24v.24h.24v.24h.24v.24h.24v.24h.24v.24h.24v.24h.24v.24l.24.24v.241l.24.24v.72l.24.24v2.401h.24v.48h.24v.48h.24v.24h.48v.24h.24l.24.241h.48v.24h.24l-.24.24v.48h-.24v.24h-.24v.24h-.24v.24h-.48v.24-.24l-.24.24v.24-.24h-.24v.24h-.24v.24h-.48v.24h-.24l-.24.241v-.24.24h-.24v.24h-.48v-.24h-.24v.24h-.24v-.24h-.24v-.24h-.48l-.24.24v-.24h-1.2v.24h-.24v-.24h-1.2v-.24h-.48v-.24h-.48v-.24l-.24.24v-.24h-.24v-.24h-.48v-.24h-.96v-.24h-.48v-.24h-.48v-.24h-.48v-.24h-.72l-.24-.24h-.72v-.241.24h-.24v-.24h-.96v-.24h-.48l-.24-.24h-.24v-.24h-.72v-.24h-.24v-.24h-.24v-.24h-.24v-.24h-.24v-.24h-.24v-.24h-.24v-.24h-.24.24-.24v-.241h-.24v-.24h-.24v-.24l-.24-.24h-.24v-.24h-.24v-.24h-.24v-.48h-.24v-.72h-.24v-.241h-.24v-.24h-.24v-.72h-.24v-.48h-.24v-.24l-.24-.24-.24-.24v-.24l-.24-.241v-.24l-.24-.24v-.24h-.24v-.24l-.24-.24-.24-.24v-.24l-.24-.24v-.961l-.239-.24-.24-.24v-.72h-.24.24v-.24h-.24v-.24h.24v-.721h.24v-.48h.24l.24.48h.24l.24.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-raas" class="kecamatan">
                                        	<title>Ra'as</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Ra'as. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#AB4200"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="M420.453 377.421v-.24h.24l.24-.24h.48v.24h-.24.24v.72h-.48l-.24.24h-.24l-.24.24h-.24v-.24l-.24.24v-.24h-.48v-.72h.24v-.24h.24v-.24l.24-.24h.24v-.24h.48v.24h-.24v.24l-.24.24h.24v.24zm11.28-1.44h.48l.24.24.24.24h.48v.48h.24-.24v.24h-.24v-.24h-.24v.24h-.48v.24-.24h-.48l-.24.24h-.72v.24h-.72l-.48.24h-1.2v-.24h-.24v-.48l.24-.24v-.24h.48v-.24h.72v-.24h.48v-.24h1.68zm16.558-4.562h.48-.96v-.72h.24v.24h-.24v.24h.24v.24h.24zm-34.077-.72v.24h.24-.24v.24h.48-.24v.48h.24v-.24h.24v.24-.24h.24v.24-.24h.48l.24.24v-.24.24-.24.24h.48v-.24h.24v.24h.24v.24h.48v.24h.72v.24h.24v-.24h.24v.24h.24v-.24h.24v-.24.24h.24v.24h.24v-.24h.24v.24l.24.24h.72v.24h.24v.48h-.24v.24h-.24v.24h.24v.24h.48v.241h-.48.24v.48h.24v.24h-.24v.24h-.24v.24h-.48v.24l-.24.24h-.48v.24h-.24v.24l-.24.24-.24-.24v-.24h-.24v.48h-.24v.241h-.72v-.24.24h-.24v-.24.24h-.48l-.24-.24h-.72v.24h-1.68v.48h-.24v-.24h-.24v-.48h.24v-.24h.24-.24v-.24h-.24v-.48h-.24v-.24h-.48l-.24-.24h-.48v-.72h-.48l-.24-.241h-.72v-.24l-.24-.24v-.24h-.24v-.24l-.24-.24h-.96v.24h-.96v-.24h-1.92v.24H402.934v.24h-.96.48v.24h-.48.24-.48v.24h.24l.24.24v.24l-.24.24v.24h.72v-.24.24l-.24.24h-.48l-.24.24h-.48l-.48.24h-.24v.24h-1.2l-.24.24h-.72v-.24h-.72v-.24h-.24v-.48h-.24v-.48h-.24v-.24h-.24v-.24h-.24v-.72l.24-.24v-.48h.24l.24-.24h.24v-.24h.24l.24.24h.96l.24-.24h.96v-.24h.24v.24h.24v-.48h.24v.24-.24h-.24v.24h.24v.48h.48-.24v.24h-.24v.24h-.24.24v.24h.72v.24h.72l.24-.24h.48v-.24.24h.24v-.24h.48v-.24h-.24v-.24h-.24v-.24h.24v-.24l-.24-.24h1.2v-.241h.48l.24-.24v.24h.24v-.24h1.44v-.24h.24v.24h.48v-.24h.24v-.24h.48v.24-.24h.96v-.24h.24v.24h.48v.24-.24.24h.96l.24.24h-.24.24v-.24.24h1.44v-.24h.72v-.24h.48v-.24h.48zm1.92 0h-.48v.24h-.24v-.24.24h-.72l.24-.24v-.24h.48l.24-.24h.24l.24.24v.24zm-9.36-1.44h.24v.24h.72v.24h-.48v.24h.24v.24l-.24-.24v.24h-.24v-.48h-.24v-.24.24-.24.24h-.24v-.24h.24v-.24h-.24l.24-.241v.24zm43.437-.481v.24h.24l.24.24h-.24v.48h-.24v.48l-.24.24v.48h-.24v.24h-.24v.24h-.24v.241h-.24v-.48h-.24.24v-.48h-.48v-.24h.24v.24-.96l.24-.24v-.24h.24v-.241h.24v-.24l.24-.24v-.24h.24v.24h.24v.24zm2.4-2.401v.72h-.48v-.72h.48zm-16.799.48h-.48v-.48h.48v-.24.24h.48v.24l-.24.24h-.24zm-2.16-1.68v.24h-.48v.24h-.48v-.24h-.96v-.24h.24v-.24h.24v-.24h.48v-.24h.48v-.24.24h.48v.72zm89.035-.72h-.48v-1.201l.24-.24.24-.24h.24v-.24h.24v.24l.24.24.24.24v.24l-.24.24v.24h-.24l-.24.24-.24.24zm-95.754-1.201h-.48v-.24h-.24v-.48h-.24v-.96h.24v-.481h.48v.24h.24v.24h.24v1.44h-.24v.24zm-12.72-1.92v.24h-.96.24v-.24h.48l.24-.241.24-.24v-.24h.24v.72h-.48z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-masalembu" class="kecamatan">
                                        	<title>Masalembu</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Masalembu. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#822BAB"
                                        	  fill-rule="evenodd"
                                        	  stroke="#6E6E6E"
                                        	  stroke-linecap="round"
                                        	  stroke-linejoin="round"
                                        	  stroke-miterlimit="10"
                                        	  stroke-width=".48"
                                        	  d="m385.655 91.234.24.24v.24h.24v.24h-.24v.48l-.24.24v.72h.24v.241h.24v.48h.24v.24h.24v.24h.24v-.48h-.24.24v-.48l.24-.24h.24v.24h.24v.48l.24.24v-.24h.24v-.24.24h.24v.48h.24v-.24h.24v-.96.24h1.2v-.48h.24v.96h.48v-.24.24h.48l.24-.24v-.24h.24v.24-.24h.72v.24h.24-.24v.72h.24v.24h-.24v.96h-.24v.481h.24l.24.24v.24h.24v.24h-.48v.48h-.48v.24h.24v.24h-.72v.48h.24v.24l.24.241h-.24v.48h-.48l-.24.24v.24h-.24l-.24.24h-.24v.24h-.24l-.24.24-.24.24h-.24l-.24-.24h-.72l-.24.24h-.24v.24h-.72v-.48l-.24-.24v-1.44h-.24v-.24l-.24-.24h-.24v-.24h-.48v-.24h-.24l-.24-.24h-.72v-.24h-.48l-.24.24h-.24l-.24.24h-.48v-.24l-.24-.24-.24-.24v-.72l.24-.241v-.96h.24v-1.921h-.48v-.24h.24v-.24h-.24v-.24h.24l.24-.24h.24v-.24h.24v.24h.24v-.24h.72v-.24h.24v-.24.24h.24v-.24l-.24-.24h.24l.24-.24h.48l.24-.241v.24zm.72-18.487h.48v.24h.48v.24h.24v.24h.24v.24h.24v.24h.24l.24.24h.24v.721h.48v.24h.24v.24h.24v.24l.24.24v.24l.24.24v1.681h-.24l-.24.24h-.72v-.24h-.24v.24h-.24v.48h-.48v-.24h-.48v-.48h-.24v-.24h-.24l-.24-.24h-.24l-.24-.24-.24-.24-.24-.24v-.24h-.24v-.24h.24v-.24h-.48v-.48h-.24v-.24l-.24-.24v-.241l.24-.24v-.24h.24v-.48h.24v-.24h-.24v-.48h.24v-.24h.24v-.24h.48zm31.198-56.901v.24h-.48v-.24h.48zm2.16-8.643v.72h.48v.48l.24.24v.48h-.24l.24.24v.96h-.24v.24h.24v.481h-.24v.24h-.24v.48h-.24v.24h-.24v.48l-.24.24v.721l-.24.24v.24l.24.24v.48h-.24v.24h-.24v-.24h-.24v-.24h-.24v.24h-.72v-.24h-.24l-.24-.24h-.24v-.24l-.24-.24v-.24l.24-.24h.24v-.96l.24-.24v-1.441h-.24v-.24h-.48v-.72h-.24.24v-.24h-.24v-1.2h.48v-.481h.24v-.24h.24-.24v-.24h.24v.24l.24-.24v-.24h.24v-.24l.24-.24v-.24l.24-.24h.48l.24-.24h.24l.24-.24h.24v-.241h.24l.24.24v1.2h-.24v.48h-.24z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-arjasa" class="kecamatan">
                                        	<title>Arjasa</title>
                                        	<desc>Ini adalah keterangan untuk Kecamatan Arjasa. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                        	<image xlink:href="images.jpg" class="hidden-image" />
                                        	<path
                                        	  fill="#C42F77"
                                        	  fill-rule="evenodd"
                                        	  d="M539.726 344.289h-.24v-.24h.72v.24h-.48zm-6.72-1.44h.24v.24h.48v.24h.24v.24l.24.24h.24v1.2l-.24.24h.24v.24h-.48l-.24-.24h-.48v-.24h-.24l-.24-.24-.24-.24v-.24h-.24v-.24h-.72v-.24l-.24-.24v-.48h-.24.48v-.24h.72v-.24h.24v.24-.24h.24l.24.24zm12 .24h-.24v-.48l.24-.241v-.24h.24v-.24h.24v.24h-.24v.72h-.24v.24zm-11.28-.24h-.24v-.24h-.24v-.241h-.24l-.24-.24h-.24v-.24l-.24-.24h-.24v-.48h.72v.24h.24l.24.24v.24h.24v.24h.24l.24.24.24.24h-.24v.24h-.24zm8.64-.961-.24-.24h-.24v-.48h.48v.48h.24v.24h-.24zm9.839-3.361v-.24h.24v.24h-.24zm-.72-1.44h-.24v-.241h.24v.24zm2.4-.961h-.24v-.24h-.24v-.24h.48v.48zm-29.038-1.44h-.24v-.24h.24v.24zm4.8-8.404v-.24h.24v.24h-.24zm-3.36-5.042v-.72h.24v-.48h.24l.24.24v.48h.24-.24v.24h-.48v.24h-.24zm8.879-3.361h1.44l.24.24h.96l.24.24h1.44v.24h.96v.24h1.2v-.24h.72l.24.24h.96l.24.24h1.92l.24-.24h1.44v.24l.24-.24h1.679v.24h.24v.24h-.24v.72h-.24l-.24.24h-.72l-.24.24h-.96.24v.24l.24.241h-.24v.48h.48l-.24.24v.24h-.24v.24h-.24.24-.24v.24h-.48v-.24h-.24v.72h.24v.24l.24.24h.48v.241h.72v.24h1.44l.24.48.24.24.24.24v.24-.24h.72v.24h.48v.24l.24-.24v-.24h.72v.72h-.24v.721h.24v.24h-.24v.24h.24v.72h-.24l.24.24v.72l.24.24v1.201l.24.24v.24l.24.24v.24h-.24v.24h-.24v1.201h-.24v.48l.24.24h.24l.24.24h.24v.48h-.24v.481h.24v.24h-.24v.24h.24-.24v.24h-.24v-.24h-.24v-.24.72l.24.24h.24l.24.24h-.24v.24-.24h-.24v-.24h-.24l-.24-.24h-.48v-.24h-.72v-.96l-.24-.24-.24-.24h-.24v.48h-.72v.24h.24v.24h.24v.24h.24v.24h-.48l-.24.24v-.24h-.24v-.24h-.24v-.24l-.24.24h-.24v-.24h-.24v-.24h-.24v-.24h-.72v.24h.24v.24h-.48v-.24h-.24v.24h-.24v.24h.24v.24l.24.24v.48h-.24v.24h.24l.24.24h.24v.24h-.48v-.24h-.48l-.24-.24h-.24v.24l.24.48h.24l.24.241h.48v.24h.24v1.44l-.24.48h.48v-.24h.24v-.48l.24-.24v-.24h.24v-.24l-.24-.24h.24v-.24h.24l.24.24v-.24h1.2v.24h-.72.24v.24h.24v.48h.48v-.24h.48v.24h-.24v.24h.72v.24h.48v.24h.24v.24h-.24v.24h-.24v.24h-.48v.481h.48v.48h.24v-.24l.24-.24h.24v-.24h.72l.24-.24v.24h-.24v.24h.24l.24-.24h.72v.24l.24.24h.48v.24h.24v.24h.48v.48h.24v.24h-.24v.24h.24v.24h.48v.24l.24.241v.24h.24v1.2h-.24v.24h-.24v.24h-.72v-.24h-.48l-.24-.24v-.24h-.72v-.24h-.24v.24l.24.24h.24v.24h.24v.24h.24v.24h.72v.24l.24.241h.24v-.24h.72v-.24h1.2v.24h.48v.48l.24.24v.24h.24v.48h-.96v.24h-1.44v.24h-.48v.24h-.24l-.24.24h-.24l-.48.24h-.72l-.24-.24h-.96l-.24-.24h-.72l-.24-.24h-.72v.24h-.48v.24h-.48v.24h-.96v-.24h-.48v-.24h-.24l-.24.24h-.48l-.24.24h-1.2v-.24h-.24v-.24h-.24v-.48l.24-.24-.24-.24v-.24l-.24-.24-.24-.24h-.24v-.24l-.48-.24v-.48l-.24-.24v-.48h-.24l-.24-.24-.24-.24h-.24v-.48h.24v.48h.96l.24.24v-.24h.24v-.24l.24-.24v-1.201h-.72v-.24h-.24v.24l-.24.24h-.24v-.48h.24v-.24l-.24-.24h-.48v-.72h-.24v-.481.24h-.24v.72h-.24v-.24h-.48v-.24h-.24l-.24-.24h-.24v-.48h-.24v-.24.24h-.24v.72h-.24v.24h.24v.48h-.24l-.24-.24v.24l.24.24.24.24h.24v.48h.24v.48l.24.241h.24v.96h.24v.24l.24.24v.48h-.24v.24h-.24v-.24h-.72v-.24h-.24v-.24h-.24l-.24-.24v-.24h-.48v-.24h-.48v.24-.24h-.24v.24h-.48v-.24h-.48v-.24.48h.24v.48h.24l.24.24-.24.24v.48h.24l.24.241h.24l.24.24h.24v.24h.24l.24.24.24.24v.72h-.24l.24.48v.24h.24v.481h-.24v.48h-.24l-.24.24-.24.24h-.24l-.24.24h-.24v.96l.24.241v.24-.24h-.48v-.24h-.24l-.24-.24h-.24v-.48h-.24l-.24-.24h-.24l-.24-.24h-.24v-.24l-.24-.24-.24-.24v-.24h-.24v-.481h-.24v-.24h-1.44v-.24l-.24-.24v-1.2h-.24v-.481h.24l-.24-.24v-.24l.24-.24v-.48h-.24l-.24-.24-.24-.24.24-.24v-.721l.24-.24v-.24l-.24-.24h-.48v-.24l-.239-.24-.24-.48v-.72h.48l.24-.241h.24l.24-.24h.48v.24h.24v-.24h.72v-.24h.48v-.48h.24v-.48l-.24-.24v-.24h-.48l-.24.24v-1.201h-.24v.24h-.24v-.24h-.72l-.24.24v.24h-.24v.48h-.24v.24h-.48l-.24-.24-.24.24v.48l-.24.24h-.24l-.24.24h-.48l-.24-.24-.24-.24v-.24l.24-.24h-.24v-.48h.24l-.24-.48v-.24h-.48v-.24h-.24v.48h-.24v.96h-.24v.24l-.24.24h-.48v-.24l-.24-.24h-.24l-.24-.24h.24v-.24h-.24v-.24h.24v-.24h-.24v-.24h-.24v.24h-.48v-.24h-.72v.24l-.24.24h-.24v.24h-.24v.24h-.24v.24h-.96v-.24h-.48l-.24-.24h-.24l-.24-.24v-.48l.24-.24v-.48h.24v-.24.24h.24v-.24h.24l.24-.24v-.48h.24v-.24l-.24-.24v-.24h-.24v-.241l-.24-.24h-.24.24v.24l-.24.24v.24h.24v.48h.24v.24h-.72l-.24-.24h-.24v-.24h-.48v-.24h-.24v-.48h.24v-.24h.24v-2.16h.24v-.721l.24-.24v-.72l.24-.24v-.24l.24-.24h.24v-.721h.48v-.24h.48l.24-.24v-.24h.48l.24-.24h1.68l.24.24.24.24.24-.24h.96v.24l.24-.24v.24h.24v-.24h.24v-.48h.24v-.72h-.24v.24h-.24v-.24l-.24-.24v-.721h.48l.24.24.24.24v.24h.24v-.24l-.24-.24h.24v-.24l.24-.24.24-.24v-.24h.24v-.24h.24v-.48h.24v-.24h.24v-.721l-.24-.24v-1.44h-.24v-.48h-.48v-.481h-.96v-.24h-.24v-.24h-.24v-.24h-.24v-.24h-.72v.24h-.48v-.24.48h-.48v.24h-.24v.24-.24h-.24v-.48h.24v-.24l.24-.24h.24v-.24h.24l.24-.24h-.24.24v-.24.24h.72v-.24h.24v-.24h.24l.24-.24h.24v-.241h.24l.24-.24H535.166z"
                                        	  clip-path="url(#a)"
                                        	/>
                                        </g>
                                        <g id="kec-kangayan" class="kecamatan">
                                            <title>Kangayan</title>
                                            <desc>Ini adalah keterangan untuk Kecamatan Kangayan. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                            <image xlink:href="images.jpg" class="hidden-image" />
                                            <path
                                                fill="#3E45C2"
                                                fill-rule="evenodd"
                                                d="M570.204 344.289h-.24v.96h-.24v.48l-.24.24v.24l.24.24v.48h.24v.48h.24v.241h.24v.24h.24v.24h.24v.24l.24.24v.24h.24l.24.24h.24v.24h-2.16v-.24h-.24v-.24.24h-.48v-.24h-.24v.24h-.24l-.24-.24h-1.68v-.24h-.24l-.24-.24h-1.2v-.24h-.48l-.24-.24h-.24v-.24l-.24-.24-.24-.24-.24-.24v-.24h.24v-.24h-.24v-.48l-.24-.24v-.48h.24v-.241l.24-.24.24-.24h.24v.24h.24v-.24h.72l.24.24h1.68l.24.24.24.24h.24v-.24h-.24v-.48h-.24v-.48h.24l.24-.24v.24h.48v.24l.24.24v.24h.48v-.24h.24v-.24h.72v-.48h-.48v-.48h.48v.24h.24v.24l.24.24v.24zm15.599-2.401v.48h-.24v.24h-.48.24v-.48h-.24.24v-.24h.24v-.24h.24v.24zm-10.08.24h-.48v-.24h.24v-.24h.48v.24h.24-.24v.24h-.24zm-14.399 3.361h-.24v.24h-.24l-.24-.24h-.24v-.48h-.24v-.96h.24l.24-.24V342.368h-.24v-.48h.24v-.24h.24v-.48h.48v.24h.24v1.2l-.24.24v.24h-.24v.48h-.24v.24h.24v.48h.24v.48h.24v.241l-.24.24v.24zm19.199-4.321h-.24v-.24h.24v.24zm-3.36-.48h.24v.48h-.24v-.24h-.24l-.24.24v-.24h-.24l.24-.24h.48zm-12 .24h-.479v-.24h.48v.24zm11.04 0h-.48v-.24h-.24v-.24l.24-.24h.48v.24h.24v.24h-.24v.24zm4.08-.24h-.24v.48h-.48l-.24.24v-.24h-.24v-.24h.48v-.24l.24-.24h.24v-.24h-.24v-.24h.48v.72zm-4.08-.961v-.24.24zm.48-.24v.24-.24.24h.24-.24v.48h-.48v-.24h.24v-.24l.24-.24zm-.48.24v-.24.24zm.96 0h-.24v-.24l.24-.24h.24v.48h-.24zm-15.839-.72v.24h-.24v.24h.24l.24.24v.24h-.48v-.24h-.24v-.48h.24-.24v-.24h.48v-.24.24zm17.76-.24h.239v.24h.48v.48h-.24v.24h-.24v.24h-.24v-.24h-.24v-.24h-.24v-.24l-.24.24v.24h-.48v-.24h-.24v-.24h-.24v-.24h1.2l.24-.24h.24zm-9.6 0v.24h-.24v.24h-.72v-.24h.24v-.24h.72zm-5.04.24h-.24v-.72l-.24-.24h.24v.24l.24.24v.48zm9.36-.72h.24l.24.24v-.24h.48v.24h.24v.48h.24v.24l.24.24v.24h.24v.24h-.24l-.24-.24-.24-.24h-.72v-.24h-.24v-.48h-.24v-.24h-.24v-.48h.24v.24zm-2.4-.24h.48v-.24h.24v.24h.72v.24l-.24.24h-1.44.24l-.24-.24v-.48h.24v.24zm-15.36-.48h-.48v-.24h.24v-.24h.24l.24.24h-.24.24l-.24.24zm-.48-.961v-.48h.24v.48h-.24zm3.84-.96v-.24.24zm6-.96v.24h.24v.96h-.24v.24l-.24-.24v-.24.24h-.24v.48h-.24v.48h.48-.24v.24h-.24v.72h.24v.96l-.24-.24v-.24l-.24-.24h-.48v-.48l-.24-.24v-.24h.24v-.24l.24.24v-.48h.24v-.24h-.24v-.24h.24l.24-.24h-.24v-.72l-.24-.24h-.24v-.24h.48v-.481h.48v.24h.24v.24h.24zm-12.24-15.607h.24v.24h3.12l.24-.24h.24v.24h1.44l.24.24h.72l.24.24h.48v.24h.48v.24h.72l.24.24h.72v.24h.72V321h.72l.24.24h.96v.24h.24v.24h.24v.24h.48v-.24h.24v.24h.48l.24.24h.24v.24h.24v-.24.24h.48v.24h.72v.24h.48v.24h.72v.24h.48v.241h.48l.24.24h.48v.24h.48l.24.24.24.24h.24l.24.24h.24l.24.24h.24v.24h.24l.24.24h.48v.24h.48l.24.24h.48v.241h.48l.48.24h.48v.24h.48v.24h.48v.24h.72v.24h.479l.24.24h.24v.24h.24v.24h.24l.24.24h.24v.24h.24v.241h.24v.24h.48v.24l.24.24.24.24v.24h.24l.24.24h.24v.24h.24v.24h.24l.24.24h.24l.48.24h.72v-.24h.48v.24h.24l.24.241h.24v.24l.24.24.24.24v.24l.24.48v.96h.24v.721h.24v.24h.24v.24h.24l.24.24h.24v.24h.24v.24h.24l.24.24v.48h-.48v.481h-.24l.24.24h-.24v.24h-.24l.24.24v.24h-.24v.24h-.24v.24-.24h-.72v.24h-.24v.48l-.24.24h-.48l-.24.24-.24.241h-.48v.24h-.24v.48h.24v.72l-.24.24v.24l-.24.24v.24h-.24v.241l-.24-.24h-.24l-.24-.24h-.24l-.24-.24-.24-.24h-.24l-.24-.24h-.24v-.24h-.24v-.24h-.24l-.24-.24h-.24v-.24l-.24-.24h-.24v-.241l-.48-.24v-.24h-.24l-.24-.24h-.24v-.24h-.24l-.24-.24h-.48l-.24.24h-.24l-.24-.24h-.24l-.24.24h-.48l-.24.24h-.48v.24h-.24l.24.24h-.48l-.24-.24h-.24v-.24h-.24v-.24h-.24v-.48h.24v-.48h-.48v-.24h-.24v-.24h.24v-.481h-.24l-.24.24h-.48v-1.44h-.24v-.24h-.24v.24l.24.24h-.24v.24h.24l-.24.24v.24h-.72v-.24h-.24l-.24-.24h-.48l.24-.24v-.48h.24v-.24h.24v.24h.24v-.24l-.24-.24h-.72v-.24l-.24.24v.48h-.48v.48l-.24-.24-.24.24h-.24.24l-.24.24h-.24l-.24-.24v.24l-.24.24h-.24l-.48.24v-.96h-.24v.24h-.24l-.24.24h-.24v-.24h.24v-.48h.24l.24-.24v-.24h.24v-.24h.48v-.24h-.48l-.24-.241h-.24v.24h-.24v-.48l.24-.24h-.24v-.24h.24v-.48h-.48v-.24l-.24.24h-.24v-.24h-.24v-.24h-.48v.24h-.24v.24h.24v.48l-.24.24v-.24h-.24v.24l.24.24.24.24v.72h-.24v-.24h-.24.24-.24v-.24h-.24v-.48h-.24v.24h-.719v-.24.24h-.48v.24l-.24-.24h-.24v-.72.24h-.24v.24h-.24v-.48h-.24v.48h-.24l-.24-.24h-.24v-.24h-.24v.72l.24.24v.48h-.24.24v.96h.24v.48h-.72v-.48h-.24v-.24h-.24v.96h.24v.241h.24v.24h-.72v-.24h-.72v-.24h-.48l.24.24.24.24h.24v.24l-.24.24h.48v.24h.24v.24h-.72v-.24h-.24v-.24h-.48v-.48h.24v-.24h-.24v-.24h-.48v-.24h.24v-1.44l-.24-.24h-.72v.24h-.24v.48h-.24v-.72.24h-.24v-.721h-.24v-.24h.48v-.24h-.24v-.24l.24-.24h-.48v-.24h-.24l.24-.24v-.24h.24v-.24h.24v-.24h-.24v-.24l-.24.24h-.24v-.481h-.72v-.24h-.24v.48h-.24v.72h-.72v.48l.24.24v.48h-.48v.961h-.24v-1.2l.24-.24h-.48v-.48h-.24v-.24h.24v-.72h-.24v-1.201h-.48l-.24.24h-.24v-.24.48l.24.24h-.24v.24h-.72v.72l-.24.24h-.24v-1.44h.24v-.24h.24v-.24l-.24-.24v-.24l-.24-.24v-1.201l-.24-.24v-.72l-.24-.24h.24v-.72h-.24v-.24h.24v-.241h-.24v-.72h.24v-.72h-.72v.24l-.24.24v-.24h-.48v-.24h-.72v.24-.24l-.24-.24-.24-.24-.24-.48h-1.439v-.241h-.72v-.24h-.48l-.24-.24v-.24h-.24v-.72h.24v.24h.48v-.24h.24-.24.24v-.24h.24v-.24l.24-.24h-.48V321h.24l-.24-.24v-.24h-.24.96l.24-.24h.72l.24-.24h.24v-.72h.24v-.24H553.165zm49.918-19.687v-.48h.24v.48h-.24zm-3.36-8.163v-.24h-.24v-.24l.24-.24h.24v.24l-.24.24v.24zm17.759-3.361v-.48.48zm-4.32-3.602v-.24h.24v-.24l.24-.24v.48h-.24v.24h-.24zm-35.038-4.801v.24-.72h.24v.48h-.24zm5.76-7.923h-.24v-.24h.48v.24h-.24zm35.757-13.205-.24-.24v-.48h.24v.24h.24v.24l-.24.24z"
                                                clip-path="url(#a)"
                                            />
                                        </g>
                                        <g id="kec-sapeken" class="kecamatan">
                                            <title>Sapeken</title>
                                            <desc>Ini adalah keterangan untuk Kecamatan Sapeken. Silakan ganti dengan deskripsi yang sebenarnya.</desc>
                                            <image xlink:href="images.jpg" class="hidden-image" />
                                            <path
                                                fill="#99623A"
                                                fill-rule="evenodd"
                                                d="M640.76 375.74h-.24v-.24h.24v-.24.48zm-5.04-.96h-.24v-.24h.24v.24zm3.12 0h-.24l-.24-.24h-.24v-.72h.24v-.24h.48l.24.24h.24l.48.24v.24h-.24v.48h-.72zm-1.2-1.68h.24v.48h.24v.24l-.24.24h-.48v-.96h.24zm-1.92-.24h.24l-.24.24.24.24v.48h-.24v-.24h-.24v-.48h.24v-.24zm0-.24v.24h-.24l-.24-.24-.24.24h-.24v-.24h-.24v-.24h.24v-.24h.24l.24-.24h.24l.24.24v.48zm-13.2-3.362h.24l.24.24v.48h.24v-.24l.24.24v.72h-.24v.24H623v-.24.24h-.48v-.24h-.72l-.24.24v-.48h.24v-.24h.24v-.24h-.24v-.48h.24l.24-.24h.24zm.24 0v-.24.24h.24-.24zm-1.44-.96h.72v.24h.24-.24v.24h-.24l-.24.24h-.24v-.24h-.24v-.24h-.24v-.24h.48zm.48-1.68v.24l.24.24h.72v.24h.48v.24l.24.24v.24l-.24.24v.24H623v-.24.24h-.24v-.24h-.96v-.24h-.48v-.24h-.24v-.48h.24v-.48l.24-.24h.24zm-.72-.241v-.24h.24v.24h-.24zm25.919.24v.24l-.24.24v.96h-.24v1.201l-.24.48V374.78l-.24.24v2.401h-.24v1.68l-.24.24v.721l-.24.24v.72h-.24v.48h-.24v.48h-.24v.24h-.24v.241l-.24.24h-.24v.24h-.24v.24h-.24l-.24.24h-.48l-.24.24h-1.92l-.24.24H637.64l-.48.24h-1.44l-.24.24h-2.16v-.24h-.24v-.24h-.24v-.24l-.24-.24h-.24v-.24h-.24v-.24h-.24l-.48-.24h-.24v-.24h-.48l-.24-.24h-.48v-.24h-.48v-.24H629v-.24h-.48l-.24-.24h-.24l-.24-.24h-.239l-.24-.24h-.72v-.24h-.96l-.24-.24h-.24v-.24h-.72l-.24-.241h-.72l-.24-.24H623l-.24-.24h-.24v-.24h-.48l-.48-.24h-.24v-.24h-.48v-.24h-.24v-.24h-.24l-.24-.24h-.24v-.24h-.24v-.24h-.24v-.24l-.24-.241v-.24l-.24-.24-.24-.24v-.24l-.24-.48h-.24v-.48l.24-.24.24-.24v.24h.24v-.24h.48l.24-.241h.24v-.24h.24v-.24h.24v-.72h-.24v-.24.24h.24v-.24h.24-.24v-.24h.48-.24v-.24h.24v-.24h.48v-.24h.24v-.241h.24v-.24l-.24.24v-.48l.24-.24h.48l.24.24v.24h.24v.48l.24.24v.48l.24.24.24.24v.96h-.24v.241h.48-.24l.24-.24v.24h.24v.24h.24v-.48h-.24v-.72h.48v-.24h-.48v-.24l-.24-.24v-.24h-.24v-.48h.24v-.481h.24v-.24l.24-.24h.48v-.48h-.24v-.48h.48v-.72h.24v-.241h-.24l-.24-.24h-.24v-.24l.24-.48h.24v-.24h-.24v-.24h.24v-.24h.72v.24h.24l.24.24h.24v.24h.24v.24h.24v.48h.24v.24h.48v.24h.48v.72h.24v.24h-.48v.24h.48v.24h-.24v.48h-.24v.24h-.24v.241h-.24l.24.24v.24h-.24v.48h.48v.24h.24l.24.24v.48h.24v.24h.24v.24h.24v-.48h.72v.24h.24v.481h.24-.24v.24h.24l-.24.24v.48h.24l.24-.24h.24v-.24h.24v-.48h.96v-.24h1.2l.24.24h1.44l.24.24v1.2h.24v.24h.24v.24h.24l.24.24v.24h.24l.24-.24h.24v.24h.72v-.24h.24l.24-.24h.72l.24-.24h.48l.24.24v.24h.24l.24.24h.72v-.24h-.24v-.48h.24v-.24h.48l.24.24.24.24h.239v.24h.72v.24h.24l.24.241h.24l.24-.24v-.24h.48v.24h.24v-.24h.24v-.24l.24-.24v-.24h-.24v.24h-.24l-.24-.24v-.24h.24v-.24l.24-.24v-.721l-.24-.24-.24-.24h-.24v.24h-.24v.96h.24v.24h-.48v.48h-.24v.48h-.24v.24l-.24-.24h-.24v-.24h-.24v-.48l-.24-.24-.24-.24-.24-.24h-.24v-1.2H641v-.96h-.24v-1.441h.48l.24-.24h.24l.24-.24h.24l.24-.24.24-.24v-.24h.24l.24-.24.24-.24h.24v-.24h.48v.72h.48l.24.24v.24l-.24.24v.24h-.24v.24l-.24.24h.24v.48h-.24.24v.48h.24l.24-.24v-.24h.24v-.24h.24v-1.44h.24v-1.201l.24-.24v-.72h-.24l-.24-.24h-.48l-.24-.24h-.24l.24-.48.24-.24h.24l.24-.24h1.2l.24-.241h.24v-.24h.24v.24h-.24v.24zm-25.199-3.601v.24l.24.24h.24v.24h.24v.96l-.24.24v.24l-.24.24h-.96l-.24.24v.24h.24v.481h-.24v.48l-.24.24h.24-.24l-.24-.24h-.24v-.24h-.24l-.24-.24v-.24l-.24-.24v-.24h.24v-.24l.24-.24h.48V363.736h.24v-.48h.24v.24h.24v-.24h-.24.24l.24-.24h.48zm-11.519-4.562v.24l.24-.24h2.16v.24h.24v.24h.24v.72l-.24.24h.24l-.24.24h.24v.24h-.24l-.24.24v.24h-.48v.241h-2.16l-.24-.24h-.24l-.24-.24h-.24v-.24h-.24v-.24h-.24l-.24-.48v-.24l-.24-.24h.24v-.961h.24v-.24h.24v.24h.48l.24.24h.72zm-17.999-.72v-.24h.24v.24h-.24zm36.478.96h-.24v-.48l.24-.24.24-.24v-.24l.24-.24v.24l-.24.24v.48h-.24v.48zm-35.278-1.44.24.24h.24v.24h-.24l-.24-.24h-.72v-.48h.72v.24zm0-.48h-.24v-.48h.24v.48zm11.04-.72v-.24.24l.24.24v.24h.24v.72l.24.24h.24v.48h.24v.48h.24l.24.24v.24h.48v.24h-.24l-.24.24h-.24v.24h-.48v.24h-1.44v-.24h-.96l-.24-.24h-.24v-.24h-.24v-.24h-.24v-.96h-.24v-.24h.24v-.48h-.24v-.24h.24l-.24-.24v-.48l.24-.24.24-.24h.48l.24-.241h.48v-.24h.72v.24l.24.48zm-4.56-.481-.24.24v1.2l-.24.24v.96h.24l.24.241v.24l-.24.24h-.24v.24l-.24.24h-.24l-.24.24-.24-.24h-.24v.24h-.96v-.24h-.72l-.24-.24h-.24v-.24l.24-.24v-.24h-.24v-.24h-.24v-.72h.48v-.48h.24v-.48h-.24v.24h-1.92v.24h-.24v.48h-.24v-.24h-.48v-.72h.24-.24v-.72h-.24v-.241h-.24v-.24h-.24v-.48l.24.24h.24v-.24l.24-.24h.48l.24.24h.24v.24h.48v-.24h.72l.24-.24v.24h.48v.24h.48l.24.24h.72v.24h.48v-.96l.24-.24h.24v-.24h.48v.24h.48l.24.24v.96zm-18-1.44h-.24.24zm48.958.96h-.24v-.24h-.24v-.72h.24v-.24h.72v.48h-.24v.24h-.24v.48zm-20.399-2.161h-.48v-.24h-.48v-.24h-.24v-.48h.24v-.24h.96v.48h.24v.72h-.24zm-34.318-2.16v-.24h.24v.24h-.24zm8.4-.721h.48l.24.24h.24v1.2h-.24v.24h-.24l-.24.24v.24h-.24v.48h-.24v.241-.24h-.24v.24h-.72l-.24.24v-.48h.24-.48v-2.16h.24l.24-.241h.24v-.48.24h.96zm24.958-.24v.24h-.24v-.24h.24zm-26.158 0v.24h-.48.24v-.24h.24zm20.878.24h-.24v-.48h.24v-.24.24h.24v.24h.24-.24l-.24.24zm-11.519-.96h-.24v-.24h.24l.24-.24h.24v-.24.24h-.24v.24h.24l-.24.24h-.24zm19.199.96h-.24v-1.2l.24-.24v-.24h.72v.24l.24.24.24.24h-.24v.24l-.24.24-.24.24v.24h-.48zm-17.759-1.68h.24v.24h-.72v-.24h.48zm-2.64-.24h-.24v-.24h.24v.24zm2.16-.721h-.24.24v-.24.24zm-2.88-1.68v.24h.24v.24h.24v.24h-.24v.48h-.24v.48l-.24-.24h.24v-.24h-.24l-.24-.24h-.72v-.24h.24v-.72h-.24.48v-.24h.24l.24.24h.24zm-6.96.24v.96h-.24v.24l.24.24v.72h-.24l-.24-.24v-1.2h-.24v-.24.72h-.48v.72l-.24.24v.48h-.24v.48h.24v.24h.24v.24-.24h.24v.24h.24v.24h-.24v-.24h-.72.24v.48h.24v1.681h-.24v.48h.24v-.24.24l-.24.24h-.24v.481l-.24.24v.96h-.24v-.24h-.48v.24h-.24v-.48h-.479v-.24l-.24-.24h-.24v-.72h-.24l-.24-.24v-.48h-.24l-.24-.24v-.24h-.24l-.24-.24h-1.2v-.24h-.72l.24-.24h.48v-.241h.24v-.24l.24-.24v-.24l.24-.24h.48l.24-.24v-.48h.24v.48h.24v.24-.24h-.24v-.72h-.24v-.24h.48v-.24h.72v-.241h.72v-.24l.24-.24v-.24l-.24-.24h.24v-.24l.48-.24h.48v-.24h.24v.24h.24l.24-.24v-.24l.24-.24.24-.24h.24v-.241h.48v.48h.24l-.24.24v.24zm37.438-3.602h.24v.24l.24.24v.24l-.24.24-.24.24v.24l-.24.24h-.48v-.24h-.24v-.24h-.24v-.24h-.72v-.48h.96l.24-.24v-.24h.48v-.24.24h.24zm-9.12 0 .24-.24v-.24l.24-.24v.48h-.24v.24h-.24zm36.239-2.881h.96v.24h.96v.24h.48l.24.24h.48l.24.24v.24h.24v.24l.24.24v.24h-.24v.24h-.24v-.24h-.48v-.24h-.24l-.24.24v.48-.72h-.72v-.24l-.24.24h-.48l-.24.24h-.48l-.24.24h-1.68v-.24h-.48v-.48h-.24v-1.2h.48l.24-.24h1.2v-.24h.48v.24zm-7.44-1.68v-.24.24zm-49.677 0h.48v.24h.24v.24h.48l.24.24.24.24h.24v.24h.48l.24.24v.24l.24-.24.24.24h.48v.24h.24l.24.24h.24v.24h.48v.24h.48v.24h.48l.24.24h.24v.24h.24l.24.24h.48v.24l.24.24h.48v.24h.48v.241h.72v.24h.24l.48.24h.48v.48h.24v.24h.48v.24h.48v.24l.24.24v.24l.24.24h.48v.241h.24v.24h.24l.24.24h.48v.24h.24v.48h.24v-.24h.48l.24.24h.24v.24h.24v.96h.24l.24.241h.24v.24h.24l.48.24v1.2l.24.24v.961h-.24v.24h-.48l-.24-.24h-.24l-.24-.24h-.24l-.24-.48-.24-.24h-.48v-.24l-.24-.24h-.48v-.24h-.48l-.24-.24h-.24l-.24-.24h-.24l-.24-.24h-.72v-.24h-.48l-.24-.241h-1.44l-.24.24v.48h-.24v.24h-.24v.24h-.24v.24h-.72v-.24h-.24l-.24-.24h-.24l-.24-.24h-.72v.24h-.24v.24-.24h-.96v-.24h-.24v-.24h-.48l-.24-.24h-.24v-.48h-.24v-.24h-.72v-.24h-.72v.24h.24v.24h-.48v-.24h-.48v-.24h-.48v.24-.24h-.24.24v-.24h.24v-.48h-.48v-.72h.48v-1.201h-.48v-.24h-.24v-.24h-.72v-.24.24h-.48v-.24.24h-1.2v.24-.24h-.48v-.72l-.24-.24v-.481h-.24v-.24l-.24-.24-.24-.24v-.72h.24v-.24l.24-.24h.48v.72h.24v.24h.48l.24.24v-.72l-.24-.24-.24-.24v-.48h-.24v-.961h-.24v-.24h.24v-.24h.72v-.48l.24-.24v.48h.48v.24h.24v-.24h-.24v-.48l.24-.24v.24h.24l.24-.24h.48v.24zm50.397-.24h.24v.24h.24v.24h.24v.48h.24v.24h.24v.48h.24v.48l-.24.24v.48h-.24v.24h-.24v.24h-.24v.24h-.24v.24h-1.44v-1.44h-.24v-.48h.24v-.24h.24l.24-.24v-.48h.24v-.72h.24v-.24h.24zm-14.879-.481-.24.24.24.24.24.24v.24h.48v-.48.96h.24v1.681l-.24.24v.24l-.24.24v.24l-.24.24h-.24v.24h-.24l-.24.24h-.96l-.24-.24h-.48v-.24l.24-.24v-.24h.24v-.24l.24-.24v-.24l.24-.24v-.48l.24-.24v-.48l.24-.24v-.48h.24v-.72l.24-.24h.24zm-26.878 0-.24.24v-.72h.24v.48zm19.198 0h-.24v-.24h.24v-.24l.24-.24v-.72h.24v.96l-.24.24h-.24v.24zm89.035-1.44h.24l.24.24h.24l.24.24h.24v.24h.48v.24h.24v.24h.24v.24h.24v.24h.24v.48h-.24v-.24h-.24v.72h-.24l-.24.24v.24h-.48v.24h-.48v.24h-.72l-.24.24h-1.44v-.24h-.96v-.24h-.48l-.24-.24h-.24v-.72h.24-.24v-.24h.24-.24.24v-.48h.24v-.24h1.2v-.24h.24v-.24h.48v-.24h.48v-.24h.24l.24-.24v.24h.72v.24h.24v.24h.72l.24.24v-.24h-.24v-.24h-.48l-.24-.24h-.24v-.24h-.24l-.24-.24h-.48.48z"
                                                clip-path="url(#a)"
                                            />
                                        </g>

                                        <path
                                            fill="#d3d3d3"
                                            fill-rule="evenodd"
                                            stroke="#ffffff"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-miterlimit="10"
                                            stroke-width=".48"
                                            d="M228.945 373.82h.24l.24-.24.24-.24h.48l-.24.24v.48h-.24v.48h-.24v.24h-.24.24v.24h-.24.24v.24h-.24v.48h.24v.24h.72v.48h.48v.24h.24l.24.241v.48l.24.24.24.24h.24l.24.24h.48v.24-.24h.24v.24h.24v.24h.48v.48h-.24v.24h-.72l-.24.24h.24v.241l-.24.24h.24v.96l.24.24v.48h.24v.24l.24.24v.481l.24.24h.24l.24.24h.24v.48h.24v.48l.24.24h.72l.24-.24.24-.24h.24v.24h.24v1.441h-.24v.24h-.48l.24.24-.24.24v.48h-.24.24-.24.24v.24h-.24v.24h-.24v.24l-.24.241v.24h-.24v.24l-.24.24v.48h.48v.24h-.48v-.24h-.48v.24h-.24v-.24.24h-.72v.24h-.72.24-.48v.24h-.24v.24h-.24v.24h-.24l-.24.241h-.24l-.24.24v.24h-.24l-.24.24h-.24v.24h-.48v.48h-.48v.24h-2.64v-.24h-.24v-.24l-.24-.24v-.24.24h.48v.24-.24h-.24v-.24h-.24v-.72h1.92v.24h.24v.24h.24-.24v-.24h.24v.48-.24.24h.24v-.24h-.24.24v.24-.24h-.24v-.24h.24v.48h.24v.24-.48h-.24v-.24.24-.24h-.48.48v-.24h.24-.24v.24h-.24v-.24h-.48v-.24h.48v-.24.24h-.24v-.24.24h-.24v-.24h-.24v-.24.24h-.24v-.48h-.48v-.48h-.24v-.24h-.24.24v-.24h-.24l-.24-.24h-.24v-16.807h.24l.48-.24v-.24h.24v-.24h1.44l.24.24v.24l-.24.24v.24l-.24.24v.24h.24v.72l-.24.24.24.24v.24h.48l.24.24z"
                                            clip-path="url(#a)"
                                        />
                                        <path
                                          fill="#d3d3d3"
                                          fill-rule="evenodd"
                                          stroke="#ffffff"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-miterlimit="10"
                                          stroke-width=".48"
                                          d="M235.185 369.258h.24v.24-.24h.24v.72h.24v.24h.24v.72h1.2v-.24h.96v.24h.24v.24h.24v.24l.24.241v.48h.24v.24h.48v.24h.24v.24l.24.24h-.24.24v.24h.24v.24h-.24.24v.24h.24v-.48h.24v.24h-.24v.48h-.24v.241l-.24.24v.24h-.24l-.24.24v.24l-.24.24v.24h-.24v.48h-.24v.24h-.48v.481h.24l-.24.24.24.24v.24h-.24v.24h.24v.24l-.24.24v.24h-.24l-.24.24v.24h.24v.24h-.24v.24h.24-.24v.241h-.24v.24h-.48v1.92l-.24.24v.481h-.48v.24h-.48v.24h-.24v.24h-.24v.24h.24v.24l-.24.24-.24.24h-.72l-.24-.24v-.48h-.24v-.48h-.24l-.24-.24h-.24l-.24-.24v-.48l-.24-.24v-.24h-.24v-.48l-.24-.24v-.96h-.24l.24-.241v-.24h-.24l.24-.24h.72v-.24h.24v-.48h-.48v-.24h-.24v-.24h-.24v.24-.24h-.48l-.24-.24h-.24l-.24-.24-.24-.24v-.481l-.24-.24h-.24v-.24h-.48v-.48h-.72v-.24h-.24v-.48h.24v-.24h-.24.24v-.24h-.24.24v-.24h.24v-.481h.24v-.48h.48v.24h.24v.24h.24v.24l.24-.24h.24l.24-.24h.48v-.48h.96l-.24-.24v-.24.24-.24h-.24v-.24h-.24v-.48h-.24.24v-.721h-.24v-.48l.24-.24h.24v.24h.72v.24h1.2v-.48l.24.24v-1.2h.24v-.48h.24z"
                                          clip-path="url(#a)"
                                        />
                                        <path
                                          fill="#d3d3d3"
                                          fill-rule="evenodd"
                                          stroke="#ffffff"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-miterlimit="10"
                                          stroke-width=".48"
                                          d="M227.026 350.05h.24v.241h.24v.24h1.2v.24h.72v.24l.24.24-.24.24v.24h-.24v.24h-.24.48v.24h-.24v.24h-.24v.481l-.24.24v.48h.24v.24h.24v.24h.24v.24h-.24v.24h.24v.24h.24v.24l.24.24h.24v.241h.48v.24h.48v.24h.24v.24h.24v.24h.24V358.694h-.96v.24h-.96l-.24.24-.24.24v.48l-.24.24v.24h-.72v.24h-.24v.24h-.96v-.24h-.24v.24h-.24v.481l-.24.24h-.24v.48h-.24v.24h.24v.72h.24v.24h-.24.24v.24l-.24.241h.24v.48h-.48v.48h.24v.24h-.24v-.24.48h-.24v.24h.24v.24h.24v.24h.24-.24v.721h-.24v.48h-.24v-.24.24-16.806h.96v-.24h.24zm-1.2 17.527v-.24.24z"
                                          clip-path="url(#a)"
                                        />
                                        <path
                                          fill="#d3d3d3"
                                          fill-rule="evenodd"
                                          stroke="#ffffff"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-miterlimit="10"
                                          stroke-width=".48"
                                          d="M240.465 364.216v.48l-.24.24v.48h.24v1.921h.24v.24l.24.24v-.24h.24v.48h.24v.24h-.24l-.24.24v.961h.72v-.96h.24v-.24h.24l.24-.24h.48v-.48l.24-.24v-.24h1.2l.24-.24h.48v-.24h.48-.24v.72h-.24v.72h-.24v.48h-.24v.24h-.24v.72h-.24v.24h-.24v.24h-.24v.72l-.24.24h-.24v.24h-.24v.24h-.24v.241h-.48v.24l-.24.24h-.24v.24h-.24v.24h-.24v.24l-.24.24v.24h-.24v.48h-.24v-.24h-.24.24v-.24h-.24v-.24h-.24.24l-.24-.24v-.24h-.24v-.24h-.48v-.24h-.24v-.48l-.24-.24v-.24h-.24v-.24h-.24v-.24h-.96v.24h-1.2v-.72h-.24v-.24h-.24v-.72h-.24v.24-.24h-.48v.48h-.24v1.2l-.24-.24v.48h-1.2v-.24h-.72v-.24h-.24l-.24.24v.48h.24v.72h-.24.24v.48h.24v.24h.24v.24-.24.24l.24.24h-.96v.48h-.48l-.24.24h-.24l-.24.241v-.24h-.24v-.24h-.24v-.24h-.48l.24-.24h-.48l-.24.24-.24.24h-.24l-.24-.24h-.48v-.24l-.24-.24.24-.24v-.72h-.24v-.24l.24-.241v-.24l.24-.24v-.24l-.24-.24h-1.44v.24h-.24v.24l-.48.24h-.24v-3.842.24h.24v-.24l.24-.24.24-.24.24-.24h.24l.24.24h.48v-.24h.48l.24.24h.24v-.24h.24v.24h.24l.24-.24h.24v-.24h.48v-.72h.96v.24h.72v.24h.48v.48h.24v-.24.24h.48v-.72h.72v-.24h.24v-.24h.48l.24.24h.48l.24.24v-.24h.72l.24-.24h.72l.24-.24v-.24l.24-.24h.24v-.24h.24v.24h.24v-.24.24l.24-.24v.24h.72v-.24h.24v-.24h.24v-.24h.72z"
                                          clip-path="url(#a)"
                                        />
                                        <path
                                          fill="#d3d3d3"
                                          fill-rule="evenodd"
                                          stroke="#ffffff"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-miterlimit="10"
                                          stroke-width=".48"
                                          d="M239.745 351.972h-.24v.24-.24.24h-.24.24v.24h.24v.24h-.24v.72h-.24v.24h-.24.24v.48h-.24.24v.24h.24v1.201-.24h.24v.24h.24v.24h.24v-.24h.72v-.24h.24v-.24h.72v-.24.24h1.2v.48h.48v-.24h.24v.24h.24v.24h.24v.24h-.72v.72h-.24v.24h-.24l-.24.24h-.24v.48h-.24v.48h-.24v.241h-.24v.24h-.24v.24h-1.2v-.24l-.24-.24h-.48v-.24h-.24v.24-.24h-.24v.24h-.24v-.24.24h-.24v.24h-.24v.48h-.24v.24l.24.24h-.24v.24h-.24v.24h-.24v-.24h-.72v.24-.24.24h-.24v-.24h-.24v.24-.24.24-.24h-.72v-.24h-.72v-.24h-.24v-.48h-.24l-.24.24v-.24h-.96v.24h-.48l-.24-.24-.24.24h-.24v-.24h-.24v-.24h-.24v-2.16h-.24v-.24h-.24v-.24h-.24v-.24h-.48v-.241h-.48v-.24h-.24l-.24-.24v-.24h-.24v-.24h-.24v-.24h.24v-.24h-.24v-.24h-.24v-.24h-.24v-.48l.24-.241v-.48h.24v-.24h.24v-.48h.72l.24.24h.24v.24H233.745v-.24h2.16l.24-.24h1.2v-.24h1.44v-.24h.96v.72z"
                                          clip-path="url(#a)"
                                        />
                                        <path
                                          fill="#d3d3d3"
                                          fill-rule="evenodd"
                                          stroke="#ffffff"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-miterlimit="10"
                                          stroke-width=".48"
                                          d="M237.345 335.646h.72v-.24h.24v-.24h.48v-.24l.24.24v.72l.24.24h-.24v.72h-.24.48-.24v.24h-.24v.72h-.24l-.24.24h-.24v-.24.24h.24l.24.24v.24h.24v.48h.24v-.24h.24v.24h.24l.24.24h.24v.24h.24v.241h.24v-.24h.24v.48h-.24v.24l-.24.24v-.24h-.24v.24l-.24.24h-.24v.48h.24v.24h.24v-.24l.24.24h.24v.24h-.24v.24h.96v.24h.24v.241l.24.24h.48v-.24h.48v.24h.24v.24h.24v.48h.48v.24l.24.24v.24h.24v.24h.24v.721l.24.24v.48h-.24.72v.24h.24-.24v.72h-.24v.48h.24v.24h-.24v.481h.24v.24h-.24v.24h.24v.24h.24v.24l.24.24h.48v.24h-.24.24v.24h.72v.24h-.24v.24h-.96v.241h-.24v-.24h-1.92v-.24h-1.44v.24h-.24v.48h.24v.72h-.72v-.24h-.24v.24h.24-.24v.24h-.24v-.24.24h-.96v-.24h-.96v.24h-1.44v.24h-1.2l-.24.24h-2.16v.24H230.625v-.24h-.24l-.24-.24h-.72v.24h-.48.24v-.24h.24v-.24l.24-.24-.24-.24h.48v-.72h.24v-.24h.24v-.48l.24-.24.24-.24h.24v-.24h.24v-.48h-.24v-.24h-.24.24v-.24h.24v-.481l.24-.24v.24h.24v-.24h.24v-.24h-.24l-.24-.24v-.24l-.24-.24h.24v-.24h-.24v-.48l.24-.24v-.241h.24v-.24l.24-.24v-.96l-.24-.24v-.48h-.24v-.481h.24v-.24h.24v-.72h-.24v-.24h.24v-.96l-.24-.24v-.241h-.24v-.96l-.24-.24v-.24h-.24v-.96l-.24-.24v-.961l.24-.24h.72l.24-.24h1.2v-.24l.24.24v-.24.24h.48v-.24h1.68v.24h.48v-.24l.24-.24v-.48h.48v-.24h.24l.24-.241h.24l.24-.24h.24v.48l-.24.24v.24h-.24v.24h-.24v.48z"
                                          clip-path="url(#a)"
                                        />
                                        <path
                                          fill="#d3d3d3"
                                          fill-rule="evenodd"
                                          stroke="#ffffff"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-miterlimit="10"
                                          stroke-width=".48"
                                          d="M229.425 329.883h.72v.48h.24v.24h.24-.24v.24h.24v.721l.24.24.24.24v.24l.24.24.24.24h-.24v.24h.24v.96h-.24v.961h-.24v.48l.24.24-.24.24-.24.24v.961l.24.24v.96h.24v.24l.24.24v.961h.24v.24l.24.24v.96h-.24v.24h.24v.72h-.24v.241h-.24v.48h.24v.48l.24.24v.96l-.24.24v.241h-.24v.24l-.24.24v.48h.24v.24h-.24l.24.24v.24l.24.24h.24v.24h-.24v.24h-.24v-.24l-.24.24v.481h-.24v.24h-.24.24v.24h.24v.48h-.24v.24h-.24l-.24.24-.24.24v.48h-.24v.241h-.24v.72h-.48v-.24h-.72v-.24h-1.2v-.24h-.24v-.24h-.48v.24h-.96v-20.168h1.68l.24-.24h1.68z"
                                          clip-path="url(#a)"
                                        />
                                        <path
                                          fill="#d3d3d3"
                                          fill-rule="evenodd"
                                          stroke="#ffffff"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-miterlimit="10"
                                          stroke-width=".48"
                                          d="M239.265 358.454v-.24h.24v.24-.24h.24v.24h.48l.24.24v.24h1.44v.24h.24v-.24h.24v.24h.96v.48h.24v.24h.48v.24h.24v.24h.24-.24.24v.48h.24l.24.241v.24h.24v.24h.24v.48h.24v.24-.24h.24v.24l.24.24h.24v.24h.24v.24h.24v.961l.24.24v.24h-.24.24v.24-.24V366.377h-1.2l-.24.24h-.72v.24h-.48l-.24.24h-1.2v.24l-.24.24v.48h-.48l-.24.24h-.24v.24h-.24v.961h-.72v-.96l.24-.24h.24v-.24h-.24v-.48h-.24v.24l-.24-.24v-.24h-.24v-1.921h-.24v-.48l.24-.24v-.48h-.72v.24h-.24v.24h-.24v.24h-.72v-.24l-.24.24v-.24.24h-.24v-.24h-.24v.24h-.24l-.24.24v.24l-.24.24h-.72l-.24.24h-.72v.24l-.24-.24h-.48l-.24-.24h-.48v.24h-.24v.24h-.72v.72h-.48v-.24.24h-.24v-.48h-.48v-.24h-.72v-.24h-.96v.72h-.48v.24h-.24l-.24.24h-.24v-.24h-.24v.24h-.24l-.24-.24h-.48v.24h-.48l-.24-.24h-.24l-.24.24-.24.24-.24.24v.24h-.24v-.96.24h.24v-.48h.24v-.72h.24-.24v-.24h-.24v-.24h-.24v-.24h.24v-.48.24h.24v-.24h-.24v-.48h.48v-.481h-.24l.24-.24v-.24h-.24.24v-.24h-.24v-.72h-.24v-.24h.24v-.48h.24l.24-.24v-.481h.24v-.24h.24v.24h.96v-.24h.24v-.24h.72v-.24l.24-.24v-.48l.24-.24.24-.24h.96v-.24h1.2v.24h.24v.24h.24l.24-.24.24.24h.48v-.24h.96v.24l.24-.24h.24v.48h.24v.24h.72v.24h.72v.24-.24.24-.24h.24v.24h.24v-.24.24-.24h.72v.24h.24v-.24h.24v-.24h.24l-.24-.24v-.24h.24v-.48h.24v-.241h.24v-.24.24h.24z"
                                          clip-path="url(#a)"
                                        />
                                        <path
                                            fill="#d3d3d3"
                                            fill-rule="evenodd"
                                            stroke="#ffffff"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-miterlimit="10"
                                            stroke-width=".48"
                                            d="M250.784 328.443v.72h-.24v1.2h-.24v.24h-.24v.48h-.24v.721h-.24v1.92h.96v-.24h.48v.24h.96v.481h-.24v.48h-.24v.24h-.24v.24h-.48v.24h-.48v.48h-.24v.72h-.24v.721h.24v.24h-.72v-.24h-.48v.24h-.24v.24h-.24v.48h-.24v.48h-.24v.24h-.24v.48h-.24v.961h.24v.24h-.24v.96h.48v.48h-1.68v.241h-.72v.24h-.24v.48h-.24v.24h-.24v.48l.24.24v.72h.48v.241h-.24v.96h-.24v-.24h-.72.24v-.48l-.24-.24v-.72h-.24v-.24h-.24v-.24l-.24-.24v-.24h-.48v-.48h-.24v-.24h-.24v-.241h-.48v.24h-.48l-.24-.24v-.24h-.24v-.24h-.96v-.24h.24v-.24h-.24l-.24-.24v.24h-.24v-.24h-.24v-.48h.24l.24-.24v-.24h.24v.24l.24-.24v-.24h.24v-.481h-.24v.24h-.24v-.24h-.24v-.24h-.24l-.24-.24h-.24v-.24h-.24v.24h-.24v-.48h-.24v-.24l-.24-.24h-.24v-.24.24h.24l.24-.24h.24v-.72h.24v-.241h.24-.48.24v-.72h.24l-.24-.24v-.72l-.24-.24v.24h-.48v.24h-.24v.24h-.72v-.48h.24v-.24h.24v-.24l.24-.24v-.481h-.24l-.24.24h-.24l-.24.24h-.24v.24h-.48v.48l-.24.24v.24h-.479v-.24h-1.68v.24h-.48v-.24.24l-.24-.24v.24h-1.2l-.24.24h-.72l.24-.24-.24-.24v-.48h.24v-.96h.24v-.96h-.24v-.24h.24l-.24-.24-.24-.24v-.24l-.24-.24-.24-.241v-.72h-.24v-.24h.24-.24v-.24h-.24v-.48h.24v-.24h.24v.24h.24v-.24.24h.24v-.24h1.92v-.24h.24v.24h.24v-.24.24h.48l.24-.24h.48v.24h.24v-.24h.72v.24-.24H239.025v-.24h.96l.24-.241h.72l.24-.24H244.305v.24h.24v-.24H246.944v.24h1.68v-.24h.96l.24-.24h.959z"
                                            clip-path="url(#a)"
                                        />

                                    </svg>
                            </div>
                            <div id="kecamatanInfo">
	                        	<span id="popup-close">&times;</span>

	                        	<div id="popup-content-area"></div>
	                        </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- Peta Wilayah End -->

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

        <script src="js/custom.js"></script>

        <script>
            const kecamatanData = <?php echo json_encode($kecamatanData); ?>;
        </script>

    </body>

</html>