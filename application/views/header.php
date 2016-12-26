<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title><?php echo $title ?></title>
		<!-- BOOTSTRAP STYLES-->
	    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" media="all"/>
	    <link href="<?php echo base_url();?>assets/css/bootstrap-datepicker.css" rel="stylesheet" media="all"/>
	    <!--<link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" />-->
	     <!-- FONTAWESOME STYLES-->
	    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" media="all"/>
	     <!-- MORRIS CHART STYLES-->
	    <link href="<?php echo base_url();?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" media="all"/>
	     <!-- CUSTOM STYLES-->
	    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" media="all"/>
	    <!-- TABLE STYLES -->
    	<link href="<?php echo base_url();?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" media="all"/>
	     <!-- GOOGLE FONTS-->
	   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' media="all"/>
	</head>
	<body>
	    <div id="wrapper">
	    	<!--Header-->
			<nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button  type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url();?>Dashboard">Albashar-e Admin</a>
				</div>
				<div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
					Last access : <?php date_default_timezone_set("Asia/Jakarta");
                    echo date('d/m/Y H:i:s', strtotime($log[1]->time_stamp));?> &nbsp;
					<a href="<?php echo base_url();?>Login/logout" class="btn btn-danger square-btn-adjust">Logout</a>
				</div>
			</nav>
			<!-- End of Header-->
