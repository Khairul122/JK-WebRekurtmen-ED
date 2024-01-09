<?php
require_once 'func.php';

?>

<h3>Riawayat Pendaftaran</h3>

<br>

<div class='table-responsive'>
  <table class='table table-bordered table-sm'>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Bidang</th>
        <th>Nama Perusahaan</th>
        <th>Status</th>
        <th>Aksi</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $lowongans = GetAll();
      $no = 1;
      if (isset($lowongans)) {
        foreach ($lowongans as $data) {
          echo "<tr>";
          echo "<td>" . $no++ . "</td>";
          echo "<td>" . $data['nama_lengkap'] . "</td>";
          echo "<td>" . $data['jenis_kelamin'] . "</td>";
          echo "<td>" . $data['bidang'] . "</td>";
          echo "<td>" . $data['nama_perus'] . "</td>";
          echo "<td>";
          if ($data['status'] == 1) {
            echo "Menunggu Konfirmasi";
          } else if ($data['status'] == 2){
            echo "Diterima"; 
          }else if ($data['status'] == 3){
            echo "Ditolak"; 
          }
          echo "<td>
          <div class=\"btn-group\">
            <form method='POST' action='?r=konfirmasi_status_lamaran/edit'>
              <input type='hidden' name='id_pendaftaran' value='" . $data['id_pendaftaran'] . "'>
              <input type='submit' name='edit' value='Edit' class='btn btn-warning btn-sm'>
            </form>
            &nbsp;
            <form method='POST' action=''>
              <input type='hidden' name='id_pendaftaran' value='" . $data['id_pendaftaran'] . "'>
              <input type='submit' name='delete' value='Delete' class='btn btn-danger btn-sm'>
            </form>
          </div>
        </td>";
  echo "</tr>";
        }
      }
      ?>
    </tbody>
  </table>
</div>