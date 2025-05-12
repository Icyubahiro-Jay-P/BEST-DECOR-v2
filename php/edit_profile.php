<?php
session_start();
include("connect.php");
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $sql = "UPDATE users SET full_name = '$full_name', email = '$email' WHERE id = '$user_id'";
    $query = mysqli_query($conn, $sql);
    
    if($query){
      $sql2 =  "SELECT * FROM users WHERE id = '$user_id'";
      $query2 = mysqli_query($conn, $sql2);
      if($query){
        $_SESSION['full_name'] = $full_name;
        $_SESSION['email'] = $email;
        $_SESSION['toast'] = [
          'type' => 'success',
          'message' => 'Profile successfully editted'
        ];
        echo "success";
        // header("Location: ../profile");
      }else{
        $_SESSION['toast'] = [
          'type' => 'error',
          'message' => 'Failed to register client'
        ];
        echo "Failed";
        // header("Location: ../profile");
      }
    }else{
      echo 'Failed update';
    }
}
?>