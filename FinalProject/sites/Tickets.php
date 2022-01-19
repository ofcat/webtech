<html>
<?php include 'includes/head.php';?>
<body>
<?php include 'includes/navbar.php';
require('../config/db.php');?>
<?php
$input = "ID";
if(count($_GET)>0){ //check if form was submitted
  $input = $_GET['Filter']; //get Filter value
}    
?>
<table class="table">
  <form action="" method="get">
  <tr>
    <td>
  <select class="custom-select" name = "Filter">
            <option value="Status">Filter by Status</option>
            <option selected value="ID">Filter by ID</option>
  </select>
  <input type="submit" name="filtersubmit" value="change Filter">
</form>
  </td>
</tr>
<?php

    if (isset($_POST['submit'])) {
        // removes backslashes
        $body = stripslashes($_REQUEST['body']);
        //escapes special characters in a string
        $body = mysqli_real_escape_string($con, $body);
        $targetdir = "../uploads/ticketPictures/";

        if (isset($_FILES["fileToUpload"])) {
        
        $target_file = $targetdir.basename($_FILES['fileToUpload']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }

        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
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
      

        $date = new DateTime();
        $date = date('Y-m-d H:i:s');
        // Check connection

        $query    = "INSERT into `tickets` (Body, time, Picture)
                     VALUES ('$body', '$date', '$target_file')";
        $result   = mysqli_query($con, $query);
      }else{
        $query    = "INSERT into `tickets` (Body, time)
        VALUES ('$body', '$date')";
      $result   = mysqli_query($con, $query);
      }
    }

    $query = "";
    if($input === "Status"){
      $query = "SELECT * FROM tickets JOIN status ON tickets.Status = status.ID ORDER BY status.ID";
      
    }else if($input === "ID"){
      $query = "SELECT * FROM tickets JOIN status ON tickets.Status = status.ID ORDER BY tickets.TicketID";
    }
$result = mysqli_query($con, $query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) { ?>
  
    <tr>
      <td>
        <?php echo "id: " . $row["TicketID"]. " - Topic: " . $row["Body"]. " - Status: " . $row["Name"]. " - Date: " .date("Y/m/d H:i:s", strtotime($row["time"])). "" ?>
        <h4>Answer</h4>
        <hr>
        <div class="mx-auto border"><p><?php echo $row['Answer']?></p></div>
        <?php
    $userright = 2;
    if (isset($_SESSION['RechteID'])) {
        // removes backslashes
        $userright = stripslashes($_SESSION['RechteID']);
    }
		if($userright > 2){
			?>
		<a href="update_tickets.php?TicketID=<?php echo $row["TicketID"]; ?>" >Update</a>
        <br><br>
		<?php
		} 
		?>
      </td>
      <td>
      </td>
    </tr>
  
    
    <?php
  }

  mysqli_free_result($result);
  mysqli_close($con);
} else {
  echo "0 results";
}
       ?>
       </table>



    </div>
<div class="container bg-secondary mx-3 border pt-2">
<form class="form" action="" method="post" enctype="multipart/form-data">
        <h4 class="news-title">Create new Tickets</h4>
        <textarea require class = "border"name="body" rows="4" cols="50" maxlength="999"></textarea> <br>
        <br><br>
        <h5>Upload Pictures</h5>
        <br>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" name="submit"  value="Open new Ticket" class="news-button">
        <br>
        </form>
</div>


    <?php include 'includes/footer.php';?>
</body>
</html>