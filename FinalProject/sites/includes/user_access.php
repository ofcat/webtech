
<?php
//functions needed to change access

//removes an Admin or User Owner data and Admin/User data has to be given
function deleteAdmin($username, $ownerusername, $ownerpassword, $con){
    $sql = "SELECT * FROM users where username='$ownerusername' And password='$ownerpassword'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        if(getRights($username, $con) === 4){
            echo "Owners cannot be deleted.";
            return;
        }
        $sql = "DELETE users
        where username = '$username'";
        $run = mysqli_query($con, $sql);
        if(!$run){
            mysqli_error($con);
        }
        mysqli_free_result($run);
        mysqli_close($con);
    } else {
        echo "<div class='form'>
              <h3>Incorrect Username/password.</h3><br/>
              <p class='link'>Click here to <a href='Login.php'>Login</a> again.</p>
              </div>";
    }
}

//removes a User Admin data and User data has to be given
function deleteUser($username, $adminusername, $adminpassword, $con){
    $sql = "SELECT * FROM users where username='$adminusername' And password='$adminpassword'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        if(getRights($username, $con) === 4){
            echo "Owners cannot be deleted.";
            return;
        }
        if(getRights($username, $con) === 3){
            echo "You do not have the rights to do that";
            return;
        }
        $sql = "DELETE users
        where username = '$username'";
        $run = mysqli_query($con, $sql);
        if(!$run){
            mysqli_error($con);
        }
        mysqli_free_result($run);
        mysqli_close($con);
    } else {
        echo "<div class='form'>
              <h3>Incorrect Username/password.</h3><br/>
              <p class='link'>Click here to <a href='Login.php'>Login</a> again.</p>
              </div>";
    }
}

//Changes a Guest to an Admin Guest data and Admin or Owner data has to be given
function makeAdmin($username, $adminusername, $adminpassword, $con){
    $sql = "SELECT * FROM users where username='$adminusername' And password='$adminpassword'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $sql = "UPDATE users
        SET RechteID = 3
        where username = '$username'";
        $run = mysqli_query($con, $sql);
        if(!$run){
            mysqli_error($con);
        }
        mysqli_free_result($run);
        mysqli_close($con);
    } else {
        echo "<div class='form'>
              <h3>Incorrect Username/password.</h3><br/>
              <p class='link'>Click here to <a href='Login.php'>Login</a> again.</p>
              </div>";
    }
}

//Changes a Guest to an Anonym Guest data has to be given
function logout($username, $con){
    //Does not allow Admins or Owners to logout
    if(getRights($username, $con)<3){
        $sql = "UPDATE users
        SET RechteID = 1
        WHERE username = '$username'";
        $run = mysqli_query($con, $sql);
        if($run === FALSE) { 
            die(mysqli_error($con));
        }
    }
    mysqli_close($con);
}

//Changes a Anonym to a Guest Anonym data has to be given
function login($username, $con){

    //Does not allow Admins or Owners to login
    if(getRights($username, $con)<3){
        $sql = "UPDATE users
        SET RechteID = 2 
        WHERE username = '$username'";
        $run = mysqli_query($con, $sql);
        if(!$run){
            mysqli_error($con);
        }
    }
    mysqli_close($con);
}

//gives the rightvalue of the user rights are given as int values
function getRights($username, $con){
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    if($result === FALSE) { 
        die(mysqli_error($con));
    }
    
    $row = mysqli_fetch_array($result);
    mysqli_free_result($result);
    return $row['RechteID'];
}
?>