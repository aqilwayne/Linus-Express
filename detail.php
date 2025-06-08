<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Informasi - Linus Express USU</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    .info-list {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .info-list li {
        margin: 10px;
    }
</style>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="./images/logo.png" alt="Logo USU" class="logo">
            <div class="logo-text">
                <h1>Universitas</h1>
                <h1>Sumatera Utara</h1>
            </div>
        </div>
    </header>

    <?php
    require 'sidebar.php';
    ?>

        <div class="main-content">
            <h2 class="location-title">Cek Lokasi Bus Disini</h2>

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
            ORDER BY o.id_bus ASC
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

    <div class="bus-grid">
    <div class="bus-location">
        <div class="card bg-success text-white mb-4">
            <div class="card-body fs-5 fw-semibold"><?= htmlspecialchars($bus); ?></div>

            <iframe src="map.html" title="Peta Tracking Bus Linus"></iframe>

            <div class="card-footer d-flex flex-column justify-content-center">
                <ul class="info-list">
                    <li><strong>Nomor Bus:</strong> <?= htmlspecialchars($bus ?? 'Tidak tersedia'); ?></li>
                    <li><strong>Nama Supir:</strong> <?= htmlspecialchars($supir ?? 'Tidak tersedia'); ?></li>
                    <li><strong>Jam Operasional:</strong> <?= htmlspecialchars($jamoperasional ?? 'Tidak tersedia'); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
            <?php
                                        }
            ?>
        </div>
    </div>

    <?php
    require 'footer.php';
    ?>
    
</body>

</html>