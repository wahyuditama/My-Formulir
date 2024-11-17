<?php
session_start();
include 'database/db.php';

if (isset($_POST['simpan'])) {
    $header     = $_POST['header'];
    $sub_judul  = $_POST['sub_judul'];

    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];


        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);

        if (!in_array($extFoto, $ext)) {
            echo "Ext tidak ditemukan";
            die;
        } else {

            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);

            $insert = mysqli_query($conn, "INSERT INTO home (header, sub_judul,  foto)
            VALUES ('$header','$sub_judul','$nama_foto')");
        }
    } else {
        $insert = mysqli_query($conn, "INSERT INTO home (header, sub_judul)
            VALUES ('$header','$sub_judul')");
    }

    header("location:home.php?tambah=berhasil");
}

$id  = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM home WHERE id ='$id'");
$rowEdit   = mysqli_fetch_assoc($queryEdit);


// jika button edit di klik

if (isset($_POST['edit'])) {
    $header   = $_POST['header'];
    $sub_judul  = $_POST['sub_judul'];

    // jika user ingin memasukkan gambar
    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];

        // png, jpg, jpeg
        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);

        if (!in_array($extFoto, $ext)) {
            echo "Extensi gambar tidak ditemukan";
            die;
        } else {
            unlink('upload/' . $rowEdit['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);
            // coding ubah/update disini
            $update = mysqli_query($conn, "UPDATE home SET header='$header', 
            sub_judul='$sub_judul', foto='$nama_foto' WHERE id='$id'");
        }
    } else {
        // kalo user tidak ingin memasukkan gambar
        $update = mysqli_query($conn, "UPDATE home SET header='$header', 
            sub_judul='$sub_judul' WHERE id='$id'");
    }

    header("location:home.php?ubah=berhasil");
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Home</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <div class="col-md-8">
                            <div class="card" style="width: 48rem;">
                                <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?>Home</div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="header">masukan Nama Header anda Disini</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="" aria-describedby="" name="header"
                                                placeholder="" value="<?php echo isset($_GET['edit']) ? $rowEdit['header'] : '' ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Masukan Sub Judul anda</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="" aria-describedby="" name="sub_judul"
                                                placeholder="" value="<?php echo isset($_GET['edit']) ? $rowEdit['sub_judul'] : '' ?>">
                                        </div>
                                        <div class="form-group">

                                            <div class="form-group">
                                                <label for=""> Masukan foto anda disini</label><br>
                                                <input type="file" class="" name="foto"
                                                    id="e" placeholder="" value="<?php echo isset($_GET['edit']) ? $rowEdit['foto'] : '' ?>">
                                            </div>
                                        </div>
                                        <button href="" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" class="btn btn-primary btn-user btn-block">
                                            Masukan data disini
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