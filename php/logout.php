<?php
session_start();
session_unset();
session_destroy();
echo "<script>
        location.assign('../pages/login.php');
      </script>";
?>