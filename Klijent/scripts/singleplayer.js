let secretWord = "одмор";
let enteredWord = [];
let currentRow = 1;
let currentCol = 1;

var enableEntry = true;

var numOfGuesses = 6;

function enter(currentLetter) { // we put letter in (currentRow, currentCol)
    if (currentRow == numOfGuesses && currentCol == 6) return;
    if (enableEntry == false) return;
    if (currentCol == 6) {
        currentRow += 1;
        currentCol = 1;
        enteredWord = []
    }
    let squareId = "square" + currentRow + currentCol;
    document.getElementById(squareId).innerHTML = currentLetter.toUpperCase(); // TODO center!!!
    enteredWord.push(
        {
            letter : currentLetter,
            square : squareId
        }
    )
    currentCol += 1;
    if (currentCol == 6) enableEntry = false;
}

function removeLetter() { 
    if (currentRow == 1 && currentCol == 1) return; // empty
    currentCol -= 1;
    if (currentCol == 0) { //first letter after checking
        currentCol = 1;
        return;
    }
    if (currentCol == 5) { // it used to be 6
        enableEntry = true;
    }
    let squareId = "square" + currentRow + currentCol;
    document.getElementById(squareId).innerHTML = "";
}

function checkEnteredWord() {
    if (currentCol != 6) return;
    let greens = 0;
    let used = [];
    //(used = []).length = 5; used.fill(0);
    for(let i = 0; i < 5; i++) {
        if (enteredWord[i].letter == secretWord[i]) {          
            document.getElementById(enteredWord[i].square).style.backgroundColor = 'rgba(89,217,131,0.5)';
            document.getElementById(enteredWord[i].letter).style.backgroundColor = 'rgba(89,217,131,0.5)';
            greens++;            
            continue;
        }
        let found = false;
        for(let j = 0; j < 5; j++) { // TODO nije dobra logika skroz
            if (enteredWord[i].letter == secretWord[j]) {
                document.getElementById(enteredWord[i].square).style.backgroundColor = 'rgba(217,138,89,0.5)';
                document.getElementById(enteredWord[i].letter).style.backgroundColor = 'rgba(217,138,89,0.5)';
                found = true;
                break;
            }
        }
        if (found) continue;
        document.getElementById(enteredWord[i].square).style.backgroundColor = 'rgba(79,74,71,0.4)';
        document.getElementById(enteredWord[i].letter).style.backgroundColor = 'rgba(79,74,71,0.4)';
    }
    if (greens < 5) { enableEntry = true; return; }
    
    setTimeout(function() {
        alert("Свака част!");
    }, 1000);
}
