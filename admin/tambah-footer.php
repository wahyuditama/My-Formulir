<?php
session_start();
include 'database/db.php';

// Jika button simpan di klik

if (isset($_POST['simpan'])) {
    $deskripsi = $_POST['deskripsi'];
    $twitter = $_POST['twitter'];
    $telepon = $_POST['telepon'];
    $ig = $_POST['ig'];
    $fb = $_POST['fb'];
    $linkedin = $_POST['linkedin'];

    $insert = mysqli_query($conn, "INSERT INTO footer (deskripsi, twitter, telepon, ig, fb, linkedin) 
    VALUES ('$deskripsi', '$twitter', '$telepon', '$ig', '$fb', '$linkedin')");

    header("location:footer.php?ubah=berhasil");
}



// jika button edit di klik
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEditFooter = mysqli_query($conn, "SELECT * FROM footer WHERE id ='$id'");
$rowEditFooter = mysqli_fetch_assoc($queryEditFooter);

// Jika Button Edit Simpan Di klik
if (isset($_POST['edit'])) {
    $deskripsi = $_POST['deskripsi'];
    $twitter = $_POST['twitter'];
    $telepon = $_POST['telepon'];
    $ig = $_POST['ig'];
    $fb = $_POST['fb'];
    $linkedin = $_POST['linkedin'];

    // jika user ingin memasukkan gambar

    // Perbarui data
    $update = mysqli_query($conn, "UPDATE footer SET 
    deskripsi = '$deskripsi', 
    twitter = '$twitter', 
    telepon = '$telepon', 
    ig = '$ig', 
    linkedin = '$linkedin' ");
    header("location:footer.php?ubah=berhasil");
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Tambah Footer</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <div class="row">
                            <div class="card" style="width: 58rem;">
                                <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Footer</div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <!-- Left Column (col-6) -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="deskripsi">Masukan Deskripsi</label>
                                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditFooter['deskripsi'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sosmed">Sosial Media Twitter</label>
                                                    <input type="url" class="form-control" id="" name="twitter"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditFooter['twitter'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi_profesi">Tulis Nomor telepon</label>
                                                    <input type="number" class="form-control" id="" name="telepon"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditFooter['telepon'] : '' ?>">
                                                </div>

                                            </div>

                                            <!-- Right Column (col-6) -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="sosmed">Sosial Media Instagram</label>
                                                    <input type="text" class="form-control" id="" name="ig"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditFooter['ig'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sosmed">Sosial Media Facebook</label>
                                                    <input type="text" class="form-control" id="" name="fb"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditFooter['fb'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sosmed">Sosial Media Linkedin</label>
                                                    <input type="text" class="form-control" id="" name="linkedin"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditFooter['linkedin'] : '' ?>">
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" class="btn btn-primary btn-user btn-block">
                                            Masukan disini
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