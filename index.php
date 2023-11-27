<!DOCTYPE html>
<html lang="en">

<head>
   <title> Tiny Typers </title>
   <link rel="stylesheet" href="syles.css">
</head>

<body>
   <h1>TinyTypers</h1>
   <!-- <img src="./Logos/svgs/TinyTypersLogoV1SVG.svg" alt="" width="307.5px" height="96px"> -->
   <label> WPM </label> 
    <p id='wpm'></p> 
     
    <label> Errors </label> 
    <p id='errors'>0</p> 
      
    <label> Time </label> 
    <p id='time'>30s</p> 
      
    <label> % Accuracy </label> 
    <p id='accuracy'>100</p> 
  
    <p id='quote'>Click on the area below to start the game.</p> 
    <textarea id='input_area'
        onfocus='startGame()'
        oninput='processText()'
        placeholder="start typing here..."></textarea> 
    <button id='restart_btn'
        onclick='reset()'>Restart</button> 
        
    <script>
            
        let wpm_text = document.getElementById('wpm');
        let errors_text = document.getElementById('errors');
        let accuracy_text = document.getElementById('accuracy');
        let timer_text = document.getElementById('time');
        let input_area = document.getElementById('input_area');
        let words = document.getElementById('quote');
        let timer = null;
        let max_TIME = 20;
        let time = max_TIME;
        let charTyped = 0;
        let total_errors = 0;
        let curr_words = "";
            
        function startGame(){
            reset();
            updateWords();
            clearInterval(timer);
            timer = setInterval(updateTimer, 1000);
                
        }
        function reset(){
                
            input_area.disabled = false;
            time = max_TIME;
            wpm.innerText = "";
            timer_text.innerText = max_TIME;
            input_area.value ="";
            accuracy_text.innerText = 100;
        }
        function updateTimer(){
                
            if(time > 0){
                time--;
                timer_text.innerText = time + 's';
            }else{
                finishGame();
            }
        }
        function finishGame(){            
            clearInterval(timer);
            input_area.disabled = true;
            words.innerText = 'Click on restart to start new game.';
            
            let wpm = ((charTyped /5) / max_TIME) * 60;
            wpm_text.innerText = Math.round(wpm);
                
        }            
        function processText(){
                
            input = input_area.value;
            input_array = input.split('');
            words_array = words.querySelectorAll('span');
            let errors = 0;
            charTyped++;
                
            input_array.forEach((char, index) => {
                let words_char = words_array[index];
                
                if(!words_char.classList.contains('extra_char')){
                    if(char === words_char.innerText){
                        words_char.classList.add('correct_char');
                        words_char.classList.remove('incorrect_char');
                    }else{
                        words_char.classList.add('incorrect_char');
                        words_char.classList.remove('correct_char');
                        if(index === input_array.length-1)
                            errors++;
                        if(words_char.innerText === " "){
                           
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
                
            if(input_array.length === words_array.length){
                    
                updateWords();
                input_area.value = "";
            }                
        }
        function updateWords(){
            curr_words = 'test your typing with tiny typers';
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
