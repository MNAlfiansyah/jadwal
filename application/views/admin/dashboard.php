<!doctype html>
<html lang="en">

<?php $this->load->view('cj/css');?>

<body>

	<div class="wrapper">
		<div class="sidebar" data-background-color="white" data-active-color="danger">
			<div class="sidebar-wrapper">

				<?php $this->load->view('name');?>

				<ul class="nav">
					<li class="active">
						<a href="<?php echo base_url('index.php/dashboard')?>">
							<i class="fas fa-home"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('dashboard/lok')?>">
							<i class="fas fa-map-marker-alt"></i>
							<p>Lokasi</p>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('dashboard/jad')?>">
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
						<a class="navbar-brand" href="#">Dashboard</a>
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

		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-5">
										<div class="icon-big icon-warning text-center">
											<i class="fas fa-map-marker-alt"></i>
										</div>
									</div>
									<div class="col-xs-7">
										<div class="numbers">
											lokasi
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<a href="<?php echo base_url('index.php/dashboard/lok')?>"><i class="fas fa-eye"></i> LIHAT</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-5">
										<div class="icon-big icon-success text-center">
											<i class="far fa-calendar-alt"></i>
										</div>
									</div>
									<div class="col-xs-7">
										<div class="numbers">
											jadwal
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<a href="<?php echo base_url('index.php/dashboard/jad')?>"><i class="fas fa-eye"></i> LIHAT</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-5">
										<div class="icon-big icon-danger text-center">
											<i class="fas fa-user-alt"></i>
										</div>
									</div>
									<div class="col-xs-7">
										<div class="numbers">
											aggt
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<a href="<?php echo base_url('index.php/dashboard/user')?>"><i class="fas fa-eye"></i> LIHAT</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-5">
										<div class="icon-big icon-info text-center">
											<i class="far fa-calendar-check"></i>
										</div>
									</div>
									<div class="col-xs-7">
										<div class="numbers">
											absen
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<a href="<?php echo base_url('index.php/dashboard/absen')?>"><i class="fas fa-eye"></i> LIHAT</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('copy');?>
	</div>
</div>
</div>
</div>
</body>

<?php $this->load->view('cj/java');?>

<script type="text/javascript">
	$(document).ready(function(){

		demo.initChartist();

		$.notify({
			message: "Selamat Datang <?php echo $this->session->userdata("user_nama") ?>."

		},{
			type: 'success',
			timer: 4000
		});

	});
</script>

</html>
