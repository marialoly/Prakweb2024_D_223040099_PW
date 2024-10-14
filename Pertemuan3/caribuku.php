<?php include 'header.php'; ?>
<div class="container mt-5">
 
    <p>Silakan mencari buku yang kamu suka.</p>
</div>

<?php
// Konfigurasi database
$host = "localhost";
$username = "root"; // Default username Laragon
$password = "";     // Default password Laragon
$database = "books"; // Nama database yang telah dibuat

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data buku
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

// Cek hasil query
if ($result === false) {
    die("Error in query: " . $conn->error);
}

// Proses hasil query (contoh: menampilkan data)
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Title: " . $row["title"] . "<br>";
    }
} else {
    echo "No results found.";
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Daftar BOOKS</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Buku</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['judul']; ?></td>
                        <td><?php echo $row['penulis']; ?></td>
                        <td><?php echo $row['tahun']; ?></td>
                        <td><?php echo $row['genre']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No books found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>



<?php include 'footer.php'; ?>