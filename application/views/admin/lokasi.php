<!doctype html>
<html lang="en">

<?php $this->load->view('cj/css');?>
<style>

#map { 
    height: 500px;
    width: 500px;
    left: 29%;
    border-radius: 100%;
    
}
#au{
    position: relative;
    z-index: 1;
    left: 610px;
    top: 450px;
    border-radius: 100%;
    height: 50px;
    width: 50px;
}


</style>
<body onload="peta_awal()">



    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">
            <div class="sidebar-wrapper">

                <?php $this->load->view('name');?>

                <ul class="nav">
                    <li>
                        <a href="<?php echo base_url('index.php/dashboard')?>">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('index.php/dashboard/lok')?>">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Lokasi</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/dashboard/jad')?>">
                            <i class="far fa-calendar-alt"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/dashboard/user')?>">
                         <i class="fas fa-users"></i>
                         <p>Anggota</p>
                     </a>
                 </li>
                 <li>
                    <a href="<?php echo base_url('index.php/dashboard/absen')?>">
                        <i class="far fa-calendar-check"></i>
                        <p>Absen</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/dashboard/pik')?>">
                        <i class="fas fa-user-shield"></i>
                        <p>Piket</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Lokasi Piket</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo $this->session->userdata("user_nama") ?>
                            </a>
                        </li>
                        <li> 
                            <a href="<?php echo base_url() ?>index.php/dashboard/logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align: center;">Daftar Lokasi</h2>
                <div class="row">
                   <a href="https://www.google.com/maps/place/Jl.+Sekelimus+VI+No.19,+Batununggal,+Bandung+Kidul,+Kota+Bandung,+Jawa+Barat+40266/@-6.9488776,107.6361494,17z/data=!3m1!4b1!4m5!3m4!1s0x2e68e8421651d83b:0x28e55edf256d1e25!8m2!3d-6.9488776!4d107.6383381?hl=en-US"> <button id="au" class="btn btn-success active"><i class="fas fa-arrow-right"></i></button></a>
                    <div id="map"></div>



                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <?php $this->load->view('copy');?>

</body>

<!-- JS -->
<script>
    function peta_awal() {
            // posisi default peta saat diload
            // koordinat dan zoom view peta 
            var map = L.map('map').setView([-6.948886, 107.638359], 15);
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 20,
                attribution:
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">DFA</a>, ' 
            }).addTo(map);

            <?php
            $host       =   "localhost";
            $user       =   "root";
            $password   =   "";
            $database   =   "ci-login";
            $db = mysqli_connect($host, $user, $password, $database);
            $sql = mysqli_query($db, "SELECT * from lokasi ");
            
            $js = '';
            
            while($row = mysqli_fetch_assoc($sql)) {
                $js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map)
                .bindPopup("<b>'.$row['nama_post'].'</b>");
                ';
            }
            // menampilkan script js hasil dari looping diatas
            echo $js;

            ?>

            var popup = L.popup();
        }
        
    </script>
    <?php $this->load->view('cj/java');?>


    </html>
