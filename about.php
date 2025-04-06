<?php 
    session_start();
    $_SESSION["login"] = true;
    if(!isset($_SESSION["login"])){
        header("Location: welcome.php");
        exit;
    }
    
    include_once 'function.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
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
            align-items: center;
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
            margin-top: 50px;
            
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
        
        .container {
            color: white;
            font-family: serif;
            margin-bottom: 20px;
            margin-top: -250px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;

        }
        .team-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 150px;
            margin-top: 50px;
        }

        .icon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .icon {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: white;
            border: 2px solid black;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }
        .icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;  /* Pastikan gambar memenuhi area */
            border-radius: 50%; /* Buat gambar tetap bulat */
            clip-path: circle(50%); /* Pastikan gambar mengikuti bulatan */
}
        .name {
            margin-top: 5px;
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-align: center;
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
        <form action="logout.php">
        <button class="logout">Log out</button>
    </form>
    </div>

    <div class="container">
        <h1>Our Team</h1>
        <div class="team-icons">
    <div class="icon-container">
        <div class="icon">
            <img src="1.jpg" alt="1">
        </div>
        <p class="name">Mia Amelia</p>
        <p class="name">24106050014</p>
    </div>
    <div class="icon-container">
        <div class="icon">
        <img src="3.jpg" alt="3">
        </div>
        <p class="name">Fitri Laily Yuanisa</p>
        <p class="name">24106050020</p>
    </div>
</div>

</div>
       
        
        
</body>
</html>
            
            