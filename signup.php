<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Best Decor: Sign up</title>
  <link rel="stylesheet" href="css/forms.css">
  <link rel="stylesheet" href="icons/bootstrap-icons.css">
</head>
<body>
  <form action="#" method="post" class="signup" id="signup-form">
    <h1>Best Decor</h1>
    <h2>Sign up</h2>
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
        <input type="submit" value="Sign up">
      </div>
    <div class="links">
      <p>Already have an account? <a href="login">Log in</a></p>
    </div>
  </form>
  <footer>
    <p>&copy;Copyright 2025</p>
    <span>Created and designed by <b>Jay P</b></span>
  </footer>
  <script src="js/signup.js"></script>
</body>
</html>