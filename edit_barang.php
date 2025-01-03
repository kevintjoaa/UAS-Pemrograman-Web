<?php
session_start();
include 'koneksi.php';

// Pastikan 'kode_barang' ada di URL
if (isset($_GET['kode_barang'])) {
    $kode_barang = $_GET['kode_barang'];

    // Ambil data barang berdasarkan kode_barang
    $sql = "SELECT * FROM barang WHERE kode_barang = '$kode_barang'";
    $result = $conn->query($sql);

    // Jika barang ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // Jika barang tidak ditemukan, arahkan ke halaman lain atau tampilkan pesan error
        echo "Barang tidak ditemukan!";
        exit();
    }
} else {
    echo "Kode barang tidak ditemukan!";
    exit();
}

// Update barang jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $lokasi = $_POST['lokasi'];

    // Update data barang di database
    $sql = "UPDATE barang SET nama_barang='$nama_barang', kategori='$kategori', jumlah='$jumlah', lokasi='$lokasi' WHERE kode_barang='$kode_barang'";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui!";
        // Arahkan kembali ke halaman lain, misalnya halaman inventaris
        header("Location: inventori.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="./assets/css/edit_barang.css">
</head>
<body>

    <header>
        <nav>
            <h1>Inventory Management System</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="inventori.php">Inventory List</a></li>
                <a href="logout.php" class="logout">Logout</a>
            </ul>
        </nav>
    </header>

<h1>Edit Barang</h1>

<form method="POST">
    <div class="form-group">
        <label for="kode_barang">Kode Barang</label>
        <input type="text" id="kode_barang" name="kode_barang" value="<?php echo $row['kode_barang']; ?>" readonly required>
    </div>
    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
    </div>
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <input type="text" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>" required>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" required>
    </div>
    <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" id="lokasi" name="lokasi" value="<?php echo $row['lokasi']; ?>" required>
    </div>
    <button type="submit">Update Barang</button>
</form>

    <footer>
        <p>&copy; 2024 Inventory Management System. All rights reserved.</p>
    </footer>

</body>
</html>
