<?php include 'includes/head.php'?>
<body>
<?php include 'includes/navbar.php'?>




    <div class="container-fluid">
    <h3>News</h3>
       <?php
       require('../config/db.php');

       $query = "SELECT id, title, body, create_datetime, picPath FROM news order by create_datetime desc";
$result = mysqli_query($con, $query);

?>
<hr>
<div class="container-fluid">
<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id " .$row["id"]; 
    echo "<h4>" .$row["title"] . "</h4><br>";

    //if(isset($picPath) )
    echo "<img src='" . $row["picPath"]."' >"; ?>
 
    <?php 
    echo  "<br><br> "  . $row["body"]. "<br><br>date posted " .$row["create_datetime"]. "<br> <br><hr>";
    
  }
} else {
  echo "0 results";
}
       
       
       ?>   
       </div>    
    </div>

    <?php include 'includes/footer.php';?>

    
</body>
