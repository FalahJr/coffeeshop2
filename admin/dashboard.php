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
      ?>
      

      <div class="container-fluid">
        <h1 class="mt-4">Yay! Selamat datang <?php echo $_SESSION['role']; ?></h1>
        <p>Ini Adalah Menu Dashboard Admin</p>
        <p>Admin Bisa menambahkan menu <strong>Makanan atau Minuman terbaru. </strong>Selain itu , juga bisa <strong>mengedit dan juga menghapus item</strong> , dan juga dilengkapi dengan <strong>fitur view & edit profile</strong></p>
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