<?php 
  // utiliser les sessions
  session_start();
  // verifier si utilisateur a l'autorisation
  if(!isset($_SESSION['user'])) 
    header('Location: login.php');      

  // define a root directory
  define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
  // require a mysql class and initialize it to handle all db request
  require_once( ROOT_DIR . '/php-admin/utils/Mysql.php');

  $mysql = new Mysql('localhost', 'formation', 'root', '');


?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>DASH<span>IO</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Deconnecter</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <h5 class="centered"><?= $_SESSION['user']['username'] ?></h5>
          <li class="mt">
            <a href="#">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Afficher</span>
              </a>
            <ul class="sub">
              <li><a href="afficher-domaine.php">domaine</a></li>
              <li><a href="afficher-formation.php">formation</a></li>
              <li><a href="afficher-plan-formation.php">Plan formation</a></li>
              <li><a href="afficher-grade.php">grade</a></li>
              <li><a href="afficher-organism-formation.php">organism formation</a></li>
              <li><a href="afficher-typ-local.php">Typ local</a></li>
              <li><a href="afficher-theme.php">Theme</a></li>
              <li><a href="afficher-structure.php">Structure</a></li>
              <li><a href="afficher-fonction.php">Fonction</a></li>
              <li><a href="afficher-agent.php">Agent</a></li>
              <li><a href="afficher-ordre-mission.php">Ordre Mission</a></li>
              <li><a href="afficher-typ-frai.php">Typ_Frai</a></li>
              <li><a href="afficher-pris-charge.php">Pris Charge</a></li>
              <li><a href="afficher-planifier.php">Planifier</a></li>
              <li><a href="afficher-benefier.php">Benefier</a></li>
              <li><a href="afficher-remborcer.php">remborcer</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Ajouter</span>
              </a>
            <ul class="sub">
              <li><a href="ajouter-organism.php">Organism</a></li>
              <li><a href="ajouter-typ-local.php">Typ local</a></li>
              <li><a href="ajouter-plan-formation.php">Plan Formation</a></li>
              <li><a href="ajouter-domain.php">Domain</a></li>
              <li><a href="ajouter-grade.php">Grade</a></li>
              <li><a href="ajouter-theme.php">Theme</a></li>
              <li><a href="ajouter-formation.php">Formation</a></li>
              <li><a href="ajouter-structure.php">Structure</a></li>
              <li><a href="ajouter-fonction.php">fonction</a></li>
              <li><a href="ajouter-agent.php">Agent</a></li>
              <li><a href="ajouter-ordre-mission.php">ordre mission</a></li>
              <li><a href="ajouter-typ-frai.php">Typ_Frai</a></li>
              <li><a href="ajouter-pris-charge.php">Pris Charge</a></li>
              <li><a href="ajouter-planifier.php">Planifier</a></li>
              <li><a href="ajouter-benefier.php">Benefier</a></li>
              <li><a href="ajouter-remborcer.php">remborcer</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>