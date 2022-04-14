<?php include 'includes/head.php';
include 'includes/navbar.php'?>
<body>
<?php 
<<<<<<< HEAD

    if (isset($_SESSION['username'])) {
         // removes backslashes
         $username = stripslashes($_SESSION['username']);
        require('../config/db.php');
        $result = mysqli_query($con,"SELECT * FROM users WHERE username= '$username'");
        $row = mysqli_fetch_array($result);
        if($row === false){
            mysqli_error($con);
        }
        ?>
<div class="container">
<h5>Do you want to change user info?</h5>
<a href="update-process.php?id=<?php echo $row["ID"]; ?>">Click here!</a>
</div>


<?php
    }
        

?>
=======
    // require('../config/db.php');

    // if (isset($_REQUEST['username'])) {
    //     // removes backslashes
    //     $username = stripslashes($_REQUEST['username']);

    require('../config/db.php');
    $result = mysqli_query($con,"SELECT * FROM users where username= '" . $_SESSION['username'] . "'");
    $row = mysqli_fetch_array($result)
       

?>
<div class="container">
<h5>Do you want to change user info?</h5>
<a href="update-process.php?id=<?php echo $row["id"]; ?>">Click here!</a>
</div>
>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85


<?php include 'includes/footer.php'?>
</body>