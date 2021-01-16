<?php
	session_start();


	// cek sesson admin
	if($_SESSION['role']!="admin"){
		echo "<script>
		alert('Anda Bukan Admin');
		window.location.href='../login.php';
		</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CoffeeShop Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../assets/css/sidebar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/lib/font-awesome-4.7.0/css/font-awesome.min.css">
  <style type="text/css">
  	.list-dashboard{
  		background-color: #2c3e50; color: white;
  	}
  	  .list-dashboard:hover, .list-dashboard:active{
  		background-color: white;
  	}
  	.aktif{
  		background-color: #fdbb28;
  		/*color: #2c3e50;*/
  	}
  	.list-dropdown{
  		background-color: #2c3e50; color: white;

  	}
  	 .list-dropdown:hover, .list-dropdown:active{
  		background-color: white;
  	}
  	.tes:visited{
  		background-color: #fdbb28;

  	}
  </style>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
      <?php
        include("sidebar.php");
      ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <?php
        include("navbar.php");

        require_once "../koneksi.php";

        $id = $_GET['id'];

        // buat query untuk ambil data dari database
        $sql = "SELECT * FROM menu WHERE id_menu='$id'";
        $query = mysqli_query($konek, $sql);
        $menu = mysqli_fetch_assoc($query);

        // jika data yang di-edit tidak ditemukan
        if( mysqli_num_rows($query) < 1 ){
        die("data tidak ditemukan...");
        }
        // while ( $menu = mysqli_fetch_assoc($query)) {
          
      ?>
      
<!--  -->
      <div class="container">
        <h2 class="mt-4">Form Tambah Item</h2>
        <form method="POST" class="row mt-4" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $menu['id_menu']?>">
          <div class="form-group col-sm-6">
            <label for="nama">Nama Menu</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Menu" required="" value="<?php echo $menu['nama_menu']?>">
          </div>
          <div class="form-group col-sm-6">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga Menu" required="" value="<?php echo $menu['harga']?>">
          </div>
          <div class="form-group col-sm-6">
            <label for="jenis">Jenis Menu</label>
            <select name="jenis" id="jenis" class="form-control">
              <option  value="<?php echo $menu['jenis']?>"><?php echo $menu['jenis']?></option>
              <!-- <option value="Makanan">Makanan</option> -->
            </select>
          </div>
          <!-- <div class="col-sm-6"></div> -->
           <div class="form-group col-sm-6">
                <label for="foto">Upload Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" placeholder="Unggah Foto Anda" required="" accept=".jpg, .png, .jpeg">
              </div>
          <div class="form-group ml-3 mt-4">
            <input type="submit" name="submit" id="submit" class="btn btn-success login-btn">
            <a href="" class="btn btn-md btn-danger">Cancel</a>
          </div>
        </form>
        <?php
        
        // cek apakah tombol simpan sudah diklik atau blum?
        if(isset($_POST['submit'])){

            // ambil data dari formulir
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $jenis = $_POST['jenis'];
            $gambar=$_FILES['foto']['tmp_name']; //variabel foto sementara 
            $nama_file=$_FILES ['foto']['name']; //variabel $gambar dan datanya dari upload gambar
            $ukuran=$_FILES['foto']['size']; //variabel ukuran file 
            $extensi= strtolower(substr(strrchr($nama_file,"."),1)); //extensi file setelah titik

            if($ukuran > 2000000){ 
              echo '<script>alert("Kebesaran File Gan"); 
                window.location.href="menu.php?id='.$jenis.'";
                </script>'; 
            } elseif($extensi !="jpg" && $extensi !="png" && $extensi !="jpeg"){ 
              echo '<script>alert("Ekstensi Salah Gan"); 
                window.location.href="menu.php?id='.$jenis.'";
                </script>';
            }else{
              $sql = "UPDATE menu SET nama_menu='$nama', harga='$harga', gambar='$nama_file' WHERE id_menu=$id";
              $query = mysqli_query($konek, $sql);
              move_uploaded_file($gambar,'../assets/images/upload/'.$nama_file); //menyimpan gambar ke lokasi yang sudah ditentukan
              if ($query) {
                echo '<script>alert("Sukses Gan"); 
                window.location.href="menu.php?id='.$jenis.'";
                </script>';
              }else{
              echo '<script>alert("Gagal Registered"); </script>';
              echo "Error: " . $query . "<br>" . $konek->error;
              }
            }
            // buat query update
            // $sql = "UPDATE menu SET nama_menu='$nama', harga='$harga' WHERE id_menu=$id";
            // $query = mysqli_query($konek, $sql);

            // // apakah query update berhasil?
            // if( $query ) {
            //     // kalau berhasil alihkan ke halaman list-siswa.php
            //   echo '<script>alert("Sukses Gan");
            //     window.location.href="menu.php?id='.$jenis.'";
            //    </script>';
            //     // header('Location: list-siswa.php');
            // } else {
            //     // kalau gagal tampilkan pesan
            //     die("Gagal menyimpan perubahan...");
            // }


          } 
          
        ?>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>




	<!-- <h1> </h1>

	<br>
	<a href="../logout.php">Klik disini untuk logout.</a> -->
</body>
</html>