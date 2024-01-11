<?php
session_start();

function GetAll()
{
  $query = "SELECT * FROM tbl_lowongan";
  $exe = mysqli_query(Connect(), $query);
  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_lowongan' => $data['id_lowongan'],
      'nama_perus' => $data['nama_perus'],
      'bidang' => $data['bidang'],
      'valid_until' => $data['valid_until'],
      'persyaratan_khusus' => $data['persyaratan_khusus'],
    );
  }
  return $datas;
}

function GetAllDataDiri()
{
  $query = "SELECT * FROM tbl_datadiri";
  $exe = mysqli_query(Connect(), $query);
  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_lowongan' => $data['id_lowongan'],
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
      'status_diri' => $data['status_diri'],
      'no_ktp' => $data['no_ktp'],
    );
  }
  return $datas;
}


function GetOne($id_lowongan)
{
  $query = "SELECT * FROM  `tbl_lowongan` WHERE  `id_lowongan` =  '$id_lowongan'";
  $exe = mysqli_query(Connect(), $query);
  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_lowongan' => $data['id_lowongan'],
      'nama_perus' => $data['nama_perus'],
      'bidang' => $data['bidang'],
      'valid_until' => $data['valid_until'],
      'persyaratan_khusus' => $data['persyaratan_khusus'],
    );
  }
  return $datas;
}

function GetOneDataDiri($id_datadiri)
{
  $query = "SELECT * FROM `tbl_datadiri` WHERE `id_datadiri` = '$id_datadiri'";
  $exe = mysqli_query(Connect(), $query);

  if ($exe) {
    $data = mysqli_fetch_assoc($exe);

    if ($data) {
      return array(
        'id_lowongan' => $data['id_lowongan'],
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
        'status_diri' => $data['status_diri'],
        'no_ktp' => $data['no_ktp'],
      );
    } else {
      // Data tidak ditemukan
      return null;
    }
  } else {
    // Query gagal
    return null;
  }
}


function InsertDataDiri($id_lowongan)
{
  // Ambil data dari formulir
  $id_lowongan = $_POST['id_lowongan'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $no_hp = $_POST['no_hp'];
  $provinsi = $_POST['provinsi'];
  $kabupaten = $_POST['kabupaten'];
  $kecamatan = $_POST['kecamatan'];
  $alamat = $_POST['alamat'];
  $status_diri = $_POST['status_diri'];
  $no_ktp = $_POST['no_ktp'];
  $umur = $_POST['umur'];
  $ibu = $_POST['ibu'];


  // Create an array to store form data
  $formDataDiri = array(
    'id_lowongan' => $id_lowongan,
    'nama_lengkap' => $nama_lengkap,
    'email' => $email,
    'tempat_lahir' => $tempat_lahir,
    'tanggal_lahir' => $tanggal_lahir,
    'jenis_kelamin' => $jenis_kelamin,
    'no_hp' => $no_hp,
    'provinsi' => $provinsi,
    'kabupaten' => $kabupaten,
    'kecamatan' => $kecamatan,
    'alamat' => $alamat,
    'status_diri' => $status_diri,
    'no_ktp' => $no_ktp,
    'umur' => $umur,
    'ibu' => $ibu
  );

  // Assign the array to a session variable
  $_SESSION['formDataDiri'] = $formDataDiri;

  $_SESSION['id_lowongan'] = $id_lowongan;

  // Periksa apakah ada file foto, CV, STR, Ijazah, Transkrip, KTP, dan Surat Lamaran yang diunggah
  if ($_FILES['foto_pelamar']['error'] === UPLOAD_ERR_OK && $_FILES['cv']['error'] === UPLOAD_ERR_OK && $_FILES['str']['error'] === UPLOAD_ERR_OK && $_FILES['ijazah']['error'] === UPLOAD_ERR_OK && $_FILES['transkrip']['error'] === UPLOAD_ERR_OK && $_FILES['ktp']['error'] === UPLOAD_ERR_OK && $_FILES['surat_lamaran']['error'] === UPLOAD_ERR_OK) {
    $foto_pelamar = $_FILES['foto_pelamar']['name'];
    $cv_pelamar = $_FILES['cv']['name'];
    $str = $_FILES['str']['name'];
    $ijazah = $_FILES['ijazah']['name'];
    $transkrip = $_FILES['transkrip']['name'];
    $ktp = $_FILES['ktp']['name'];
    $surat_lamaran = $_FILES['surat_lamaran']['name'];

    $target_dir_foto = "../assets/img/data_diri/foto/";
    $target_dir_cv = "../assets/img/data_diri/cv/";
    $target_dir_str = "../assets/img/data_diri/str/";
    $target_dir_ijazah = "../assets/img/data_diri/ijazah/";
    $target_dir_transkrip = "../assets/img/data_diri/transkrip/";
    $target_dir_ktp = "../assets/img/data_diri/ktp/";
    $target_dir_surat_lamaran = "../assets/img/data_diri/surat_lamaran/";

    $target_file_foto = $target_dir_foto . basename($foto_pelamar);
    $target_file_cv = $target_dir_cv . basename($cv_pelamar);
    $target_file_str = $target_dir_str . basename($str);
    $target_file_ijazah = $target_dir_ijazah . basename($ijazah);
    $target_file_transkrip = $target_dir_transkrip . basename($transkrip);
    $target_file_ktp = $target_dir_ktp . basename($ktp);
    $target_file_surat_lamaran = $target_dir_surat_lamaran . basename($surat_lamaran);

    // Pindahkan file ke direktori penyimpanan
    if (
      move_uploaded_file($_FILES['foto_pelamar']['tmp_name'], $target_file_foto) &&
      move_uploaded_file($_FILES['cv']['tmp_name'], $target_file_cv) &&
      move_uploaded_file($_FILES['str']['tmp_name'], $target_file_str) &&
      move_uploaded_file($_FILES['ijazah']['tmp_name'], $target_file_ijazah) &&
      move_uploaded_file($_FILES['transkrip']['tmp_name'], $target_file_transkrip) &&
      move_uploaded_file($_FILES['ktp']['tmp_name'], $target_file_ktp) &&
      move_uploaded_file($_FILES['surat_lamaran']['tmp_name'], $target_file_surat_lamaran)
    ) {
      // Query untuk menyimpan data ke tabel tbl_datadiri
      $query = "INSERT INTO tbl_datadiri (id_lowongan, nama_lengkap, email, tempat_lahir, tanggal_lahir, 
                          jenis_kelamin, no_hp, provinsi, kabupaten, kecamatan, alamat, status_diri, foto_pelamar, cv, str, ijazah, transkrip, ktp, surat_lamaran, no_ktp, umur, ibu) 
                          VALUES ('$id_lowongan', '$nama_lengkap', '$email', '$tempat_lahir', '$tanggal_lahir', 
                          '$jenis_kelamin', '$no_hp', '$provinsi', '$kabupaten', '$kecamatan', '$alamat', '$status_diri', 
                          '$foto_pelamar', '$cv_pelamar', '$str', '$ijazah', '$transkrip', '$ktp', '$surat_lamaran', '$no_ktp','$umur','$ibu')";

      $exe = mysqli_query(Connect(), $query);

      if ($exe) {
        // Jika berhasil, beri pesan sukses dan alihkan ke halaman indeks lamaran
        $_SESSION['message'] = "Data sudah disimpan";
        $_SESSION['mType'] = "success";
        $id_datadiri = mysqli_insert_id(Connect());
        $_SESSION['id_datadiri'] = $id_datadiri;
        echo '<script>window.location = "?r=lamaran/lamar_pendidikan";</script>';
      } else {
        // Jika gagal, beri pesan error
        $_SESSION['message'] = "Gagal menyimpan data: " . mysqli_error(Connect());
        $_SESSION['mType'] = "danger";
        echo '<script>window.location = "?r=lamaran/lamar_datadiri";</script>';
      }
    } else {
      // Jika gagal mengunggah file
      echo "Gagal mengunggah file.";
    }
  } else {
    // Jika terjadi kesalahan saat mengunggah file
    echo "Terjadi kesalahan saat mengunggah file.";
  }
}

function InsertDataPendidikan($id_lowongan)
{
  $id_lowongan = $_POST['id_lowongan'];
  $pendidikan_terkakhir = $_POST['pendidikan_terkakhir'];
  $asal_sekolah = $_POST['asal_sekolah'];
  $jurusan = $_POST['jurusan'];
  $tahun_masuk = $_POST['tahun_masuk'];
  $tahun_lulus = $_POST['tahun_lulus'];
  $IPK = $_POST['IPK'];

  // Simpan data ke dalam session
  $_SESSION['formDataPendidikan'] = array(
    'id_lowongan' => $id_lowongan,
    'pendidikan_terkakhir' => $pendidikan_terkakhir,
    'asal_sekolah' => $asal_sekolah,
    'jurusan' => $jurusan,
    'tahun_masuk' => $tahun_masuk,
    'tahun_lulus' => $tahun_lulus,
    'IPK' => $IPK
  );

  // Query untuk menyimpan data ke tabel tbl_pendidikan
  $query = "INSERT INTO tbl_pendidikan (id_lowongan, pendidikan_terkakhir, asal_sekolah, jurusan, tahun_masuk, tahun_lulus, IPK)
            VALUES ('$id_lowongan', '$pendidikan_terkakhir', '$asal_sekolah', '$jurusan', '$tahun_masuk', '$tahun_lulus', '$IPK')";

  $exe = mysqli_query(Connect(), $query);

  if ($exe) {
    // Jika berhasil
    $_SESSION['message'] = "Data sudah disimpan";
    $_SESSION['mType'] = "success";
    $id_datadiri = mysqli_insert_id(Connect()); // Mendapatkan ID yang baru saja dimasukkan
    $_SESSION['id_datadiri'] = $id_datadiri;
    echo '
    <script>
    window.location = "?r=lamaran/lamar_pengalaman"
    </script>';
  } else {
    // Jika gagal
    $_SESSION['message'] = "Data gagal disimpan: " . mysqli_error(Connect());
    $_SESSION['mType'] = "danger";
    echo '
    <script>
    window.location = "?r=lamaran/lamar_pendidikan"
    </script>';
  }
}

function InsertDataPengalaman($id_lowongan)
{
  if (isset($_POST['insert_data_pengalaman'])) {
    // Ambil nilai dari form
    $id_lowongan = $_POST['id_lowongan'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $posisi_terakhir = $_POST['posisi_terakhir'];
    $jobdesk = $_POST['jobdesk'];
    $penghasilan = $_POST['penghasilan'];
    $alasan = $_POST['alasan'];

    // Simpan data ke dalam session
    $_SESSION['formDataPengalaman'] = array(
      'id_lowongan' => $id_lowongan,
      'nama_perusahaan' => $nama_perusahaan,
      'posisi_terakhir' => $posisi_terakhir,
      'jobdesk' => $jobdesk,
      'penghasilan' => $penghasilan,
      'alasan' => $alasan
    );

    // Query untuk menyimpan data ke tabel tbl_pengalaman
    $query = "INSERT INTO tbl_pengalaman (id_lowongan, nama_perusahaan, posisi_terakhir, jobdesk, penghasilan, alasan)
              VALUES ('$id_lowongan', '$nama_perusahaan', '$posisi_terakhir', '$jobdesk', '$penghasilan', '$alasan')";

    $exe = mysqli_query(Connect(), $query);

    if ($exe) {
      // Jika berhasil
      $_SESSION['message'] = "Data pengalaman sudah disimpan";
      $_SESSION['mType'] = "success";
      echo '<script>window.location = "?r=lamaran/lamar_keahlian";</script>';
    } else {
      // Jika gagal
      $_SESSION['message'] = "Gagal menyimpan data pengalaman: " . mysqli_error(Connect());
      $_SESSION['mType'] = "danger";
      echo '<script>window.location = "?r=lamaran/lamar_pengalaman";</script>';
    }
  }
}




function InsertDataKeahlian($id_lowongan)
{
  $id_lowongan = $_POST['id_lowongan'];
  $keahlian = $_POST['keahlian'];
  $tingkat_keahlian = $_POST['tingkat_keahlian'];

  $_SESSION['id_lowongan'] = $id_lowongan;

  // Query untuk menyimpan data ke tabel tbl_keahlian
  $query_keahlian = "INSERT INTO tbl_keahlian (id_lowongan, keahlian, tingkat_keahlian)
                       VALUES ('$id_lowongan', '$keahlian', '$tingkat_keahlian')";

  $exe_keahlian = mysqli_query(Connect(), $query_keahlian);

  if ($exe_keahlian) {
    // Jika berhasil menyimpan keahlian

    // Dapatkan data dari session FormDataDiri
    $formDataDiri = isset($_SESSION['formDataDiri']) ? $_SESSION['formDataDiri'] : array();

    // Dapatkan nama_lengkap dan jenis_kelamin dari session FormDataDiri
    $nama_lengkap = isset($formDataDiri['nama_lengkap']) ? $formDataDiri['nama_lengkap'] : '';
    $jenis_kelamin = isset($formDataDiri['jenis_kelamin']) ? $formDataDiri['jenis_kelamin'] : '';

    // Dapatkan bidang dan nama_perus dari tbl_lowongan berdasarkan id_lowongan dari session
    $id_lowongan = isset($_SESSION['id_lowongan']) ? $_SESSION['id_lowongan'] : '';
    $query_get_data_lowongan = "SELECT bidang, nama_perus FROM tbl_lowongan WHERE id_lowongan = '$id_lowongan'";
    $result_get_data_lowongan = mysqli_query(Connect(), $query_get_data_lowongan);

    if ($result_get_data_lowongan && mysqli_num_rows($result_get_data_lowongan) > 0) {
      $row_data_lowongan = mysqli_fetch_assoc($result_get_data_lowongan);
      $bidang = $row_data_lowongan['bidang'];
      $nama_perus = $row_data_lowongan['nama_perus'];

      $status = 1;
      $id_pengguna = isset($_SESSION['id']) ? $_SESSION['id'] : '';
      // Tambahkan data ke tbl_pendaftaran
      $query_pendaftaran = "INSERT INTO tbl_pendaftaran (id_lowongan, nama_lengkap, bidang, nama_perus, status, jenis_kelamin, id_pengguna)
      VALUES ('$id_lowongan', '$nama_lengkap','$bidang','$nama_perus','$status','$jenis_kelamin', '$id_pengguna')";
    } else {
      // Handle jika query untuk mendapatkan data tbl_lowongan gagal atau tidak mengembalikan hasil
      $_SESSION['message'] = "Gagal mendapatkan data tbl_lowongan: " . mysqli_error(Connect());
      $_SESSION['mType'] = "danger";
      echo '<script>window.location = "?r=lamaran/lamar_keahlian";</script>';
    }

    $exe_pendaftaran = mysqli_query(Connect(), $query_pendaftaran);

    if ($exe_pendaftaran) {
      // Jika berhasil menyimpan data pendaftaran
      $_SESSION['message'] = "Data pendaftaran sudah disimpan";
      $_SESSION['mType'] = "success";
      echo '<script>window.location = "?r=lamaran/lamar_keahlian";</script>';
    } else {
      // Jika gagal menyimpan data pendaftaran
      $_SESSION['message'] = "Data pendaftaran gagal disimpan: " . mysqli_error(Connect());
      $_SESSION['mType'] = "danger";
      echo '<script>window.location = "?r=lamaran/lamar_keahlian";</script>';
    }
  } else {
    // Jika gagal menyimpan data keahlian
    $_SESSION['message'] = "Data keahlian gagal disimpan: " . mysqli_error(Connect());
    $_SESSION['mType'] = "danger";
    echo '<script>window.location = "?r=lamaran/lamar_keahlian";</script>';
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


if (isset($_POST['insert_data_diri'])) {
  InsertDataDiri($_POST['id_lowongan']);
} else if (isset($_POST['insert_data_pendidikan'])) {
  InsertDataPendidikan($_POST['id_lowongan']);
} else if (isset($_POST['insert_data_pengalaman'])) {
  InsertDataPengalaman($_POST['id_lowongan']);
} else if (isset($_POST['insert_data_keahlian'])) {
  InsertDataKeahlian($_POST['id_lowongan']);
}


// if (isset($_POST['insert'])) {
//   Insert();
// } else if (isset($_POST['update'])) {
//   Update($_POST['id_lowongan']);
// } else if (isset($_POST['data'])) {
//   Delete($_POST['id_lowongan']);
// }