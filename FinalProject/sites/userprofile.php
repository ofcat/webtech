<?php include 'includes/head.php';
include 'includes/navbar.php'?>
<body>
<?php 

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


<?php include 'includes/footer.php'?>
</body>