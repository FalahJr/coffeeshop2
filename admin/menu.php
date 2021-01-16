<?php
	session_start();

	// cek sesson admin
	if($_SESSION['role']!="admin"){
		echo "<script>
		alert('Anda Bukan Admin');
		window.location.href='../login.php';
		</script>";
	}

			$jenis = $_GET['id'];
	
?>
<!DOCTYPE html>
<html>
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
      ?>
      

      <div class="container">
      	<h2 class="mt-4">Daftar <?php echo $jenis ;?></h2>
      	<a href="tambah_menu.php" class="btn btn-sm btn-success mt-2"><i class="fa fa-plus"></i> Add Item</a>
        <table class="table table-hover mt-2">
		<thead style="background-color: #2c3e50" class="text-light">
			<tr>
				<th>Nama Menu</th>
				<th>Harga</th>
				<th>Gambar</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			require_once "../koneksi.php";
				//ambil id dari query string

			// die($jenis);

			// if ($jenis = "makanan") { 
				$sql = "SELECT * FROM menu WHERE jenis = '$jenis'";
				$query = mysqli_query($konek, $sql);
				// die($query);

				while($menu = mysqli_fetch_assoc($query)){
					echo "<tr>";

		            echo "<td>".$menu['nama_menu']."</td>";
		            echo "<td>IDR ".$menu['harga']."</td>";
		            echo "<td> <img src='../assets/images/upload/".$menu['gambar']."' width=100 height=100> </td>";
		            echo "<td> <a href='edit.php?id=".$menu['id_menu']."' class='btn btn-sm btn-primary' style='width:80%'><i class='fa fa-pencil'> </i> Edit </a></td>";
		            echo "<td> <a href='hapus.php?id=".$menu['id_menu']."' class='btn btn-sm btn-danger' style='width:60%'><i class='fa fa-trash'> </i>  Hapus</a></td>";


					echo "<tr>";

				}
			// }elseif ($jenis = "makanan") {
			// 	$sql = "SELECT * FROM menu WHERE jenis = '$jenis'";
			// 	$query = mysqli_query($konek, $sql);

			// 	while($menu = mysqli_fetch_assoc($query)){
			// 		echo "<tr>";

		 //            echo "<td>".$menu['nama_menu']."</td>";
		 //            echo "<td>".$menu['harga']."</td>";
		 //            echo "<td>".$menu['gambar']."</td>";

			// 		echo "<tr>";

			// 	}
			// }
			?>
		</tbody>
	</table>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
	
	 <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

