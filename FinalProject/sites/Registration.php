<?php include 'includes/head.php'?>

<body>
  <!-- navbar -->
  <?php include 'includes/navbar.php'?>

  <p class="text-center lead text-success">If you want to use this webpage please register.</p>

  <!-- Registration Form -->
  <div class="container">
    <div class="card border-success">
      <form action = "Register.php" method="post">
        <div class="card-header">
          <h3>Register</h3>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="name" name="name" class="form-control">
          </div>
          <br>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" value="password" name="password" class="form-control">
          </div>
          <br>
          <div class="form-group">
            <label for="e-mail">e-mail</label>
            <input type="email" value="e-mail" name="email" class="form-control">
          </div>
        </div>
        <div class="card-footer">
          <input type="submit" value="submit">
        </div>
      </form>
    </div>
  </div>
  <?php
  $path = 'Information/Registrations/';
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
  }
  
  if (isset($_POST['password']) and isset($_POST['email']) and isset($_POST['name'])) {
    $data = array($_POST['email'], $_POST['password'], $_POST['name']);
    $eintrag = implode(";", $data) . "\n\r";
    file_put_contents($path . 'user_info.txt', $eintrag, FILE_APPEND);

    setcookie("login","",time()-60,"/");
    setcookie("login", $eintrag, time()+60,"/");
  }
  ?>


</body>
<?php include 'includes/footer.php';?>
</html>