<?php
include("./php/connect.php");
session_start();
if(!isset($_SESSION['full_name'])){
  echo "<script>
          window.location.assign('../login');
        </script>";
}
$client_id = $_GET['client_id'];
if(!isset($client_id)){
  echo "<script>
          window.location.assign('../dashboard');
        </script>";
}else{
  $sql = "SELECT * FROM clients ORDER BY date_taken";
  $query = mysqli_query($conn, $sql);
  if($query){
    $row = mysqli_fetch_assoc($query);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Best Decor: Update Client</title>
  <?php include("favicon.php");?>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/add_client.css">
  <link rel="stylesheet" href="icons/bootstrap-icons.css">
</head>
<body>
<header>
    <h3>Best Decor</h3>
    <h2>Edit client</h1>
    <div class="parts">
      <div class="profile">
        <a href="profile">
          <img src="../profile.png" alt="">
        </a>
      </div>
    </div>
  </header>
  <nav>
    <ul>
      <li>
        <a href="home">
          <i class="bi bi-house-fill"></i>
          Home
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
        <a href="#">
          <i class="bi bi-arrow-return-left"></i>
          Taken</a>
      </li>
      <li>
        <a href="#">
          <i class="bi bi-arrow-return-right"></i>
          Returned</a>
      </li>
      <li>
        <a href="profile">
          <img src="profile.png" alt="profile picture" style="height:30px; width:30px; border-radius:50%;margin-right:15px">
          Profile</a>
      </li>
      <li>
        <a href="logout">
          <i class="bi bi-box-arrow-left"></i>
          Log&nbsp;out</a>
      </li>
    </ul>
  </nav>
  <form action="php/edit_client.php" method="POST">
    <input type="hidden" value="<?php echo $client_id?>" name="client_id">
    <div class="details">
      <div class="input-box">
        <input type="text" placeholder="Full name" name="full_name" value="<?php echo $row['full_name']?>">
      </div>
      <div class="input-box">
        <input type="number" placeholder="Phone number" name="phone_number" value="<?php echo $row['phone_number']?>">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Items" name="items" value="<?php echo $row['items']?>">
      </div>
    </div>
    <div class="details">
      <div class="input-box">
        <input type="number" placeholder="Cash Paid" name="cash_paid" value="<?php echo $row['cash_paid']?>">
      </div>
      <div class="input-box">
        <input type="number" placeholder="Balance" name="balance" value="<?php echo $row['balance']?>">
      </div>
      <div class="input-box">
        <label style="color:#666;margin-top:-20px;position:absolute;">Date of Take</label>
        <input type="datetime-local" name="date_taken" value="<?php echo $row['date_taken']?>">
      </div>
    </div>
    <div class="details">
      <div class="input-box">
        <label style="color:#666;margin-top:-20px;position:absolute;">Date of Return</label>
        <input type="datetime-local" name="date_return" value="<?php echo $row['date_returned']?>">
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
      <input type="submit" value="Update">
    </div>
  </form>
</body>
</html>