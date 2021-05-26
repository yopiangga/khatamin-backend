<?php 
    include './../../config/conn.php';

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $url = $_POST['url'];
        $author = $_POST['author'];
        $created = time();

        $fileName = $_FILES['image']['name'];
        $fileName = time().$fileName;
        $tmpName = $_FILES['image']['tmp_name'];
        $path = "./../../img/artikel/";
        $filePath = $path . $fileName;
        $result = move_uploaded_file($tmpName, $filePath);

        if ($result) {
        
            $sql = "INSERT INTO artikel (title, description, img, url, author, created) 
            VALUE ('$title', '$description', '$fileName', '$url', '$author', '$created')";
    
            $query = mysqli_query($conn, $sql);
            if($query){
                header('Location: ./read-article.php');
            } else {
                echo "gagal submit";
                echo mysqli_error($conn);
            }
    
            exit;
        } else {
            echo "Gagal Upload";
        }
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Khatamin - Tambah Artikel</title>

    <link href="./../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="./../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Khatamin <sup></sup></div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="./../dashboard/dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Artikel
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="./../artikel/create-article.php">
                    <i class="fas fa-plus-square"></i>
                    <span>Tambah Artikel</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./../artikel/read-article.php">
                    <i class="fas fa-newspaper"></i>
                    <span>Semua Artikel</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Infaq
            </div>

            <li class="nav-item">
                <a class="nav-link" href="./../infaq/read-infaq.php">
                    <i class="fas fa-money-check-alt"></i>
                    <span>Semua Infaq</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./../infaq/konfirmasi-infaq.php">
                    <i class="fas fa-tasks"></i>
                    <span>Konfirmasi Infaq</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./../infaq/create-pengeluaran-infaq.php">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>Tambah Pengeluaran Dana</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Kegiatan
            </div>

            <li class="nav-item">
                <a class="nav-link" href="./../kegiatan/create-kegiatan.php">
                    <i class="fas fa-plus-square"></i>
                    <span>Tambah Kegiatan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./../kegiatan/read-kegiatan.php">
                    <i class="fas fa-table"></i>
                    <span>Semua Kegiatan</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Yopiangga</span>
                                <img class="img-profile rounded-circle" src="./../../img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./../auth/logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Artikel</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label>Judul Artikel</label>
                                  <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                  <label>Deskripsi</label>
                                  <textarea type="text" class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                  <label>Gambar</label>
                                  <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                  <label>URL</label>
                                  <input type="text" class="form-control" name="url">
                                </div>
                                <div class="form-group">
                                  <label>Author</label>
                                  <input type="text" class="form-control" name="author">
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Tambah Artikel</button>
                              </form>
                        </div>                        
                    </div>


                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Khatamin Admin 2021</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="./../../vendor/jquery/jquery.min.js"></script>
    <script src="./../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="./../../js/sb-admin-2.min.js"></script>
</body>

</html>