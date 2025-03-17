<?php
include_once "./connect.php";
session_start();
if($_SERVER['REQUEST_METHOD']){
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $hash = md5($password);
if(!empty($email) && !empty($password)){
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $query = mysqli_query($conn, $sql);

    if($query && mysqli_num_rows($query) > 0){
      if($row = mysqli_fetch_assoc($query)){
        if($hash === $row['password']){
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['role'] = $row['role'];
          $_SESSION['created_at'] = $row['created_at'];
          $_SESSION['full_name'] = $row['full_name'];
          $_SESSION['password'] = $row['password'];
          echo "success";
        }else{
          echo "Wrong password";
        }
      }
  }else{
    echo "Email is not found";
  }
}
}
?>