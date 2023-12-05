<!-- PHP -->

<?php
$fileExists = 'englishWords.txt';

if (file_exists($fileExists)) {
   $allWords = file($fileExists);
}
?>

<!-- HTML START -->

<!DOCTYPE html>
<html lang="en">

<head>
   <title> Tiny Typers </title>
   <link rel="stylesheet" href="styles.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>
   <div id="wrapper">

      <!-- HEADER -->

      <header>
         <div class="leftMenus">
            <ul>
               <li> settings </li>
               <li> themes </li>
            </ul>
         </div>

         <div class="title">
            <label> TinyTypers </label>
         </div>

         <div class="rightMenus">
            <ul>
               <!-- <li> friends </li> -->
               <!-- <li> profile </li> -->
               <li><a style="text-decoration: none; color:#6a5acd" href="profile.php" title="Login or Register"> Login or Register </a></li>
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
                  <li> Setting 5 </li>
               </ul>
            </nav>
         </div>

         <div class="mainText">
            <label for="mainText" id="quote"> Start typing to create game </label>
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

      <button id='restart_btn' onclick='reset()'>Restart</button>

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


      <!-- JS SCRIPTS -->

      <script>
         var testWords = <?php echo json_encode($allWords); ?>;
      </script>

      <script src="mainPage.js"> </script>

   </div>
</body>

</html>
