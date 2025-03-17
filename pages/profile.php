<?php
session_start();
include("../php/connect.php");
if(!isset($_SESSION['full_name'])){
  echo "<script>window.location.assign('../pages/login.php');</script>";
}

// Fetch user data
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/profile.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../icons/bootstrap-icons.css">
  <title>Best Decor: Profile</title>
</head>
<body data-theme="light">
  <header>
    <h3>Best Decor</h3>
    <h2>Profile</h2>
    <div class="parts">
      <div class="theme-toggle">
        <i class="bi bi-sun-fill"></i>
      </div>
    </div>
  </header>

  <nav>
    <ul>
      <li>
        <a href="home.php">
          <i class="bi bi-house-fill"></i>Home
        </a>
      </li>
      <li>
        <a href="index.php">
          <i class="bi bi-journal-album"></i>
          Dashboard</a>
      </li>
      <li>
        <a href="./add_client.php">
          <i class="bi bi-person-plus-fill"></i>
          Add&nbsp;client</a>
      </li>
      <li>
        <a href="taken.php">
          <i class="bi bi-box-arrow-right"></i>
          Taken</a>
      </li>
      <li>
        <a href="returned.php">
          <i class="bi bi bi-box-arrow-in-left"></i>
          Returned</a>
      </li>
      <li class="active">
        <a href="profile.php">
          <i class="bi bi-person-circle"></i>
          Profile</a>
      </li>
      <li>
        <a href="../php/logout.php">
          <i class="bi bi-box-arrow-left"></i>
          Log&nbsp;out</a>
      </li>
    </ul>
  </nav>

  <main>
    <div class="image-container">
      <img src="<?php echo $user['profile_image'] ?? '../profile.png'; ?>" alt="Profile">
      <i class="bi bi-x-lg"></i>
    </div>
    <div class="profile-details">
      <h2>Profile Information</h2>
      <div class="info-group">
        <p><i class="bi bi-person-fill"></i> <?php echo $user['full_name']; ?></p>
        <p><i class="bi bi-envelope-fill"></i> <?php echo $user['email']; ?></p>
        <p><i class="bi bi-person-badge"></i> <?php echo $user['role']; ?></p>
      </div>
    </div>
    <div class="tools">
      <a href="#" id="editProfile">
        <i class="bi bi-pencil-square"></i>
        Edit Profile
      </a>
      <a href="#" id="changePassword">
        <i class="bi bi-key-fill"></i>
        Change Password
      </a>
      <a href="#" id="changePhoto">
        <i class="bi bi-camera-fill"></i>
        Change Photo
      </a>
    </div>
  </main>

  <script src="../js/profile.js"></script>
</body>
</html>