<!doctype html><html lang="en">
<!-- CSS -->
<?php $this->load->view('cj/css');?>
<!-- CSS END -->
<body>

    <!-- POPUP TAMBAH -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Tambah Anggota</h3>
                </div>
                <div class="modal-body form">
                    <form action="<?php echo base_url('index.php/dashboard/tambah')?>" method="post" id="form" class="form-horizontal">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="nrp">NRP</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nrp" value="<?=isset($default['nrp'])? $default['nrp'] : ""?>" placeholder="Nomor Registrasi Pusat" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="nama">Nama</label>
                                <div class="col-md-9">
                                    <input type="date-time" class="form-control" name="name" value="<?=isset($default['name'])? $default['name'] : ""?>" placeholder="Nama" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="pangkat">Pangkat</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="pangkat" value="<?=isset($default['pangkat'])? $default['pangkat'] : ""?>" placeholder="pangkat" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="jabatan">Jabatan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="jabatan" value="<?=isset($default['jabatan'])? $default['jabatan'] : ""?>" placeholder="jabatan" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                    <select name="status" class="form-control" required="">
                                        <option value="">--Select Status--</option>
                                        <option name="status" value="Aktif">Aktif</option>
                                        <option name="status" value="Nonaktif">Nonaktif</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <select name="jenis_kelamin" class="form-control" required="">
                                        <option value="">--Select Gender--</option>
                                        <option name="jenis_kelamin" value="laki-laki">laki-laki</option>
                                        <option name="jenis_kelamin" value="perempuan">perempuan</option>
                                    </select>
                                    <span class="help-block"></span>
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
    foreach($biasa->result_array() as $i):
        $nrp=$i['nrp'];
        $nama=$i['nama'];
        $pn=$i['pangkat'];
        $jb=$i['jabatan'];
        $sts=$i['status'];
        $jk=$i['jenis_kelamin'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $nrp;?>"   role="dialog" aria-labelledby="largeModal" aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                       <h3 class="modal-title" id="myModalLabel">Edit Anggota</h3>
                   </div>
                   <div class="modal-body form">
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/dashboard/edit_anggota'?>">
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
                                    <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>" placeholder="Nama" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="pangkat">Pangkat</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="pangkat" value="<?php echo $pn;?>" placeholder="Pangkat" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="jabatan">Jabatan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="jabatan" value="<?php echo $jb;?>" placeholder="Jabatan" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                    <select name="status" class="form-control" required="">
                                        <option value="">--Select status--</option>
                                        <?php if($sts=='Aktif'):?>
                                            <option value="Aktif" selected>Aktif</option>
                                            <option value="Nonaktif">Nonaktif</option>
                                            <?php else:?>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Nonaktif" selected="">Nonaktif</option>
                                            <?php endif;?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Jenis Kelamin</label>
                                    <div class="col-md-9" >
                                        <select name="jenis_kelamin" class="form-control" required="">
                                            <option value="">--Select Gender--</option>
                                            <?php if($jk=='laki-laki'):?>
                                                <option value="laki-laki" selected>laki-laki</option>
                                                <option value="perempuan">perempuan</option>
                                                <?php else:?>
                                                    <option value="laki-laki">laki-laki</option>
                                                    <option value="perempuan" selected>perempuan</option>
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
                        <li class="active">
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
                            <a class="navbar-brand" href="#">Data Anggota</a>
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
                        <h2 style="text-align: center;margin-bottom: 30px;">Daftar Anggota</h2>
                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                        <button class="btn btn-success active" style="border-radius: 2px;" onclick="add_person()"><i class="fa fa-plus ai"></i><b class="ai">Tambah</b></button>
                        <p></p>
                    
                        <table id="table_id" class="table table-striped " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px;text-align: center;">#</th>
                                    <th style="width: 10px;text-align: center;">NAMA</th>
                                    <th style="width: 10px;text-align: center;">PANGKAT</th>
                                    <th style="width: 10px;text-align: center;">STATUS</th>
                                    <th style="width: 10px;text-align: center;">JENIS KELAMIN</th>
                                    <th style="width: 10px;text-align: center;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach($biasa->result_array() as $i):
                                 $nrp=$i['nrp'];
                                 $nama=$i['nama'];
                                 $pn=$i['pangkat'];
                                 $jb=$i['jabatan'];
                                 $sts=$i['status'];
                                 $jk=$i['jenis_kelamin'];
                                 ?>
                                 <tr>
                                    <td><?php echo $no++;?></td>
                                    <td style="text-align: center;"><?php echo $nama;?></td>
                                    <td style="text-align: center;"><?php echo $pn;?></td>
                                    <td style="text-align: center;"><?php echo $sts;?></td>
                                    <td style="text-align: center;"><?php echo $jk;?></td>
                                    <td style="text-align: center;">
                                        <a  style="border-radius: 2px;" data-toggle="modal" data-target="#modal_edit<?php echo $nrp?>" title="Edit/view"><button class="btn btn-primary active" style="border-radius: 2px;"><i class="fas fa-pencil-alt ai"></i></button></a>
                                        <a href="<?php echo base_url('index.php/dashboard/delete/'.$nrp);?>" title="hapus"><button class="btn btn-danger active" style="border-radius: 2px;"><i class="fas fa-trash-alt ai"></i></button></a>
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
    </body>

    <!-- JS -->
    <?php $this->load->view('cj/java');?>
    <!-- END JS -->

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


</html>
