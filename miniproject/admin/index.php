<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

<style>
body {
    margin: 0;
    height: 100vh; /* Full viewport height */
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f0f4f8; /* Optional background color */
}

.container {
    max-width: 250px;
    background: #F8F9FD;
    background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
    border-radius: 40px;
    padding: 25px 35px;
    border: 5px solid rgb(255, 255, 255);
    box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 30px 30px -20px;
    margin: 20px;
}
  
.heading {
    text-align: center;
    font-weight: 900;
    font-size: 30px;
    color: rgb(16, 137, 211);
}
  
.form {
    margin-top: 20px;
}
  
.form .input {
    width: 100%;
    background: white;
    border: none;
    padding: 15px 3px;
    border-radius: 20px;
    margin-top: 15px;
    box-shadow: #cff0ff 0px 10px 10px -5px;
    border-inline: 2px solid transparent;
}
  
.form .input::placeholder {
    color: rgb(170, 170, 170);
}
  
.form .input:focus {
    outline: none;
    border-inline: 2px solid #12B1D1;
}
  
.form .login-button {
    display: block;
    width: 100%;
    font-weight: bold;
    background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
    color: white;
    padding-block: 15px;
    margin: 20px auto;
    border-radius: 20px;
    box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
    border: none;
    transition: all 0.2s ease-in-out;
}
  
.form .login-button:hover {
    transform: scale(1.03);
    box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
}
  
.form .login-button:active {
    transform: scale(0.95);
    box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
}
  
</style>
</head>
<body>
<div class="container">
    <div class="heading">Admin Login</div>
    <form class="form" action="home.php" onsubmit="return validateForm(event)">
      <input required="" class="input" type="text" name="uname" id="uname" placeholder="Username">
      <input required="" class="input" type="password" name="pass" id="pass" placeholder="Password">
      <input class="login-button" type="submit" value="Log In">
    </form>

    <script>
      function validateForm(event) {
          const uname = document.getElementById("uname").value;
          const pass = document.getElementById("pass").value;

          if (uname === "admin" && pass === "admin") {
              return true; // Allow form submission
          } else {
              alert("Invalid Username or Password");
              return false; // Prevent form submission
          }
      }
  </script>

</div>
</body>
</html>
