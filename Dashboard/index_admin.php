<?php
require 'function_admin.php';
require '../cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Inventory Barang Rumahan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Dashboard Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Halaman</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Operasional
                            </a>
                            <a class="nav-link" href="../index.php">
                                Halaman User
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Operasional Bus Lintas USU</h1>                           
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah Data
                                </button>
                                <a href="export.php" class="btn btn-success">Export Data</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Bus</th>
                                            <th>Supir</th>
                                            <th>Lokasi</th>
                                            <th>Jam Operasional</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT 
                                                    b.id_bus,
                                                    b.nama_bus, 
                                                    s.id_supir,
                                                    s.nama_supir, 
                                                    o.id_operasional,
                                                    o.lokasi, 
                                                    o.mulai,  
                                                    o.selesai  
                                                FROM operasional o
                                                JOIN bus b ON o.id_bus = b.id_bus
                                                JOIN supir s ON o.id_supir = s.id_supir
                                                    ";

                                        $getdataops = mysqli_query($conn,$query);
                                        while($data=mysqli_fetch_array($getdataops)){
                                            $id_operasional = $data['id_operasional'];
                                            $bus = $data['nama_bus'];
                                            $supir = $data['nama_supir'];
                                            $lokasi = $data['lokasi'];
                                            $mulai = $data['mulai'];
                                            $selesai = $data['selesai'];

                                            $jamoperasional = htmlspecialchars($mulai).' - '.htmlspecialchars($selesai).' WIB';
                                        ?>
                                        <tr>
                                            <td><?=htmlspecialchars($bus);?></td>
                                            <td><?=htmlspecialchars($supir);?></td>
                                            <td><?=htmlspecialchars($lokasi);?></td>
                                            <td><?=htmlspecialchars($jamoperasional);?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$id_operasional;?>">
                                            Edit
                                            </button>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$id_operasional;?>">
                                            Delete
                                            </button>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?=$id_operasional;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data?</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                    Anda yakin ingin menghapus <?=$bus;?>?<br><br>
                                                    <input type="hidden" name="id_operasional" value="<?=$id_operasional;?>">
                                                    <button class="btn btn-danger" type="submit"  name="delete-data-ops">Hapus</button>
                                                </div>
                                                </form>

                                                </div>
                                            </div>

                                            </td>
                                        </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?=$id_operasional;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post" action="">
                                                <div class="modal-body">
                                                    <!-- Bus -->
                                                    <label>Bus</label><br>
                                                        <select class="form-control" name="bus" required>
                                                        <?php
                                                            $getdatabus = mysqli_query($conn, "SELECT * FROM bus");
                                                            while($row = mysqli_fetch_assoc($getdatabus)){ // Ganti menjadi fetch_assoc
                                                                echo "<option value='{$row['id_bus']}'>{$row['nama_bus']}</option>";
                                                            }
                                                        ?>
                                                        </select><br>

                                                    <!-- Supir -->
                                                    <label>Supir</label><br>
                                                        <select class="form-control" name="supir" required>
                                                        <?php
                                                            $getdatasupir = mysqli_query($conn, "SELECT * FROM supir");
                                                            while($row = mysqli_fetch_assoc($getdatasupir)){ // Ganti menjadi fetch_assoc
                                                                echo "<option value='{$row['id_supir']}'>{$row['nama_supir']}</option>";
                                                            }
                                                        ?>
                                                        </select><br>
                                                    
                                                    <input class="form-control" type="text" name="lokasi" value="<?=$lokasi;?>" required><br>

                                                    <label>Waktu Mulai</label><br>
                                                    <input class="form-control" type="time" name="mulai" value="<?=$mulai;?>" required><br>

                                                    <label>Waktu Selesai</label><br>
                                                    <input class="form-control" type="time" name="selesai" value="<?=$selesai;?>" required><br>

                                                     <input type="hidden" name="id_operasional" value="<?=$id_operasional;?>">

                                                    <button class="btn btn-primary" type="submit"  name="update-data-ops">Submit</button><br><br>
                                                </div>
                                                </form>

                                                </div>
                                            </div>
                                        <?php
                                        };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 231712035 - Habibullah Aqil Dika Putra</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
         <form method="post">
        <div class="modal-body">
            <!-- Bus -->
             <label>Bus</label><br>
                <select class="form-control" name="bus" required>
                <?php
                    $getdatabus = mysqli_query($conn, "SELECT * FROM bus");
                    while($row = mysqli_fetch_assoc($getdatabus)){ // Ganti menjadi fetch_assoc
                        echo "<option value='{$row['id_bus']}'>{$row['nama_bus']}</option>";
                    }
                ?>
                </select><br>

            <!-- Supir -->
             <label>Supir</label><br>
                <select class="form-control" name="supir" required>
                <?php
                    $getdatasupir = mysqli_query($conn, "SELECT * FROM supir");
                    while($row = mysqli_fetch_assoc($getdatasupir)){ // Ganti menjadi fetch_assoc
                        echo "<option value='{$row['id_supir']}'>{$row['nama_supir']}</option>";
                    }
                ?>
                </select><br>
            
            <input class="form-control" type="text" name="lokasi" placeholder="Lokasi" required><br>

            <label>Waktu Mulai</label><br>
            <input class="form-control" type="time" name="mulai" placeholder="Waktu Mulai"required><br>

            <label>Waktu Selesai</label><br>
            <input class="form-control" type="time" name="selesai" placeholder="Waktu Selesai"required><br>
            <button class="btn btn-primary" type="submit"  name="add-data-ops">Submit</button><br><br>
        </div>
        </form>
        </div>
    </div>
    </div>

<!-- Auto-show modal if error -->
<?php 
if ($errorMessageindex != ""){ 
?>
<script>
    window.onload = function() {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();
    }
</script>
<?php 
}; 
?>
</html>
