<!doctype html>
<html lang="en">

<?php $this->load->view('cj/css');?>

<body>
	<!-- POPUP TAMBAH -->
	<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Tambah Events</h3>
				</div>
				<div class="modal-body form">
					<form action="<?php echo base_url('index.php/dashboard/tambah_piket')?>" method="post" id="form" class="form-horizontal">
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3" for="title">Title</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="title" value="<?=isset($default['title'])? $default['title'] : ""?>" placeholder="Title" required="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3" for="description">Description</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="des" value="<?=isset($default['description'])? $default['description'] : ""?>" placeholder="description" required="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3" for="start">Start</label>
								<div class="col-md-9">
									<input type="datetime-local" class="form-control" name="start" value="<?=isset($default['start'])? $default['start'] : ""?>" placeholder="start" required="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3" for="end">End</label>
								<div class="col-md-9">
									<input type="datetime-local" class="form-control" name="end" value="<?=isset($default['end'])? $default['end'] : ""?>" placeholder="end" required="">
								</div>
							</div>
							<div class="modal-footer">
								<input name="submit" type="submit" value="OK" class="btn btn-success active" style="border-radius: 2px;">
								<button type="button" class="btn btn-danger active" style="border-radius: 2px;" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- END POPUP TAMBAH -->

	<!-- POPUP EDIT -->
	<?php
	foreach($allp2->result_array() as $i):
		$nrp=$i['nrp'];
		$ev=$i['event_id'];
		$st=$i['start'];
		$en=$i['end'];
		$tl=$i['title'];
		$de=$i['description'];
		$id=$i['id'];

		?>

		<div class="modal fade" id="modal_edit<?php echo $ev;?>"   role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
						<h3 class="modal-title" id="myModalLabel">Edit Anggota</h3>
					</div>
					<div class="modal-body form">
						<form class="form-horizontal" method="post">
							<div class="form-body">
								<div class="form-group">
									<table class="table table-striped" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th style="width: 10px;text-align: center;">ID</th>
												<th style="width: 10px;text-align: center;">NRP</th>
												<th style="width: 10px;text-align: center;">Title</th>
												<th style="width: 10px;text-align: center;">Description</th>
												<th style="width: 10px;text-align: center;">Start</th>
												<th style="width: 10px;text-align: center;">End</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="text-align: center;"><?php echo $id;?></td>
												<td style="text-align: center;"><?php echo $nrp;?></td>
												<td style="text-align: center;"><?php echo $tl;?></td>
												<td style="text-align: center;"><?php echo $de;?></td>
												<td style="text-align: center;"><?php echo $st;?></td>
												<td style="text-align: center;"><?php echo $en;?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger active" style="border-radius: 2px;" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<!-- END POPUP EDIT -->

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
				<li class="active">
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
					<a class="navbar-brand" href="#">Piket</a>
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
				<h2 style="text-align: center;margin-bottom: 30px;">Daftar Anggota</h2>
				&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
				<button class="btn btn-success active" style="border-radius: 2px;" onclick="add_person()"><i class="fa fa-plus ai"></i><b class="ai">Tambah</b></button>
				<p></p>

				<table id="table_id" class="table table-striped " cellspacing="0" width="100%">
					<thead>
						<tr>
							<th style="width: 20px;text-align: center;">#</th>
							<th style="width: 10px;text-align: center;">Start</th>
							<th style="width: 10px;text-align: center;">End</th>
							<th style="width: 10px;text-align: center;">Title</th>
							<th style="width: 10px;text-align: center;">description</th>                               
							<th style="width: 17%;text-align: center;">AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach($allp->result_array() as $i):

							$st=$i['start'];
							$en=$i['end'];
							$tl=$i['title'];
							$de=$i['description'];
							$id=$i['id'];



							?>
							<tr>
								<td><?php echo $no++;?></td>
								<td style="text-align: center;"><?php echo $st;?></td>
								<td style="text-align: center;"><?php echo $en;?></td>
								<td style="text-align: center;"><?php echo $tl;?></td>
								<td style="text-align: center;"><?php echo $de;?></td>
								<td style="text-align: center;">
									<a  style="border-radius: 2px;" data-toggle="modal" data-target="#modal_edit<?php echo $id;?>" title="Edit/view"><button class="btn btn-primary active" style="border-radius: 2px;"><i class="fas fa-pencil-alt ai"></i></button></a>

								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
	<!-- END CONTENT -->

	<?php $this->load->view('copy');?>
</div>
</div>
</div>
</div>
</body>

<?php $this->load->view('cj/java');?>

<!-- JS POPUP -->
<script type="text/javascript">
	function add_person()
	{
		save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
}
</script>
<!-- END JS POPUP -->
<?php
 mysql_connect("localhost","root","") or die("error koneksi");
  mysql_select_db("ci-login") or die("error pilih db");
 
 $judul=$_POST["judul"];

 $result=mysql_query("SELECT e.id , e.start, e.end, e.title, e.description , a.nrp , a.event_id from events e inner join anggota_piket a on a.event_id = e.id  like '%$judul%' ");
 $found=mysql_num_rows($result);
 
 if($found>0){
    while($row=mysql_fetch_array($result)){
    echo "<li>$row[event_id]</br>
            <a href=\"$row[id]\">$row[id]</a></li>";
    }   
 }else{
    echo "<li>Tidak ada artikel yang ditemukan <li>";
 }
?>
<script type="text/javascript">
  $(document).ready(function(){
                 
      function search(){

         var judul=$("#search").val();

          if(judul!=""){
              $("#result").html("<img src='img/ajax-loader.gif'/>");
                $.ajax({
                    type:"post",
                    url:"search.php",
                    data:"judul="+judul,
                    success:function(data){
                      $("#result").html(data);
                      $("#search").val("");
                    }
                });
          }                                    
      }

      $("#button").click(function(){
          search();
      });

      $('#search').keyup(function(e) {
          if(e.keyCode == 13) {
             search();
          }
      });
  });
</script>



</html>
