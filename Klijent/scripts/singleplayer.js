let colorGreen = 'rgba(89, 217, 131, 0.5)';
let colorPink = 'rgba(217, 138, 89, 0.5)';
let colorGrey = 'rgba(79, 74, 71, 0.4)';

let secretWord = "одмор";
let enteredWord = [];
let currentRow = 1;
let currentCol = 1;
var enableEntry = true;
var numOfGuesses = 6;

const letterMap = new Map();

letterMap.set('а', 1); letterMap.set('б', 2); letterMap.set('в', 3);
letterMap.set('г', 4); letterMap.set('д', 5); letterMap.set('ђ', 6);
letterMap.set('е', 7); letterMap.set('ж', 8); letterMap.set('з', 9); 
letterMap.set('и', 10); letterMap.set('ј', 11); letterMap.set('к', 12);
letterMap.set('л', 13); letterMap.set('љ', 14); letterMap.set('м', 15);
letterMap.set('н', 16); letterMap.set('њ', 17); letterMap.set('о', 18); 
letterMap.set('п', 19); letterMap.set('р', 20); letterMap.set('с', 21); 
letterMap.set('т', 22); letterMap.set('ћ', 23); letterMap.set('у', 24);
letterMap.set('ф', 25); letterMap.set('х', 26); letterMap.set('ц', 27);
letterMap.set('ч', 28); letterMap.set('џ', 29); letterMap.set('ш', 30);

(count = []).length = 30; count.fill(0);

function fillCount() {
    for (let i = 0; i < 5; i++) {
        let ind = letterMap.get(secretWord[i]);
        count[ind - 1] += 1;
    }
}


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
    (colored = []).length = 5; colored.fill(false);
    
    for(let i = 0; i < 5; i++) {
        if (enteredWord[i].letter == secretWord[i]) {          
            document.getElementById(enteredWord[i].square).style.backgroundColor = colorGreen;
            document.getElementById(enteredWord[i].letter).style.backgroundColor = colorGreen;
            greens++;   
            count[letterMap.get(secretWord[i]) - 1] -= 1;   
            colored[i] = true;      
            continue;
        }     
    }
    for(let i = 0; i < 5; i++) { 
        if (colored[i]) continue;
        let ind = letterMap.get(enteredWord[i].letter);
        if (count[ind - 1] > 0) {
            document.getElementById(enteredWord[i].square).style.backgroundColor = colorPink;
            document.getElementById(enteredWord[i].letter).style.backgroundColor = colorPink;
            colored[i] = true;
            count[ind - 1] -= 1;
        }
    }
    for(let i = 0; i < 5; i++) { 
        if (colored[i]) continue;
        document.getElementById(enteredWord[i].square).style.backgroundColor = colorGrey;
        document.getElementById(enteredWord[i].letter).style.backgroundColor = colorGrey;
        colored[i] = true;
    }

    if (greens < 5) { enableEntry = true; return; }
    
    setTimeout(function() {
        alert("Свака част!");
    }, 1000);
}
