<?php

$db = mysqli_connect("69.172.204.200", "tp", "New_Web_2023!", "tp_db");
if (!$db) {
   die("Cannot connect to database! Error: " . mysqli_connect_error());
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
   <div id="wrapper">

      <!-- HEADER -->

      <header>
         <div class="title">
            <label> TinyTypers </label>
         </div>
      </header>

      <!-- MAIN AREA -->
      <div class="main">
         <label for="main"> LOGIN </label>
         <label for="main"> REGISTER </label>

         <div class="login">
            <label for="login"> LOGIN HERE </label>
         </div>


         <div class="register">
            <label for="register"> REGISTER HERE </label>
         </div>
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