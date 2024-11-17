<?php

session_start();
include 'database/db.php';
$pesan = "";

if (isset($_POST['submit'])) {
    $id_gelombang = $_POST['id_gelombang'];
    $id_jurusan = $_POST['id_jurusan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $no_telepon = $_POST['no_telepon'];
    $aktivitas = $_POST['aktivitas'];
    // select data dari jurusan lalu input ke table peserta pelatihan
    $result = mysqli_query($conn, "SELECT nama_jurusan FROM jurusan WHERE id = '$id_jurusan'");
    $rowJurusan = mysqli_fetch_assoc($result);
    $nama_jurusan = $rowJurusan['nama_jurusan'];

    $kejuruan = $rowJurusan['nama_jurusan'];
    // select data dari gelombang lalu input ke table peserta pelatihan
    $data = mysqli_query($conn, "SELECT nama_gelombang FROM gelombang WHERE id = '$id_gelombang'");
    $rowGelombang = mysqli_fetch_assoc($data);
    $nama_gelombang = $rowGelombang['nama_gelombang'];

    $input_gelombang = $rowGelombang['nama_gelombang'];


    if (!empty($_FILES['kartu_keluarga']['name'])) {
        $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
        $ukuran_foto = $_FILES['kartu_keluarga']['size'];


        $ext = array('png', 'jpg', 'jpeg', 'pdf');
        $extKartu = pathinfo($kartu_keluarga, PATHINFO_EXTENSION);

        if (!in_array($extKartu, $ext)) {
            echo "Ext tidak ditemukan";
            die;
        } else {

            move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'], 'upload/' . $kartu_keluarga);
            $insert = mysqli_query($conn, "INSERT INTO peserta_pelatihan (
                id_jurusan, 
                id_gelombang, 
                nama_gelombang, 
                nama_lengkap,
                nik,
                jenis_kelamin,
                tempat_lahir,
                tanggal_lahir,
                pendidikan_terakhir,
                nama_sekolah,
                kejuruan,
                no_telepon,
                kartu_keluarga,
                aktivitas)
            VALUES (
                '$id_jurusan',
                '$id_gelombang',
                '$input_gelombang',
                '$nama_lengkap',
                '$nik',
                '$jenis_kelamin',
                '$tempat_lahir',
                '$tanggal_lahir',
                '$pendidikan_terakhir',
                '$nama_sekolah',
                '$kejuruan',
                '$no_telepon',
                '$kartu_keluarga',
                '$aktivitas'
            )");
        }
    } else {
        $insert = mysqli_query($conn, "INSERT INTO peserta_pelatihan (
            id_gelombang,
            id_jurusan,
            nama_gelombang,
            nama_lengkap,
            nik,
            jenis_kelamin,
            tempat_lahir,
            tanggal_lahir,
            pendidikan_terakhir,
            nama_sekolah,
            kejuruan,
            no_telepon,
            aktivitas)
            VALUES (
            '$id_gelombang',
            '$id_jurusan',
            '$input_gelombang',
            '$nama_lengkap',
            '$nik',
            '$jenis_kelamin',
            '$tempat_lahir',
            '$tanggal_lahir',
            '$pendidikan_terakhir',
            '$nama_sekolah',
            '$kejuruan',
            '$no_telepon',
            '$aktivitas'
            )");

        if (!$insert) {
            echo "Error: " . mysqli_error($conn);
            die;
        }
    }
    header('location:admin/pendaftaran.php');
}
// Select Data dari Gelombang

$queryGelombang = mysqli_query($conn, "SELECT * FROM gelombang ORDER BY id DESC");

// Select data Dari Jurusan
$queryJurusan = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id DESC");

// Konten Profile
$queryProfile = mysqli_query($conn, "SELECT * FROM  user ");
$rowProfile = mysqli_fetch_assoc($queryProfile);

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
                            <div class="card mx-auto" style="width: 48rem;">
                                <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> peserta Pelatihan</div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <!-- Kolom Pertama -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Gelombang</label>
                                                    <select data-mdb-select-init name="id_gelombang" class="form-control">
                                                        <!-- Options -->
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama Jurusan</label>
                                                    <select data-mdb-select-init name="id_gelombang" class="form-control">
                                                        <!-- Options -->
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <input type="text" id="form3Examplev2" class="form-control form-control-lg" name="nama_lengkap" />
                                                        <label class="form-label" for="form3Examplev2">Nama Lengkap</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <input type="text" id="form3Examplev3" class="form-control" name="nik" />
                                                        <label class="form-label" for="form3Examplev3">NIK</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <select data-mdb-select-init class="form-control" name="jenis_kelamin">
                                                        <option value="">Jenis Kelamin</option>
                                                        <option value="laki-laki">Laki-laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                    <label class="pt-2" for="form3Examplev3">Pilih Jenis Kelamin</label>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <input type="file" id="form3Examplev3" class="form-control" name="kartu_keluarga" />
                                                        <label for="form3Examplev3">Kartu Keluarga</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Kolom Kedua -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev5">Nomor Telepon</label>
                                                        <input type="text" id="form3Examplev5" class="form-control" name="no_telepon" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev5">Email</label>
                                                        <input type="email" id="form3Examplev5" class="form-control" name="email" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev5">Aktivitas Hari Ini</label>
                                                        <input type="text" id="form3Examplev5" class="form-control" name="aktivitas" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev5">Tempat Lahir</label>
                                                        <input type="text" id="form3Examplev5" class="form-control" name="tempat_lahir" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev2">Nama Sekolah</label>
                                                        <input type="text" id="form3Examplev2" class="form-control form-control-lg" name="nama_sekolah" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div data-mdb-input-init class="form-outline">
                                                        <label class="form-label" for="form3Examplev3">Pendidikan Terakhir</label>
                                                        <input type="text" id="form3Examplev3" class="form-control" name="pendidikan_terakhir" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3" name="submit">Daftar Disini</button>
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