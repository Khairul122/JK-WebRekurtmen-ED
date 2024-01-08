<?php


function GetAll()
{
  $query = "SELECT * FROM tbl_pendaftaran";
  $exe = mysqli_query(Connect(), $query);
  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_pendaftaran' => $data['id_pendaftaran'],
      'id_lowongan' => $data['id_lowongan'],
      'nama_lengkap' => $data['nama_lengkap'],
      'jenis_kelamin' => $data['jenis_kelamin'],
      'bidang' => $data['bidang'],
      'nama_perus' => $data['nama_perus'],
      'status' => $data['status'],
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


function Insert()
{
  $nama_perus = $_POST['nama_perus'];
  $bidang = $_POST['bidang'];
  $valid_until = $_POST['valid_until'];
  $persyaratan_khusus = $_POST['persyaratan_khusus'];

  $query = "INSERT INTO `tbl_lowongan` (`nama_perus`, `bidang`, `valid_until`, `persyaratan_khusus`)
              VALUES ('$nama_perus', '$bidang', '$valid_until', '$persyaratan_khusus')";

  $exe = mysqli_query(Connect(), $query);

  if ($exe) {
    // Jika berhasil
    $_SESSION['message'] = "Data sudah disimpan";
    $_SESSION['mType'] = "success";
    echo '
        <script>
            window.location = "?r=produk/index"
        </script>';
  } else {
    // Jika gagal
    $_SESSION['message'] = "Gagal menyimpan data: " . mysqli_error(Connect());
    $_SESSION['mType'] = "danger";
    echo '
        <script>
            window.location = "?r=produk/index"
        </script>';
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
  Insert();
} else if (isset($_POST['update'])) {
  Update($_POST['id_lowongan']);
} else if (isset($_POST['delete'])) {
  Delete($_POST['id_lowongan']);
}
