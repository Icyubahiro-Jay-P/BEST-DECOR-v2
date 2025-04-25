<?php
include("../php/connect.php");
session_start();
if(!isset($_SESSION['user_id'])){
  echo "<script>
          window.location.assign('./login');
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Best Decor: Add Client</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/add_client.css">
  <link rel="stylesheet" href="css/dark-theme.css">
  <link rel="stylesheet" href="icons/bootstrap-icons.css">
</head>
<body data-theme="light">
<header>
    <h3>Best Decor</h3>
    <h2>Add client</h1>
    <div class="parts">
      <div class="profile">
        <a href="profile">
          <img src="profile.png" alt="">
        </a>
      </div>
    </div>
  </header>
  <nav>
    <ul>
      <li>
        <a href="home">
          <i class="bi bi-house-fill"></i>Home
        </a>
      </li>
      <li>
        <a href="dashboard">
          <i class="bi bi-journal-album"></i>
          Dashboard</a>
      </li>
      <li class="active">
        <a href="./add_client">
          <i class="bi bi-person-plus-fill"></i>
          Add&nbsp;client</a>
      </li>
      <li>
        <a href="taken">
          <i class="bi bi-box-arrow-right"></i>
          Taken</a>
      </li>
      <li>
        <a href="returned">
          <i class="bi bi bi-box-arrow-in-left"></i>
          Returned</a>
      </li>
      <li>
        <a href="profile">
          <i class="bi bi-person-circle"></i>
          Profile</a>
      </li>
      <li>
        <a href="../php/logout">
          <i class="bi bi-box-arrow-left"></i>
          Log&nbsp;out</a>
      </li>
    </ul>
  </nav>
  <form action="../php/add_client" method="POST" autocomplete="off">
    <div class="details">
      <div class="input-box">
        <input type="text" placeholder="Full name" name="full_name">
      </div>
      <div class="input-box">
        <input type="tel" placeholder="Phone number" name="phone_number">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Items" name="items">
      </div>
    </div>
    <div class="details">
      <div class="input-box">
        <input type="number" placeholder="Cash Paid" name="cash_paid">
      </div>
      <div class="input-box">
        <input type="number" placeholder="Balance" name="balance">
      </div>
      <div class="input-box">
        <label style="color:#666;margin-top:-20px;position:absolute;">Date of Take</label>
        <input type="datetime-local" name="date_taken" id="">
      </div>
    </div>
    <div class="details">
    </div>
    <div class="details">
      <div class="input-box">
        <label style="color:#666;margin-top:-20px;position:absolute;">Date of Return</label>
        <input type="datetime-local" name="date_return">
      </div>
      <div class="select-group">
        <label style="color:#666;margin-top:-20px;position:absolute;">Returned:</label>
        <select name="returned">
          <option value="No">No</option>
          <option value="Yes">Yes</option>
        </select>
      <div class="select-group">
        <label style="color:#666;margin-top:-20px;position:absolute;">Taken:</label>
        <select name="taken">
          <option name="taken" value="Yes">Yes</option>
          <option name="taken" value="No">No</option>
        </select>
      </div>
    </div>
    <div class="submit">
      <input type="submit" value="Register">
    </div>
  </form>
  <script src="../js/theme.js"></script>
</body>
</html>