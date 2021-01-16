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
        $sql = "SELECT * FROM account WHERE id='$id'";
        $query = mysqli_query($konek, $sql);
        $data = mysqli_fetch_assoc($query);

        // jika data yang di-edit tidak ditemukan
        if( mysqli_num_rows($query) < 1 ){
        die("data tidak ditemukan...");
        }
        // while ( $data = mysqli_fetch_assoc($query)) {
          
      ?>
      
<!--  -->
      <div class="container">
        <h2 class="mt-4">Profile Anda</h2>
        <form method="POST" class="row mt-4">
          <?php
            if (!isset($_POST['edit'])) {
              
           ?>
          <input type="hidden" name="id" value="<?php echo $data['id']?>">
          <div class="form-group col-sm-6">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required="" value="<?php echo $data['nama_lengkap']?>" disabled>
          </div>
          <div class="form-group col-sm-6">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required="" value="<?php echo $data['username']?>"disabled>
          </div>
          <div class="form-group col-sm-6">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required="" value="<?php echo $data['password']?>"disabled>
          </div>
          <div class="form-group col-sm-6">
            <label for="role">Role</label>
            <input type="text" name="role" id="role" class="form-control" required="" value="<?php echo $data['role']?>"disabled>
          </div>
          <div class="form-group col-sm-6">
            <label for="tgl">Tanggal Lahir</label>
            <input type="date" name="tgl" id="tgl" class="form-control" required="" value="<?php echo $data['tanggal_lahir']?>"disabled>
          </div>
          <div class="form-group col-sm-6">
            <label for="jk">Jenis Kelamin</label>
            <input type="text" name="jk" id="jk" class="form-control" required="" value="<?php echo $data['gender']?>"disabled>
          </div>
          <div class="form-group ml-3 mt-4">
            <input type="submit" name="edit" id="edit" class="btn btn-success login-btn" value="Edit">
            <a href="dashboard.php" class="btn btn-md btn-danger">Cancel</a>
          </div>
          <?php
            }else{
          ?>
          <!-- jika di suvmit -->

          <input type="hidden" name="id" value="<?php echo $data['id']?>">
          <div class="form-group col-sm-6">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required="" value="<?php echo $data['nama_lengkap']?>">
          </div>
          <div class="form-group col-sm-6">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required="" value="<?php echo $data['username']?>">
          </div>
          <div class="form-group col-sm-6">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required="" value="<?php echo $data['password']?>">
          </div>
          <div class="form-group col-sm-6">
            <label for="role">Role</label>
            <input type="text" name="role" id="role" class="form-control" required="" value="<?php echo $data['role']?>" disabled>
          </div>
          <div class="form-group col-sm-6">
            <label for="tgl">Tanggal Lahir</label>
            <input type="date" name="tgl" id="tgl" class="form-control" required="" value="<?php echo $data['tanggal_lahir']?>">
          </div>
          <div class="form-group col-sm-6">
            <label for="jk">Jenis Kelamin</label>
            <input type="text" name="jk" id="jk" class="form-control" required="" value="<?php echo $data['gender']?>">
          </div>
          <div class="form-group ml-3 mt-4">
            <input type="submit" name="submit" id="submit" class="btn btn-success login-btn">
            <!-- <a href="" class="btn btn-md btn-danger">Cancel</a> -->
            <input type="submit" name="cancel" id="cancel" class="btn btn-danger login-btn" value="Cancel">
          </div>
          <?php
           };
          ?>
          <!-- <div class="col-sm-6"></div> -->
           <!-- <div class="form-group">
                <label for="foto">Upload Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" placeholder="Unggah Foto Anda" required="">
              </div> -->
          
        </form>
        <?php
        
        // cek apakah tombol simpan sudah diklik atau blum?
        if(isset($_POST['submit'])){

            // ambil data dari formulir
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $pw = $_POST['password'];
            // $jenis = $_POST['r'];
            $tgl = $_POST['tgl'];
            $jk = $_POST['jk'];
            

            // buat query update
            $sql = "UPDATE account SET nama_lengkap='$nama', username='$username', password='$pw', tanggal_lahir='$tgl', gender='$jk' WHERE id=$id";
            $query = mysqli_query($konek, $sql);

            // apakah query update berhasil?
            if( $query ) {
                // kalau berhasil alihkan ke halaman list-siswa.php
              echo '<script>alert("Sukses Gan");
               </script>';
                // header('Location: list-siswa.php');
            } else {
                // kalau gagal tampilkan pesan
                die("Gagal menyimpan perubahan...");
            }


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