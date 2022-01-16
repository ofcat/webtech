<?php include 'includes/head.php'?>
<body>
<?php include 'includes/navbar.php'?>

<?php
require('../config/db.php');
    if (isset($_REQUEST['body'])) {
        // removes backslashes
        $body = stripslashes($_REQUEST['body']);
        //escapes special characters in a string
        $body = mysqli_real_escape_string($con, $body);

        $query    = "INSERT into `tickets` (Body)
                     VALUES ('$body')";
        $result   = mysqli_query($con, $query);
    }
       $query = "SELECT * FROM tickets JOIN status ON tickets.Status = status.ID ";
$result = mysqli_query($con, $query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["ID"]. " - Topic: " . $row["Body"]. " - Status: " . $row["Name"]. "<br> <br>";
    
    $userright = 2;
    if (isset($_SESSION['RechteID'])) {
        // removes backslashes
        $userright = stripslashes($_SESSION['RechteID']);
    }
		if($userright > 2){
			?>
		<a href="update_tickets.php?id=<?php echo $row["ID"]; ?>" >Update</a>
        <br><br>
		<?php
		} 
		
  }
} else {
  echo "0 results";
}
       ?>



    </div>
<div class="container bg-success">
<form class="form" action="" method="post" >
        <h4 class="news-title">Create new Tickets</h4>
        <textarea  name="body" rows="4" cols="50" maxlength="999"></textarea> <br>
        <input type="submit" name="submit" value="Open new Ticket" class="news-button">
        </form>
</div>


    <?php include 'includes/footer.php';?>
</body>
