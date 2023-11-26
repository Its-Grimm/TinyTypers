<?php
$fileExists = 'englishWords.txt';

if (file_exists($fileExists)) {
   // $wordFile = fopen('englishWords.txt', 'r');
   $allWords = file('englishWords.txt');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title> Tiny Typers </title>
   <link rel="stylesheet" href="syles.css">
</head>

<body>
   <label>
      <?php $message ?>
   </label>

   <?php
   for ($i = 0; $i < count($allWords); $i++) {
      if (strlen($allWords[$i]) - 1 == 5) {
         echo $allWords[$i] . "\n";
      }
   }
   ?>
</body>

</html>