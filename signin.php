<?php
// Mengatur aksi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Melakukan koneksi ke database
    $host = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'jwdtugas1';

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_errno()) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Mengecek apakah email sudah ada di database
    $query = "SELECT * FROM petugas WHERE user_email = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $message = "Email sudah terdaftar.";
        $messageClass = 'error';
    } else {
        // Menambahkan data ke tabel admin
        $query = "INSERT INTO petugas (user_email, user_pw) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $message = "Data admin berhasil ditambahkan dengan ID: " . mysqli_insert_id($conn);
            $messageClass = 'success';
        } else {
            $message = "Gagal menambahkan data admin: " . mysqli_error($conn);
            $messageClass = 'error';
        }
    }

    // Menutup koneksi
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #213555;
            background-image: url("pxfuel.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .container {
            max-width: 400px;
            margin: 120px auto;
            padding: 20px;
            background-color: #D8C4B6;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        form {
            background-color: #F5EFE7;
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #4F709C;
            margin-bottom: 20px;
        }

        h2 {
            text-align: center;
            color: #4F709C;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #213555;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #4F709C;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 95%;
            padding: 10px;
            background-color: #4F709C;
            color: #F5EFE7;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #213555;
        }

        .message {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            color: #FFF;
            z-index: 9999;
        }

        .success {
            background-color: #4CAF50;
        }

        .error {
            background-color: #F44336;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Fungsi untuk menampilkan pesan dan menghilangkannya setelah 3 detik
        function showMessage(messageClass, message) {
            var messageContainer = $('<div>')
                .addClass('message ' + messageClass)
                .text(message)
                .hide()
                .appendTo('body')
                .fadeIn();

            setTimeout(function () {
                messageContainer.fadeOut(function () {
                    $(this).remove();
                });
            }, 2000);
        }

        // Menjalankan fungsi showMessage jika ada pesan yang diterima
        <?php if (isset($message) && isset($messageClass)): ?>
        $(document).ready(function () {
            showMessage('<?php echo $messageClass; ?>', '<?php echo $message; ?>');
        });
        <?php endif; ?>
    </script>
</head>
<body>
    <div class="container">
        <h1>Nadia's Website</h1>
        <h2>Sign In</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" name="submit" value="Tambahkan">
        </form>
        <center><p>Sudah punya akun? <a href="login.php">Log in</a></p></center>
    </div>
</body>
</html>
