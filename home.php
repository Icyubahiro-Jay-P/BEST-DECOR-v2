<?php
session_start();
include("php/connect.php");
if(!isset($_SESSION['full_name'])){
  echo "<script>window.location.assign('./login');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include("favicon.php");?>
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="icons/bootstrap-icons.css">
  <title>Best Decor: Home</title>
</head>
<body data-theme="light">
  <header>
    <h3>Best Decor</h3>
    <h2>Home</h2>
    <div class="parts">
      <div class="profile">
        <a href="profile">
          <img src="profile.png" alt="Profile">
        </a>
      </div>
    </div>
  </header>
  <nav>
    <ul>
      <li class="active">
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
      <li>
        <a href="profile">
          <i class="bi bi-person-circle"></i>
          Profile</a>
      </li>
      <li>
        <a href="php/logout">
          <i class="bi bi-box-arrow-left"></i>
          Log&nbsp;out</a>
      </li>
    </ul>
  </nav>

  <main class="home-container">
    <!-- Welcome Section -->
    <section class="welcome-section">
      <h1>Welcome, <?php echo $_SESSION['full_name']; ?>!</h1>
      <p>Manage your decoration rental business efficiently</p>
    </section>

    <!-- Quick Stats -->
    <section class="stats-section">
      <div class="stat-card">
        <i class="bi bi-people-fill"></i>
        <h3>Total Clients</h3>
        <p><?php 
          $sql = "SELECT COUNT(*) as total FROM clients";
          $result = mysqli_query($conn, $sql);
          $data = mysqli_fetch_assoc($result);
          echo $data['total'];
        ?></p>
      </div>
      <div class="stat-card">
        <i class="bi bi-box-seam-fill"></i>
        <h3>Active Rentals</h3>
        <p><?php 
          $sql = "SELECT COUNT(*) as active FROM clients WHERE returned = 'No'";
          $result = mysqli_query($conn, $sql);
          $data = mysqli_fetch_assoc($result);
          echo $data['active'];
        ?></p>
      </div>
      <div class="stat-card">
        <i class="bi bi-calendar-check-fill"></i>
        <h3>Returns Today</h3>
        <p><?php 
          $today = date('Y-m-d');
          $sql = "SELECT COUNT(*) as returns FROM clients WHERE date_returned LIKE '$today%'";
          $result = mysqli_query($conn, $sql);
          $data = mysqli_fetch_assoc($result);
          echo $data['returns'];
        ?></p>
      </div>
    </section>

    <!-- Quick Actions -->
    <section class="quick-actions">
      <h2>Quick Actions</h2>
      <div class="actions-grid">
        <a href="add_client" class="action-card">
          <i class="bi bi-person-plus-fill"></i>
          <span>Add Client</span>
        </a>
        <a href="taken" class="action-card">
          <i class="bi bi-box-arrow-right"></i>
          <span>View Taken</span>
        </a>
        <a href="returned" class="action-card">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>View Returned</span>
        </a>
        <a href="dashboard" class="action-card">
          <i class="bi bi-grid-fill"></i>
          <span>Dashboard</span>
        </a>
      </div>
    </section>

    <!-- Recent Activity -->
    <section class="recent-activity">
      <h2>Recent Activity</h2>
      <div class="activity-list">
        <?php
        $sql = "SELECT * FROM clients ORDER BY id DESC LIMIT 5";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='activity-item'>";
            echo "<i class='bi bi-circle-fill'></i>";
            echo "<div class='activity-details'>";
            echo "<p>" . $row['full_name'] . " - " . $row['items'] . "</p>";
            echo "<small>" . date('M d, Y', strtotime($row['date_taken'])) . "</small>";
            echo "</div>";
            echo "</div>";
          }
        } else {
          echo "<p>No recent activity</p>";
        }
        ?>
      </div>
    </section>
  </main>

</body>
</html>
