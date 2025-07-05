<?php
$activePage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="text-primary"><i class="fas fa-exclamation-triangle me-3"></i>SiagaBencana</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link <?= ($activePage == 'index.php') ? 'active' : '' ?>">Beranda</a>
            <a href="peta-bencana.php" class="nav-item nav-link <?= ($activePage == 'peta-bencana.php') ? 'active' : '' ?>">Peta Bencana</a>
            <a href="tanggap-bencana.php" class="nav-item nav-link <?= ($activePage == 'tanggap-bencana.php') ? 'active' : '' ?>">Tanggap Bencana</a>
            <a href="lapor-bencana.php" class="nav-item nav-link <?= ($activePage == 'lapor-bencana.php') ? 'active' : '' ?>">Lapor Bencana</a>
            <a href="kontak.php" class="nav-item nav-link <?= ($activePage == 'kontak.php') ? 'active' : '' ?>">Kontak</a>
        </div>
    </div>
</nav>
