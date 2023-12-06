<?php
session_start();
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
   die("Cannot connect to database! Error: ".mysqli_connect_error());
}

// If user is logging in
if (isset($_POST['login']) && !isset($_POST['register'])) {
   $loginQuery = "SELECT password FROM user WHERE username = '$loginUsernameOrEmail' OR email = '$loginUsernameOrEmail'";

   $queryResult = mysqli_query($db, $loginQuery);

   if ($queryResult == '' || $queryResult == null) {
      die("Invalid Username, Email, or Password entered. Try again!");
   }

   $row = mysqli_fetch_assoc($queryResult);
   $fetchedPassword = $row["password"];


   if (password_verify($password, $fetchedPassword)) {
      header("Location: index.php/");
   }
}

// If user is registering
if (isset($_POST['register']) && !isset($_POST['login'])) {
   $regUserQuery = "INSERT INTO user (username, email, password) VALUES ('$regUsername', '$regEmail', '$regPassword')";
   $regUserDetQuery = "INSERT INTO user_det (f_Name, l_name) VALUES ('$regFName', '$regLName')";

   $userQueryResult = mysqli_query($db, $regUserQuery);
   $userDetQueryResult = mysqli_query($db, $regUserDetQuery);
   
}



?>

<!DOCTYPE html>
<html>

<head>
   <title> TinyTypers Profile </title>
   <link rel="stylesheet" href="profile_styles.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
   <script src="profileJQuery.js"> </script>

   <div id="wrapper">

      <!-- HEADER -->

      <header>
         <div class="title">
            <label> TinyTypers </label>
         </div>
      </header>

      <!-- MAIN AREA -->
      <div class="main">
         <div class="mainTitle">
            <label for="main" class="login"> LOGIN </label>
            <label for="main" class="register"> REGISTER </label>
         </div>

         <form action="" class="loginForm" name="loginForm">
            <ul>
               <li class="loginUser"> Username or Email <br>
                  <input type="text" class="loginUserInp" name="loginUserOrEmail" required>
               </li>

               <li class="loginPass"> Password <br>
                  <input type="password" class="loginPassInp" name="loginPass" required>
               </li>

               <li class="loginSubmit">
                  <input type="button" class="loginButton" value="Login" name="login">
               </li>
            </ul>
         </form>

         <form action="" class="registerForm" name="registerForm">
            <ul class="mainInfo">
               <li class="regUser"> Username<br>
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
                  <input type="button" class="regButton" value="Register" name="register">
               </li>
            </ul>
         </form>
      </div>

      <!-- FOOTER -->

      <footer>
         <nav>
            <ul>
               <li> 1 </li>
               <li> 2 </li>
               <li> 3 </li>
               <li> 4 </li>
               <li> 5 </li>
            </ul>
         </nav>
      </footer>

   </div>

</body>

</html>