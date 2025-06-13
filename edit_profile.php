<?php
session_start();
include("php/connect.php");
$user_id = $_GET['user_id'];
if(!isset($user_id) || !isset($_SESSION['user_id'])){
  echo "<script>
          window.location.assign('./profile');
        </script>";
}
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Best Decor: Edit profile</title>
  <?php include("favicon.php");?>
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/edit_profile.css">
  <link rel="stylesheet" href="icons/bootstrap-icons.css">
</head>
<body>
<header>
    <h3>Best Decor</h3>
    <h2>Edit Profile</h2>
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
      <li>
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
      <li class="active">
        <a href="profile">
          <i class="bi bi-person-circle"></i>
          Profile</a>
      </li>
      <li>
        <a href="logout">
          <i class="bi bi-box-arrow-left"></i>
          Log&nbsp;out</a>
      </li>
    </ul>
  </nav>
<main>
<form action="#" method="post" id="edit-profile-form">
    <h1>Best Decor</h1>
    <h2>Edit profile</h2>
    <input type="hidden" name="user_id" value="<?php echo $row['id']?>">
    <div class="input-box">
      <input type="email" placeholder="Email" name="email" value="<?php echo $row['email']?>">
      <p><i class="bi bi-info-circle-fill"></i> Email is missing.</p>
    </div>
    <div class="input-box">
      <input type="text" placeholder="Full names" name="full_name" value="<?php echo $row['full_name']?>">
      <p><i class="bi bi-info-circle-fill"></i> Password is missing.</p>
    </div>
    <div class="submit">
      <input type="submit" id="saveChanges" value="Save changes">
    </div>
  </form>
</main>
<script src="js/edit_profile.js"></script>
</body>
</html>