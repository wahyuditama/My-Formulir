<?php

session_start();
include 'database/db.php';
$pesan = "";


// Data peserta pelatiahan

$queryPeserta = mysqli_query($conn, "SELECT * FROM peserta_pelatihan");
$rowPeserta = mysqli_fetch_assoc($queryPeserta);
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
                        <h1 class="h3 mb-0 text-gray-800"> Detail Data Peserta</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <div class="card mx-auto" style="width: 52rem;">
                                <div class="card-header bg-secondary text-light"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> peserta Pelatihan</div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <!-- Kolom Pertama -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Gelombang</label>
                                                    <input type="text" class="form-control" value="<?php echo $rowPeserta['nama_gelombang'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama Jurusan</label>
                                                    <input type="text" class="form-control" value="<?php echo $rowPeserta['kejuruan'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="form3Examplev2">Nama Lengkap</label>
                                                    <div data-mdb-input-init class="form-outline">
                                                        <input type="text" id="form3Examplev2" class="form-control form-control-lg text-white" name="nama_lengkap" placeholder="<?php echo $rowPeserta['nama_lengkap'] ?>" values="" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev3">NIK</label>
                                                        <input type="text" id="form3Examplev3" class="form-control" name="nik" placeholder="<?php echo $rowPeserta['nik'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="pt-2" for="form3Examplev3">Pilih Jenis Kelamin</label>
                                                    <input type="text" class="form-control" value="<?php echo $rowPeserta['jenis_kelamin'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label for="form3Examplev3">Kartu Keluarga</label><br>
                                                        <img width="100" src="upload/<?php echo $rowPeserta['kartu_keluarga'] ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Kolom Kedua -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev5">Nomor Telepon</label>
                                                        <input type="text" id="form3Examplev5" class="form-control" name="no_telepon" value="<?php echo $rowPeserta['no_telepon'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev5">Email</label>
                                                        <input type="text" id="form3Examplev5" class="form-control" name="email" value="<?php echo $rowPeserta['email'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev5">Aktivitas Hari Ini</label>
                                                        <input type="text" id="form3Examplev5" class="form-control" name="aktivitas" value="<?php echo $rowPeserta['aktivitas'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev5">Tempat Lahir</label>
                                                        <input type="text" id="form3Examplev5" class="form-control" name="tempat_lahir" value="<?php echo $rowPeserta['tempat_lahir'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev2">Nama Sekolah</label>
                                                        <input type="text" id="form3Examplev2" class="form-control" name="nama_sekolah" value="<?php echo $rowPeserta['nama_sekolah'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev3">Pendidikan Terakhir</label>
                                                        <input type="text" id="form3Examplev3" class="form-control" name="pendidikan_terakhir" value="<?php echo $rowPeserta['pendidikan_terakhir'] ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="data-peserta-pelatihan.php" type="submit" class="btn btn-primary mt-3" name="submit">Kembali</a>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!--  -->


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