<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/logo3.png">
    <title>SIMPESA - Masuk</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
<center>
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9" >


                            <div class="col-lg-8"style="background-color: white;">
                                <div class="p-5" >
                                    <div class="text-center">
                                    <img src="assets/img/logo4.jpg" width="40%" height="40%">
                                     <br> <br>
                                    

                                     <?php
                                     session_start();
                                      if(isset($_SESSION['auth_msg'])){
                                          ?>
                                     <span style="color :red;"><?= $_SESSION['auth_msg']; ?></span>
                                     <?php } ?>
                                    </div>
                                    <form  action="proses_login.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                               value="admin@admin.com" placeholder="Enter Email Address..." name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword"value="admin" placeholder="Password" required>
                                        </div>

                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">


                                        <hr>
                                        <a href="daftar.php" class="btn btn-success btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Daftar
                                        </a>

                                    </form>
                                    <hr>


                                </div>
                            </div>


            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>