<?php
session_start();

function GetAllProfiles()
{
  $query = "SELECT * FROM tbl_profile";
  $exe = mysqli_query(Connect(), $query);

  $profiles = array();

  while ($data = mysqli_fetch_assoc($exe)) {
    $profiles[] = array(
      'id_profile' => $data['id_profile'],
      'id_pengguna' => $data['id_pengguna'],
      'nama_lengkap' => $data['nama_lengkap'],
      'email' => $data['email'],
      'tempat_lahir' => $data['tempat_lahir'],
      'tanggal_lahir' => $data['tanggal_lahir'],
      'jenis_kelamin' => $data['jenis_kelamin'],
      'no_hp' => $data['no_hp'],
      'status_diri' => $data['status_diri'],
      'alamat' => $data['alamat'],
      'alamat_domisili' => $data['alamat_domisili'],
      'provinsi' => $data['provinsi'],
      'kabupaten' => $data['kabupaten'],
      'kecamatan' => $data['kecamatan'],
      'cv' => $data['cv'],
      'str' => $data['str'],
      'ijazah' => $data['ijazah'],
      'transkrip' => $data['transkrip'],
      'ktp' => $data['ktp'],
      'surat_lamaran' => $data['surat_lamaran']
    );
  }

  return $profiles;
}


function GetProfileById($id_profile)
{
  $query = "SELECT * FROM tbl_profile WHERE id_profile = '$id_profile'";
  $exe = mysqli_query(Connect(), $query);

  $profile = array();

  while ($data = mysqli_fetch_assoc($exe)) {
    $profile = array(
      'id_profile' => $data['id_profile'],
      'id_pengguna' => $data['id_pengguna'],
      'nama_lengkap' => $data['nama_lengkap'],
      'email' => $data['email'],
      'tempat_lahir' => $data['tempat_lahir'],
      'tanggal_lahir' => $data['tanggal_lahir'],
      'jenis_kelamin' => $data['jenis_kelamin'],
      'no_hp' => $data['no_hp'],
      'status_diri' => $data['status_diri'],
      'alamat' => $data['alamat'],
      'alamat_domisili' => $data['alamat_domisili'],
      'provinsi' => $data['provinsi'],
      'kabupaten' => $data['kabupaten'],
      'kecamatan' => $data['kecamatan'],
      'cv' => $data['cv'],
      'str' => $data['str'],
      'ijazah' => $data['ijazah'],
      'transkrip' => $data['transkrip'],
      'ktp' => $data['ktp'],
      'surat_lamaran' => $data['surat_lamaran']
    );
  }

  return $profile;
}



function InsertProfile()
{
  // Ambil nilai dari formulir
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
  $id_pengguna = $_POST['id_pengguna']; // id_pengguna diubah menjadi input hidden

  // Simpan file yang diunggah ke folder yang diinginkan
  $foto_pelamar = $_FILES['foto_pelamar']['name'];
  $cv = $_FILES['cv']['name'];
  $str = $_FILES['str']['name'];
  $ijazah = $_FILES['ijazah']['name'];
  $transkrip = $_FILES['transkrip']['name'];
  $ktp = $_FILES['ktp']['name'];
  $surat_lamaran = $_FILES['surat_lamaran']['name'];

  // Tentukan lokasi folder penyimpanan file (sesuaikan dengan struktur folder Anda)
  $upload_folder = '../assets/img/profile/';

  // Pindahkan file yang diunggah ke folder yang ditentukan
  move_uploaded_file($_FILES['foto_pelamar']['tmp_name'], $upload_folder . $foto_pelamar);
  move_uploaded_file($_FILES['cv']['tmp_name'], $upload_folder . $cv);
  move_uploaded_file($_FILES['str']['tmp_name'], $upload_folder . $str);
  move_uploaded_file($_FILES['ijazah']['tmp_name'], $upload_folder . $ijazah);
  move_uploaded_file($_FILES['transkrip']['tmp_name'], $upload_folder . $transkrip);
  move_uploaded_file($_FILES['ktp']['tmp_name'], $upload_folder . $ktp);
  move_uploaded_file($_FILES['surat_lamaran']['tmp_name'], $upload_folder . $surat_lamaran);

  // Query untuk menyimpan data ke tabel tbl_profile
  $query_profile = "INSERT INTO tbl_profile (no_ktp, nama_lengkap, email, tempat_lahir, tanggal_lahir, jenis_kelamin, no_hp, status_diri, alamat, alamat_domisili, provinsi, kabupaten, kecamatan, foto_pelamar, cv, str, ijazah, transkrip, ktp, surat_lamaran, id_pengguna)
    VALUES ('$no_ktp', '$nama_lengkap', '$email', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$no_hp', '$status_diri', '$alamat', '$alamat_domisili', '$provinsi', '$kabupaten', '$kecamatan', '$foto_pelamar', '$cv', '$str', '$ijazah', '$transkrip', '$ktp', '$surat_lamaran', '$id_pengguna')";

  // Eksekusi query
  $result_profile = mysqli_query(Connect(), $query_profile);

  // Periksa apakah data berhasil disimpan
  if ($result_profile) {
    // Jika berhasil disimpan
    echo "Data profile berhasil disimpan";
    // Lakukan pengalihan halaman atau tampilkan pesan sukses sesuai kebutuhan
  } else {
    // Jika gagal menyimpan data
    echo "Gagal menyimpan data profile: " . mysqli_error(Connect());
    // Lakukan pengalihan halaman atau tampilkan pesan kesalahan sesuai kebutuhan
  }
}


// Fungsi untuk menyimpan file
function saveFile($inputName, $targetDir)
{
  $file = $_FILES[$inputName]['name'];
  $targetFile = $targetDir . basename($file);
  
  // Pindahkan file ke direktori penyimpanan
  if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile)) {
    return $file; // Mengembalikan nama file untuk disimpan di database
  } else {
    return null; // Mengembalikan null jika gagal mengunggah file
  }
}





function Update($id_lowongan)
{
  $nama_perus = $_POST['nama_perus'];
  $bidang = $_POST['bidang'];
  $valid_until = $_POST['valid_until'];
  $persyaratan_khusus = $_POST['persyaratan_khusus'];

  $query = "UPDATE `tbl_lowongan` SET 
            `nama_perus` = '$nama_perus',
            `bidang` = '$bidang',
            `valid_until` = '$valid_until',
            `persyaratan_khusus` = '$persyaratan_khusus'
            WHERE `id_lowongan` = '$id_lowongan'";
  $exe = mysqli_query(Connect(), $query);

  if ($exe) {
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=lowongan/index"
    </script>';
  } else {
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=lowongan/index"
    </script>';
  }
}

function Delete($id_lowongan)
{
  $query = "DELETE FROM `tbl_lowongan` WHERE `id_lowongan` = '$id_lowongan'";
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
  InsertProfile();
}
// } else if (isset($_POST['update'])) {
//   Update($_POST['id_profile']);
// } else if (isset($_POST['delete'])) {
//   Delete($_POST['id_profile']);
// }
