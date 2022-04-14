<?php
<<<<<<< HEAD
include '../sites/includes/navbar.php';
include '../sites/includes/head.php';
require('../config/db.php');

if(isset($_POST['submit'])) {
    if(isset($_POST['newpw']) and isset($_POST['oldpw']) and $_POST['newpw'] != "" and $_POST['oldpw']!=""){
        $password = $_POST['oldpw'];
        $id = $_POST['id'];
        $query    = "SELECT * FROM `users` WHERE ID ='$id'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $password = $_POST['newpw'];
            if($_SESSION['RechteID'] > $_POST['right']){
                mysqli_query($con,"UPDATE users set  firstName='" . $_POST['firstName'] . "', lastName='" . $_POST['lastName'] . "', salutation='" . $_POST['salutation'] . "' ,username='" . $_POST['username'] . "' , useremail='" .$_POST['useremail']. "' , password='" .md5($password)."' ,userStatus ='". $_POST['Status']."', RechteID='" . $_POST['right'] . "' WHERE ID='" . $_POST['id'] . "'");
                
            }else{
            mysqli_query($con,"UPDATE users set  firstName='" . $_POST['firstName'] . "', lastName='" . $_POST['lastName'] . "', salutation='" . $_POST['salutation'] . "' ,username='" . $_POST['username'] . "' , useremail='" .$_POST['useremail']. "' , password='" .md5($password)."' ,userStatus ='". $_POST['Status']."' WHERE ID='" . $_POST['id'] . "'");
            
            }
    }else{
        $message = "Record not Modified";
    }
}else{
    
    if($_SESSION['RechteID'] > $_POST['right']){
        mysqli_query($con,"UPDATE users set  firstName='" . $_POST['firstName'] . "', lastName='" . $_POST['lastName'] . "', salutation='" . $_POST['salutation'] . "' ,username='" . $_POST['username'] . "' , useremail='" .$_POST['useremail']. "' , userStatus ='". $_POST['Status']."', RechteID='" . $_POST['right'] . "' WHERE ID='" . $_POST['id'] . "'");
        
    }else{
        mysqli_query($con,"UPDATE users set  firstName='" . $_POST['firstName'] . "', lastName='" . $_POST['lastName'] . "', salutation='" . $_POST['salutation'] . "' ,username='" . $_POST['username'] . "' , useremail='" .$_POST['useremail']. "' ,userStatus ='". $_POST['Status']."' WHERE ID='" . $_POST['id'] . "'");
    }
    // if($_SESSION['id']  != 6){
    //     header('Location: ../config/logout.php');
    // }
    
}
}
$result = mysqli_query($con,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
$right = $row["RechteID"];
$result2 = mysqli_query($con, "SELECT Name FROM rechte WHERE ID = '$right'");
$attribution = mysqli_fetch_array($result2);

=======
require('../config/db.php');
if(count($_POST)>0) {
mysqli_query($con,"UPDATE users set  firstName='" . $_POST['firstName'] . "', lastName='" . $_POST['lastName'] . "', salutation='" . $_POST['salutation'] . "' ,username='" . $_POST['username'] . "' , useremail='" .$_POST['useremail']. "' , password='" .md5($_POST['password'])."' WHERE id='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";
// if($_SESSION['id']  != 6){
//     header('Location: ../config/logout.php');
// }

}
$result = mysqli_query($con,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
include '../sites/includes/navbar.php';
include '../sites/includes/head.php'
>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85
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
<<<<<<< HEAD
        <td>Status</td>
        <td>Rights</td>
=======
        <td>Password</td>
>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85
	  </tr>


    <form  name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>

<tr>
    <td>
<<<<<<< HEAD
    <input type="hidden" name="id" class="txtField" value="<?php echo $row['ID']; ?>">
    <!-- <input type="text" name="id"  value="<?php echo $row['ID']; ?>"> -->
=======
    <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
    <!-- <input type="text" name="id"  value="<?php echo $row['id']; ?>"> -->
>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85
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
<<<<<<< HEAD
    <select class="custom-select" name = "Status">
            <option selected><?php echo $row['userStatus']; ?></option>
            <option value="active">active</option>
            <option value="inactive">inactive</option>
        </select>
    </td>
    <td>
    <select class="custom-select" name = "right">
    <option  selected>select</option>
            <option  value =2>Guest</option>
            <option  value=3>Service-Techniker</option>
            <option value=4>Admin</option>
        </select>
    </td>
</tr>
<tr>
<td>new password</td>
<td>old password</td>
</tr>
<tr>
<td><input type="text" name="newpw" class="txtField"></td>
<td><input type="text" name="oldpw" class ="txtField"></td>
=======
    <input type="text" name="password" class="txtField" value="<?php echo $row['password'];?>">
    </td>


>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85
</tr>

<input type="submit" name="submit" value="Submit" class="buttom">
</form>
    </table>
   
    </div>

<<<<<<< HEAD
</body>
<?php include '../sites/includes/footer.php' ?>
=======

    

</body>
<?php include '../sites/includes/footer.php'?>
>>>>>>> 719743ee380ca3fb1b787473b76aaecd952a1e85
