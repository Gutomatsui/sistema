<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">

    <title>E-Doc</title>
    
    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/plugins.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/themes.css">

    <script src="<?php echo base_url(); ?>js/vendor/modernizr.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>js/app.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.mask.min.js"></script>
    <script src="<?php echo base_url(); ?>js/util.js"></script>
    <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url();?>js/pages/formsWizard.js"></script>
        <script>$(function(){ FormsWizard.init(); });</script>

        
</head>

<body>
    <div id="page-wrapper">
        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
            <div id="sidebar">
                <div id="sidebar-scroll">
                    <div class="sidebar-content">
                        <a href="<?php echo base_url(); ?>" class="sidebar-brand">
                            <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>E-Doc</strong></span>
                        </a>
                        <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                            <div class="sidebar-user-avatar">
                                <a href="page_ready_user_profile.html">
                                    <img src="<?php echo base_url();?>img/Renko_Logo_SolucoesContabeis.png" alt="avatar">
                                </a>
                            </div>
                            <div class="sidebar-user-name"><?php echo $_SESSION['nome'] . " " . $_SESSION['sobrenome']; ?></div>
                            <div class="sidebar-user-links">
                                                   <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                                <a href="<?php echo base_url(); ?>home/logout" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                            </div>
                        </div>
                        <ul class="sidebar-nav">
                            <?php echo $_SESSION["Menu"]; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="main-container">
                <header class="navbar navbar-default">
                    <ul class="nav navbar-nav-custom">
                        <li>
                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                <i class="fa fa-bars fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                    <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
                        <div class="form-group">
                            <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Pesquisar...">
                        </div>
                    </form>
                </header>
                <div id="page-content">
                    <div class="block">