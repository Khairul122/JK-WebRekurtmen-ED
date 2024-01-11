<?php


function GetAll()
{
  $query = "SELECT * FROM tbl_lowongan";
  $exe = mysqli_query(Connect(), $query);
  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_lowongan' => $data['id_lowongan'],
      'nama_perus' => $data['nama_perus'],
      'bidang' => $data['bidang'],
      'kuota' => $data['kuota'],
      'valid_until' => $data['valid_until'],
      'persyaratan_khusus' => $data['persyaratan_khusus'],
    );
  }
  return $datas;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RS PIM </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo3.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NewBiz - v2.2.0
  * Template URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="float-left">
        <!-- Uncomment below if you prefer to use an text logo -->
        <!-- <h1><a href="index.html">NewBiz</a></h1> -->
        <img src="assets/img/logo4.jpg" style="height: 50px; ">
        <img src="assets/img/logo5.png" style="height: 50px; padding-left: 20px;">


      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li><a href="index.php">Beranda</a></li>
          <li><a href="masuk.php" style="background-color: dodgerblue; color: white;">Masuk</a></li>
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->

  <main id="main">
    <!-- ======= Intro Section ======= -->
    <section id="intro" class="clearfix">
      <div class="container" data-aos="fade-up">

        <div class="intro-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/intro-img.svg" alt="" class="img-fluid">

        </div>

        <div class="intro-info" data-aos="zoom-in" data-aos-delay="100">
          <h2 class="text-warning">RECRUTMEN PEGAWAI RS PRIMA INTI MEDIKA</h2>
          <div>
            <a href="daftar.php" class="btn-get-started scrollto">Daftar</a>
            <a href="#about" class="btn-services scrollto">Selengkapnya >></a>
          </div>
        </div>

      </div>
    </section><!-- End Intro Section -->
    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="font-weight-bold text-warning">Rekrutmen Pegawai</h3>
        </header>

        <div class="row about-container justify-content-center pt-2">
          <h4 class="text-center">Kami adalah rumah sakit yang berkomitmen untuk menyediakan pelayanan kesehatan berkualitas dan perawatan yang holistik bagi pasien kami. Dengan tim medis yang berpengalaman dan fasilitas modern, kami berupaya memberikan layanan terbaik untuk memenuhi kebutuhan kesehatan Anda.
            Di Rumah Sakit Prima Inti Medika, kami menyediakan berbagai layanan medis yang komprehensif. Mulai dari pelayanan rawat jalan, perawatan rawat inap, hingga layanan gawat darurat, kami siap memberikan perawatan yang tepat dan responsif sesuai dengan kebutuhan Anda</h4>
        </div>
      </div>
    </section><!-- End About Section -->

    <div class="container" data-aos="fade-up" style="padding-top: 100px;">
      <div class='table-responsive'>
        <table class='table table-bordered table'>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Perusahaan</th>
              <th>Bidang</th>
              <th>Kuota</th>
              <th>Valid Until</th>
              <th>Persyaratan Khusus</th>
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
                echo "<td>" . $data['nama_perus'] . "</td>";
                echo "<td>" . $data['bidang'] . "</td>";
                echo "<td>" . $data['kuota'] . "</td>";
                echo "<td>" . date('d F Y', strtotime($data['valid_until'])) . "</td>";
                echo "<td>";
                $persyaratanKhusus = explode("\n", $data['persyaratan_khusus']);
                foreach ($persyaratanKhusus as $index => $persyaratan) {
                  echo ($index + 1) . ". " . trim($persyaratan) . "<br>";
                }
                echo "</tr>";
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="justify-content-center text-center pt-4 " data-aos="fade-up">
      <a href="masuk.php" class="btn btn-primary btn-lg" style="width: 300px;">Apply</a>
    </div>




    <section class="inner-page" style="padding-top: 100px;">
      <div class="container">
        <div class="justify-content-center  pt-4" data-aos="fade-up" style="padding-top: 1000px; padding-bottom: 80px">
          <div class="text-center">
            <h3 class="font-weight-bold text-warning">Butuh Bantuan?</h3>
            <p class="text-warning">Silahkan hubungi petugas kami yang siap melayani anda jika ada pertanyaan, masalah, atau informasi</p>
            <h4 class="text-warning">(022) 7952203</h4>
          </div>
        </div>
    </section>