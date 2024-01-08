<?php
require_once 'func.php';

// Ambil id_lowongan dari session
$id_lowongan = $_SESSION['id_lowongan'] ?? '';

// Jika id_lowongan tidak kosong, dapatkan data dari database
if (!empty($id_lowongan)) {
    $one = GetOne($id_lowongan);

    if (!empty($one)) {
        foreach ($one as $data) {
            echo "<p>ID Lowongan: " . $data['id_lowongan'] . "</p>";
            echo "<p>Bidang: " . $data['bidang'] . "</p>";
            echo "<p>Nama Perusahaan: " . $data['nama_perus'] . "</p>";
        }
    } else {
        echo "<h4>Data tidak ditemukan</h4>";
    }
} else {
    echo "<h4>ID Lowongan tidak valid</h4>";
}
?>


<div class='panel panel-info'>
    <div class='panel-heading'>
        <h3>Form Data Pengalaman</h3>
    </div>
    <div class='panel-body'>
        <form action='' method='POST' enctype="multipart/form-data">
        <input type='hidden' name='id_lowongan' value="<?php echo $id_lowongan; ?>">
            <?php
            foreach ($one as $data) { ?>
                <br>
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan Sebelumnya</label>
                    <input type="text" class="form-control" id="keahlian" name='keahlian'>
                </div>

                <div class="form-group">
                    <label for="posisi_terakhir">Posisi Terakhir</label>
                    <input type="text" class="form-control" id="posisi_terakhir" name='posisi_terakhir'>
                </div>

                <div class="form-group">
                    <label for="jobdesk">Jobdesk</label>
                    <input type="text" class="form-control" id="jobdesk" name='jobdesk'>
                </div>
                <div class="form-group">
                    <label for="penghasilan">Penghasilan</label>
                    <input type="number" class="form-control" id="penghasilan" name='penghasilan'>
                </div>
                <div class="form-group">
                    <label for="alasan">Alasan</label>
                    <input type="text" class="form-control" id="alasan" name='alasan'>
                </div>
            <?php } ?>
            <input type='submit' name='insert_data_pengalaman' value='Next' class='btn btn-sm btn-warning'>
        </form>
    </div>
</div>