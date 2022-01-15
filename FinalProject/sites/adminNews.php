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
        $create_datetime = date("Y-m-d H:i:s");
        $picPath    = $_REQUEST['picPath'];
        $picPath    = mysqli_real_escape_string($con, $picPath);

        $query    = "INSERT into `news` (title, body, create_datetime, picPath)
                     VALUES ('$title', '$body', '$create_datetime', '$picPath')";
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
        <input type="text"class="news-input" name="picPath" placeholder="Path to image" value="../uploads/" required/><br>
        <textarea  name="body" rows="4" cols="50" maxlength="999"></textarea> <br>
        
        <input type="submit" name="submit" value="Submit" class="news-button">
        <input type="reset">
        <p class="link"><a href="news.php">Click to view News</a></p>
    </form>

    <?php
    }
?>
<h4>Upload pictures</h4>
<form action="" method ="POST" enctype="multipart/form-data">
        <label for="file">File</label>
        <input type="file" name="fileToUpload" accept = "image/png, image/jpeg">
        <button type="submit">Upload</button>
    </form>

    <?php
$target_dir = "../uploads/news";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>


    <?php include 'includes/footer.php'?>
</body>