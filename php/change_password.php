<?php
session_start();
include("connect.php");
$user_id = $_POST['user_id'];
$old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
$new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
$confirm_new_password = mysqli_real_escape_string($conn, $_POST['confirm_new_password']);
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$query = mysqli_query($conn, $sql);
if(!empty($old_password) && !empty($new_password && !empty($confirm_new_password))){
  if($query){
    $row = mysqli_fetch_assoc($query);
    $hash = md5($old_password);
    if($hash !== $_SESSION['password']){
      echo "Old password incorrect";
    }else{
      if($new_password === $confirm_new_password){
        $hash_new = md5($confirm_new_password);
        $sql2 = "UPDATE users SET password = '$hash_new'";
        $query2 = mysqli_query($conn, $sql2);
        if($query2){
          echo "success";
          $_SESSION['password'] = $row['password'];
          $_SESSION['toast'] = [
            'type' => 'success',
            'message' => 'Password successfully changed'
          ];
        }else{
          $_SESSION['toast'] = [
            'type' => 'error',
            'message' => 'Failed to change password'
          ];
          echo "failed";
        }
      }else{
        echo "New passwords do not match";
      }
    }
  }
}
?>