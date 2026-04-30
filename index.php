<?php 
include 'koneksi.php'; 

// Logika Menambah Data
if (isset($_POST['submit'])) {
    $matkul = $_POST['matkul'];
    $nama   = $_POST['nama'];
    $nilai  = $_POST['nilai'];

    $query = "INSERT INTO perkuliahan (matkul, nama, nilai) VALUES ('$matkul', '$nama', '$nilai')";
    mysqli_query($koneksi, $query);
    header("Location: index.php"); // Refresh halaman setelah input
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Diri - Input Nilai</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Tambahan style agar form terlihat rapi sesuai gambar kamu */
        .container { width: 80%; margin: auto; padding-top: 20px; }
        .form-section {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid #e5d5c5;
        }
        input {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn-simpan {
            background: #c1a386;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body style="background-color: #fcf8f3;">

<div class="container">
    <!-- Form Tambah Data -->
    <div class="form-section">
        <h2 style="color: #8b735b;">Tambah Nilai Matakuliah</h2>
        <form method="POST">
            <input type="text" name="matkul" placeholder="Mata Kuliah" required>
            <input type="text" name="nama" placeholder="Nama Mahasiswa" required>
            <input type="number" name="nilai" placeholder="Nilai" required>
            <button type="submit" name="submit" class="btn-simpan">Simpan Data</button>
        </form>
    </div>

    <!-- Tabel Tampilan -->
    <div class="form-section">
        <h2 style="color: #8b735b;">Tabel Nilai</h2>
        <table width="100%" border="0" style="border-collapse: collapse; margin-top: 15px;">
            <tr style="background-color: #c1a386; color: white;">
                <th style="padding: 12px;">No</th>
                <th>Matkul</th>
                <th>Nama</th>
                <th>Nilai</th>
            </tr>
            <?php 
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM perkuliahan");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr style="border-bottom: 1px solid #eee; text-align: center;">
                    <td style="padding: 10px;"><?php echo $no++; ?></td>
                    <td><?php echo $d['matkul']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['nilai']; ?></td>
                </tr>
                <?php 
            }
            ?>
        </table>
    </div>
</div>

<footer style="text-align: center; margin-top: 50px; color: #8b735b;">
    © 2026 - Daffa Putra Rustandi
</footer>

</body>
</html>