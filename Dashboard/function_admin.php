<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_linusexpress");

//CREATE - menambah data operasional 
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