<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $homeaddress = $_POST['homeaddress'];
    $email = $_POST['email'];
    $contact_number = $_POST['number'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    $sql = "INSERT INTO users (firstname, lastname, homeaddress, email, contact_number, username, password) 
            VALUES ('$firstname', '$lastname', '$homeaddress', '$email', '$contact_number', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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

    <title>AquaCare Register</title>

    <div class="container">
      <div class="box form-box">
        <h1>Register</h1>
        <form action="" method="post">
          <div class="field input">
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname" required placeholder="John"/>
          </div>

          <div class="field input">
            <label for="lastname">Last name</label>
            <input type="text" name="lastname" id="lastname" required placeholder="Doe"/>
          </div>

          <div class="field input">
            <label for="homeaddress">Home address</label>
            <input type="text" name="homeaddress" id="homeaddress" required  placeholder="Cebu City"/>
          </div>

          <div class="field input">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required placeholder="johndoe@gmail.com"/>
          </div>

          <div class="field input">
            <label for="number">Contact number</label>
            <input type="number" name="number" id="number" required placeholder="+61 491 570 159"/>
          </div>

          <div class="field input">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required />
          </div>

          <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
          </div>

          <div class="field">
            <input
              type="submit"
              class="btn"
              name="submit"
              value="Register"
              required
            />
          </div>
          <div class="links">
            Already a member? <a href="index.php">Sign in</a>
          </div>
        </form>
      </div>
    </div>
  </head>
  <body></body>
</html>
