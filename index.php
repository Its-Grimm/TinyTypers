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
   <link rel="stylesheet" href="styles.css">
</head>

<body>
   <header>
      <div class="leftMenus">
         <ul>
            <li> profile </li>
            <li> friends </li>
         </ul>
      </div>

      <div class="title">
         <label> TinyTypers </label>
      </div>

      <div class="rightMenus">

      </div>

   </header>

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

   <div class="main">
      <label for="main" id="quote"> Start typing to start game </label>
   </div>

   <div class="underBoxSettings">
      <ul>
         <li class="wpmCounter" id="wpm"> wpm </li>
         <li class="typeBox"> <input type="text" class="typeBox" id="input_area" placeholder="start typing here..."
               onfocus='startGame()' oninput='processText()'> </li>
         <li class="timer" id="time"> 30s </li>
      </ul>
   </div>

   <label> Errors </label>
   <label id='errors'>0</label>

   <label> % Accuracy </label>
   <label id='accuracy'>100</label>
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


   <script>
      // Grabs all of the elements from the html
      let wpm_text = document.getElementById('wpm');
      let errors_text = document.getElementById('errors');
      let accuracy_text = document.getElementById('accuracy');
      let timer_text = document.getElementById('time');
      let input_area = document.getElementById('input_area');
      let words = document.getElementById('quote');

      let timer = null;
      let max_TIME = 30;
      let time = max_TIME;
      let charTyped = 0;
      let total_errors = 0;
      let curr_words = "";

      //Starts game
      function startGame() {
         reset();
         updateWords();
         clearInterval(timer);
         timer = setInterval(updateTimer, 1000);
      }

      //Resets the game when restart button is clicked
      function reset() {
         input_area.disabled = false;
         time = max_TIME;
         wpm.innerText = "";
         timer_text.innerText = max_TIME + "s";
         input_area.value = "";
         accuracy_text.innerText = 100;
      }

      //Counts down timer, and finishes gaem if timer hits 0
      function updateTimer() {
         if (time > 0) {
            time--;
            timer_text.innerText = time + 's';
         }
         else {
            finishGame();
         }
      }

      //Finishes game, clears text, resets variables
      function finishGame() {
         clearInterval(timer);
         input_area.disabled = true;
         words.innerText = 'Click on restart to start new game.';

         let wpm = ((charTyped / 5) / max_TIME) * 60;
         wpm_text.innerText = Math.round(wpm) + "wpm";
      }

      //Handles text input, correct/incorrect text, moving cursor
      function processText() {
         input = input_area.value;
         input_array = input.split('');
         words_array = words.querySelectorAll('span');
         let errors = 0;
         charTyped++;

         input_array.forEach((char, index) => {
            let words_char = words_array[index];

            if (!words_char.classList.contains('extra_char')) {
               if (char === words_char.innerText) {
                  words_char.classList.add('correct_char');
                  words_char.classList.remove('incorrect_char');
               }
               else {
                  words_char.classList.add('incorrect_char');
                  words_char.classList.remove('correct_char');
                  if (index === input_array.length - 1) {
                     errors++;
                  }
                  if (words_char.innerText === " ") {
                     const charSpan = document.createElement('span');
                     charSpan.innerText = char;
                     words.insertBefore(charSpan, words_char);
                     charSpan.classList.add("extra_char");
                  }
               }
            }
         });

         total_errors = total_errors + errors;
         errors_text.innerText = total_errors;

         let accuracy = ((charTyped - total_errors) / charTyped) * 100;
         accuracy_text.innerText = Math.round(accuracy);

         if (input_array.length === words_array.length) {
            updateWords();
            input_area.value = "";
         }
      }

      //Grabs words from the PHP above html
      <?php
         for ($i = 0; $i < 30; $i++) {
            $randomIndex = rand(0, count($allWords) - 1);
            $randomWords[$i] = $allWords[$randomIndex];
         }

         $firstWord = true;
         $allWordsStr = "";
         foreach ($randomWords as $word) {
            $trimmedWord = rtrim($word, "\r\n");
            if (!$firstWord) {
               $allWordsStr .= " ";
            } 
            else {
               $firstWord = false;
            }
            $allWordsStr .= $trimmedWord;
         }
      ?>

      //WHERE TYPING WORDS ARE ASSIGNED
      function updateWords() {
         var arrayData = <?php echo json_encode($allWordsStr); ?>;
         curr_words = arrayData;

         words.textContent = null;

         curr_words.split('').forEach(char => {
            const charSpan = document.createElement('span');
            charSpan.innerText = char;
            words.appendChild(charSpan);
         });
      }

   </script>
</body>

</html>