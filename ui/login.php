<?php 

  require_once('../utils/Mysql.php');
  // demarer l utilisation des sessions
  session_start();

  if(isset($_SESSION['user'])) 
    header('Location: afficher-agent.php');    

  if(isset($_POST['login'], $_POST['username'], $_POST['mot_de_passe'])) {
    $db = new Mysql('localhost', 'formation', 'root', '');
    $res = $db->query('SELECT id, username FROM utilisateur WHERE username=? AND mot_de_passe=?', false, [
      'whereFieldsValues' => [
        $_POST['username'], 
        $_POST['mot_de_passe']
      ]
    ]);
    // creer une session et rediriger l'user vers dashoard
    // si il a l'autorisation
    if($res){
      $_SESSION['user'] = $res;
      // rediriger lutilisateur ver dashboard
      header('Location: afficher-agent.php');      
    } else {
      $message['danger'] = 'Incorrect credentials';
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

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
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="#" method="post">
        <h2 class="form-login-heading">Login</h2>
        <?php if(isset($message)): ?>
          <?php foreach ($message as $kind => $alert) { ?>
            <div class="alert alert-<?= $kind ?>"><?= $alert ?></div>
          <?php }?>
        <?php endif; ?>
        <div class="login-wrap">
          <input type="text" name='username' class="form-control" placeholder="Username" autofocus>
          <br>
          <input type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe">
          <br>
          <button class="btn btn-theme btn-block" name='login' type="submit"><i class="fa fa-lock"></i> se connecter</button>
          <hr>
        </div>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
