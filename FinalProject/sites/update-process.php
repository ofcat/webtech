<?php
require('../config/db.php');
if(count($_POST)>0) {
mysqli_query($con,"UPDATE users set  firstName='" . $_POST['firstName'] . "', lastName='" . $_POST['lastName'] . "', salutation='" . $_POST['salutation'] . "' ,username='" . $_POST['username'] . "' , useremail='" .$_POST['useremail']."  ' WHERE id='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($con,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
include '../sites/includes/navbar.php';
include '../sites/includes/head.php'
?>

<title>Update Employee Data</title>

<body>
    <div class="container-fluid">

    <table class="table">
    <tr>
	    <td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Salutation</td>
		<td>Username</td>
		<td>Useremail</td>
	  </tr>


    <form  name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="user_moderation.php">Users List</a>
</div>

ID (*danger* be careful when changing): <br>


<br>
<tr>
    <td>
    <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
    <input type="text" name="id"  value="<?php echo $row['id']; ?>">
    </td>
    <td>
    <input type="text" name="firstName" class="txtField" value="<?php echo $row['firstName']; ?>">
    </td>
    <td>
    <input type="text" name="lastName" class="txtField" value="<?php echo $row['lastName']; ?>">
    </td>
    <td>
    <input type="text" name="salutation" class="txtField" value="<?php echo $row['salutation']; ?>">
    </td>
    <td>
    <input type="text" name="username" class="txtField" value="<?php echo $row['username']; ?>">
    </td>
    <td>
    <input type="text" name="useremail" class="txtField" value="<?php echo $row['useremail']; ?>">
    </td>
    <td>
    <input type="submit" name="submit" value="Submit" class="buttom">
    </td>

</tr>









</form>
    </table>
    </div>


    

</body>
<?php include '../sites/includes/footer.php'?>