<?php
include("connect.php");
session_start();
if(!isset($_SESSION['user_id'])){
  echo "<script>
          window.location.assign('../login');
        </script>";
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
  $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
  $items = mysqli_real_escape_string($conn, $_POST['items']);
  $cash_paid = mysqli_real_escape_string($conn, $_POST['cash_paid']);
  $balance = mysqli_real_escape_string($conn, $_POST['balance']);
  $date_taken = mysqli_real_escape_string($conn, $_POST['date_taken']);
  $date_return = mysqli_real_escape_string($conn, $_POST['date_return']);
  $returned = mysqli_real_escape_string($conn, $_POST['returned']);
  $taken = mysqli_real_escape_string($conn, $_POST['taken']);
  $client_id = rand();

  $sql = "INSERT INTO `clients`(`id`, `full_name`, `items`, `date_taken`, `taken`, `returned`, `cash_paid`, `phone_number`, `date_returned`, `balance`, `done_by`)
          VALUES ('$client_id', '$full_name', '$items', '$date_taken', '$taken', '$returned', '$cash_paid', '$phone_number', '$date_return', '$balance', '{$_SESSION['full_name']}')";

  $query = mysqli_query($conn, $sql);
  if($query){
    echo "<script>
            alert('Client is successfully registered');
            window.location.assign('../dashboard');
          </script>";
  }else{
    echo "<script>
            alert('Failed to register the client');
            window.location.assign('../dashboard');
          </script>";
  }
}
?>