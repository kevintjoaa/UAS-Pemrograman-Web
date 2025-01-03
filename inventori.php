<?php
include 'koneksi.php';

// Tambah data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $lokasi = $_POST['lokasi'];

    $sql = "INSERT INTO barang (kode_barang, nama_barang, kategori, jumlah, lokasi) 
            VALUES ('$kode', '$nama', '$kategori', $jumlah, '$lokasi')";
    $conn->query($sql);
}

// Hapus data
if (isset($_GET['hapus'])) {
    $kode = $_GET['hapus'];
    $sql = "DELETE FROM barang WHERE kode_barang='$kode'";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory List - Inventory Management System</title>
    <link rel="stylesheet" href="./assets/css/inventori.css">
    <script src="./assets/js/script.js" defer></script>
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

    <section id="inventory">
        <h2>Manage Your Inventory</h2>

        <!-- Form Tambah Data -->
        <form method="POST">
            <input type="text" name="kode_barang" placeholder="Kode Barang" required>
            <input type="text" name="nama_barang" placeholder="Nama Barang" required>
            <input type="text" name="kategori" placeholder="Kategori" required>
            <input type="number" name="jumlah" placeholder="Jumlah" required>
            <input type="text" name="lokasi" placeholder="Lokasi" required>
            <button type="submit" name="tambah">Tambah</button>
        </form>

        <!-- Tabel Data -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM barang");
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['kode_barang']}</td>
                        <td>{$row['nama_barang']}</td>
                        <td>{$row['kategori']}</td>
                        <td>{$row['jumlah']}</td>
                        <td>{$row['lokasi']}</td>
                        <td>
                            <a href='edit_barang.php?kode_barang={$row['kode_barang']}'>Edit</a> |
                            <a href='?hapus={$row['kode_barang']}'>Hapus</a>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Inventory Management System. All rights reserved.</p>
    <footer>

</body>
</html>