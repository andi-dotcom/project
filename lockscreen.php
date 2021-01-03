<?php
require_once"config.php";
if (!isset($_SESSION["user"]))
{
    echo "<script>alert('Silahkan login dulu.');</script>";
    echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Toko Asgar</title>
  </head>
  <body>
    <?php
          if(isset($_POST['unlock'])){
            $user = trim(mysqli_real_escape_string($con, $_POST['username']));
            $pass = trim(mysqli_real_escape_string($con, $_POST['password']));
            $sql_login = mysqli_query($con, "SELECT * FROM login WHERE username = '$user' AND password = '$pass'") or die (mysqli_error($con));
            if(mysqli_num_rows($sql_login) > 0){
              $akun = $sql_login ->  fetch_assoc();
              $_SESSION['user']=$akun;
              echo"<script>window.location='transaksi.php';</script>";
            }else {
              echo "<script>alert('Password salah!.');</script>";
              echo "<script>location='lockscreen.php';</script>";

           
            }
          }
        ?>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="lockscreen-content">
      <div class="logo">
        <h1 style="font-family: comic sans ms">Toko Asgar</h1>
      </div>
      <div class="lock-box"><img class="rounded-circle user-image" src="images/<?= $_SESSION['user']['foto']; ?>">
        <h4 class="text-center user-name"><?= $_SESSION['user']['nama']; ?></h4>
        <p class="text-center text-muted">Account Locked</p>
        <form class="unlock-form" action="" method="POST">
          <div class="form-group">
            <input class="form-control" type="hidden" value="<?= $_SESSION['user']['username']; ?>" name="username">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="password" autofocus>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="unlock"><i class="fa fa-unlock fa-lg"></i>UNLOCK </button>
          </div>
        </form>
        <p><a href="index.php">Bukan <strong><?= $_SESSION['user']['nama']; ?></strong> ? Login Disini.</a></p>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
  </body>
</html>