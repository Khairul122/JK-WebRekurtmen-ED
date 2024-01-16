<?php


function GetAll()
{
  $query = "SELECT * FROM tbl_berita";
  $exe = mysqli_query(Connect(), $query);

  $datas = array(); // Inisialisasi array kosong

  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id' => $data['id'],
      'judul' => $data['judul'],
      'keterangan' => $data['keterangan'],
      'foto' => $data['foto'],
      'tanggal' => $data['tanggal']
    );
  }

  return $datas;
}

function GetOne($id){
  $query = "SELECT * FROM  `tbl_berita` WHERE  `id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'], 
		'judul' => $data['judul'], 
		'keterangan' => $data['keterangan'], 
		'email' => $data['email'], 
		'foto' => $data['foto'], 
    'tanggal' => $data['tanggal'], 
    );
  }
return $datas;
}




function Insert()
{
  $judul = $_POST['judul'];
  $keterangan = $_POST['keterangan'];
  $foto = ''; // Inisialisasi nama file foto
  $tanggal = $_POST['tanggal'];

  // Proses upload foto
  if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $uploadDir = '../assets/img/berita/'; // Sesuaikan dengan direktori upload Anda
    $foto = basename($_FILES['foto']['name']);
    $uploadFile = $uploadDir . $foto;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
      // Foto berhasil diupload
    } else {
      // Gagal mengupload foto
      echo "Upload foto gagal.";
      return;
    }
  }

  $query = "INSERT INTO `tbl_berita` (`id`, `judul`, `keterangan`, `foto`, `tanggal`)
            VALUES (NULL, '$judul', '$keterangan', '$foto', '$tanggal')";

  $exe = mysqli_query(Connect(), $query);

  if ($exe) {
    // Jika berhasil
    $_SESSION['message'] = "Data Berita Sudah Disimpan";
    $_SESSION['mType'] = "success";
    echo '
    <script>
    window.location = "?r=berita/index"
    </script>';
  } else {
    // Jika gagal
    $_SESSION['message'] = "Data Berita Gagal Disimpan";
    $_SESSION['mType'] = "danger";
    echo '
    <script>
    window.location = "?r=berita/index"
    </script>';
  }
}

function Update($id)
{
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    // Memeriksa apakah file foto diunggah
    if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        // Mendapatkan informasi file
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileType = $_FILES['foto']['type'];
        
        // Tentukan direktori penyimpanan file
        $uploadDir = '../assets/img/berita/';
        $uploadedFile = $uploadDir . $fileName;

        // Pindahkan file yang diunggah ke direktori yang ditentukan
        if (move_uploaded_file($fileTmpPath, $uploadedFile)) {
            // Perbarui data dengan nama file baru
            $query = "UPDATE `tbl_berita` SET `judul` = ?, `keterangan` = ?, `foto` = ?, `tanggal` = ? WHERE `id` = ?";
            
            $conn = Connect();
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssi", $judul, $keterangan, $fileName, $tanggal, $id);

            if ($stmt->execute()) {
                $_SESSION['message'] = " Data Sudah diubah ";
                $_SESSION['mType'] = "success ";
                echo '<script>window.location = "?r=berita/index"</script>';
            } else {
                $_SESSION['message'] = " Data Gagal diubah ";
                $_SESSION['mType'] = "danger ";
                echo '<script>window.location = "?r=berita/index"</script>';
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

function Delete($id)
{
  $query = "DELETE FROM `tbl_berita` WHERE `id` = '$id'";
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
  Update($_POST['id']);
} else if (isset($_POST['delete'])) {
  Delete($_POST['id']);
}
