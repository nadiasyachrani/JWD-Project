<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Me</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
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
      padding-top: 0px;
    }

    .menu {
      background-color: #213555;
      color: #F5EFE7;
      padding: 10px;
      display: flex;
      justify-content: space-around;
    }

    .menu-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
      padding: 10px;
    }

    .menu-item i {
      font-size: 24px;
      margin-bottom: 5px;
    }

    .menu-item:hover {
      background-color: #4F709C;
    }

    .menu-item:hover i {
      color: #D8C4B6;
    }

    .social-icons {
      display: flex;
      justify-content: center;
      margin-top: 30px;
    }

    .social-icons a {
      color: #213555;
      font-size: 24px;
      margin: 10px 10px;
      transition: color 0.3s ease;
    }

    .social-icons a:hover {
      color: #D8C4B6;
    }

    .box {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 200px;
      height: 200px;
      background-color: #F5EFE7;
      border-radius: 10px;
      margin: 180px 20px 20px;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .box i {
      font-size: 48px;
      color: #213555;
      margin-bottom: 10px;
    }

    .box span {
      color: #213555;
      font-size: 18px;
    }

    h2 {
      color: #0B1B34;
      margin: 50px;
    }

    th {
      background-color: #D7DBE4;
      color: #0B1B34;
    }

    td {
      background-color: #D7DBE4;
      color: #0B1B34;
    }

    .btn-primary {
      background-color: #0B1B34;
      border-color: #0B1B34;
      margin: 5px;
    }

    .btn-primary:hover {
      background-color: #0B1B34;
      border-color: #0B1B34;
    }

    .btn-danger {
      background-color: #7E8E9E;
      border-color: #7E8E9E;
    }

    .btn-danger:hover {
      background-color: #7E8E9E;
      border-color: #7E8E9E;
    }

    .modal-content {
      background-color: #D7DBE4;
    }

    .modal-title {
      color: #0B1B34;
    }

    .btn-secondary {
      background-color: #7E8E9E;
      border-color: #7E8E9E;
    }

    .btn-secondary:hover {
      background-color: #7E8E9E;
      border-color: #7E8E9E;
    }

    .btn-primary,
    .btn-secondary {
      color: #D7DBE4;
    }

    .form-control {
      background-color: #D7DBE4;
    }
  </style>
    <script>
        function confirmLogout(event) {
          event.preventDefault(); // Mencegah tindakan default dari tautan
      
          var confirmation = confirm("Yakin anda akan logout?");
          if (confirmation) {
            window.location.href = event.currentTarget.getAttribute("href");
          }
        }
    </script>
</head>

<body>
  <div class="menu">
    <div class="menu-item">
      <a href="home.html">
        <i class="fas fa-home" style="color: #F5EFE7;"></i>
        <span style="color: #F5EFE7;">Home</span>
      </a>
    </div>
    <div class="menu-item">
      <a href="aboutme.html">
        <i class="fas fa-user" style="color: #F5EFE7;"></i>
        <span style="color: #F5EFE7;">About Me</span>
      </a>
    </div>
    <div class="menu-item">
      <a href="interest.html">
        <i class="fas fa-heart" style="color: #F5EFE7;"></i>
        <span style="color: #F5EFE7;">Interest</span>
      </a>
    </div>
    <div class="menu-item">
      <a href="sosmed.html">
        <i class="fas fa-location-arrow" style="color: #F5EFE7;"></i>
        <span style="color: #F5EFE7;">Social Media</span>
      </a>
    </div>
    <div class="menu-item">
      <a href="login.php?logout=true" onclick="confirmLogout(event)">
        <i class="fas fa-sign-out-alt" style="color: #F5EFE7;"></i>
        <span style="color: #F5EFE7;">Log Out</span>
      </a>
    </div>
  </div>

  <div class="container">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "jwdtugas1";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
      die("Koneksi gagal: " . mysqli_connect_error());
    }

    if (isset($_POST['id']) && isset($_POST['nama_pengirim']) && isset($_POST['email_pengirim']) && isset($_POST['pesan'])) {
      $id = $_POST['id'];
      $nama_pengirim = $_POST['nama_pengirim'];
      $email_pengirim = $_POST['email_pengirim'];
      $pesan = $_POST['pesan'];

      $query = "INSERT INTO webme (id, nama_pengirim, email_pengirim, pesan) VALUES ('$id', '$nama_pengirim', '$email_pengirim', '$pesan')";
      $result = mysqli_query($conn, $query);

      if (!$result) {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    }

    if (isset($_POST['edit_id']) && isset($_POST['edit_nama_pengirim']) && isset($_POST['edit_email_pengirim']) && isset($_POST['edit_pesan'])) {
      $id = $_POST['edit_id'];
      $nama_pengirim = $_POST['edit_nama_pengirim'];
      $email_pengirim = $_POST['edit_email_pengirim'];
      $pesan = $_POST['edit_pesan'];

      $query = "UPDATE webme SET id='$id', nama_pengirim='$nama_pengirim', email_pengirim='$email_pengirim', pesan='$pesan' WHERE id='$id'";
      $result = mysqli_query($conn, $query);

      if (!$result) {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    }

    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $query = "DELETE FROM webme WHERE id='$id'";
      $result = mysqli_query($conn, $query);

      if (!$result) {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    }
    ?>

  </div>

    <div class="container">
        <center><h2>Data Pesan</h2></center>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM webme";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama_pengirim'] . "</td>";
                        echo "<td>" . $row['email_pengirim'] . "</td>";
                        echo "<td>" . $row['pesan'] . "</td>";
                        echo "<td>";
                        echo "<button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' data-id='" . $row['id'] . "' data-nama_pengirim='" . $row['nama_pengirim'] . "' data-email_pengirim='" . $row['email_pengirim'] . "' data-pesan='" . $row['pesan'] . "'>Edit</button>";
                        echo "<a href='?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data pesan</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id" class="form-label">id</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                            <?
                            // Get the highest ID value from the database
                            $query = "SELECT MAX(id) AS max_id FROM webme";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $next_id = $row['max_id'] + 1; // Calculate the next ID value
                            ?>
                          </div>
                        <div class="mb-3">
                            <label for="nama_pengirim" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_pengirim" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email_pengirim" name="email_pengirim" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <input type="text" class="form-control" id="pesan" name="pesan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_id" class="form-label">id</label>
                            <input type="text" class="form-control" id="edit_id" name="edit_id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit_nama_pengirim" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="edit_nama_pengirim" name="edit_nama_pengirim" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email_pengirim" class="form-label">Email</label>
                            <input type="text" class="form-control" id="edit_email_pengirim" name="edit_email_pengirim" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_pesan" class="form-label">Pesan</label>
                            <input type="text" class="form-control" id="edit_pesan" name="edit_pesan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#editModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var nama_pengirim = button.data('nama_pengirim');
                var email_pengirim = button.data('email_pengirim');
                var pesan = button.data('pesan');

                var modal = $(this);
                modal.find('#edit_id').val(id);
                modal.find('#edit_nama_pengirim').val(nama_pengirim);
                modal.find('#edit_email_pengirim').val(email_pengirim);
                modal.find('#edit_pesan').val(pesan);
            });
        });
    </script>
</body>
</html>
