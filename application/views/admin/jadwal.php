<!doctype html>
<html lang="en">
<?php $this->load->view('cj/css');?>
<style>
#calendar {
    max-width: 900px;
    margin: 0 auto;
}
</style>

<body>

    <!-- POPUP EVENT -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="error"></div>
                    <form class="form-horizontal" id="crud-form">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="title">Title</label>
                            <div class="col-md-4">
                                <input id="title" name="title" type="text" class="form-control input-md" readonly="">
                            </div>
                        </div>                            
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="description">Description</label>
                            <div class="col-md-7">
                                <textarea class="form-control" id="description" name="description" readonly=""></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="time">Start</label>
                            <div class="col-md-7">
                                <input id="time" name="time" type="text" class="form-control input-md" readonly="" value="<?=isset($default['start'])? $default['start'] : ""?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="end">End</label>
                            <div class="col-md-7">
                                <input id="okok" name="end" type="text" class="form-control input-md" readonly="" value="<?=isset($default['end'])? $default['end'] : ""?>"">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default active" style="border-radius: 2px;" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END POPUP -->

    <!-- SIDEBAR -->
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
                    <li >
                        <a href="<?php echo base_url('index.php/dashboard/lok')?>">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Lokasi</p>
                        </a>
                    </li >
                    <li class="active">
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
        <!-- SIDEBAR -->

        <!-- HEAD CONTENT -->
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
                        <a class="navbar-brand" href="#">Jadwal Piket</a>
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
        <!-- END HEAD CONTENT -->

        <!-- CONTENT -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
        <?php $this->load->view('copy');?>





    </body>

    <!-- JS -->
    <?php $this->load->view('cj/java');?>
    <script src='<?php echo base_url();?>assets/js/main.js'></script>
    <script type="text/javascript">
        function modal(data) {
        // Set modal title
        $('.modal-title').html(data.title);
        // Clear buttons except Cancel
        $('.modal-footer button:not(".btn-default")').remove();
        // Set input values
        $('#title').val(data.event ? data.event.title : '');        
        $('#description').val(data.event ? data.event.description : '');
        $('#time').val(data.event ? data.event.start : '');
        $('#okok').val(data.event ? data.event.end : '');
        // Create Butttons
        $.each(data.buttons, function(index, button){
            $('.modal-footer').prepend('<a href="<?php echo base_url('dashboard/pik');?>"><button type="button" id="' + button.id  + '" class="btn ' + button.css + '" style = "'+ button.style+'">' + button.label + '</button></a>')
        })
        //Show Modal
        $('.modal').modal('show');
    }
</script>

</html>
