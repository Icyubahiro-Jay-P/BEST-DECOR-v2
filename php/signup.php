<?php
include_once "connect.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $random_id = rand(10000, 10000000);
    $hash = md5($password);

    // Check if email already exists in the database
    $sql_check = "SELECT * FROM users WHERE email = '$email'";
    $query_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($query_check) > 0) {
        echo "Email is already taken";
    } elseif (!empty($full_name) && !empty($email) && !empty($password) && !empty($confirm_password)) {
      if($password === $confirm_password){
        // Insert new user into the database
        $sql = "INSERT INTO users (id, full_name, email, password, role, joined_on)
                VALUES ('$random_id', '$full_name', '$email', '$hash', 'admin', NOW())";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $sql2 = "SELECT * FROM users WHERE email = '$email'";
            $query2 = mysqli_query($conn, $sql2);
            if ($row = mysqli_fetch_assoc($query2)) {
                $_SESSION['added_user_id'] = $row['id'];
                $_SESSION['added_email'] = $row['email'];
                $_SESSION['added_role'] = $row['role'];
                $_SESSION['added_joined_on'] = $row['joined_on'];
                $_SESSION['added_full_name']  = $row['full_name'];
                $_SESSION['added_password'] = $row['password'];
                echo "success";
                $_SESSION['toast'] = [
                  'type' => 'success',
                  'message' => 'Client successfully registered'
                ];
            }
        } else {
            echo "Something went wrong";
            $_SESSION['toast'] = [
              'type' => 'error',
              'message' => 'Failed to register client'
            ];
        }
      }else{
        echo "Passwords do not match";
      }
    }
    mysqli_close($conn);
}
?>