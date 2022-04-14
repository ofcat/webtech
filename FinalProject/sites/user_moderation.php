<?php include 'includes/head.php';
include 'includes/navbar.php'?>


<body>


<?php

require('../config/db.php');
<<<<<<< HEAD


$result = mysqli_query($con,"SELECT * FROM users");
if (mysqli_num_rows($result) > 0) {
	
=======
$result = mysqli_query($con,"SELECT * FROM users");
if (mysqli_num_rows($result) > 0) {
>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85
?>
<div class ="container-fluid">  
<table class="table">
<!-- firstName, lastName, salutation, username, password, useremail -->
	  <tr>
	    <td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Salutation</td>
		<td>Username</td>
		<td>Useremail</td>
		<td>Password</td>
<<<<<<< HEAD
		<td>Rights</td>
=======
>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
<<<<<<< HEAD
				$right = $row["RechteID"];
				$result2 = mysqli_query($con, "SELECT Name FROM rechte WHERE ID = '$right'");
				$attribution = mysqli_fetch_array($result2);
			?>
	  <tr>
	    <td><?php echo $row["ID"]; ?></td>
=======
			?>
	  <tr>
	    <td><?php echo $row["id"]; ?></td>
>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85
		<td><?php echo $row["firstName"]; ?></td>
		<td><?php echo $row["lastName"]; ?></td>
		<td><?php echo $row["salutation"]; ?></td>
		<td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["useremail"]; ?></td>
		<td><?php echo $row["password"]; ?></td>
<<<<<<< HEAD
		<td><?php echo $attribution["Name"]; ?></td>
		<?php
		$userright = 2;
		if (isset($_SESSION['RechteID'])) {
			// removes backslashes
			$userright = stripslashes($_SESSION['RechteID']);
		}
		if($userright > $right){
			?>
		<td><a href="update-process.php?id=<?php echo $row["ID"]; ?>" >Update</a></td>
		<?php
		} 
		?>
=======
		<td><a href="update-process.php?id=<?php echo $row["id"]; ?>">Update</a></td>
>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85
      </tr>
			<?php
			$i++;
			}
			?>
</table>

</div>

 <?php
}
else
{
    echo "No result found";
}
?>


<?php include 'includes/footer.php'?>
</body>