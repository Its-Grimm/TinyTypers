<?php
// Login creds
$loginUsernameOrEmail = filter_input(INPUT_POST, 'loginUserOrEmail');
$loginPassword = filter_input(INPUT_POST, 'loginPass');
// Register creds
$regUsername = filter_input(INPUT_POST, 'regUser');
$regEmail = filter_input(INPUT_POST, 'regEmail');
$regPassword = filter_input(INPUT_POST, 'regPass');
$regFName = filter_input(INPUT_POST, 'regFName');
$regLName = filter_input(INPUT_POST, 'regLName');

$db = mysqli_connect("69.172.204.200", "tp", "New_Web_2023!", "tp_Tiny_Typers");
if (!$db) {
   die("Cannot connect to database! Error: " . mysqli_connect_error());
}

// If user is registering and presses the register button
if (isset($_POST['registerButton'])) {
   $regUserQuery = "INSERT INTO user (ID, username, email, password, friend_code) VALUES (null, '$regUsername', '$regEmail', '$regPassword', '54321')";
   $userQueryResult = mysqli_query($db, $regUserQuery);
   
   if ($userQueryResult == false || $userQueryResult == null || $userQueryResult == "") {
      die("User not added");
   }
   else{
      header("Location: loginAndRegister.php");
   }
}

// If user is logging in and presses the login button
if (isset($_POST['loginButton'])) {
   // Grabbing the password from the database thats associated with the username/email entered
   $loginQuery = "SELECT password FROM user WHERE username = '$loginUsernameOrEmail' OR email = '$loginUsernameOrEmail'";
   $queryResult = mysqli_query($db, $loginQuery);

   if ($queryResult == '' || $queryResult == null) {
      die("Invalid Username, Email, or Password entered. Try again!");
   }
   
   if ($queryResult == false){
      die("No user under those credentials found. Please try again!");
   }
   
   $correctRow = mysqli_fetch_assoc($queryResult);
   $fetchedPassword = $correctRow["password"];

   // If the password entered in the textbox matches the one uploaded to the website
   if ($loginPassword == $fetchedPassword){
      $cookieName = "isLoggedIn";
      $cookieValue = true;
      setcookie($cookieName, $cookieValue, time() + (86400*30), "/");
      header("Location: index.php");
   }
}
?>

<!DOCTYPE html>
<html>

<head>
   <title> TinyTypers Login/Register </title>
   <link rel="stylesheet" href="loginAndRegister_styles.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
   <script src="loginAndRegisterJQuery.js"> </script>

   <div id="wrapper">

      <!-- HEADER -->

      <header>
         <div class="title"> 
            <label> <a style="text-decoration: none; color:#6a5acd"  href="index.php" title="Home"> TinyTypers </a> </label>
         </div>
      </header>

      <!-- MAIN AREA -->
      <div class="main">
         <div class="mainTitle">
            <label for="main" class="login"> LOGIN </label>
            <label for="main" class="register"> REGISTER </label>
         </div>

         <form action="" method="POST" class="loginForm" name="loginForm">

            <ul>
               <li class="loginUser"> Username or Email <br>
                  <input type="text" class="loginUserInp" name="loginUserOrEmail" required>
               </li>

               <li class="loginPass"> Password <br>
                  <input type="password" class="loginPassInp" name="loginPass" required>
               </li>

               <li class="loginSubmit">
                  <input type="submit" class="loginButton" name="loginButton" value="Login">
               </li>
            </ul>
         </form>

         <form action="" method="POST" class="registerForm" name="registerForm">
            <ul class="mainInfo">
               <li class="regUser"> Username <br>
                  <input type="text" class="regUserInp" name="regUser" required>
               </li>

               <li class="regEmail"> Email <br>
                  <input type="text" class="regEmailInp" name="regEmail" required>
               </li>

               <li class="regPass"> Password <br>
                  <input type="password" class="regPassInp" name="regPass" required>
               </li>
            </ul>

            <ul class="secondaryInfo">
               <li class="fName"> First Name <br>
                  <input type="text" class="regFNameInp" name="regFName" required>
               </li>

               <li class="lName"> Last Name <br>
                  <input type="text" class="regLNameInp" name="regLName" required>
               </li>

               <li class="regSubmit">
                  <input type="submit" class="regButton" value="Register" name="registerButton">
               </li>
            </ul>
         
         </form>
      </div>

      <!-- FOOTER -->

      <footer>
         <nav>
            <ul>
               <li> <a style="text-decoration: none; color:#6a5acd"  href="extraSites/contactUs.html" title="Contact Us"> Contact Us </a> </li>
               <li> <a style="text-decoration: none; color:#6a5acd"  href="extraSites/cookieUsage.html" title="Cookie Usage"> Cookie Usage </a> </li>
               <li> <a style="text-decoration: none; color:#6a5acd"  href="extraSites/ourLocation.html" title="Our Location"> Our Location </a> </li>
               <li> <a style="text-decoration: none; color:#6a5acd"  href="extraSites/aboutUs.html" title="About Us"> About Us </a> </li>
               <li> <a style="text-decoration: none; color:#6a5acd"  href="index.php" title="TinyTypers"> ©TinyTypers </a> </li>
            </ul>
         </nav>
      </footer>

   </div>

</body>

</html>