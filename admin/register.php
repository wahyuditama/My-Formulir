<?php
session_start();
include 'database/db.php';

if (isset($_POST['register'])) {
  $id_level = $_POST['id_level'];
  $level = $_POST['nama_level'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  $query = mysqli_query($conn, "INSERT INTO user (id_level, nama_lengkap, email, password) VALUES ('$id_level','$nama_lengkap','$email','$password')");

  if ($query) {
    header("location: ../login.php");
    exit();
  } else {
    header("location: register.php");
    exit();
  }
}

// select level
$queryLevel = mysqli_query($conn, "SELECT * FROM level ORDER BY ID DESC")


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
  .bg-dark {
    background-color: #121212;
  }

  .form-control {
    background-color: #4a4a4a;

  }

  label {
    font-weight: 700;
    color: white;
  }
</style>

<body class="bg-dark">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9 offset-1">
        <section class="pt-5 my-5">
          <div class="container h-custom shadow-lg shadow-2 pt-5 mt-5 card bg-transparent bg-gradient-to-r from-transparent to-gray-900">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../landing_page/assets/img/butterfly.png"
                  class="img-fluid" alt="Sample image">
              </div>
              <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="" method="post" class="py-3">
                  <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    <p class="lead fw-normal me-3 mb-3 text-danger fw-bold">Register Disini</p>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="namaLengkap" class="form-control form-control-lg" placeholder="Masukan Nama Anda" name="nama_lengkap" required />
                    <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="email" class="form-control form-control-lg" placeholder="Masukan Email" name="email" required />
                    <label class="form-label" for="email">Email</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-3">
                    <input type="password" id="password" class="form-control form-control-lg" placeholder="Masukan password" name="password" required />
                    <label class="form-label" for="password">Password</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-3">
                    <label for="idLevel">Pilih Level</label>
                    <select data-mdb-select-init name="id_level" id="idLevel" class="form-control" required>
                      <option value="">Pilih Level Anda</option>
                      <?php while ($rowLevel = mysqli_fetch_assoc($queryLevel)) { ?>
                        <option value="<?php echo $rowLevel['id'] ?>"><?php echo $rowLevel['nama_level'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="d-flex justify-content-between align-items-center">
                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button type="submit" name="register" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                      <p class="small fw-bold mt-2 py-2 mb-0 text-white">Apa kamu Sudah Ada Akun? <a href="../login.php" class="link-danger">Login</a></p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </section>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>