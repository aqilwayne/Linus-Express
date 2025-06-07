<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_linusexpress");

//CREATE - registrasi akun
if(isset($_POST['create-account'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($confirm_password != $password){
        $_SESSION['error'] = "Password tidak sama";
        header("Location: register.php");
        exit;
    } else {
        $register = mysqli_query($conn, "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')");
        if($register){
            header("Location:login-user.php");
            exit;
        } else {
            $_SESSION['error'] = "Pendaftaran gagal";
            header("Location: register.php");
            exit;
        }
    }
}

//CREATE - Feedback User
if (isset($_POST['submit-ulasan'])) {
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);
    $rating = (int)$_POST['rating'];
    $username = $_POST['username']; // ambil dari session login

    $query = "INSERT INTO ulasan (username, komentar, rating) VALUES ('$username', '$komentar', $rating)";
    mysqli_query($conn, $query);
}