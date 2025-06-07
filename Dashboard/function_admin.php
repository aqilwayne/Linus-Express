<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_linusexpress");

//CREATE - Data operasional 
if(isset($_POST['add-data-ops'])){
    $bus = $_POST['bus'];
    $supir = $_POST['supir'];
    $lokasi = $_POST['lokasi'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];

        $addtotable = mysqli_query($conn,"INSERT INTO operasional (id_bus,id_supir,lokasi,mulai,selesai) 
        values ('$bus','$supir','$lokasi','$mulai','$selesai')");
        if($addtotable){
            header('location:index_admin.php');
        } else {
            echo "Tidak ada data yang ditemukan";
            header('location:index_admin.php');
        }
}

//UPDATE - Data Operasional
if (isset($_POST['update-data-ops'])) {
    $id_operasional = $_POST['id_operasional'];
    $bus = $_POST['bus'];
    $supir = $_POST['supir'];
    $lokasi = $_POST['lokasi'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];

    $update = mysqli_query($conn, "UPDATE operasional 
                                   SET id_bus = '$bus', 
                                       id_supir = '$supir', 
                                       lokasi = '$lokasi', 
                                       mulai = '$mulai', 
                                       selesai = '$selesai'
                                   WHERE id_operasional = '$id_operasional'");

    if ($update) {
        echo "Update berhasil!";
        header("Location: index_admin.php");
        exit;
    } else {
        echo "Update gagal: " . mysqli_error($conn);
    }
}


//DELETE - Data Operasional
if(isset($_POST['delete-data-ops'])){
    $id_operasional = $_POST['id_operasional'];

    $delete = mysqli_query($conn,"DELETE FROM operasional WHERE id_operasional='$id_operasional'");

    if($delete){
        header('location:index_admin.php');
    } else {
        echo "Tidak ada data yang ditemukan";
        header('location:index_admin.php');
    }
}