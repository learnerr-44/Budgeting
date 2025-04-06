<?php 
include_once 'function.php';
$id = $_POST['id'];

if(delete($id) > 0 ){
    echo "
                <script>
                    alert ('Data berhasil dihapus');
                    document.location.href = 'pemasukan.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert ('Data gagal dihapus');
                    document.location.href = 'pemasukan.php';
                </script>
            ";
}
?>