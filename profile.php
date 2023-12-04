<?php

// $db = mysqli_connect("69.172.204.200", "tp", "New_Web_2023!", "tp_db");
// if (!$db) {
//    die("Cannot connect to database! Error: " . mysqli_connect_error());
// }

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
      <form action="" class="main">
         <div class="mainTitle">
            <label for="main" class="login"> LOGIN </label>
            <label for="main" class="register"> REGISTER </label>
         </div>

         <div class="loginForm">
            <ul>
               <li class="loginUser"> Username or Email <br>
                  <input type="text" class="loginUserInp">
               </li>

               <li class="loginPass"> Password <br>
                  <input type="password" class="loginPassInp">
               </li>

               <li class="loginSubmit">
                  <input type="button" class="loginButton" value="Login">
               </li>
            </ul>
         </div>

         <div class="registerForm">
            <ul class="mainInfo">
               <li class="regUser"> Username<br>
                  <input type="text" class="regUserInp">
               </li>

               <li class="regEmail"> Email <br>
                  <input type="text" class="regEmailInp">
               </li>

               <li class="regPass"> Password <br>
                  <input type="password" class="regPassInp">
               </li>
            </ul>

            <ul class="secondaryInfo">
               <li class="fName"> First Name <br>
                  <input type="text" class="regFNameInp">
               </li>

               <li class="lName"> Last Name <br>
                  <input type="text" class="regLNameInp">
               </li>

               <li class="regSubmit">
                  <input type="button" class="regButton" value="Register">
               </li>
            </ul>
         </div>
      </form>

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