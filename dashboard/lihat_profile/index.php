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

<br>

<?php
// session_start();

// echo '<h2>Daftar Session:</h2>';
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>

<div class="table-responsive custom-scrollbar">
  <form>
    <?php
    $id_pengguna_login = $_SESSION['id']; // Ambil id dari sesi login

    $query_select_profile = "SELECT * FROM tbl_profile WHERE id_pengguna = '$id_pengguna_login'";
    $result_select_profile = mysqli_query(Connect(), $query_select_profile);

    if ($result_select_profile && mysqli_num_rows($result_select_profile) > 0) {
      $data = mysqli_fetch_assoc($result_select_profile);
    ?>

      <div class="form-group">
        <label for="foto_pelamar">Foto Pelamar</label>
        <br>
        <?php
        $foto_path = "../assets/img/profile/foto/" . $data['foto_pelamar'];
        if (file_exists($foto_path)) {
          echo "<img src='$foto_path' alt='Foto Profil' style='width:300px;height:400px;'>";
        } else {
          echo "<p>Foto tidak tersedia</p>";
        }
        ?>
      </div>

      <div class="form-group">
        <label for="no_ktp">No KTP</label>
        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?= $data['no_ktp'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $data['email'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $data['jenis_kelamin'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="umur">Umur</label>
        <input type="text" class="form-control" id="umur" name="umur" value="<?= $data['umur'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="ibu">Nama Ibu Kandung</label>
        <input type="text" class="form-control" id="ibu" name="ibu" value="<?= $data['ibu'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="no_hp">No Handphone</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="status_diri">Status Diri</label>
        <input type="text" class="form-control" id="status_diri" name="status_diri" value="<?= $data['status_diri'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="alamat_domisili">Alamat Domisili</label>
        <input type="text" class="form-control" id="alamat_domisili" name="alamat_domisili" value="<?= $data['alamat_domisili'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $data['provinsi'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="kabupaten">Kabupaten</label>
        <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $data['kabupaten'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $data['kecamatan'] ?>" readonly>
      </div>

      <br>

      <!-- Display CV -->
      <div class="form-group">
        <label for="cv">CV (Curriculum Vitae)</label>
        <br>
        <?php
        $cv_path = "../assets/img/profile/cv/" . $data['cv'];
        if (file_exists($cv_path)) {
          echo "<a href='$cv_path' target='_blank'>Lihat CV</a>";
        } else {
          echo "<p>CV tidak tersedia</p>";
        }
        ?>
      </div>

      <!-- Display STR -->
      <div class="form-group">
        <label for="str">STR</label>
        <br>
        <?php
        $str_path = "../assets/img/profile/str/" . $data['str'];
        if (file_exists($str_path)) {
          echo "<a href='$str_path' target='_blank'>Lihat STR</a>";
        } else {
          echo "<p>STR tidak tersedia</p>";
        }
        ?>
      </div>

      <!-- Display Ijazah -->
      <div class="form-group">
        <label for="ijazah">Ijazah</label>
        <br>
        <?php
        $ijazah_path = "../assets/img/profile/ijazah/" . $data['ijazah'];
        if (file_exists($ijazah_path)) {
          echo "<a href='$ijazah_path' target='_blank'>Lihat Ijazah</a>";
        } else {
          echo "<p>Ijazah tidak tersedia</p>";
        }
        ?>
      </div>

      <!-- Display Transkrip -->
      <div class="form-group">
        <label for="transkrip">Transkrip</label>
        <br>
        <?php
        $transkrip_path = "../assets/img/profile/transkrip/" . $data['transkrip'];
        if (file_exists($transkrip_path)) {
          echo "<a href='$transkrip_path' target='_blank'>Lihat Transkrip</a>";
        } else {
          echo "<p>Transkrip tidak tersedia</p>";
        }
        ?>
      </div>

      <!-- Display KTP -->
      <div class="form-group">
        <label for="ktp">KTP</label>
        <br>
        <?php
        $ktp_path = "../assets/img/profile/ktp/" . $data['ktp'];
        if (file_exists($ktp_path)) {
          echo "<a href='$ktp_path' target='_blank'>Lihat KTP</a>";
        } else {
          echo "<p>KTP tidak tersedia</p>";
        }
        ?>
      </div>

      <!-- Display Surat Lamaran -->
      <div class="form-group">
        <label for="surat_lamaran">Surat Lamaran</label>
        <br>
        <?php
        $surat_lamaran_path = "../assets/img/profile/surat_lamaran/" . $data['surat_lamaran'];
        if (file_exists($surat_lamaran_path)) {
          echo "<a href='$surat_lamaran_path' target='_blank'>Lihat Surat Lamaran</a>";
        } else {
          echo "<p>Surat Lamaran tidak tersedia</p>";
        }
        ?>
      </div>

    <?php
    } else {
      echo "<p>Tidak ada data</p>";
    }
    ?>
  </form>

  <div style="padding-top: 20px;">
    <a href="?r=lihat_profile/edit&id_profile=<?= $data['id_profile'] ?>" class="btn btn-warning btn-lg" style="width: 200px;">Edit</a>
  </div>


</div>