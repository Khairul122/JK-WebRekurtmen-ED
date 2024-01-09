<?php
// Lakukan koneksi ke database atau include file koneksi
require_once '../config/conn.php';

// Query untuk menghitung jumlah data dalam tbl_lowongan
$query_count_lowongan = "SELECT COUNT(*) AS total_lowongan FROM tbl_lowongan";
$result_count_lowongan = mysqli_query(Connect(), $query_count_lowongan);

// Periksa apakah query berhasil dijalankan
if ($result_count_lowongan) {
    $row_count_lowongan = mysqli_fetch_assoc($result_count_lowongan);
    $total_lowongan = $row_count_lowongan['total_lowongan'];
} else {
    $total_lowongan = 0;
}

$query_count_pendaftaran = "SELECT COUNT(*) AS total_pendaftaran FROM tbl_pendaftaran";
$result_count_pendaftaran = mysqli_query(Connect(), $query_count_pendaftaran);

// Periksa apakah query berhasil dijalankan
if ($result_count_pendaftaran) {
    $row_count_pendaftaran = mysqli_fetch_assoc($result_count_pendaftaran);
    $total_pendaftaran = $row_count_pendaftaran['total_pendaftaran'];
} else {
    $total_pendaftaran = 0; // Atur ke 0 jika terjadi kesalahan
}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-5">
    <section class="px-4">
        <div class="d-flex flex-row justify-content-between">
            <!-- Card Lowongan -->
            <div class="card text-white bg-secondary mb-3" style="width: 18rem; height: 8rem;">
                <div class="card-body">
                    <h2 class="card-title font-weight-bold">Lowongan</h2>
                    <h3 class="font-weight-bold"><?php echo $total_lowongan; ?></h3>
                </div>
            </div>

            <!-- Card Calon Pelamar -->
            <div style="padding-left: 2%;">
                <div class="card text-white bg-secondary mb-3" style="width: 18rem; height: 8rem;">
                    <div class="card-body">
                        <h2 class="card-title font-weight-bold">Calon Pelamar</h2>
                        <h3 class="font-weight-bold"><?php echo $total_pendaftaran; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Content Row -->
<div class="row">

</div>

<!-- Content Row -->
<div class="row justify-content-center">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

    </div>

    <div class="col-lg-6 mb-4">

    </div>
</div>