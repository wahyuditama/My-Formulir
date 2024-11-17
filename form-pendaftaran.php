<?php
session_start();
include 'admin/database/db.php';

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

            move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'], 'admin/upload/' . $kartu_keluarga);
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
                '$email',
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
            email,
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
            '$email',
            '$aktivitas'
            )");

        if (!$insert) {
            echo "Error: " . mysqli_error($conn);
            die;
        }
    }
    echo "<script type='text/javascript'>alert('Berhasil mendaftar');</script>";
}
// Select Data dari Gelombang

$queryGelombang = mysqli_query($conn, "SELECT * FROM gelombang ORDER BY id DESC");

// Select data Dari Jurusan
$queryJurusan = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id DESC");

// Konten Profile
$queryProfile = mysqli_query($conn, "SELECT * FROM  user ");
$rowProfile = mysqli_fetch_assoc($queryProfile);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background-color: darkgray;">
    <div class="container">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-semibold">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login.php">Logn Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end-navbar -->
        <div class="row pt-4">
            <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-body mx-auto mt-3">
                        <img src="landing_page/assets/img/images.png" class="img-fluid " style="width:9.2rem; height:auto;">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row mx-auto">
                    <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="background-color:#9da1a8;">
                        <div class="card-header py-4">
                            <h4 class=" mt-2 text-center fw-bold">SELAMAT DATANG DI PENDAFTARAN PPKD JAKPUS</h4>
                            <p class="text-center fw-semibold" style="font-size:1.02rem;">Pusat Pelatihan Kerja Daerah Jakarta Pusat (Bendungan Hilir)</p>
                            <p class="text-center ">Alamat: Jl. Karet Pasar Baru Barat, Karet Tengsin, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10250</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section-formulir -->
        <div class="row mt-3">
            <div class="col-md-4">
                <h1></h1>
            </div>
            <!-- isi-form -->
            <div class="col-md-8 mb-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-outline">
                                <label for="" class="my-3">Nama Gelombang</label>
                                <select data-mdb-select-init name="id_gelombang" class="form-control">
                                    <option value="">Pilih Gelombang</option>
                                    <?php while ($rowGelombang = mysqli_fetch_assoc($queryGelombang)) { ?>
                                        <option value="<?php echo $rowGelombang['id'] ?>"><?php echo $rowGelombang['nama_gelombang'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <input type="text" id="form3Examplev2" class="form-control " name="nama_lengkap" />
                                <label class="form-label" for="form3Examplev2">Nama Lengkap</label>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form3Examplev3" class="form-control " name="nik" />
                                    <label class="form-label" for="form3Examplev3">Nik</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <div data-mdb-input-init class="form-outline">
                                    <select data-mdb-select-init class="form-control" name="jenis_kelamin">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="laki-laki">Laki Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                    <label class="pt-2" for="form3Examplev3">Pilih Jenis Kelamin</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <div class="form-outline">
                                    <input type="file" id="form3Examplev3" class="form-control" name="kartu_keluarga" />
                                    <label class="" for="form3Examplev3">Kartu Keluarga</label>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-body">
                                <div class="form-outline">
                                    <input type="text" id="form3Examplev5" class="form-control" name="tempat_lahir" />
                                    <label class="form-label" for="form3Examplev5">tempat lahir</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="date" id="form3Examplev5" class="form-control" name="tanggal_lahir" />
                                    <label class="form-label" for="form3Examplev5">tanggal lahir</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form3Examplev2" class="form-control form-control-lg" name="nama_sekolah" />
                                    <label class="form-label" for="form3Examplev2">Nama Sekolah</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form3Examplev3" class="form-control " name="pendidikan_terakhir" />
                                    <label class="form-label" for="form3Examplev3">Pendidikan Terakhir</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form3Examplev5" class="form-control" name="no_telepon" />
                                    <label class="form-label" for="form3Examplev5">Nomor_Telepon</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="email" id="form3Examplev5" class="form-control" name="email" />
                                    <label class="form-label" for="form3Examplev5">Email</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form3Examplev5" class="form-control" name="aktivitas" />
                                    <label class="form-label" for="form3Examplev5">Aktivitas Hari Ini</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <div data-mdb-input-init class="form-outline">
                                    <label for="" class="mb-3">Pilih Kejuruan</label>
                                    <select data-mdb-select-init name="id_jurusan" class="form-control">
                                        <option value="">Pilih Kejuruan </option>
                                        <?php while ($rowJurusan = mysqli_fetch_assoc($queryJurusan)) { ?>
                                            <option value="<?php echo $rowJurusan['id'] ?>"><?php echo $rowJurusan['nama_jurusan'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="form-outline">
                                <button type="submit" class="btn btn-primary form-control" name="submit">Daftar Disini</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>


            <!--  -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>