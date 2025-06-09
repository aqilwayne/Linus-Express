<?php
require '../function.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //validasi database
    $cekdb = mysqli_query($conn, "SELECT * FROM admin where username='$username' and password='$password'");

    //hitung jumlah data
    $hitung= mysqli_num_rows($cekdb);
    if($hitung>0){
        $_SESSION['log'] = true;
        header('location:index_admin.php');
    }
    else{
        header('location:login_admin.php');
        }
    }

    if(!isset($_SESSION['login'])){
    }
    else{
        header('location:index_admin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Login - Linus Express</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h2 class="text-center font-weight-light my-4 text-success">Linus Express</h2>
                                        <h4 class="text-center font-weight-light my-4">Admin Login</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsername" name="username" type="text" placeholder="Username" />
                                                <label for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>
                                        <div class="card-footer text-center py-3">
                                        <div class="small">
                                            <a href="../login_user.php">Login sebagai user</a>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php
            require '../footer.php';
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>