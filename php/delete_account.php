<?php
include("connect.php");
session_start();
$sql = "DELETE FROM users WHERE id = '$_SESSION[user_id]'";
$query = mysqli_query($conn, $sql);
if($query){
  session_unset();
  session_destroy();
  echo "Account deleted successfully";  
}
else{
  echo "Error: ".mysqli_error($conn);
  echo "Account not deleted";
}
?>