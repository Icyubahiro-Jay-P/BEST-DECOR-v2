<?php
include("connect.php");
session_start();
$client_id = $_GET['client_id'];
if(!isset($_SESSION['user_id'])){
  echo "<script>
          window.location.assign('../pages/index.php');
        </script>";
}
if(!isset($client_id)){
  echo "<script>
          window.location.assign('../pages/index.php');
        </script>";
}else{
  $sql = "DELETE FROM clients WHERE id = '$client_id'";
  $query = mysqli_query($conn, $sql);
  if($query){
    echo "<script>
            alert('Client Deleted Successfully');
            window.location.assign('../pages/index.php');
          </script>";
        }else{
    echo "<script>
            alert('Failed to delete the clients');
            window.location.assign('../pages/index.php');
          </script>";
  }
}
?>