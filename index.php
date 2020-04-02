<?php  
  // Connection and Helper
	require_once('config/connection.php');
  require_once('config/helper.php');
  
  // Check if the user is already logged in, if yes then redirect him to welcome page
  $isLoggedin = false;
  if ((isset($_SESSION['loggedin'])) && $_SESSION['loggedin'] == TRUE) {
    $isLoggedin = true;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" class="js-site-favicon" type="image/svg+xml" href="<?= BASE_URL.'assets/images/favicon.svg'; ?>">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="<?= BASE_URL.'libraries/bootstrap-4/css/bootstrap.min.css'; ?>">
		
    <!-- Font awesome 4 -->
    <link rel="stylesheet" href="<?= BASE_URL.'libraries/font-awesome-4/css/font-awesome.min.css'; ?>">

		<!-- MyStyle CSS -->
    <link rel="stylesheet" href="<?= BASE_URL.'assets/css/mystyle.css'; ?>">

    <!-- Only this Page -->
    <link rel="stylesheet" href="<?= BASE_URL.'assets/css/welcome.css'; ?>">

    <title><?= 'phpnative. Framework - '.app('name_apps'); ?></title>
  </head>
  <body>
    
    <center class='mt-3'>
    <?php  
    if ($isLoggedin) {
    ?>
    
    <a href="<?= BASE_URL.'config/functions/signout.php'; ?>" class="btn btn-sm btn-danger">Sign Out</a>
    
    <?php
    } else {
    ?>

    <a href="<?= BASE_URL.'signin'; ?>" class="btn btn-sm btn-light">Sign In</a>

    <?php
    }
    ?>

    <div class="row no-gutters" style="margin-top: 130px;">
      <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 no-gutters text-center">
      <h1 class="text-center display-2 mb-0"><kbd>phpnative.</kbd></h1>
      <hr>
      <blockquote class="blockquote text-justify mt-3">
        <p class="mb-0"><span class="font-weight-bold">PHP native</span> merupakan pemrograman web perpaduan bahasa pemrograman yang didasari dengan bahasa pemrograman PHP yang mana bisa disisipi oleh text Javascript, css, bootstrap dan lain-lain. Native sendiri artinya asli, yakni pemrograman php yang murni disusun dan di coding/dibangun oleh para programmer sendiri tanpa ada istilah tambahan buat settingan/ konfigurasi lainnya. Manfaat dari PHP Native sederhana kalau kita sudah menguasai maka akan lebih mudah menggunakan PHP Framework.</p>
      </blockquote>
      </div>
    </div>

    <footer>
      created by <a href="https://github.com/acakdadu/phpnative" target="_blank" class="text-decoration-none"><span class="mf font-weight-bold">acakdadu</span></a>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Bootstrap JS -->
    <script src="<?= BASE_URL.'libraries/jquery-3/jquery-3.4.1.slim.min.js'; ?>"></script>
    <script src="<?= BASE_URL.'libraries/bootstrap-4/js/bootstrap.min.js'; ?>"></script>
    <script>
    $(document).ready(function() {
        console.log( "ready!" );
    });
    </script>
  </body>
</html>