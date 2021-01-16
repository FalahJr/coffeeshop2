<?php

require_once "../koneksi.php";
if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];


    // buat query hapus
    $sql = "DELETE FROM menu WHERE id_menu=$id";
    $query = mysqli_query($konek, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        echo '<script>alert("Sukses Gan"); 
               window.history.back();
              </script>';
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>