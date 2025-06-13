<?php
$db_host = "localhost"; 
$db_user = "root";
$db_pass = "";
$db_name = "bestdecor_db";
// $db_host = "sql305.infinityfree.com "; 
// $db_user = "if0_39090952";
// $db_pass = "iNYeNfagTU8t";
// $db_name = "if0_39090952_bestdecor_db ";

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