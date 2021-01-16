<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ngoffee Rek</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/coba.css">
</head>
<body>
  <?php
    require_once "koneksi.php";

    if (isset($_POST["register"])) {
      $nama       = $_POST["nama"]; 
      $username   = $_POST["username"]; 
      $password   = $_POST["password"]; 
      $role = "user";
      $tgl    = $_POST['tgl_lahir'];

      $tanggal    = date('Y-m-d', strtotime($tgl)); 
      $foto       = "tes.jpg";
      $jk         = $_POST['jk']; 


      // die($nama." ".$username." ".$password);
      // Insert user data into table
      $query = "INSERT INTO account(nama_lengkap, username, password, role, foto, tanggal_lahir,gender) VALUES('$nama','$username','$password', '$role', '$foto', '$tanggal','$jk')";
    // $result = mysqli_query($konek, $query);

     
    if(mysqli_query($konek, $query)){
      echo '<script>alert("Successfully Registered");
      window.location.href="login.php"
       </script>';
    }
    else{
      // echo '<script>alert("Gagal Registered"); </script>';
      echo "Error: " . $query . "<br>" . $konek->error;
    }
   
    }
  ?>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="assets/images/logo.svg" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Log in</h1>
            <form action="register.php" method="post" class="row">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required="">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required="">
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required="">
              </div>
              <!-- <div class="form-group">
                <label for="foto">Upload Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" placeholder="Unggah Foto Anda" required="">
              </div> -->
               <div class="form-group col-sm-6">
                <label for="tgl_lahir">Tanggal Lahirmu</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="" >
              </div>
              <div class="form-group col-sm-6">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control">
                  <option value="l">Cowok</option>
                  <option value="k">Cewek</option>
                </select>
              </div>
              <input type="submit" name="register" id="register" class="btn btn-block login-btn">
            </form>

            <p class="login-wrapper-footer-text">You Already have an account? 
              <a href="login.php" class="text-reset">Login here</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/images/bg-login.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
