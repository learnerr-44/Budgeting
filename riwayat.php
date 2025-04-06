<?php 
    session_start();
    $_SESSION["login"] = true;
    if(!isset($_SESSION["login"])){
        header("Location: welcome.php");
        exit;
    }

    include_once 'function.php';
    $value = riwayat();
    $total = totalpemasukan();
    $all = totalpengeluaran();

    $total_pemasukan = 0;
    $total_pengeluaran = 0; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemasukan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            background: linear-gradient(to bottom, #1a3a1a, #0f260f);
        }
        .navbar {
            background-color: #2c4424;
            position: fixed; /* Navbar tetap di atas */
            top: 0;
            left: 0;
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000; /* Supaya navbar tidak tertutup elemen lain */
        }

        .menu {
            display: flex;
            gap: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 12px 15px;
            font-size: 16px;
            transition: background 0.3s ease;
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
            font-size: 16px;
            color: white;
            transition: background 0.3s ease;
        }
        .logout:hover {
            background-color: darkorange;
        }

        /* Container */
        .container { 
            background-color: #e0e0e0; 
            padding: 20px; 
            border-radius: 10px; 
            width: 80%; 
            margin: 20px auto;
            margin-top: -250px;
            max-height: 50vh;
        }
        table { 
            width: 100%; 
            margin: 20px auto;
            border-collapse: collapse; 
            margin-top: 15px; 
        }
        th, td { 
            border: 1px solid black; 
            padding: 8px; 
            text-align: center;
            vertical-align: middle; 
            
        }
        th { 
            background-color: #2c4424; 
            color: white; 
        }
        .add-data { 
            background-color: darkgreen; 
            color: white; 
            padding: 8px 15px; 
            margin-top: 10px; 
            display: inline-block; 
            text-decoration: none; 
            border-radius: 5px; 
        }
        
        .inline-form {
            display: inline-block; 
            margin-right: 5px;
            
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="menu">
            <a href="riwayat.php">Home</a>
            <a href="pemasukan.php">Pemasukan</a>
            <a href="pengeluaran.php">Pengeluaran</a>
            <a href="about.php">Tentang</a>
        </div>
        <form action="logout.php">
        <button class="logout">Log out</button>
    </form>
    </div>

    <!-- Konten utama -->
    <div class="container">
        <h2>Data Pemasukan</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Pemasukan</th>
                    <th>Pengurangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                    <?php foreach($value as $row) :?>
                        <?php $total_pemasukan += $row["pemasukan"]; ?>
                        <?php $total_pengeluaran += $row["pengeluaran"]; ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["tanggal"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["keterangan"]; ?></td>
                            <td>Rp <?= number_format ($row["pemasukan"], 0, ',', '.'); ?></td>
                            <td>Rp <?= number_format ($row["pengeluaran"], 0, ',', '.'); ?></td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <tr>
                    <td colspan="4"><b>Total</b></td>
                    <td><b>Rp <?= number_format($total_pemasukan, 0, ',', '.'); ?></b></td>
                    <td><b>Rp <?= number_format($total_pengeluaran, 0, ',', '.'); ?></b></td>

                </tr>
            </tbody>
        </table>
        <a href="tambah.php" class="add-data">Tambah Data</a>
    </div>

</body>
</html>