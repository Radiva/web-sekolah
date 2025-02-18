<?php
include 'koneksi.php';

// Ambil Data Wali
if(isset($_GET['id'])) {
    $query = "SELECT * FROM wali_murid WHERE id_wali = " . $_GET['id'];
    $result = mysqli_query($koneksi, $query);
    $wali = mysqli_fetch_assoc($result);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_wali = $_POST["nama_wali"];
    $telp = $_POST["no_telp"];
    
    $query = "UPDATE wali_murid SET nama_wali = '".$nama_wali."', kontak = '".$telp."' WHERE id_wali = ".$_GET['id'];
    if(mysqli_query($koneksi, $query)) {
        header("Location: wali_murid.php");
    } else {
        echo "Error: " .$query. "<br>" . mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Wali Murid</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Wali</label>
                <input type="text" name="nama_wali" class="form-control" value="<?php echo $wali['nama_wali']?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="no_telp" class="form-control" value="<?php echo $wali['kontak']?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="wali_murid.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>