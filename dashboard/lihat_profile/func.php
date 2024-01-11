<?php


function GetAll()
{
  $query = "SELECT * FROM tbl_profile";
  $exe = mysqli_query(Connect(), $query);
  $datas = array();

  while ($data = mysqli_fetch_assoc($exe)) {
    $datas[] = array(
      'id_profile' => $data['id_profile'],
      'id_pengguna' => $data['id_pengguna'],
      'nama_lengkap' => $data['nama_lengkap'],
      'email' => $data['email'],
      'tempat_lahir' => $data['tempat_lahir'],
      'tanggal_lahir' => $data['tanggal_lahir'],
      'jenis_kelamin' => $data['jenis_kelamin'],
      'no_hp' => $data['no_hp'],
      'provinsi' => $data['provinsi'],
      'kabupaten' => $data['kabupaten'],
      'kecamatan' => $data['kecamatan'],
      'alamat' => $data['alamat'],
      'alamat_domisili' => $data['alamat_domisili'],
      'status_diri' => $data['status_diri'],
      'no_ktp' => $data['no_ktp'],
      'status' => $data['status'],
      'foto_pelamar' => $data['foto_pelamar'],
      'cv' => $data['cv'],
      'str' => $data['str'],
      'ijazah' => $data['ijazah'],
      'transkrip' => $data['transkrip'],
      'ktp' => $data['ktp'],
      'surat_lamaran' => $data['surat_lamaran']
    );
  }

  return $datas;
}

function GetOne($id_profile)
{
  $query = "SELECT * FROM `tbl_profile` WHERE `id_profile` = '$id_profile'";
  $exe = mysqli_query(Connect(), $query);
  $datas = array();

  while ($data = mysqli_fetch_assoc($exe)) {
    $datas[] = array(
      'id_profile' => $data['id_profile'],
      'id_pengguna' => $data['id_pengguna'],
      'nama_lengkap' => $data['nama_lengkap'],
      'email' => $data['email'],
      'tempat_lahir' => $data['tempat_lahir'],
      'tanggal_lahir' => $data['tanggal_lahir'],
      'jenis_kelamin' => $data['jenis_kelamin'],
      'no_hp' => $data['no_hp'],
      'provinsi' => $data['provinsi'],
      'kabupaten' => $data['kabupaten'],
      'kecamatan' => $data['kecamatan'],
      'alamat' => $data['alamat'],
      'alamat_domisili' => $data['alamat_domisili'],
      'status_diri' => $data['status_diri'],
      'no_ktp' => $data['no_ktp'],
      'status' => $data['status'],
      'foto_pelamar' => $data['foto_pelamar'],
      'cv' => $data['cv'],
      'str' => $data['str'],
      'ijazah' => $data['ijazah'],
      'transkrip' => $data['transkrip'],
      'ktp' => $data['ktp'],
      'surat_lamaran' => $data['surat_lamaran']
    );
  }

  return $datas;
}

function Insert()
{
  $komoditas = $_POST['komoditas'];
  $deskripsi = $_POST['deskripsi'];

  $query = "INSERT INTO `komoditas` (`id`,`komoditas`,`deskripsi`)
VALUES (NULL,'$komoditas','$deskripsi')";
  $exe = mysqli_query(Connect(), $query);
  if ($exe) {
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=komoditas/index"
    </script>';
  } else {
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=komoditas/index"
    </script>';
  }
}
function Update($id_profile)
{
  // Ambil data dari formulir
  $no_ktp = $_POST['no_ktp'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $no_hp = $_POST['no_hp'];
  $status_diri = $_POST['status_diri'];
  $alamat = $_POST['alamat'];
  $alamat_domisili = $_POST['alamat_domisili'];
  $provinsi = $_POST['provinsi'];
  $kabupaten = $_POST['kabupaten'];
  $kecamatan = $_POST['kecamatan'];
  $umur = $_POST['umur'];
  $ibu = $_POST['ibu'];

  // Direktori penyimpanan
  $target_dir_foto = "../assets/img/profile/foto/";
  $target_dir_cv = "../assets/img/profile/cv/";
  $target_dir_str = "../assets/img/profile/str/";
  $target_dir_ijazah = "../assets/img/profile/ijazah/";
  $target_dir_transkrip = "../assets/img/profile/transkrip/";
  $target_dir_ktp = "../assets/img/profile/ktp/";
  $target_dir_surat_lamaran = "../assets/img/profile/surat_lamaran/";

  // File lama
  $foto_pelamar_lama = $_POST['foto_pelamar_lama'];
  $cv_pelamar_lama = $_POST['cv_lama'];
  $str_lama = $_POST['str_lama'];
  $ijazah_lama = $_POST['ijazah_lama'];
  $transkrip_lama = $_POST['transkrip_lama'];
  $ktp_lama = $_POST['ktp_lama'];
  $surat_lamaran_lama = $_POST['surat_lamaran_lama'];

  // Periksa apakah ada file foto, CV, STR, Ijazah, Transkrip, KTP, dan Surat Lamaran yang diunggah
  if (
    $_FILES['foto_pelamar']['error'] === UPLOAD_ERR_OK &&
    $_FILES['cv']['error'] === UPLOAD_ERR_OK &&
    $_FILES['str']['error'] === UPLOAD_ERR_OK &&
    $_FILES['ijazah']['error'] === UPLOAD_ERR_OK &&
    $_FILES['transkrip']['error'] === UPLOAD_ERR_OK &&
    $_FILES['ktp']['error'] === UPLOAD_ERR_OK &&
    $_FILES['surat_lamaran']['error'] === UPLOAD_ERR_OK
  ) {

    // Ambil nama file baru
    $foto_pelamar = $_FILES['foto_pelamar']['name'];
    $cv_pelamar = $_FILES['cv']['name'];
    $str = $_FILES['str']['name'];
    $ijazah = $_FILES['ijazah']['name'];
    $transkrip = $_FILES['transkrip']['name'];
    $ktp = $_FILES['ktp']['name'];
    $surat_lamaran = $_FILES['surat_lamaran']['name'];

    // Pindahkan file baru ke direktori penyimpanan
    move_uploaded_file($_FILES['foto_pelamar']['tmp_name'], $target_dir_foto . basename($foto_pelamar));
    move_uploaded_file($_FILES['cv']['tmp_name'], $target_dir_cv . basename($cv_pelamar));
    move_uploaded_file($_FILES['str']['tmp_name'], $target_dir_str . basename($str));
    move_uploaded_file($_FILES['ijazah']['tmp_name'], $target_dir_ijazah . basename($ijazah));
    move_uploaded_file($_FILES['transkrip']['tmp_name'], $target_dir_transkrip . basename($transkrip));
    move_uploaded_file($_FILES['ktp']['tmp_name'], $target_dir_ktp . basename($ktp));
    move_uploaded_file($_FILES['surat_lamaran']['tmp_name'], $target_dir_surat_lamaran . basename($surat_lamaran));

    // Hapus file lama jika file baru diupload
    if (!empty($foto_pelamar) && $foto_pelamar_lama != $foto_pelamar && is_file($target_dir_foto . $foto_pelamar_lama)) {
      unlink($target_dir_foto . $foto_pelamar_lama);
    }
    if (!empty($cv_pelamar) && $cv_pelamar_lama != $cv_pelamar && is_file($target_dir_cv . $cv_pelamar_lama)) {
      unlink($target_dir_cv . $cv_pelamar_lama);
    }
    if (!empty($str) && $str_lama != $str && is_file($target_dir_str . $str_lama)) {
      unlink($target_dir_str . $str_lama);
    }
    if (!empty($ijazah) && $ijazah_lama != $ijazah && is_file($target_dir_ijazah . $ijazah_lama)) {
      unlink($target_dir_ijazah . $ijazah_lama);
    }
    if (!empty($transkrip) && $transkrip_lama != $transkrip && is_file($target_dir_transkrip . $transkrip_lama)) {
      unlink($target_dir_transkrip . $transkrip_lama);
    }
    if (!empty($ktp) && $ktp_lama != $ktp && is_file($target_dir_ktp . $ktp_lama)) {
      unlink($target_dir_ktp . $ktp_lama);
    }
    if (!empty($surat_lamaran) && $surat_lamaran_lama != $surat_lamaran && is_file($target_dir_surat_lamaran . $surat_lamaran_lama)) {
      unlink($target_dir_surat_lamaran . $surat_lamaran_lama);
    }


    // Query untuk update data pada tabel tbl_profile
    $query = "UPDATE tbl_profile SET 
                no_ktp = '$no_ktp',
                nama_lengkap = '$nama_lengkap',
                email = '$email',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                jenis_kelamin = '$jenis_kelamin',
                umur = '$umur',
                ibu = '$ibu',
                no_hp = '$no_hp',
                provinsi = '$provinsi',
                kabupaten = '$kabupaten',
                kecamatan = '$kecamatan',
                alamat = '$alamat',
                alamat_domisili = '$alamat_domisili',
                status_diri = '$status_diri',
                foto_pelamar = '$foto_pelamar',
                cv = '$cv_pelamar',
                str = '$str',
                ijazah = '$ijazah',
                transkrip = '$transkrip',
                ktp = '$ktp',
                surat_lamaran = '$surat_lamaran'
              WHERE id_profile = '$id_profile'";

    $exe = mysqli_query(Connect(), $query);

    if ($exe) {
      // Jika berhasil, beri pesan sukses dan alihkan ke halaman indeks lamaran
      $_SESSION['message'] = "Data sudah diperbarui";
      $_SESSION['mType'] = "success";
      echo '
      <script>
          window.location = "?r=lihat_profile/index"
      </script>';
    } else {
      // Jika gagal, beri pesan error
      $_SESSION['message'] = "Gagal memperbarui data: " . mysqli_error(Connect());
      $_SESSION['mType'] = "danger";
    }
  } else {
    // Jika terjadi kesalahan saat mengunggah file
    $_SESSION['message'] = "Terjadi kesalahan saat mengunggah file.";
    $_SESSION['mType'] = "danger";
  }
}


function Delete($id)
{
  $query = "DELETE FROM `komoditas` WHERE `id` = '$id'";
  $exe = mysqli_query(Connect(), $query);
  if ($exe) {
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah dihapus ";
    $_SESSION['mType'] = "success ";
  } else {
    $_SESSION['message'] = " Data Gagal dihapus ";
    $_SESSION['mType'] = "danger ";
  }
}


if (isset($_POST['insert'])) {
  Insert();
} else if (isset($_POST['update'])) {
  Update($_POST['id_profile']);
} else if (isset($_POST['delete'])) {
  Delete($_POST['id']);
}
