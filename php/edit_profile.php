<?php
session_start();
include("connect.php");
if($_SERVER['REQUEST_METHOD'] === "POST"){
  if(!empty($email) && !empty($full_name)){
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $sql = "UPDATE users SET full_name = '$full_name', email = '$email' WHERE id = '$user_id'";
    $query = mysqli_query($conn, $sql);
    
    if($query){
      $sql2 =  "SELECT * FROM users WHERE id = '$user_id'";
      $query2 = mysqli_query($conn, $sql2);
      if($query2){
        $row = mysqli_fetch_assoc($query2);
        $_SESSION['full_name'] = $full_name;
        $_SESSION['email'] = $email;
        echo "success";
      }else{
        echo "hello";
      }
    }else{
       echo "Failed";
    }
  }
}
?>