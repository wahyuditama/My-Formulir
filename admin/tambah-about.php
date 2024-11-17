<?php
session_start();
include 'database/db.php';

// Jika button simpan di klik

if (isset($_POST['simpan'])) {
    $deskripsi = $_POST['deskripsi'];
    $profesi = $_POST['profesi'];
    $deskripsi_profesi = $_POST['deskripsi_profesi'];
    $about_header = $_POST['about_header'];
    $header_paragraf = $_POST['header_paragraf'];
    $detail_paragraf = $_POST['detail_paragraf'];
    $kota = $_POST['kota'];
    $umur = (int) $_POST['umur'];
    $email = $_POST['email'];
    $tanggal = $_POST['tanggal'];

    // jika user ingin memasukkan gambar
    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];

        // png, jpg, jpeg
        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);
        // Cek jika file adalah gambar dan upload foto

        if (!in_array($extFoto, $ext)) {
            echo "Ext tidak ditemukan";
            die;
        } else {
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);

            $sql = mysqli_query($conn, "INSERT INTO about (deskripsi, profesi, deskripsi_profesi, about_header,header_paragraf,detail_paragraf, kota, umur, email, tanggal, foto) 
        VALUES ('$deskripsi', '$profesi', '$deskripsi_profesi', '$about_header','$header_paragraf','$detail_paragraf', '$kota', $umur, '$email', '$tanggal', '$nama_foto')");
        }
    } else {
        $sql = mysqli_query($conn, "INSERT INTO about (deskripsi, profesi, deskripsi_profesi, about_header,header_paragraf,detail_paragraf, kota, umur, email, tanggal) 
    VALUES ('$deskripsi', '$profesi', '$deskripsi_profesi', '$about_header','$header_paragraf','$detail_paragraf', '$kota', $umur, '$email', '$tanggal')");
    }
    header("location:about.php?ubah=berhasil");
}


// jika button edit di klik
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEditAbout = mysqli_query($conn, "SELECT * FROM about WHERE id ='$id'");
$rowEditAbout = mysqli_fetch_assoc($queryEditAbout);

// Jika Button Edit Simpan Di klik
if (isset($_POST['edit'])) {
    $deskripsi = $_POST['deskripsi'];
    $profesi = $_POST['profesi'];
    $deskripsi_profesi = $_POST['deskripsi_profesi'];
    $about_header = $_POST['about_header'];
    $header_paragraf = $_POST['header_paragraf'];
    $detail_paragraf = $_POST['detail_paragraf'];
    $kota = $_POST['kota'];
    $umur = (int) $_POST['umur'];
    $email = $_POST['email'];
    $tanggal = $_POST['tanggal'];

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
            unlink('upload/' . $rowEditAbout['foto']); // Hapus foto lama
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);

            $update = mysqli_query($conn, "UPDATE about SET 
            deskripsi = '$deskripsi', 
            profesi = '$profesi', 
            deskripsi_profesi = '$deskripsi_profesi', 
            about_header = '$about_header', 
            header_paragraf = '$header_paragraf', 
            detail_paragraf = '$detail_paragraf', 
            kota = '$kota', 
            umur = '$umur', 
            email = '$email', 
            tanggal = '$tanggal', 
            foto = '$nama_foto' 
            WHERE id = '$id'");
        }
    } else {
        // Perbarui data
        $update = mysqli_query($conn, "UPDATE about SET 
    deskripsi = '$deskripsi', 
    profesi = '$profesi', 
    deskripsi_profesi = '$deskripsi_profesi', 
    header_paragraf = '$header_paragraf',
    detail_paragraf = '$detail_paragraf',
    kota = '$kota', 
    umur = '$umur', 
    email = '$email', 
    tanggal = '$tanggal'
    WHERE id = '$id'");
    }


    header("location:about.php?ubah=berhasil");
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard About</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <div class="row">
                            <div class="card" style="width: 58rem;">
                                <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> About</div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <!-- Left Column (col-6) -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="deskripsi">Masukan Deskripsi</label>
                                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditAbout['deskripsi'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="profesi">Masukan Nama Profesi Anda</label>
                                                    <input type="text" class="form-control" id="profesi" name="profesi"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditAbout['profesi'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi_profesi">Deskripsi Profesi</label>
                                                    <input type="text" class="form-control" id="" name="deskripsi_profesi"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditAbout['deskripsi_profesi'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="about_header">Judul Header</label>
                                                    <input type="text" class="form-control" id="about_header" name="about_header"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditAbout['about_header'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="header_paragraf">Judul Header</label>
                                                    <input type="text" class="form-control" id="header_paragraf" name="header_paragraf"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditAbout['header_paragraf'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="file">foto</label>
                                                    <input type="file" class="form-control" id="foto" name="foto"
                                                        value="">
                                                </div>
                                            </div>

                                            <!-- Right Column (col-6) -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="kota">Kota</label>
                                                    <input type="text" class="form-control" id="kota" name="kota"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditAbout['kota'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="umur">Umur</label>
                                                    <input type="number" class="form-control" id="umur" name="umur"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditAbout['umur'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditAbout['email'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="text" class="form-control" id="tanggal" name="tanggal"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditAbout['tanggal'] : '' ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="detail_paragraf">Paragraf Akhir</label>
                                                    <input type="text" class="form-control" id="detail_paragraf" name="detail_paragraf"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEditAbout['detail_paragraf'] : '' ?>">
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
                        <span>Copyright &copy; Your about_header 2021</span>
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