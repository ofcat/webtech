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

    if (isset($_REQUEST['body'])) {
        // removes backslashes
        $body = stripslashes($_REQUEST['body']);
        //escapes special characters in a string
        $body = mysqli_real_escape_string($con, $body);

        $query    = "INSERT into `tickets` (Body)
                     VALUES ('$body')";
        $result   = mysqli_query($con, $query);
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
        <?php echo "id: " . $row["TicketID"]. " - Topic: " . $row["Body"]. " - Status: " . $row["Name"]. "" ?>
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
<div class="container bg-success">
<form class="form" action="" method="post" >
        <h4 class="news-title">Create new Tickets</h4>
        <textarea  name="body" rows="4" cols="50" maxlength="999"></textarea> <br>
        <input type="submit" name="submit" value="Open new Ticket" class="news-button">
        </form>
</div>


    <?php include 'includes/footer.php';?>
</body>
</html>