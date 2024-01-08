<?php
require_once 'func.php';
$id_pendaftaran = $_POST['id_pendaftaran'];
$one = GetOne($id_pendaftaran);
?>

<div class='panel panel-info'>
  <div class='panel-heading'>
    <h3>Form Edit Lowongan</h3>
  </div>
  <div class='panel-body'>
    <form action='' method='POST'>
      <input type='hidden' name='id_pendaftaran' value="<?php echo $_POST['id_pendaftaran']; ?>">
      <?php
      foreach ($one as $data) { ?>

        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama_lengkap" name='nama_lengkap' value="<?php echo $data['nama_lengkap']; ?>">
        </div>

        <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
            <option value="pria">Pria</option>
            <option value="wanita">Wanita</option>
          </select>
        </div>

        <div class="form-group">
          <label for="bidang">Bidang</label>
          <input type="text" class="form-control" id="bidang" name='bidang' value="<?php echo $data['bidang']; ?>">
        </div>

        <div class="form-group">
          <label for="nama_perus">Nama Perusahaan</label>
          <input type="text" class="form-control" id="nama_perus" name='nama_perus' value="<?php echo $data['nama_perus']; ?>">
        </div>

        <div class="form-group">
          <label for="status">Status Pendaftaran</label>
          <select class="form-control" id="status" name="status">
            <option value="2">Diterima</option>
            <option value="3">Ditolak</option>
          </select>
        </div>

      <?php } ?>
      <input type='submit' name='update' value='Save' class='btn btn-sm btn-warning'>
    </form>
  </div>
</div>