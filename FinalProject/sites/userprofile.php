<?php include 'includes/head.php';
include 'includes/navbar.php'?>
<body>
<?php 
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


<?php include 'includes/footer.php'?>
</body>