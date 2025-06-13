<?php
$db_host = "localhost"; 
$db_user = "root";
$db_pass = "";
$db_name = "bestdecor_db";

try{
    $conn = mysqli_connect(
        $db_host, 
        $db_user, 
        $db_pass, 
        $db_name
    );
}catch(mysqli_sql_exception){
    echo "Could not connect to the database";
}
?>