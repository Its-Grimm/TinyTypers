// Grabs all of the elements from the html
let wpm_text = document.getElementById('wpm');
let errors_text = document.getElementById('errors');
let accuracy_text = document.getElementById('accuracy');
let timer_text = document.getElementById('time');
let input_area = document.getElementById('input_area');
let words = document.getElementById('quote');
let accuracy_div = document.querySelector('.hidden');
let game = document.querySelector('.game');

// MAX TIME
let max_TIME = 30;
let timer = null;
let time = max_TIME;
let time_elapsed = 0;
let wpm = 0;
let charTyped = 0;
let total_errors = 0;
let curr_words = "";
let wpmOverInterval = [];
let i = 0;
timer_text.innerText = max_TIME + "s";
let accuracy = 0;
var graph = null;
let errors = 0;
let passedErrors = 0;


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
   time_elapsed = 0;
   wpm = 0;
   charTyped = 0;
   total_errors = 0;
   wpm_text.innerText = "0 wpm";
   timer_text.innerText = max_TIME + "s";
   input_area.value = "";
   accuracy_text.innerText = 100;
   accuracy_div.classList.add('hidden');
   game.classList.remove('hidden');
   wpmOverInterval = [];
   i = 0;
   accuracy = 0;
   errors =0;
   passedErrors = 0;
   words.innerText = 'Start typing to create game';
}

//Counts down timer, and finishes game if timer hits 0
function updateTimer() {
   if (time > 0) {
      time--;
      time_elapsed++;
      timer_text.innerText = time + 's';
      
      wpm = (charTyped / 5) / (time_elapsed / 60);

      if (wpm < 0) { //Fixes wpm going negative from deleted words
         wpm = 0;
      }
   
      //wpm display every 2 seconds
      if (time % 2 === 0 || time === max_TIME-1) {
         wpm_text.innerText = Math.round(wpm) + " wpm";
         wpmOverInterval[i] = wpm;
         i++;
      }
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
   accuracy_div.classList.remove("hidden");
   game.classList.add('hidden');

   makeGraph();

   input_area.value = "";
   
   errors_text.innerText = total_errors + " errors";
   if(charTyped === 0 && total_errors === 0)
      accuracy = 0;
   else
      accuracy = ((charTyped - total_errors)/charTyped)*100;
   if(accuracy < 0)
      accuracy = 0;
   else if(accuracy >100)
     accuracy = 100;
   accuracy_text.innerText = Math.round(accuracy) + "% acc";

   let wpm = ((charTyped / 5) / (time_elapsed / 60));
   if(wpm < 0)
      wpm = 0;
   wpm_text.innerText = Math.round(wpm) + " wpm";
   wpmOverInterval = [];
   i = 0;
}

//Handles text input, correct/incorrect text, moving cursor
function processText() {
   input = input_area.value;
   input_array = input.split('');
   words_array = words.querySelectorAll('span');
   errors = 0;
   charTyped++;
   input_area.onkeydown = function(){
      var key = event.keyCode || event.charCode;
      if((key === 8 || key === 46) && input.length > 0){
         charTyped -= 2;
      }
   }

   let countWords = 0;
   input_array.forEach((char, index) => {
      let words_char = words_array[index];

      if (!words_char.classList.contains('extra_char')) {
         if (char === words_char.innerText) {
            if(char === " ")
               countWords++;
            words_char.classList.add('correct_char');
            words_char.classList.remove('incorrect_char');
         }
         else {
            words_char.classList.add('incorrect_char');
            words_char.classList.remove('correct_char');
            errors++;
            if (words_char.innerText === " ") {
               const charSpan = document.createElement('span');
               charSpan.innerText = char;
               words.insertBefore(charSpan, words_char);
               charSpan.classList.add("extra_char");
            }
         }
      }
   });

   words_array.forEach((char, index) => {
      if (index >= input_array.length) {
         
         if (char.classList.contains('incorrect_char')) {
            char.classList.remove('incorrect_char'); 
         }else if(char.classList.contains('correct_char')){
            char.classList.remove('correct_char');
         }
         if (char.classList.contains('extra_char')) {
            char.remove();
         }
      }
   });

   total_errors = errors + passedErrors;

   if(countWords >= 2){
      shiftWords();
   }
   
   if (input_array.length === words_array.length) {
      updateWords();
      input_area.value = "";
   }
}

function shiftWords() {
   let shifted = "";
   let count = 0;
  
   words_array = words.querySelectorAll('span');
      while(shifted !== " "){
         if(words_array[count].classList.contains('incorrect_char') || words_array[count].classList.contains('extra_char')){
            passedErrors++;
         }
         shifted = words_array[count].innerText;
         words_array[count].remove();
         count++;
      }
    total_errors = errors + passedErrors;
    addWord();
   input = input_area.value;
   input_array = input.split('');
   shifted = "";
   while(shifted !== " "){
      shifted = input_array.shift();
   }
   input_area.value = input_array.join("");
   for( let i = 0; i < words_array.length(); i++){
      words.textContent =+ words_array[i];
   }
}

//WHERE TYPING WORDS ARE ASSIGNED
function updateWords() {

   // Grabs from php in index.php

   words.textContent = null;
   let firstWord = true;
   for (let i = 0; i < 30; i++){
      let rand = Math.floor(Math.random()*testWords.length);
      curr_words = testWords[rand].trim();
      if(!firstWord){
         const charSpan = document.createElement('span');
         charSpan.innerText = " ";
         words.appendChild(charSpan)
      }else{
         firstWord = false;
      }
      curr_words.split('').forEach(char => {
         const charSpan = document.createElement('span');
         charSpan.innerText = char;
         words.appendChild(charSpan);
      });
   }
}

//add word to the end of words
function addWord(){
   let rand = Math.floor(Math.random() * testWords.length);
   let newWord = testWords[rand].trim();
   
   //adds a space between words
   const charSpan = document.createElement('span');
   charSpan.innerText = " ";
   words.appendChild(charSpan);
   
   //add new word
   newWord.split('').forEach(char => {
      const charSpan = document.createElement('span');
      charSpan.innerText = char;
      words.appendChild(charSpan);
   });
}

function makeGraph() {
   if (graph != null){
      graph.destroy();
   }
   let totalTime = max_TIME;
   let countUp = 0;
   let countUpVal = totalTime / 15;
   let xValCount = [];

   // Divides total time into 10 points on the graph for tracking wpm over the course of the test
   for (let count = 0; count <= 15; count++) {
      xValCount[count] = countUp;
      countUp += countUpVal; //Ensures we always have 15 points, no matter the time chosen
   }

   graph = new Chart("wpmGraph", {
      type: "line",
      data: {
         labels: xValCount,
         datasets: [{
            data: wpmOverInterval,
            borderColor: "red",
            fill: false
         }]
      },
      options: {
         legend: { display: false }
      }
   });
}
