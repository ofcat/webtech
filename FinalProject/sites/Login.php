
<?php include 'includes/head.php'?>
<body>
<?php include 'includes/navbar.php'?>

    <?php
    function predef($int)
    {
        if (isset($_COOKIE["login"])) {
            $temp = explode(";", $_COOKIE["login"]);
            return $temp[$int];
        }
        if ($int == 1) {
            return "password";
        } else {
            return "username";
        }
    }
    ?>
    <div class="container">
        <form action="index.php" method="GET">
            <div class="form-group">
                <label for="logpassword">Password</label>
                <input type="password" name="logpassword" value=<?php $password = predef(1);
                                                                echo "$password"; ?>  class="form-control">
            </div>
            <div class="form-group">
                <label for="logname">Username</label>
                <input type="email" name="logname" value=<?php $user = predef(0);
                                                        echo "$user"; ?> class="form-control">
            </div>
            <input type="submit" value="submit">
        </form>
    </div>

    <?php include 'includes/footer.php'?>
</body>

</html>