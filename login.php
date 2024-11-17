<?php
session_start();
include 'admin/database/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // query / perintah insert data ke table user
    $queryLogin = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
    // jika query berhasil
    if (mysqli_num_rows($queryLogin)  > 0) {
        $rowUser = mysqli_fetch_assoc($queryLogin);
        $_SESSION['ID'] = $rowUser['id'];
        $_SESSION['id_level'] = $rowUser['id_level'];
        header("location: admin?berhasil=login");
    } else {
        header("location:login.php?error=login");
    }
}


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
        font-weight: bold;
    }
</style>

<body class="bg-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 offset-1">
                <section class="py-5 my-5">
                    <div class="container shadow-lg h-custom pt-5 mt-5 card bg-transparent bg-gradient-to-r from-transparent to-gray-900">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-md-9 col-lg-6 col-xl-5">
                                <img src="landing_page/assets/img/butterfly.png"
                                    class="img-fluid" alt="Sample image">
                            </div>
                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                                <form action="" method="post" class="py-3">
                                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                        <p class="lead fw-normal mb-3 text-danger fw-bold me-3">Sign in with</p>

                                    </div>


                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" id="form3Example3" class="form-control form-control-lg"
                                            placeholder="Enter a valid email address" name="email" />
                                        <label class="form-label text-white" for="form3Example3">Email address</label>
                                    </div>


                                    <div data-mdb-input-init class="form-outline mb-3">
                                        <input type="password" id="form3Example4" class="form-control form-control-lg"
                                            placeholder="Enter password" name="password" />
                                        <label class="form-label text-white" for="form3Example4">Password</label>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="text-center text-lg-start mt-4 pt-2">
                                            <button type="submit" name="login" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-lg"
                                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                            <p class="small text-white fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="admin/register.php" class="link-danger">Register</a></p>
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