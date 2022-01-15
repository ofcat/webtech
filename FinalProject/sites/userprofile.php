<?php include 'includes/head.php';
include 'includes/navbar.php'?>
<body>
<?php 
    // require('../config/db.php');

    // if (isset($_REQUEST['username'])) {
    //     // removes backslashes
    //     $username = stripslashes($_REQUEST['username']);

       

?>

<form class="form" action="" method="post" >
        <h4 class="profile-title">Change username</h4>
        <input type="text"class="profile-input" name="username" placeholder="New username" required /><br>
        <input type="submit" name="submit" value="Submit" class="profile-button">
        <input type="reset" value="Reset">
    </form>

<?php include 'includes/footer.php'?>
</body>