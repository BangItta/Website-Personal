<?php
include '../koneksi.php';

// Ambil data dari form
$nama            = mysqli_real_escape_string($conn, $_POST['nama']);
$email           = mysqli_real_escape_string($conn, $_POST['email']);
$no_hp           = mysqli_real_escape_string($conn, $_POST['phone']);
$kecamatan       = mysqli_real_escape_string($conn, $_POST['kecamatan'] ?? '');
$desa            = mysqli_real_escape_string($conn, $_POST['desa'] ?? '');
$alamat_lengkap  = mysqli_real_escape_string($conn, $_POST['alamat_lengkap']);
$keterangan      = mysqli_real_escape_string($conn, $_POST['keterangan']);
$foto_base64     = $_POST['foto_base64'] ?? '';

// Inisialisasi nama file foto
$foto_nama = null;

// Cek apakah foto dikirim
if (empty($foto_base64)) {
    echo <<<HTML
    <!DOCTYPE html>
    <html>
    <head>
        <title>Validasi Gagal</title>
        <script src="../../admin-bencana/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
        <!-- Fonts and icons -->
        <script src="../../admin-bencana/assets/js/plugin/webfont/webfont.min.js"></script>
        <script>
            WebFont.load({
                google: { families: ["Public Sans:300,400,500,600,700"] },
                custom: {
                    families: [
                        "Font Awesome 5 Solid",
                        "Font Awesome 5 Regular",
                        "Font Awesome 5 Brands",
                        "simple-line-icons",
                    ],
                    urls: ["../assets/css/fonts.min.css"],
                },
                active: function () {
                    sessionStorage.fonts = true;
                },
            });
        </script>
        <!-- CSS Files -->
        <link rel="stylesheet" href="../../admin-bencana/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../admin-bencana/assets/css/plugins.min.css" />
        <link rel="stylesheet" href="../../admin-bencana/assets/css/kaiadmin.min.css" />
    </head>
    <body>
    <!-- Sweet Alert -->
    <script src="../../admin-bencana/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
        <script>
            // Tampilkan alert langsung
            swal("Foto Wajib Diunggah!", "Silakan unggah foto kejadian sebelum mengirim laporan.",{
                icon: "error",
                buttons: {
                    confirm: {
                        text: "Ok",
                        className: "btn btn-danger"
                    }
                }
            }).then(() => {
                window.history.back();
            });
        </script>
    </body>
    </html>
HTML;
    exit;
}

// Proses simpan foto jika ada
if (!empty($foto_base64)) {
    $foto_nama = 'foto_' . time() . '.jpg';
    $folder_tujuan = '../../img/laporan/' . $foto_nama;
    
    // Hapus prefix base64
    $foto_base64 = str_replace('data:image/jpeg;base64,', '', $foto_base64);
    $foto_base64 = str_replace(' ', '+', $foto_base64);

    // Simpan file ke folder
    file_put_contents($folder_tujuan, base64_decode($foto_base64));
}

// Query insert
$query = "INSERT INTO lapor_bencana 
(nama, email, no_hp, kecamatan, desa, alamat_lengkap, keterangan, foto_path) 
VALUES (
    '$nama',
    '$email',
    '$no_hp',
    '$kecamatan',
    '$desa',
    '$alamat_lengkap',
    '$keterangan',
    " . ($foto_nama ? "'$foto_nama'" : "NULL") . "
)";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Proses Laporan</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Validasi Gagal</title>
    <script src="../../admin-bencana/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <!-- Fonts and icons -->
    <script src="../../admin-bencana/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["../assets/css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="../../admin-bencana/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../admin-bencana/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../../admin-bencana/assets/css/kaiadmin.min.css" />
</head>
<body>
    <!-- Sweet Alert -->
    <script src="../../admin-bencana/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script>
<?php if (mysqli_query($conn, $query)): ?>
    <?php
        // Tambahkan ke tabel notifikasi
        $last_id = mysqli_insert_id($conn);
        $query_notif = "INSERT INTO notifikasi (id_laporan, status_baca) VALUES ('$last_id', 'belum')";
        mysqli_query($conn, $query_notif);
    ?>
    swal("Laporan Terkirim!", "Terima kasih, laporan Anda telah dikirim.",{
        icon: "success",
        buttons: {
            confirm: {
                text: "Ok",
                className: "btn btn-success"
            }
        }
    }).then(() => {
        window.location.href = '../lapor-bencana.php';
    });
<?php else: ?>
    swal("Gagal Mengirim", "Terjadi kesalahan saat mengirim laporan.",{
        icon: "error",
        buttons: {
            confirm: {
                text: "Ok",
                className: "btn btn-danger"
            }
        }
    }).then(() => {
        history.back();
    });
<?php endif; ?>
</script>
</body>
</html>