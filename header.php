<?php
	session_start();

	if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
  header("location: login.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>CoffeeShop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/anu5.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <style>
      .navbar_link{
      	color: white;
      }
      .tag {
    position: absolute;
    width: 100%;
   /*border-radius: 15px;*/

    /* border-radius: 0 0 10px 10px; */
    height: 0px;
    /* padding-top: 10px; */
    bottom: 0;
    background: rgb(0, 0, 0);
    color: rgb(255, 255, 255);
    display: flex;
    align-items: center;
    opacity: 0.7;
    transition: 0.4s;
    text-align: center;
  }
  .img-destination{
   /*border-radius: 15px;*/

  }
  .card-mobil{
   /*border-radius: 15px;*/
   border: none;
  }
  .card-mobil:hover .tag{
      height: 100%;
  }
  .text-tag{
      text-align: center;
      width: 100%;
  }
      .card-list{
        padding: 10px 5px;
        /* height: 250pt; */
    }
    .listWisata {
    display: none;
    list-style: none;
    /* text-align: center; */
  }
  
  .card-mobil:hover .listWisata {
    display: block;
  }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #2c3e50;">
        <div class="container"> 
        <a class="navbar-brand navbar_link" href="#first">CoffeeShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto ml-4">
                <li class="menu mr-3">
                    <a class="navbar_link" href="index.php#about">Menu</a>
                </li>
                <li class="menu mr-3">
                    <a class="navbar_link" href="index.php#sewa">Tentang</a>
                </li>
                <li class="menu mr-3">
                    <a class="navbar_link" href="index.php#sewa">Kontak</a>
                </li>
            </ul>
            
        </div>
    </div>
    </nav>
    <div style="background-color: #ecf0f1;">
    <div class="container" style="padding:80pt 0 40pt 0;">
            <div class="row">
            <div class="col-6">
                <img src="assets/images/homepage.webp" alt="" width="60%">
            </div>
            <!-- <div class="col-1"></div> -->
            <div class="col-5 mt-5" style="text-align: left">
            	<h3>Selamat Datang <?php echo $_SESSION['username']?> Di CoffeeShop 
            	</h3>
            	<p>
            		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            	</p>
            </div>
            </div>
        </div>
        </div>