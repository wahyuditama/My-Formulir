<?php

session_start();
include 'database/db.php';
$pesan = "";

if (isset($_POST['submit'])) {
    $gelombang = $_POST['gelombang'];
    $status = $_POST['status'];

    $query = mysqli_query($conn, "INSERT INTO gelombang (nama_gelombang,status) VALUES ('$gelombang','$status')");

    header('location:gelombang.php');
}

// Edit Section
// Ambil Data dari parameter
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM gelombang WHERE id ='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

// input data edit
if (isset($_POST['edit'])) {
    $gelombang = $_POST['gelombang'];
    $status = $_POST['status'];
    $update = mysqli_query($conn, "UPDATE gelombang SET nama_gelombang='$gelombang', status='$status' WHERE id='$id'");

    if (!$update) {
        echo "Data Gagal Edit ";
        die;
    } else {
        header('Location: gelombang.php');
        exit;
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
                        <h1 class="h3 mb-0 text-gray-800"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Data Gelombang pendaftaran </h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <div class="col-md-6">
                            <div class="card" style="width: 38rem;">
                                <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> </div>
                                <?php echo $pesan ?>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="">Input Gelombang</label>
                                            <select data-mdb-select-init name="gelombang" class="form-control">
                                                <option value="Gelombang 1" <?php echo (isset($_GET['edit']) && $rowEdit['nama_gelombang'] == 'Gelombang 1') ? 'selected' : '' ?>>Gelombang 1</option>
                                                <option value="Gelombang 2" <?php echo (isset($_GET['edit']) && $rowEdit['nama_gelombang'] == 'Gelombang 2') ? 'selected' : '' ?>>Gelombang 2</option>
                                                <option value="Gelombang 3" <?php echo (isset($_GET['edit']) && $rowEdit['nama_gelombang'] == 'Gelombang 3') ? 'selected' : '' ?>>Gelombang 3</option>
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="">Input Satus</label>
                                            <select data-mdb-select-init name="status" class="form-control">
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>

                                        <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'submit' ?>" class="btn btn-primary btn-user btn-block">
                                            Masukan data
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