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

            <div class="bus-grid">
                <div class="bus-location">
                    <h3>Bus 1</h3>
                    <img src="./images/map.png" alt="Lokasi Bus 1" class="bus-map">
                </div>
                <div class="bus-location">
                    <h3>Bus 2</h3>
                    <img src="./images/map.png" alt="Lokasi Bus 2" class="bus-map">
                </div>
                <div class="bus-location">
                    <h3>Bus 3</h3>
                    <img src="./images/map.png" alt="Lokasi Bus 3" class="bus-map">
                </div>
                <div class="bus-location">
                    <h3>Bus 4</h3>
                    <img src="./images/map.png" alt="Lokasi Bus 4" class="bus-map">
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>Copyright</p>
    </footer>
</body>

</html>