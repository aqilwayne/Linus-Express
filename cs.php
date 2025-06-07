<?php
require 'function.php';
require 'cek.php';

//CREATE - Feedback User
if (isset($_POST['submit-ulasan'])) {
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);
    $rating = (int)$_POST['rating'];
    $username = $_POST['username']; // ambil dari session login

    $query = "INSERT INTO feedback (username, komentar, rating) VALUES ('$username', '$komentar', $rating)";
    mysqli_query($conn, $query);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Service - Linus Express USU</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    .ulasan-item {
        background-color: #f4f4f4;
        border-radius: 8px;
        padding: 12px;
        margin-bottom: 10px;
    }
    .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-start;
    }

    .rating input {
    display: none;
    }

    .rating label {
    font-size: 2rem;
    color: #ccc;
    cursor: pointer;
    transition: color 0.2s;
    }

    .rating input:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
    color: #ffc107;
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
            <form method="post" action="">
            <div class="chat-container">
                <div class="user-header">
                    <img src="./images/user-icon.png" alt="User" class="user-icon">
                    <input type="text" class="form-control" name="username" placeholder="Masukkan nama anda" required>
                </div>

                <div class="rating">
                    <input type="radio" name="rating" id="star5" value="5"><label for="star5">★</label>
                    <input type="radio" name="rating" id="star4" value="4"><label for="star4">★</label>
                    <input type="radio" name="rating" id="star3" value="3"><label for="star3">★</label>
                    <input type="radio" name="rating" id="star2" value="2"><label for="star2">★</label>
                    <input type="radio" name="rating" id="star1" value="1"><label for="star1">★</label>
                </div>

                <div class="chat-box">
                    <textarea name="komentar" placeholder="Ketik ulasan disini..." required></textarea>
                </div>

                <div class="send-container">
                    <button class="send-button" type="submit" name="submit-ulasan">Kirim</button>
                </div>
            </form>
            </div>
            <?php
            echo "<h3>Ulasan Pengguna:</h3>";
            $ambil_ulasan = mysqli_query($conn, "SELECT * FROM feedback ORDER BY tanggal DESC");

            while ($row = mysqli_fetch_assoc($ambil_ulasan)) {
                echo "<div class='ulasan-item'>";
                echo "<strong>" . htmlspecialchars($row['username']) . "</strong><br>";
                echo str_repeat("⭐", $row['rating']) . "<br>";
                echo "<p>" . nl2br(htmlspecialchars($row['komentar'])) . "</p>";
                echo "<small>" . date("d M Y H:i", strtotime($row['tanggal'])) . "</small>" . "<br>";
                echo "<hr>";
                echo "</div>";
            }

            ?>
        </div>
    </div>

    <?php
    require 'footer.php';
    ?>
</body>
</html>