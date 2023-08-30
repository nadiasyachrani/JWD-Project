<?php
session_start();

// Fungsi untuk menghubungkan ke database MySQL
function connectToDatabase()
{
    $host = 'localhost'; // Ubah sesuai dengan host MySQL Anda
    $username = 'root'; // Ubah sesuai dengan username MySQL Anda
    $password = ''; // Ubah sesuai dengan password MySQL Anda
    $database = 'jwdtugas1'; // Ubah sesuai dengan nama database Anda

    // Membuat koneksi
    $conn = new mysqli($host, $username, $password, $database);

    // Memeriksa apakah koneksi berhasil
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    return $conn;
}

// Fungsi untuk melakukan login
function login($email, $password)
{
    $conn = connectToDatabase();

    // Melindungi dari SQL injection
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Mencari pengguna dengan email dan password yang cocok
    $query = "SELECT * FROM petugas WHERE user_email = '$email' AND user_pw = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        // Login berhasil
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['no_id'];
        header("Location: home.html"); // Mengarahkan pengguna ke halaman home.html
        exit();
    } else {
        // Login gagal
        return "Email atau password salah.";
    }
}

// Fungsi untuk logout
function logout()
{
    session_unset(); // Menghapus semua variabel sesi
    session_destroy(); // Menghapus sesi
    header("Location: login.php"); // Mengarahkan pengguna ke halaman login.php setelah logout
    exit();
}

// Memeriksa apakah permintaan adalah permintaan logout
if (isset($_GET['logout'])) {
    if ($_GET['logout'] === 'true') {
        logout();
    } else {
        header("Location: home.html"); // Jika pengguna tidak mengonfirmasi logout, arahkan kembali ke halaman home.html
        exit();
    }
}

// Memeriksa apakah pengguna sudah submit form login
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginResult = login($email, $password);
}

// Memeriksa apakah pengguna sudah login
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Mengarahkan pengguna ke halaman home.html jika sudah login
if (isLoggedIn()) {
    header("Location: home.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
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

        p.error-message {
            color: red;
        }

        .logout-link {
            text-align: center;
            margin-top: 10px;
        }

        .logout-link a {
            color: #213555;
            text-decoration: none;
        }

        .logout-link a:hover {
            text-decoration: underline;
        }

        .logout-confirmation {
            text-align: center;
            margin-top: 10px;
        }

        .logout-confirmation a {
            color: #4F709C;
            text-decoration: none;
        }

        .logout-confirmation a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nadia's Website</h1>
        <h2>Log In</h2>

        <?php
        if (isset($loginResult)) {
            echo '<p class="error-message">' . $loginResult . '</p>';
        }
        ?>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" name="submit" value="Login">
        </form>

        <div class="logout-link">
            <?php if (isLoggedIn()) { ?>
                <div class="logout-confirmation">
                    <p>Anda sudah login. Apakah Anda ingin logout?</p>
                    <a href="?logout=true">Ya</a> / <a href="home.html">Tidak</a>
                </div>
              <?php } else { ?>
              <!-- Teks "Belum punya akun? Sign in?" dengan link ke signin.php -->
              <p>Belum punya akun? <a href="signin.php">Sign in</a></p>
            <?php } ?>
        </div>
    </div>
</body>
</html>
