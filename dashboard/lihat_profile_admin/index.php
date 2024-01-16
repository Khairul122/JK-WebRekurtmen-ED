<?php
require_once 'func.php';
session_start();
?>

<style>
  .custom-scrollbar {
    overflow-x: auto;
    white-space: nowrap;
    /* Mencegah wrap untuk teks dalam sel */
  }
</style>

<h3>Lihat Profile</h3>

<div class="input-group mb-3 pt-3">
  <input type="text" class="form" id="searchInput" placeholder="Cari berdasarkan nama atau umur" aria-label="Cari" aria-describedby="basic-addon1">
  <div class="input-group-append">
    <button class="btn btn-primary btn-lg" type="button" onclick="search()">Cari</button>
  </div>
</div>


<div class="table-responsive custom-scrollbar pt-3">
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
        <th>Umur</th>
        <th>Ibu</th>
        <th>No Handphone</th>
        <th>Status Diri</th>
        <th>Alamat</th>
        <th>Alamat Domisili</th>
        <th>Provinsi</th>
        <th>Kabupaten</th>
        <th>Kecamatan</th>
        <th>Foto Pelamar</th>
        <th>CV</th>
        <th>STR</th>
        <th>Ijazah</th>
        <th>Transkrip</th>
        <th>KTP</th>
        <th>Surat Lamaran</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $where = ""; // Persiapkan kondisi WHERE kosong untuk query

      // Cek apakah ada input pencarian
      if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
        // Sesuaikan nama kolom yang ingin Anda cari
        $where = " WHERE nama_lengkap LIKE '%$search%' OR umur LIKE '%$search%' OR alamat LIKE '%$search%' OR provinsi LIKE '%$search%'";
      }

      // Tambahkan kondisi WHERE ke query utama
      $query_select_profile = "SELECT * FROM tbl_profile" . $where;
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
          echo "<td>" . $data['umur'] . "</td>";
          echo "<td>" . $data['ibu'] . "</td>";
          echo "<td>" . $data['no_hp'] . "</td>";
          echo "<td>" . $data['status_diri'] . "</td>";
          echo "<td>" . $data['alamat'] . "</td>";
          echo "<td>" . $data['alamat_domisili'] . "</td>";
          echo "<td>" . $data['provinsi'] . "</td>";
          echo "<td>" . $data['kabupaten'] . "</td>";
          echo "<td>" . $data['kecamatan'] . "</td>";
          echo "<td><img src='../assets/img/profile/foto/{$data['foto_pelamar']}' alt='Foto Pelamar' style='width:50px;height:67px;'></td>";
          echo "<td><a href='../assets/img/profile/cv/{$data['cv']}' target='_blank'>Lihat CV</a></td>";
          echo "<td><a href='../assets/img/profile/str/{$data['str']}' target='_blank'>Lihat STR</a></td>";
          echo "<td><a href='../assets/img/profile/ijazah/{$data['ijazah']}' target='_blank'>Lihat Ijazah</a></td>";
          echo "<td><a href='../assets/img/profile/transkrip/{$data['transkrip']}' target='_blank'>Lihat Transkrip</a></td>";
          echo "<td><a href='../assets/img/profile/ktp/{$data['ktp']}' target='_blank'>Lihat KTP</a></td>";
          echo "<td><a href='../assets/img/profile/surat_lamaran/{$data['surat_lamaran']}' target='_blank'>Lihat Surat Lamaran</a></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='21'>Tidak ada data</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<script>
  function search() {
    var searchInput = document.getElementById('searchInput').value.toLowerCase();
    var rows = document.querySelectorAll('tbody tr');

    for (var i = 0; i < rows.length; i++) {
      var rowData = rows[i].innerText.toLowerCase();

      if (rowData.includes(searchInput)) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  }
</script>