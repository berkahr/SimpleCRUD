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

    // Inisialisasi variabel untuk form input
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : '';
    $jenis = isset($_POST['jenis']) ? $_POST['jenis'] : '';
    $gambar = isset($_FILES['gambar']) ? $_FILES['gambar'] : '';

    // Cek apakah form disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($nama) || empty($harga) || empty($jenis) || empty($gambar['tmp_name'])) {
        echo '<script>alert("Please fill in all fields and upload an image");</script>';
    } else {
        $imageSize = $gambar["size"];
        $imageFileType = mime_content_type($gambar["tmp_name"]);

        // Cek apakah file adalah gambar
        if ($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg") {
            echo '<script>alert("File is not a valid image");
            window.location.href = "dashboard_admin.php";</script>';
        }
        // Cek ukuran file (maksimal 500KB)
        elseif ($imageSize > 500000) {
            echo '<script>alert("Sorry, your file is too large. Maximum 500KB");
            window.location.href = "dashboard_admin.php";</script>';
        }
        // Cek jika file diupload dengan benar
        elseif (!is_uploaded_file($gambar['tmp_name'])) {
            echo '<script>alert("File upload failed. Check your server settings.");
            window.location.href = "dashboard_admin.php";</script>';
        } else {
            // Simpan gambar dalam bentuk biner
            $imageData = file_get_contents($gambar["tmp_name"]);

            // Simpan ke database
            $query = $conn->prepare("INSERT INTO menu (gambar, nama, harga, jenis) VALUES (?, ?, ?, ?)");
            $query->bind_param("bsss", $imageData, $nama, $harga, $jenis);
            $query->send_long_data(0, $imageData);
            if ($query->execute()) {
                echo '<script>alert("Data saved successfully");
                window.location.href = "dashboard_admin.php";</script>';
            } else {
                echo '<script>alert("Error saving data: '.$query->error.'");</script>';
            }
            
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    <div class="mx-auto mt-2 w-75">
        <div class="card">
            <div class="card-header">Masukkan data</div>
            <div class="card-body">
            <form action="tambah.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenis" name="jenis" required>
                            <option value=""> -Pilih Jenis Menu-</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="simpan" class="btn btn-warning">Submit</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
