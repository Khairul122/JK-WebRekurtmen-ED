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
        <h3>Form Data Keahlian</h3>
    </div>
    <div class='panel-body'>
        <form action='' method='POST' enctype="multipart/form-data">
            <input type='hidden' name='id_lowongan' value="<?php echo $id_lowongan; ?>">
            <?php
            foreach ($one as $data) { ?>
                <br>
                <div class="form-group">
                    <label for="keahlian">Keahlian</label>
                    <input type="text" class="form-control" id="keahlian" name='keahlian'>
                </div>

                <div class="form-group">
                    <label for="tingkat_keahlian">Tingkat Keahlian</label>
                    <input type="text" class="form-control" id="tingkat_keahlian" name='tingkat_keahlian'>
                </div>
            <?php } ?>
            <input type='submit' name='insert_data_keahlian' value='Next' class='btn btn-sm btn-warning'>
        </form>
    </div>
</div>