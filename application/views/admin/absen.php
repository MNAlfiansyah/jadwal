<!doctype html>
<html lang="en">
<?php $this->load->view('cj/css');?>
<body>

    <!-- POPUP EDIT -->
    <?php
    foreach($bajah->result_array() as $i):
        $nrp=$i['nrp'];
        $nama=$i['nama'];
        $pn=$i['pangkat'];
        $jb=$i['jabatan'];
        $sts=$i['status'];
        $jk=$i['jenis_kelamin'];
        $stss=$i['statuss'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $nrp;?>"   role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                     <h3 class="modal-title" id="myModalLabel">Edit Piket</h3>
                 </div>
                 <div class="modal-body form">
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/dashboard/edit_piket'?>">
                        <input type="hidden" value="" name="id"/> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-xs-3" >nrp</label>
                                <div class="col-xs-8">
                                    <input name="nrp" value="<?php echo $nrp;?>" class="form-control" type="text" placeholder="Nomor Registrasi Pusat" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="nama">Nama</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>" placeholder="Nama" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="pangkat">Pangkat</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="pangkat" value="<?php echo $pn;?>" placeholder="Pangkat" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                    <select name="statuss" class="form-control" required="">
                                        <option value="">--Select status--</option>
                                        <?php if($stss=='hadir'):?>
                                            <option value="hadir" selected>Hadir</option>
                                            <option value="ijin">Ijin</option>
                                            <option value="sakit">Sakit</option>
                                            <option value="TK">TK</option>
                                            <?php elseif($stss=='sakit'):?>
                                                <option value="hadir">Hadir</option>
                                                <option value="ijin">Ijin</option>
                                                <option value="sakit" selected>Sakit</option>
                                                <option value="TK">TK</option>
                                                <?php elseif($stss=='ijin'):?>
                                                    <option value="hadir">Hadir</option>
                                                    <option value="ijin" selected>Ijin</option>
                                                    <option value="sakit">Sakit</option>
                                                    <option value="TK">TK</option>
                                                    <?php else:?>
                                                        <option value="hadir">Hadir</option>
                                                        <option value="ijin">Ijin</option>
                                                        <option value="sakit">Sakit</option>
                                                        <option value="TK" selected>TK</option>
                                                    <?php endif;?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input name="submit" type="submit" value="EDIT" class="btn btn-success active" style="border-radius: 2px;">
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

            <!-- SIDEBAR -->
            <div class="wrapper">
                <div class="sidebar" data-background-color="white" data-active-color="danger">
                    <div class="sidebar-wrapper">

                        <?php $this->load->view('name');?>

                        <ul class="nav">
                            <li>
                                <a href="<?php echo base_url('index.php/dashboard');?>">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li>
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
                            <li class="active">
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
                <!-- END SIDEBAR -->

                <!-- HEADER -->
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
                                <a class="navbar-brand" href="#">Absen Anggota</a>
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
                <!-- END HEADER -->

                <!-- CONTENT -->
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="text-align: center;margin-bottom: 30px;">Daftar Hadir</h2>
                            <p></p>
                            <table id="table_id" class="table table-striped " cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;text-align: center;">#</th>
                                        <th style="width: 10px;text-align: center;">NAMA</th>
                                        <th style="width: 10px;text-align: center;">PANGKAT</th>
                                        <th style="width: 10px;text-align: center;">status</th>
                                        <th style="width: 10px;text-align: center;">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach($bajah->result_array() as $i):
                                     $nrp=$i['nrp'];
                                     $nama=$i['nama'];
                                     $pn=$i['pangkat'];
                                     $stss=$i['statuss'];
                                     ?>
                                     <tr>
                                        <td><?php echo $no++;?></td>
                                        <td style="text-align: center;"><?php echo $nama;?></td>
                                        <td style="text-align: center;"><?php echo $pn;?></td>
                                        <td style="text-align: center;"><?php echo $stss;?></td>
                                        <td style="text-align: center;">
                                            <a  style="border-radius: 2px;" data-toggle="modal" data-target="#modal_edit<?php echo $nrp?>" title="edit/view"><button class="btn btn-primary active" style="border-radius: 2px;"><i class="fas fa-pencil-alt ai"></i></button></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php $this->load->view('copy');?>
        </div>
    </div>
    <!-- END CONTENT -->
</body>
<!--   Core JS Files   -->
<?php $this->load->view('cj/java');?>
<script type="text/javascript">
    function add_person()
    {
        save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
}
</script>
</html>
