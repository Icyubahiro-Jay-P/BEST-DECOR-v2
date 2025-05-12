<?php
include_once "php/connect.php";
session_start();
if(!isset($_SESSION['user_id'])){
  echo "<script>
          location.assign('./login');
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="icons/bootstrap-icons.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/toast.css">
  <title>Best Decor: Dashboard</title>
</head>
<body>
  <header>
    <h3>Best Decor</h3>
    <h2>Dashboard</h1>
    <?php
      if(isset($_SESSION['toast'])){
       include('components/toast.php');
      }
    ?>
    <div class="parts">
      <!-- <div class="search-box">
        <input type="text" placeholder="Search" name="search" id="search">
        <button><i class="bi bi-search"></i></button>
      </div> -->
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
      <li class="active">
        <a href="dashboard">
          <i class="bi bi-journal-album"></i>
          Dashboard</a>
      </li>
      <li>
        <a href="add_client">
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
  <div class="table-container">

    <table border="1">
      <thead>
      <th>#</th>
      <th>Full names</th>
      <th>Phone number</th>
      <th>Items</th>
      <th>Cash Paid</th>
      <th>Balance</th>
      <th>Taken</th>
      <th>Date of Take</th>
      <th>Returned</th>
      <th>Date of Return</th>
      <th>Done by</th>
      <th>Edit</th>
      <th>Delete</th>
    </thead>
    <tbody>
      <?php
      include("php/connect.php");
      $count = 0;
        $sql = "SELECT * FROM clients";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
          while($row = mysqli_fetch_assoc($query)){
            ?>
            <tr>
              <td><?php echo ++$count?></tdc>
              <td><?php echo $row['full_name'] == "" ? "*****" : $row['full_name']?></td>
              <td><?php echo $row['phone_number'] == "0" ? "*****" : $row['phone_number']?></td>
              <td><?php echo $row['items'] == "" ? "*****" : $row['items']?></td>
              <td><?php echo $row['cash_paid'] . " Frw" == "" ? "*****" : $row['cash_paid'] . "Frw"?></td>
              <td><?php echo $row['balance'] . " Frw"?></td>
              <td><?php echo $row['taken']?></td>
              <td><?php echo $row["date_taken"] == "0000-00-00 00:00:00" ? "*****" : $row['date_taken'] ?></td>
              <td><?php echo $row['returned']?></td>
              <td><?php echo $row["date_returned"] == "0000-00-00 00:00:00" ? "*****" : $row['date_returned']?></td>
              <td><?php echo $_SESSION['full_name']; ?></td>
              <td><a style="background:var(--success-clr);padding:5px 10px;border-radius:5px; color:white;text-decoration:none;" href="update?client_id=<?php echo $row['id']?>"><i class="bi bi-pencil-fill"></i></a></td>
              <td><a style="background:var(--error-clr);padding:5px 10px;border-radius:5px; color:white;text-decoration:none;" href="./php/delete_client?client_id=<?php echo $row['id']?>"><i class="bi bi-trash-fill"></i></a></td>
            </tr>
            <?php

          }
        }else{
          echo "<tr><td colspan='13' align='center'><b>No clients added yet.</b></td></tr>";
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>