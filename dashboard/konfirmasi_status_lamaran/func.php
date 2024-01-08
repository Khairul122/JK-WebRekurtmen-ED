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


function GetOne($id_pendaftaran)
{
  $query = "SELECT * FROM  `tbl_pendaftaran` WHERE  `id_pendaftaran` =  '$id_pendaftaran'";
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

function Update($id_pendaftaran)
{
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $bidang = $_POST['bidang'];
    $nama_perus = $_POST['nama_perus'];
    $status = $_POST['status'];

    $query = "UPDATE `tbl_pendaftaran` SET 
                `nama_lengkap` = '$nama_lengkap',
                `jenis_kelamin` = '$jenis_kelamin',
                `bidang` = '$bidang',
                `nama_perus` = '$nama_perus',
                `status` = '$status'
                WHERE `id_pendaftaran` = '$id_pendaftaran'";
    $exe = mysqli_query(Connect(), $query);

    if ($exe) {
        // Jika berhasil
        $_SESSION['message'] = "Data sudah diubah";
        $_SESSION['mType'] = "success";
        echo '<script>window.location = "?r=lowongan/index";</script>';
    } else {
        // Jika gagal
        $_SESSION['message'] = "Data gagal diubah: " . mysqli_error(Connect());
        $_SESSION['mType'] = "danger";
        echo '<script>window.location = "?r=lowongan/index";</script>';
    }
}


function Delete($id_pendaftaran)
{
  $query = "DELETE FROM `tbl_pendaftaran` WHERE `id_pendaftaran` = '$id_pendaftaran'";
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
  Update($_POST['id_pendaftaran']);
} else if (isset($_POST['delete'])) {
  Delete($_POST['id_pendaftaran']);
}
