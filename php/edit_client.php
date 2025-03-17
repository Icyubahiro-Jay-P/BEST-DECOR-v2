<?php
include("connect.php");
session_start();
$client_id = $_POST['client_id'];
if(!isset($_SESSION['user_id'])){
  echo "<script>
          window.location.assign('../pages/index.php');
        </script>";
}
if(!isset($client_id)){
  echo "<script>
          window.location.assign('../pages/index.php');
        </script>";
}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
  $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
  $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
  $items = mysqli_real_escape_string($conn, $_POST['items']);
  $cash_paid = mysqli_real_escape_string($conn, $_POST['cash_paid']);
  $balance = mysqli_real_escape_string($conn, $_POST['balance']);
  $date_taken = mysqli_real_escape_string($conn, $_POST['date_taken']);
  $date_return = mysqli_real_escape_string($conn, $_POST['date_return']);
  $returned = mysqli_real_escape_string($conn, $_POST['returned']);
  $taken = mysqli_real_escape_string($conn, $_POST['taken']);

  $sql = "UPDATE clients SET full_name = '$full_name', items = '$items', date_taken = '$date_taken', taken = '$taken', returned = '$returned', cash_paid = '$cash_paid',
           phone_number = '$phone_number', date_returned = '$date_return', balance = '$balance', done_by = '{$_SESSION['full_name']}' WHERE id = '$client_id'";

  $query = mysqli_query($conn, $sql);
  if($query){
    echo "<script>
            alert('Client is editted successfully');
            window.location.assign('../pages/index.php');
          </script>";
  }else{
    echo "<script>
            alert('Failed to edit the client');
            // window.location.assign('../pages/index.php');
          </script>";
        }
      }else{
  echo "<script>
          alert('Failed to edit the client');
          // window.location.assign('../pages/index.php');
        </script>";
}
?>