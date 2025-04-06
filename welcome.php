<?php
 include_once 'function.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="bwidth=device-width, initial-scale=1.0">
    <title>Halaman Depan</title>
    <style>
        body {
            background: linear-gradient(to bottom, #335c46, #0f2419); /* Warna hijau gelap */
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
            box-sizing: border-box;
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
        .container {
            text-align: left;
            background: whitesmoke;
            margin-top: -350px;
            padding: 50px;
            width: 50%;
            color: #0f2419;
            border-radius: 10px;
            font-family: 'Times New Roman', Times, serif;/* Ganti dengan font yang diinginkan */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        h1 {
            margin-top: 10px;
            font-size: 90px;
            font-weight: bold;
        }

        p {
            position: relative;
            transform: translateY(-50px) !important;
            font-size: 18px;
        }
        .buttons {
            margin-top: 20px;
            display: flex;
            justify-content: flex-start;
            width: 100%;
        }
        .buttons button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin: 5px;
            border-radius: 5px;
        }
       
        .register {
            background-color: white;
            color: black;
        }
        .register:hover{
            background-color: darkgreen;
        }
        .login {
            background-color: orange;
            color: white;
        }
        .login:hover{
            background-color: darkorange;
        }
    </style>
</head>
<body>
<div class="navbar">
        <div class="menu">
            <a href="riwayat.php">Home</a>
            <a href="pemasukan.php">Pemasukan</a>
            <a href="pengeluaran.php">Pengeluaran</a>
            <a href="about.php">Tentang</a>
        </div>
        <button class="logout">Log out</button>
    </div>
    <div class="container">
        <h1>Welcome!</h1>
        <p>System budgeting berfungsi mengatur keuangan dalam organisasi</p>
        <p>Kelola anggaran dengan lebih transparan dan akurat untuk memastikan kestabilan keuangan organisasi.</p>
        <div class="buttons">
            <form action="registrasi.php" method="post">
                <button class="register">Registrasi</button>
            </form>
            <form action="login.php" method="post">
                <button class="login">Log in</button>
            </form>
            
        </div>
    </div>
</body>
</html> 