<?php
include 'koneksi.php';
    // Cek apakah admin sudah login
    if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
      echo '<script>
      alert("Akses ditolak");
      window.location.href = "login.html";
      </script>';
      exit();
    }

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    
    // Proses edit data
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
    
        // Update data di database
        $sql = "UPDATE menu SET nama='$nama', harga='$harga' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Data edited successfully");
                window.location.href = "dashboard_admin.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    // Ambil data berdasarkan ID
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM menu WHERE id=$id");
        $data = $result->fetch_assoc();
    }
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>
        <title>Edit Menu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="styletambah.css"/>
    </head>
    <body>
        <div class="mx-auto mt-2 w-50">
            <div class="card">
                <div class="card-header d-flex justify-content-center"><h1>Edit Menu</h1></div>
                <div class="card-body">
                    <form action="edit_menu.php" method="POST" class="d-flex align-items-center flex-column">
                        <div class="mb-4 row align-items-center">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <label for="nama" class="col-sm-3 col-form-label text-end">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="harga" class="col-sm-3 col-form-label text-end">Harga</label>
                            <div class="col-sm-9">
                                <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>