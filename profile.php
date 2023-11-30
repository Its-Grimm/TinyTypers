<!DOCTYPE html>
<html>

<head>
   <title> TinyTypers Profile </title>
   <link rel="stylesheet" href="profile_styles.css">
</head>


<body>
<?php

// $db = false; //mysqli_connect("69.172.204.200", "tp", "New_Web_2023!", "tp_TinyTypers");
// if (!$db) {
//    echo "Cannot connect to database! Error: " ;
//    echo "Something strange is going on if this message doesn't appear";
//    //die("Cannot connect to database! Error: " . mysqli_connect_error());
// } 
// else {
//    echo "IT WORKS";
// }

echo "before connect";
$db = mysqli_connect("69.172.204.200", "tp", "New_Web_2023!", "tp_db");
echo "after connect";
if (!$db) {
   die("Cannot connect to database! Error: " . mysqli_connect_error());
}

?>


   <!-- <form name="loginForm" action="" method="post"> -->
      
      <div id="wrapper">

         <!-- HEADER -->

         <header>
            <div class="title">
               <label> TinyTypers </label>
            </div>
         </header>

         <!-- MAIN AREA -->
         <div class="main">
            <label> HELLO </label>

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

   <!-- </form> -->

</body>

</html>