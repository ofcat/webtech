<?php
include '../sites/includes/navbar.php';
include '../sites/includes/head.php';
require('../config/db.php');
if(count($_POST)>0) {
$run = mysqli_query($con,"UPDATE tickets set  Body='" . $_POST['Body'] . "', Status='" . $_POST['Status'] . "', Answer='" . $_POST['Answer'] . "' WHERE TicketID='" . $_POST['id'] . "'");
if($run){
    header("Location: Tickets.php");
    }
// if($_SESSION['id']  != 6){
//     header('Location: ../config/logout.php');
// }

}
$result = mysqli_query($con,"SELECT * FROM tickets WHERE TicketID='" . $_GET['TicketID'] . "'");
$row= mysqli_fetch_array($result);

if(isset($_GET['delete'])){
    $run = mysqli_query($con, "DELETE FROM tickets WHERE TicketID = '".$_GET['id'] ."'");
    if($run){
    header("Location: Tickets.php");
    }
}
?>


<title>Update Ticket</title>

<body>


    <div class="container-fluid">

    <table class="table">
    <tr>
	    <td>ID</td>
        <td>Title</td>
		<td>Body</td>
		<td>Status</td>
        <td>Answer</td>
        <td>Close</td>
        <td>Update</td>
	  </tr>


    <form  name="frmUser" method="post" action="">
<div>
</div>

<tr>
    <td>
    <input type="hidden" name="id" class="txtField" value="<?php echo $row['TicketID']; ?>">
    <!-- <input type="text" name="id"  value="<?php echo $row['ID']; ?>"> -->
    </td>
    <td>
        <input type="text" name="Title" class="txtField" value="<?php echo $row['Title']?>">
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
                                            
    <td>
    <input type="text" name="Answer" class="txtField" value="<?php echo $row['Answer']; ?>">
</td>
    <td>
     <button class="btn btn-danger btn-sm rounded-0" type="button" data-bs-toggle="modal" data-bs-target="#CloseModal" title="Close"><i class="fa fa-trash"></i></button>
</td>
<td>
<input type="submit" name="submit" value="Submit" class="buttom">
</td>
                              
</tr>

</form>


<!-- Modal -->
<div class="modal fade" id="CloseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete this ticket?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="" method="get">
        <input type="hidden" name="id" class="txtField" value="<?php echo $row['TicketID']; ?>">
        <input type="submit" name="delete" value="Yes" class="buttom">
        </form>
      </div>
    </div>
  </div>
</div>






<a href="Tickets.php">Back</a>
    </table>
   
    </div>