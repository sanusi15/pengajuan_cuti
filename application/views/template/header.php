<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>MCA Indonesia</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="<?= base_url('assets/template/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <!-- <link href="<?= base_url('assets/template/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?= base_url('assets/template/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?= base_url('assets/template/css/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?= base_url('assets/template/css/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <link href="<?= base_url('assets/template/css/fullcalendar/fullcalendar.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?= base_url('assets/template/css/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Theme style -->
    <link href="<?= base_url('assets/template/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/dashboard.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="icon" type="imgae/ico" href="<?= base_url('assets/img/favicon.ico'); ?>">
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="index.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            Web Cuti MCA
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <?php if ($this->session->userdata('userdata')['level'] == 1) : ?>
                                <span>Admin</span>
                            <?php elseif($this->session->userdata('userdata')['level'] == 2) : ?>
                                <span>Manager</span>
                            <?php else: ?>
                                <span>Pegawai</span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">