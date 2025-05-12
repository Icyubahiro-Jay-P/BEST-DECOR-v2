<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Best Decor: Sign up</title>
  <?php include("favicon.php");?>
  <link rel="stylesheet" href="css/forms.css">
  <link rel="stylesheet" href="icons/bootstrap-icons.css">
</head>
<body>
  <form action="#" method="post" class="signup" id="signup-form">
    <header style="text-align:center;width:100%;position:relative;">
      <h1>Best Decor</h1>
      <h2>Add a new user</h2>
      <select name="role" class="input-box2">
        <style>
          .input-box2{
            position: absolute;
            display: flex;
            justify-self:flex-end;
            align-content:flex-start;
            outline:none;
            top: 7%;
            right: 5%;
            width: 100px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 3px;
          }
          .input-box2 select{
            width: 100%;
            outline: none;
            border-radius: 3px;
          }
          @media screen and (max-width:480px){
            .input-box2{
              width: 80px;
              right: 0;
              top: 0;
            }
          }
        </style>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
      </select>
    </header>

    <div class="details">
      <div class="input-box">
        <input type="text" placeholder="Full name" name="full_name">
        <p><i class="bi bi-info-circle-fill"></i> Full name is missing.</p>
      </div>
      <div class="input-box">
        <input type="email" placeholder="Email" name="email">
        <p><i class="bi bi-info-circle-fill"></i> Email is missing.</p>
      </div>
    </div>
    <div class="details">
      <div class="input-box">
        <input type="password" placeholder="Password" name="password">
        <i class="bi bi-eye-slash-fill"></i>
        <p><i class="bi bi-info-circle-fill"></i> Password is missing.</p>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm Password" name="confirm_password">
        <i class="bi bi-eye-slash-fill"></i>
        <p><i class="bi bi-info-circle-fill"></i> Confirm Password is missing.</p>
      </div>
    </div>
      <div class="submit">
        <input type="submit" value="Add user">
      </div>
  </form>
  <footer>
    <p>&copy;Copyright 2025</p>
    <span>Created and designed by <b>Jay P</b></span>
  </footer>
  <script src="js/signup.js"></script>
</body>
</html>