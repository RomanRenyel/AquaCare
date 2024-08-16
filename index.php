
<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful!";
            // Start session and store user info
            session_start();
            $_SESSION['username'] = $username;
            header("Location: welcome.php"); // Redirect to a welcome page
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <title>AquaCare</title>

    <div class="container">
      <div class="box form-box">
        <h1>Log In</h1> 
        <form action="" method="post">
          <div class="field input">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required />
          </div>

          <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
          </div>

          <div class="field">
            <input type="submit" class="btn" name="submit" value="Login" required />
          </div>
          <div class="links">
            Don't have account? <a href="register.php">Sign Up</a>
          </div>
        </form>
      </div>
    </div>
  </head>
  <body></body>
</html>
