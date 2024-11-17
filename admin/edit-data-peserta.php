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
    $email = $_POST['email'];
    $aktivitas = $_POST['aktivitas'];

    // select data dari jurusan lalu input ke table peserta pelatihan
    $result = mysqli_query($conn, "SELECT nama_jurusan FROM jurusan WHERE id = '$id_jurusan'");
    $rowJurusan = mysqli_fetch_assoc($result);
    $nama_jurusan = $rowJurusan['nama_jurusan'];

    $kejuruan = $rowJurusan['nama_jurusan'];
    //select data dari gelombang lalu input ke table peserta pelatihan
    $data = mysqli_query($conn, "SELECT nama_gelombang FROM gelombang WHERE id = '$id_gelombang'");
    $rowGelombang = mysqli_fetch_assoc($data);
    $nama_gelombang = $rowGelombang['nama_gelombang'];

    $input_gelombang = $rowGelombang['nama_gelombang'];


    if (!empty($_FILES['kartu_keluarga']['name'])) {
        $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
        $ukuran_kartu_keluarga = $_FILES['kartu_keluarga']['size'];

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
                email,
                kartu_keluarga,
                aktivitas
            ) VALUES (
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
                '$email',
                " . ($kartu_keluarga ? "'$kartu_keluarga'" : "NULL") . ",
                '$aktivitas'
            )");
        }
    } else {
        // Gunakan satu query INSERT dengan semua kolom dan nilai yang seragam
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
        email,
        kartu_keluarga,
        aktivitas
    ) VALUES (
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
        '$email',
        " . ($kartu_keluarga ? "'$kartu_keluarga'" : "NULL") . ",
        '$aktivitas'
    )");
    }

    if (!$insert) {
        echo "Error: " . mysqli_error($conn);
        die;
    }
    header('location:data-peserta-pelatihan.php');
}


//Edit Data peserta pelatiahan
$id  = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM peserta_pelatihan WHERE id ='$id'");
$rowEdit   = mysqli_fetch_assoc($queryEdit);


// jika button edit di klik


if (isset($_POST['edit'])) {
    $id_jurusan = $_POST['id_jurusan'];
    $id_gelombang = $_POST['id_gelombang'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $aktivitas = $_POST['aktivitas'];

    // Jurusan
    $resultJurusan = mysqli_query($conn, "SELECT nama_jurusan FROM jurusan WHERE id = '$id_jurusan'");
    $rowJurusan = mysqli_fetch_assoc($resultJurusan);
    $kejuruan = $rowJurusan['nama_jurusan'];

    // Gelombang
    $resultGelombang = mysqli_query($conn, "SELECT nama_gelombang FROM gelombang WHERE id = '$id_gelombang'");
    $rowGelombang = mysqli_fetch_assoc($resultGelombang);
    $nama_gelombang = $rowGelombang['nama_gelombang'];

    // Jika user ingin mengubah kartu keluarga
    if (!empty($_FILES['kartu_keluarga']['name'])) {
        $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
        $ext = array('png', 'jpg', 'jpeg', 'pdf');
        $extFile = pathinfo($kartu_keluarga, PATHINFO_EXTENSION);

        if (!in_array($extFile, $ext)) {
            echo "Extensi file tidak valid";
            die;
        } else {
            // Hapus file lama
            if (!empty($rowEdit['kartu_keluarga'])) {
                unlink('upload/' . $rowEdit['kartu_keluarga']);
            }

            // Pindahkan file baru
            move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'], 'upload/' . $kartu_keluarga);

            // Query untuk mengupdate dengan kartu keluarga baru
            $update = mysqli_query($conn, "UPDATE peserta_pelatihan SET
                id_jurusan = '$id_jurusan',
                id_gelombang = '$id_gelombang',
                nama_gelombang = '$nama_gelombang', 
                nama_lengkap = '$nama_lengkap',
                nik = '$nik',
                jenis_kelamin = '$jenis_kelamin',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                pendidikan_terakhir = '$pendidikan_terakhir',
                nama_sekolah = '$nama_sekolah',
                kejuruan = '$kejuruan',
                no_telepon = '$no_telepon',
                email = '$email',
                kartu_keluarga = '$kartu_keluarga',
                aktivitas = '$aktivitas'
            WHERE id='$id'");
        }
    } else {
        // Query untuk mengupdate tanpa mengubah kartu keluarga
        $update = mysqli_query($conn, "UPDATE peserta_pelatihan SET
            id_jurusan = '$id_jurusan',
            id_gelombang = '$id_gelombang',
            nama_gelombang = '$nama_gelombang', 
            nama_lengkap = '$nama_lengkap',
            nik = '$nik',
            jenis_kelamin = '$jenis_kelamin',
            tempat_lahir = '$tempat_lahir',
            tanggal_lahir = '$tanggal_lahir',
            pendidikan_terakhir = '$pendidikan_terakhir',
            nama_sekolah = '$nama_sekolah',
            kejuruan = '$kejuruan',
            no_telepon = '$no_telepon',
            email = '$email',
            aktivitas = '$aktivitas'
            WHERE id='$id'");
    }

    if (!$update) {
        echo "Error: " . mysqli_error($conn);
        die;
    }
    header("location:data-peserta-pelatihan.php?ubah=berhasil");
}



// select dari tabel jurusan
$queryJurusan = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id DESC");

//select data dari table gelombang

$queryGelombang = mysqli_query($conn, "SELECT * FROM gelombang ORDER BY id DESC");
//select data dari tabel peserta pelatihan
$queryPeserta = mysqli_query($conn, "SELECT * FROM peserta_pelatihan ");
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
                        <h1 class="h3 mb-0 text-gray-800"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Data Peserta</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <div class="card mx-auto" style="width: 52rem;">
                                <div class="card-header bg-secondary text-light"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> peserta Pelatihan</div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        <div class="row">
                                            <!-- Kolom Pertama -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_gelombang">Nama Gelombang</label>
                                                    <select name="id_gelombang" class="form-control" required>
                                                        <option value="">Pilih Gelombang</option>
                                                        <?php while ($rowGelombang = mysqli_fetch_assoc($queryGelombang)): ?>
                                                            <option value="<?php echo htmlspecialchars($rowGelombang['id']); ?>"
                                                                <?php echo (isset($rowEdit) && $rowEdit['id_gelombang'] == $rowGelombang['id']) ? 'selected' : ''; ?>>
                                                                <?php echo htmlspecialchars($rowGelombang['nama_gelombang']); ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="id_jurusan">Kejuruan</label>
                                                    <select name="id_jurusan" class="form-control" required>
                                                        <option value="">Pilih Kejuruan</option>
                                                        <?php while ($rowJurusan = mysqli_fetch_assoc($queryJurusan)): ?>
                                                            <option value="<?php echo htmlspecialchars($rowJurusan['id']); ?>"
                                                                <?php echo (isset($rowEdit) && $rowEdit['id_jurusan'] == $rowJurusan['id']) ? 'selected' : ''; ?>>
                                                                <?php echo htmlspecialchars($rowJurusan['nama_jurusan']); ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" class="form-control" required
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_lengkap'] : '' ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="nik">NIK</label>
                                                    <input type="text" name="nik" class="form-control" required
                                                        value="<?php echo isset($rowEdit) ? htmlspecialchars($rowEdit['nik']) : ''; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" class="form-control" required>
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="laki-laki" <?php echo (isset($rowEdit) && $rowEdit['jenis_kelamin'] == 'laki-laki') ? 'selected' : ''; ?>>
                                                            Laki-laki
                                                        </option>
                                                        <option value="perempuan" <?php echo (isset($rowEdit) && $rowEdit['jenis_kelamin'] == 'perempuan') ? 'selected' : ''; ?>>
                                                            Perempuan
                                                        </option>
                                                    </select>
                                                </div>

                                                <!-- Tambah field Pendidikan Terakhir -->
                                                <div class="form-group">
                                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                    <select name="pendidikan_terakhir" class="form-control" required>
                                                        <option value="">Pilih Pendidikan Terakhir</option>
                                                        <option value="SD" <?php echo (isset($rowEdit) && $rowEdit['pendidikan_terakhir'] == 'SD') ? 'selected' : ''; ?>>SD</option>
                                                        <option value="SMP" <?php echo (isset($rowEdit) && $rowEdit['pendidikan_terakhir'] == 'SMP') ? 'selected' : ''; ?>>SMP</option>
                                                        <option value="SMA" <?php echo (isset($rowEdit) && $rowEdit['pendidikan_terakhir'] == 'SMA') ? 'selected' : ''; ?>>SMA</option>
                                                        <option value="SMK" <?php echo (isset($rowEdit) && $rowEdit['pendidikan_terakhir'] == 'SMK') ? 'selected' : ''; ?>>SMK</option>
                                                        <option value="D3" <?php echo (isset($rowEdit) && $rowEdit['pendidikan_terakhir'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                                                        <option value="S1" <?php echo (isset($rowEdit) && $rowEdit['pendidikan_terakhir'] == 'S1') ? 'selected' : ''; ?>>S1</option>
                                                        <option value="S2" <?php echo (isset($rowEdit) && $rowEdit['pendidikan_terakhir'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="kartu_keluarga">Kartu Keluarga</label>
                                                    <input type="file" name="kartu_keluarga" class="form-control-file">
                                                    <?php if (isset($rowEdit) && $rowEdit['kartu_keluarga']): ?>
                                                        <div class="mt-2">
                                                            <img src="upload/<?php echo htmlspecialchars($rowEdit['kartu_keluarga']); ?>"
                                                                alt="Kartu Keluarga" class="img-thumbnail" style="max-width: 200px;">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Kolom Kedua -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="no_telepon">Nomor Telepon</label>
                                                    <input type="text" name="no_telepon" class="form-control" required
                                                        value="<?php echo isset($rowEdit) ? htmlspecialchars($rowEdit['no_telepon']) : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">email</label>
                                                    <input type="email" name="email" class="form-control" required
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : ''; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="aktivitas">Aktivitas</label>
                                                    <input type="text" name="aktivitas" class="form-control" required
                                                        value="<?php echo isset($rowEdit) ? htmlspecialchars($rowEdit['aktivitas']) : ''; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir" class="form-control" required
                                                        value="<?php echo isset($rowEdit) ? htmlspecialchars($rowEdit['tempat_lahir']) : ''; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="date" name="tanggal_lahir" class="form-control" required
                                                        value="<?php echo isset($rowEdit) ? htmlspecialchars($rowEdit['tanggal_lahir']) : ''; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_sekolah">Nama Sekolah</label>
                                                    <input type="text" name="nama_sekolah" class="form-control" required
                                                        value="<?php echo isset($rowEdit) ? htmlspecialchars($rowEdit['nama_sekolah']) : ''; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn btn-primary form-control"
                                                name="<?php echo isset($_GET['edit']) ? 'edit' : 'submit'; ?>">
                                                <?php echo isset($_GET['edit']) ? 'Update' : 'Simpan'; ?> Data
                                            </button>
                                        </div>
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