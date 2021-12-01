<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Registration</title>
</head>

<body>


  <div class="container">
    <h1 class="page-header text-center">Registration </h1>
  </div>
  <hr>
  <hr>



  <!-- navbar -->
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Registration.php">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.php">News</a>
                    </li>
        </ul>
      </div>
    </nav>
  </div>

  <br>
  <p class="text-center lead text-success">If you want to use this webpage please register.</p>
  <br>
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


<footer class="static-bottom">
        <div class="row">
            <div class="col-sm-5">
                <span >48°14'22"N 16°22'40E"</span>
            </div>
            <div class="col-sm-5">
                <strong class="name">Hotel Palace</strong>

                <nav class="footer-nav">
                    <a href="about.php">About</a>
                    <a href="news.php">News</a>
                    <a href="Login.php">Login</a>
                </nav>
            </div>
        </div>

    </footer>
  <!--JavaScript-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>