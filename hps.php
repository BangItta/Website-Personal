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