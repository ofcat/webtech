<?php
include '../sites/includes/navbar.php';
include '../sites/includes/head.php';
require('../config/db.php');
if(count($_POST)>0) {
mysqli_query($con,"UPDATE tickets set  Body='" . $_POST['Body'] . "', Status='" . $_POST['Status'] . "' WHERE TicketID='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";
// if($_SESSION['id']  != 6){
//     header('Location: ../config/logout.php');
// }

}
$result = mysqli_query($con,"SELECT * FROM tickets WHERE TicketID='" . $_GET['TicketID'] . "'");
$row= mysqli_fetch_array($result);

?>

<title>Update Ticket</title>

<body>
    <div class="container-fluid">

    <table class="table">
    <tr>
	    <td>ID</td>
		<td>Body</td>
		<td>Status</td>
	  </tr>


    <form  name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>

<tr>
    <td>
    <input type="hidden" name="id" class="txtField" value="<?php echo $row['TicketID']; ?>">
    <!-- <input type="text" name="id"  value="<?php echo $row['ID']; ?>"> -->
    </td>
    <td>
    <input type="text" name="Body" class="txtField" value="<?php echo $row['Body']; ?>">
    </td>
    <td>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
        </div>
        <select class="custom-select" name = "Status" id="inputGroupSelect01">
            <option selected><?php echo $row['Status']; ?></option>
            <option value="1">ToDo</option>
            <option value="2">Done</option>
            <option value="3">InProgress</option>
        </select>
        </div>
    </td>
</tr>

<input type="submit" name="submit" value="Submit" class="buttom">
</form>
<a href="Tickets.php">Back</a>
    </table>
   
    </div>