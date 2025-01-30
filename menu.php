<?php
include 'koneksi.php';
    if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
      echo '<script>
      alert("Akses ditolak");
      window.location.href = "login.html";
      </script>';
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
    <link rel="stylesheet" href="stylemenu.css"/>
</head>
<body>
    <h1>Daftar Menu</h1><br>
    <div class="tabel">
        <table class="tabel table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($conn,"SELECT * FROM menu ORDER BY id ASC");
                while($data = mysqli_fetch_array($sql)){
                    $id = $data['id'];
                    $nama = $data['nama'];
                    $harga = $data['harga'];

                    // Menampilkan gambar dengan base64_encode
                    $gambar = base64_encode($data['gambar']); // Konversi BLOB ke Base64
                    $gambarSrc = 'data:image/jpeg;base64,'.$gambar; // Menambahkan tipe MIME (jpeg/png)
                ?>
                <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td><img src="<?php echo $gambarSrc; ?>" alt="Gambar Menu" style="width: 100px; height: 100px;"></td>
                    <th scope="row"><?php echo $nama; ?></th>
                    <th scope="row"><?php echo $harga; ?></th>
                    <td>
                        <a href="edit_menu.php?id=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_menu.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
