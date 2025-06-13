<?php
session_start();
if(!isset($_SESSION['user_id'])) {
  include('login.php');
}else{
  include('.php');
}
?>