<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Service - Linus Express USU</title>
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
            <div class="chat-container">
                <div class="user-header">
                    <img src="./images/user-icon.png" alt="User" class="user-icon">
                    <h3>User 0019303032</h3>
                </div>
                
                <div class="chat-box">
                    <textarea placeholder="Ketik ulasan disini..."></textarea>
                </div>
                
                <div class="send-container">
                    <button class="send-button">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>Copyright</p>
    </footer>
</body>
</html>