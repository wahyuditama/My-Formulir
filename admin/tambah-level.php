<?php

session_start();
include 'database/db.php';
$pesan = "";


if (isset($_POST['submit'])) {
    $nama_level = $_POST['nama_level'];

    // select data dari Level lalu input ke table pengguna

    $insert = mysqli_query($conn, "INSERT INTO level (
    nama_level)VALUES ('$nama_level')");

    header("location:level.php?tambah=berhasil");
}

$id  = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM level WHERE id ='$id'");
$rowEdit   = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $nama_level = $_POST['nama_level'];

    $update = mysqli_query($conn, "UPDATE level SET nama_level='$nama_level' WHERE id='$id'");

    header("location:level.php?ubah=berhasil");
}

// Select Data dari level

$queryLevel = mysqli_query($conn, "SELECT * FROM level ORDER BY id DESC");

// data level


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <!-- Custom styles for this template-->
    <?php include 'layout/css.php' ?>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'layout/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'layout/navbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Level </h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <div class="col-md-6">
                            <div class="card" style="width: 38rem;">
                                <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Level /
                                    Akses
                                </div>
                                <?php echo $pesan ?>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Input Level Peserta</label>
                                            <input type="text" class="form-control form-control-user" id=""
                                                aria-describedby="" name="nama_level" placeholder=""
                                                value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_level'] : '' ?>">
                                        </div>

                                        <button type="submit"
                                            name="<?php echo isset($_GET['edit']) ? 'edit' : 'submit' ?>"
                                            class="btn btn-primary btn-user btn-block">
                                            Masukan data Pengguna
                                        </button>
                                        <hr>

                                    </form>
                                </div>
                            </div>

                        </div>

                        <!-- Content Row -->

                        <div class="row">


                        </div>

                        <!-- Content Row -->
                        <div class="row">



                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <!-- End of Footer -->

            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <!-- Bootstrap core JavaScript-->
        <!-- Core plugin JavaScript-->
        <!-- Custom scripts for all pages-->
        <!-- Page level plugins -->
        <!-- Page level custom scripts -->
        <?php include 'layout/js.php' ?>

</body>

</html>