<?php
$fileExists = 'englishWords.txt';

if (file_exists($fileExists)) {
   $allWords = file($fileExists);
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
   for ($i = 0; $i < 20; $i++) {
      $randomIndex = rand(0, count($allWords) - 1);
      $randomWords[$i] = $allWords[$randomIndex];
      echo "<h3> $randomWords[$i] </h3> <br>";
   }

   ?>
</body>

</html>