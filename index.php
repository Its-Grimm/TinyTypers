<!-- PHP -->

<?php
$fileExists = 'englishWords.txt';

if (file_exists($fileExists)) {
   $allWords = file($fileExists);
}

$cookieName = "isLoggedIn";
if (!isset($_COOKIE[$cookieName])) {
   $loggedInStatus = false;
} 
else {
   $loggedInStatus = filter_input(INPUT_COOKIE, 'isLoggedIn');
}

$timeSelector = $_POST['timeSelector'];

?>

<!-- HTML START -->

<!DOCTYPE html>
<html lang="en">

<head>
   <title> Tiny Typers </title>
   <link rel="stylesheet" href="styles.css">
</head>

<body>
   <div id="wrapper">

      <!-- HEADER -->

      <header>
         <div class="leftMenus">
            <ul>
               <li> Settings </li>
               <li> Themes </li>
            </ul>
         </div>

         <div class="title">
            <label> TinyTypers </label>
         </div>

         <div class="rightMenus">
            <ul>
               <?php
                  if ($loggedInStatus == true) {
                     echo '<li><a style="text-decoration: none; color:#6a5acd" 
                        href="friends.php" title="Friends"> Friends </a> </li>';
                     echo '<li><a style="text-decoration: none; color:#6a5acd" 
                        href="profile.php" title="Profile"> Profile </a> </li>';
                  } 
                  else {
                     echo '<li><a style="text-decoration: none; color:#6a5acd" href="loginAndRegister.php" title="Login or Register"> Login or Register </a></li>';
                  }
               ?>
            </ul>
         </div>

      </header>

      <div class="game">
         <div class="aboveBoxSettings">
            <nav>
               <ul>
                  <li> Setting 1 </li>
                  <li> Setting 2 </li>
                  <li> Setting 3 </li>
                  <li> Setting 4 </li>
                  <li>
                     <label for="time"> Test Time:  </label>
                     <select name="timeSelector" id="timeSelector" onchange="reset()">
                        <option value="30" selected> 30s </option>
                        <option value="45"> 45s </option>
                        <option value="60"> 60s </option>
                        <option value="120"> 120s </option>
                     </select>
                  </li>
               </ul>

            </nav>
         </div>

         <div class="mainText">
            <label for="mainText" id="quote"> Click on the textbox to start a game </label>
         </div>
      </div>


      <div class="hidden">
         <div class="graph">
            <canvas id="wpmGraph"> </canvas>
         </div>

         <div class="belowBox">
            <ul>
               <li class="errors" id="errors"> 0 </li>
               <li class="accuracy" id="accuracy"> 100 </li>
            </ul>
         </div>
      </div>

      <div class="underBoxSettings">
         <ul>
            <li class="wpmCounter" id="wpm"> 0 wpm </li>
            <li class="typeBox"> <input type="text" class="typeBox" id="input_area" placeholder="start typing here..."
                  onfocus='startGame()' oninput='processText()'> </li>
            <li class="timer" id="time"> </li>
         </ul>
      </div>

      <button id='restart_btn' onclick='reset()'> Restart </button>

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


      <!-- JS SCRIPTS -->

      <script>
         var testWords = <?php echo json_encode($allWords); ?>;
      </script>

      <script src="mainPage.js"> </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
   </div>
</body>

</html>