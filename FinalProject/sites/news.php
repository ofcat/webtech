<?php include 'includes/head.php'?>
<body>
<?php include 'includes/navbar.php'?>




    <div class="container">
       <?php
       require('../config/db.php');

       $query = "SELECT id, title, body FROM news";
$result = mysqli_query($con, $query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["body"]. "<br> <br>";
  }
} else {
  echo "0 results";
}
       
       
       ?>
    </div>

    <?php include 'includes/footer.php';?>

    
</body>
