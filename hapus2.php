<?php 
include_once 'function.php';
$id = $_POST['id'];

if(delete2($id) > 0 ){
    echo "
                <script>
                    alert ('Data berhasil dihapus');
                    document.location.href = 'pengeluaran.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert ('Data gagal dihapus');
                    document.location.href = 'pengeluaran.php';
                </script>
            ";
}
?>