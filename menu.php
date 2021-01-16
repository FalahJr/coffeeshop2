<?php
        include("header.php");
			$jenis = $_GET['jenis'];

?>
	<div class="container mt-5">
		<center>
			<h2>Daftar Menu <span style="text-transform:capitalize"><?php echo $jenis ?></span></h2>
		</center>
            <div class="row mt-3">
            	<?php
			require_once "koneksi.php";
				//ambil id dari query string
			// die($jenis);

			// if ($jenis = "makanan") { 
                $halaman = 4;
                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                  // $result = mysql_query("SELECT * FROM tb_masjid");
                   
				$sql = "SELECT * FROM menu WHERE jenis = '$jenis'";
                $query = mysqli_query($konek, $sql);
                $total = mysqli_num_rows($query);
                // die($query);
                $pages = ceil($total/$halaman); 
                // die($halaman);
                // echo $total;
                $query2 = mysqli_query($konek,"SELECT * FROM menu WHERE jenis = '$jenis' LIMIT $mulai, $halaman")or die(mysql_error);
                $no =$mulai+1;
				// die($query);

				while($menu = mysqli_fetch_assoc($query2)){
			
				?>
                <div class="col-12 col-sm-6 col-xl-3 card-list">
                    <a class="link" href="info-mobil.php" style="text-decoration: none; color:#fdbb28">
                        <div class="card">
                            <img class="img-responsive img-destination" alt="a" src="assets/images/upload/<?php echo $menu['gambar']?>" width="100%" height="160pt">
                            <div class="card-body text-left">
                                <h5 style="text-transform: capitalize"><?php echo $menu['nama_menu']?>
                                </h5>
                                <p style="font-size: 13px;margin-top: -10px">IDR <?php echo $menu['harga']?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
				}
                ?>
                
                
            </div>
            <div class="">
                  <?php for ($i=1; $i<=$pages ; $i++){ ?>
                  <a class="btn btn-warning text-light" href="?jenis=<?php echo $jenis; ?>&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                 
                  <?php } ?>
                 
                </div>
        </div>
<?php
        include("footer.php");
?>