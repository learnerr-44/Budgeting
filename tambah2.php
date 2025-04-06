<?php 
include_once 'function.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["submit"])){
        $tanggal = $_POST["tanggal"];
        $nama = $_POST["nama"];
        $keterangan = $_POST["keterangan"];
        $jumlah = $_POST["jumlah"];

        if(tambahData2($tanggal, $nama, $keterangan, $jumlah) > 0 ){
            echo "
                <script>
                    alert ('Data berhasil ditambahkan');
                    document.location.href = 'pengeluaran.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert ('Gagal');
                    document.location.href = 'pengeluaran.php';
                </script>
            ";
        } 
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengeluaran</title>
    <style>
        body { 
            background-color: #1e3d20; 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
        }
        /* Navbar */
        .navbar {
            background-color: #2c4424;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            padding: 15px 20px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            font-size: 18px;
        }
        .navbar a:hover {
            background-color: #3e5b34;
            border-radius: 5px;
        }
        
        .logout {
            background-color: orange; 
            border: none; 
            padding: 8px 15px; 
            cursor: pointer; 
            border-radius: 5px;
        }
        .logout:hover {
            background-color: darkorange;
        }
       
        .add-data { 
            background-color: darkgreen; 
            color: white; 
            padding: 8px 15px; 
            margin-top: 10px; 
            display: inline-block; 
            text-decoration: none; 
            border-radius: 5px; 
            cursor: pointer;
        }
 
        .form-container {
            margin-top: 20px;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            width: 50%;
            margin: 100px auto;
            
        }
        
        .button {
            background-color: darkgreen;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .button:hover {
            background-color: green;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="menu">
        <a href="index.php">Home</a>
            <a href="pemasukan.php">Pemasukan</a>
            <a href="pengeluaran.php">Pengeluaran</a>
            <a href="about.php">Tentang</a>
        </div>
        <form action="logout.php">
        <button class="logout">Log out</button>
    </form>
    </div>

        <!-- Form Tambah Data -->
        <div class="form-container">
            <h2>Tambah Data Pengeluaran</h2>
            <form action="" method="post">
            <input type="date" id="tanggal" placeholder="Tanggal" name="tanggal" required><br><br>
            <input type="text" id="nama" placeholder="Nama" name="nama" required><br><br>
            <input type="text" id="keterangan" placeholder="Keterangan" name="keterangan" required><br><br>
            <input type="number" id="pemasukan" placeholder="Pemasukan (Rp)" name="jumlah" required><br><br>
            <button type="submit" name="submit">Tambah Data</button>
        </form>
        </div>
    </div>

    
</body>
</html>