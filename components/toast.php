<?php
if(isset($_SESSION['toast'])) {
    $toast = $_SESSION['toast'];
    unset($_SESSION['toast']);
    echo "<div class='toast-container'>";
    echo "<div class='toast {$toast['type']}'>";
    echo "<span>{$toast['message']}</span>";
    echo "<button class='toast-close'>&times;</button>";
    echo "</div>";
    echo "</div>";
    echo "<script src='./js/toast.js'></script>";
}
?>
