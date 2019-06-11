<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PROPIV | PROGRAMA DE PROMOCION INTERNA DEL VOTO</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/jquery-ui.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>datatables/dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url();?>datatables/buttons.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>datatables/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">   
    <!-- jQuery -->
    <script src="<?php echo base_url();?>js/jquery.js"></script>
    <!--<script src="<?php echo base_url();?>js/jquery-2.2.1.min.js"></script>-->
    <script src="<?php echo base_url();?>js/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>js/script.js"></script>
    <script src="<?php echo base_url();?>datatables/dataTables.min.js"></script>
    <script src="<?php echo base_url();?>datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>datatables/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>datatables/jszip.min.js"></script>
    <script src="<?php echo base_url();?>datatables/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>datatables/vfs_fonts.js"></script>
    
</head>

<body>
    <!-- Encabezdo principal -->
    
    <nav class="nav navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3><b>PROPIV | PROGRAMA DE PROMOCION INTERNA DEL VOTO</b></h3>
            </div>

            <div class="nav navbar-nav navbar-right">

                
                <h4>Bienvenido/a <?php echo $nombre?></h4>
                <a href="<?php echo base_url();?>login_session/close_session">
                <h5>Cerrar Sesion</h5>
                </a>
            </div>
        </div>     
    </nav>    