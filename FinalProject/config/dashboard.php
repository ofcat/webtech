<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include '../sites/includes/head.php';
include '../sites/includes/navbar.php';
?>

<body>
    <div class="form">
    
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now logged in.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
    <?php include '../sites/includes/footer.php'?>
</body>
</html>