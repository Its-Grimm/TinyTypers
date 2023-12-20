<!-- PHP -->

<?php

?>

<!-- HTML START -->

<!DOCTYPE html>
<html lang="eng">

<head>
   <title> TinyTypers Profile </title>
   <link rel="stylesheet" href="profile_styles.css">
</head>

<body>
   <div id="wrapper">

      <!-- HEADER -->

      <header>
         <div class="title">
            <label> <a style="text-decoration: none; color:#6a5acd" href="tinyTypersIndex.php" title="Home"> TinyTypers </a>
            </label>
         </div>
      </header>

      <!-- MAIN AREA -->

      <form action="" method="POST" class="profileForm" name="profileForm">
         <div class="main">
            <div class="profile">
               <label for="profile"> YOUR NAME </label>
               <label> <?php echo $loggedInStatus; ?> </label>
               <input type="submit" class="logOutButton" name="logOutButton" value="Log Out">
            </div>
         </div>
      </form>

      <!-- FOOTER -->

      <footer>
         <nav>
            <ul>
               <li> <a style="text-decoration: none; color:#6a5acd" href="extraSites/contactUs.html" title="Contact Us"> Contact Us </a> </li>
               <li> <a style="text-decoration: none; color:#6a5acd" href="extraSites/cookieUsage.html" title="Cookie Usage"> Cookie Usage </a> </li>
               <li> <a style="text-decoration: none; color:#6a5acd"  href="index.html" title="Home"> Back To Home </a> </li>
               <li> <a style="text-decoration: none; color:#6a5acd" href="extraSites/aboutUs.html" title="About Us"> About Us </a> </li>
               <li> <a style="text-decoration: none; color:#6a5acd" href="tinyTypersIndex.php" title="TinyTypers"> ©TinyTypers </a> </li>
            </ul>
         </nav>
      </footer>

   </div>

</body>

</html>
