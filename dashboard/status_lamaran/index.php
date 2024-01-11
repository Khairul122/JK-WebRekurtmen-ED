<?php
require_once 'func.php';

?>

<h3>Riwayat Pendaftaran</h3>

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
          } else if ($data['status'] == 2) {
            echo "Diterima";
          } else if ($data['status'] == 3) {
            echo "Ditolak";
          }else if ($data['status'] == 4) {
            echo "Lulus Berkas";
          }
            
          echo "</td>";

          echo "<td>";
          // Tampilkan tombol "Next" jika status_pendaftaran sama dengan 2
          if ($data['status'] == 2 || $data['status'] == 4) {
            echo "<div class='text-center'><a href='../another.php' class='btn btn-warning'>Detail</a></div>";
          }
          echo "</td>";

          echo "</tr>";
        }
      }
      ?>
    </tbody>
  </table>
</div>
