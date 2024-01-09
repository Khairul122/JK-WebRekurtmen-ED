<?php
require_once 'func.php';

?>

<style>
  .custom-scrollbar {
    overflow-x: auto;
    white-space: nowrap; /* Mencegah wrap untuk teks dalam sel */
  }
</style>

<h3>Lihat Profile</h3>

<br>

<div class="table-responsive custom-scrollbar">
  <table class='table table-bordered table-sm'>
  <thead>
    <tr>
      <th>No</th>
      <th>No KTP</th>
      <th>Nama Lengkap</th>
      <th>Email</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>No Handphone</th>
      <th>Status Diri</th>
      <th>Alamat</th>
      <th>Alamat Domisili</th>
      <th>Provinsi</th>
      <th>Kabupaten</th>
      <th>Kecamatan</th>
     
    </tr>
  </thead>
  <tbody>
    <?php
    // Gantilah nama field sesuai dengan struktur tabel tbl_profile Anda
    $query_select_profile = "SELECT * FROM tbl_profile";
    $result_select_profile = mysqli_query(Connect(), $query_select_profile);

    if ($result_select_profile && mysqli_num_rows($result_select_profile) > 0) {
      $no = 1;

      while ($data = mysqli_fetch_assoc($result_select_profile)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $data['no_ktp'] . "</td>";
        echo "<td>" . $data['nama_lengkap'] . "</td>";
        echo "<td>" . $data['email'] . "</td>";
        echo "<td>" . $data['tempat_lahir'] . "</td>";
        echo "<td>" . $data['tanggal_lahir'] . "</td>";
        echo "<td>" . $data['jenis_kelamin'] . "</td>";
        echo "<td>" . $data['no_hp'] . "</td>";
        echo "<td>" . $data['status_diri'] . "</td>";
        echo "<td>" . $data['alamat'] . "</td>";
        echo "<td>" . $data['alamat_domisili'] . "</td>";
        echo "<td>" . $data['provinsi'] . "</td>";
        echo "<td>" . $data['kabupaten'] . "</td>";
        echo "<td>" . $data['kecamatan'] . "</td>";

        // echo "<td>
        //   <div class='btn-group'>
        //     <form method='POST' action='?r=profile/edit'>
        //       <input type='hidden' name='id' value='" . $data['id'] . "'>
        //       <input type='submit' name='edit' value='Edit' class='btn btn-warning btn-sm'>
        //     </form>
        //     &nbsp;
        //     <form method='POST' action='?r=profile/delete'>
        //       <input type='hidden' name='id' value='" . $data['id'] . "'>
        //       <input type='submit' name='delete' value='Delete' class='btn btn-danger btn-sm'>
        //     </form>
        //   </div>
        // </td>";
        // echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='15'>Tidak ada data</td></tr>";
    }
    ?>
  </tbody>
</table>

</div>