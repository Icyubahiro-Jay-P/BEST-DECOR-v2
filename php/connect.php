<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "bestdecor_db";
try{
  $conn = mysqli_connect($db_server,
                         $db_user,
                         $db_pass,
                         $db_name);
}catch(mysqli_sql_exception){
  echo "Failed to connect.php to the database";
}
?>