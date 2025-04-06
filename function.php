<?php 
$conn = mysqli_connect("localhost", "root", "", "budgeting");
// if (!$conn){
//     die ("Unconnected". mysqli_connect_error());
// } else {
//     echo "Connected!";
// }

function register($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $konfirmasi = mysqli_real_escape_string($conn,$data["konfirmasi"]);

    $rest = mysqli_query($conn, "SELECT *FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($rest)){
        echo "<script>
                     alert('user sudah tersedia')
            </script>";
            return false;
    }

    if($password != $konfirmasi){
        echo "<script>
                     alert('Password tidak sesuai')
            </script>";
            return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query= "INSERT INTO user (username, password) VALUES('$username', '$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function login($data){
    global $conn;
        $username = mysqli_real_escape_string($conn, $data["username"]);
        $password = $data["password"];

        $query= "SELECT * FROM user WHERE username = '$username'";
        $rest = mysqli_query($conn, $query);

        if ( mysqli_num_rows($rest) === 1){
            $row = mysqli_fetch_assoc($rest);
            // var_dump($row);
            // exit;
            if(password_verify($password, $row["password"])) {
                session_start();
                $_SESSION["login"] = true;
                var_dump($_SESSION);
                header("Location: riwayat.php");
                exit;
            } else {
                return "password salah";
            } 
        } else {
                return "password salah";
            }
            return false;
        }
    

function pemasukan($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
     return $rows;
}

function totalpemasukan(){
    global $conn;
    $result = mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM pemasukan");
    $row = mysqli_fetch_assoc($result);
    return $row['total'] ?? 0;
}

function tambahData($tanggal, $nama, $keterangan, $jumlah) {
    global $conn;

    $tanggal = mysqli_real_escape_string($conn, $_POST["tanggal"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);
    $jumlah = mysqli_real_escape_string($conn, $_POST["jumlah"]);

    $query = "INSERT INTO pemasukan(tanggal, nama, keterangan, jumlah) VALUES ('$tanggal', '$nama', '$keterangan', '$jumlah')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahData2($tanggal, $nama, $keterangan, $jumlah) {
global $conn;

        $tanggal = mysqli_real_escape_string($conn, $_POST["tanggal"]);
        $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
        $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);
        $jumlah = mysqli_real_escape_string($conn, $_POST["jumlah"]);

        $query = "INSERT INTO pengeluaran(tanggal, nama, keterangan, jumlah) VALUES ('$tanggal', '$nama', '$keterangan', '$jumlah')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function totalpengeluaran(){
        global $conn;
        $result = mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM pengeluaran");
        $row = mysqli_fetch_assoc($result);
        return $row['total'] ?? 0;
    }

    function pengeluaran($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
         return $rows;
    }
    
    function delete($id){
        global $conn;
        // var_dump($id);
        // die;
        mysqli_query($conn, "DELETE FROM pemasukan where id = '$id'");
        // echo mysqli_error($conn);
        return mysqli_affected_rows($conn);
    }

    function delete2($id){
        global $conn;
        // var_dump($id);
        // die;
        mysqli_query($conn, "DELETE FROM pengeluaran where id = '$id'");
        // echo mysqli_error($conn);
        return mysqli_affected_rows($conn);
    }

    function update1($data){
        global $conn;
        
        $id = $data["id"];
        $tanggal = mysqli_real_escape_string($conn, $_POST["tanggal"]);
        $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
        $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);
        $jumlah = mysqli_real_escape_string($conn, $_POST["jumlah"]);

        $query = "UPDATE pemasukan SET
                    tanggal = '$tanggal', 
                    nama = '$nama',
                    keterangan = '$keterangan',
                    jumlah = '$jumlah' 
                    WHERE id = $id;
                    ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function update2($data){
        global $conn;
        
        $id = $data["id"];
        $tanggal = mysqli_real_escape_string($conn, $_POST["tanggal"]);
        $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
        $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);
        $jumlah = mysqli_real_escape_string($conn, $_POST["jumlah"]);

        $query = "UPDATE pengeluaran SET
                    tanggal = '$tanggal', 
                    nama = '$nama',
                    keterangan = '$keterangan',
                    jumlah = '$jumlah' 
                    WHERE id = $id;
                    ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function riwayat(){
        global $conn;

        $query = "SELECT id, tanggal, nama, keterangan, jumlah AS pemasukan, NULL AS pengeluaran FROM pemasukan 
                    UNION 
                SELECT id, tanggal, nama, keterangan, NULL AS pemasukan, jumlah AS pengeluaran FROM pengeluaran ORDER BY tanggal DESC";
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    function logout(){
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();

        header("Location: welcome.php");
        exit;
    }
?>  


