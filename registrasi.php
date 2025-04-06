<?php
    include_once 'function.php';
    if (isset($_POST["register"])){

        if(register($_POST) > 0){
            
            echo "<script>
                        alert('user baru berhasil ditambahkan')
                        document.location.href = 'riwayat.php';
                </script> ";
        } else {
            echo "Registrasi gagal".mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
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

        body {
            padding-top: 60px; 
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .form-box {
            background-color: #e0e0e0;
            padding: 20px;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
            margin-top: -200px;
        }
        .form-box::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background-color: #b0b0b0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        h1 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        input {
            width: 90%;
            padding: 8px;
            margin: 5px 0 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        button {
            background-color: #ff7f50;
            color: white;
            border: none;
            padding: 10px;
            width: 100px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #e67340;
        }
</style>
<body>
<div class="navbar">
        <div class="menu">
            <a href="index.php">Home</a>
            <a href="pemasukan.php">Pemasukan</a>
            <a href="pengeluaran.php">Pengeluaran</a>
            <a href="about.php">Tentang</a>
        </div>
        <button class="logout">Log out</button>
    </div>
    <div class="container">
    <div class="form-box">
    <h1>Registrasi</h1>
    <form action="" method="POST">
            <label for="reg-username">Username</label>
            <input type="text" id="reg-username" placeholder="Username"name="username" required>
            <br><br>

            <label for="reg-password">Password</label>
            <input type="password" id="reg-password" placeholder="password" name="password" required>
            <br><br>

            <label for="konfirmasi">Konfirmasi Password</label>
            <input type="password" id="konfirmasi" placeholder="konfirmasi" name="konfirmasi" required>
            <br><br>

            <button type="submit" name="register">Daftar</button>
    </form>
        </div>
    </div>
        
</body>
</html>