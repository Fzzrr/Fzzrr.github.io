<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Input Data</title>
    <link rel="stylesheet" href="styles.css"> <!-- Menggunakan file CSS eksternal yang sama -->
    <style>
        /* Tambahan styling khusus untuk hasil input */
        .result-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin-top: 20px;
            text-align: center;
        }

        .result-container p {
            font-size: 16px;
            color: #333;
        }

        .result-container p strong {
            color: #4CAF50; /* Warna hijau untuk label */
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1>Hasil Input Data</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari form
            $npm = $_POST['npm'];
            $nama = strtoupper($_POST['nama']); // Nama diubah menjadi huruf besar
            $alamat = strtoupper($_POST['alamat']); // Alamat diubah menjadi huruf besar
            $tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $hobi = $_POST['hobi'];

            // Menampilkan hasil inputan
            echo "<p><strong>NPM:</strong> $npm</p>";
            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>Alamat:</strong> $alamat</p>";
            echo "<p><strong>Tempat Lahir:</strong> $tempat_lahir</p>";
            echo "<p><strong>Tanggal Lahir:</strong> $tanggal_lahir</p>";
            echo "<p><strong>Jenis Kelamin:</strong> $jenis_kelamin</p>";
            echo "<p><strong>Hobi:</strong> $hobi</p>";
        }
        ?>
    </div>
</body>
</html>
