<?php
// Connection and Helper
require_once '../connection.php';
require_once '../helper.php';

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"])){
    header("Location: ".BASE_URL);
    exit;
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){

    // Dataform
    $id         = trim($_REQUEST['id']);
    $first_name = trim($_REQUEST['first_name']);
    $last_name  = trim($_REQUEST['last_name']);
    $email      = trim($_REQUEST['email']);
    $active     = (trim($_REQUEST['active']) == 'true') ? '1' : '0';

    // Attempt update query execution
    $sql = "UPDATE persons SET first_name='$first_name', last_name='$last_name', email='$email', active='$active', updated_at=NOW() WHERE id = ".$id;
    if(mysqli_query($link, $sql)){
        echo "Records were updated successfully";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
     
    // Close connection
    mysqli_close($link);
   
} else {

    header("Location: ".BASE_URL, true, 400); // Bad Request
    exit;

}