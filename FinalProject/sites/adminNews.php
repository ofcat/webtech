<?php include 'includes/head.php';
include 'includes/navbar.php'?>

<body>

<?php 

    require('../config/db.php');
    if (isset($_REQUEST['title'])) {
        // removes backslashes
        $title = stripslashes($_REQUEST['title']);
        //escapes special characters in a string
        $title = mysqli_real_escape_string($con, $title);
        $body    = stripslashes($_REQUEST['body']);
        $body    = mysqli_real_escape_string($con, $body);

        $query    = "INSERT into `news` (title, body)
                     VALUES ('$title', '$body')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Entry added successfully.</h3><br/>
                  <p class='link'>Click here to <a href='news.php'>check out news</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='adminNews.php'>try again</a>.</p>
                  </div>";
        }
    } else {
        ?>
        <form class="form" action="" method="post" >
        <h4 class="news-title">News</h4>
        <input type="text"class="news-input" name="title" placeholder="Title" required /><br>
        <textarea  name="body" rows="4" cols="50" maxlength="999"></textarea> <br>
        
        <input type="submit" name="submit" value="Submit" class="news-button">
        <input type="reset">
        <p class="link"><a href="news.php">Click to view News</a></p>
    </form>

    <?php
    }



?>


    <?php include 'includes/footer.php'?>
</body>