<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="text-primary">Informasi Wilayah & Peta Bencana</h2>
        <!-- <p>Berikut adalah daftar peta visual yang menunjukkan wilayah Kabupaten Sumenep dan daerah rawan bencana.</p> -->
    </div>
    <div class="row g-4">
        <?php
        $query = "SELECT * FROM peta_bencana ORDER BY created_at DESC";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0):
            while ($data = mysqli_fetch_assoc($result)):
        ?>
        <div class="col-12 wow fadeInUp">
    <div class="card shadow-sm border-0">
        <img src="../img/peta/<?= htmlspecialchars($data['file_path']) ?>" class="img-fluid rounded mb-3 w-100" style="max-height: 600px; object-fit: cover;" alt="Peta <?= htmlspecialchars($data['nama_peta']) ?>">
        <div class="card-body">
            <h4 class="card-title text-primary"><?= htmlspecialchars($data['nama_peta']) ?></h4>
            <?php if (!empty($data['keterangan'])): ?>
                <p class="card-text"><?= nl2br(htmlspecialchars($data['keterangan'])) ?></p>
            <?php else: ?>
                <p class="text-muted">Tidak ada keterangan tersedia.</p>
            <?php endif; ?>
            <?php if (!empty($data['file_path']) && file_exists('img/peta/' . $data['file_path'])): ?>
                <a href="img/peta/<?= htmlspecialchars($data['file_path']) ?>" download class="btn btn-success mt-2 ">
                    <i class="fa fa-download "></i>
                </a>
            <?php endif; ?>

        </div>
    </div>
</div>

        <?php
            endwhile;
        else:
        ?>
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada data peta yang tersedia.</p>
        </div>
        <?php endif; ?>
    </div>
</div>