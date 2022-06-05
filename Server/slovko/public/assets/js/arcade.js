//Luka Hrvacevic 19/353

var colorGreen = 'rgba(89, 217, 131, 0.5)';
var colorPink = 'rgba(217, 138, 89, 0.5)';
var colorGrey = 'rgba(79, 74, 71, 0.4)';

let secretWord = '';
let enteredWord = [];
let count = [];
let currentRow = 1;
let currentCol = 1;
let guess = 0;
let badWord = false;
let enableEntry = true;
let gameOver = true;
let numOfGuesses = 6;
let rezultat = 0;
let lastsquare=null;
let fhandle=0;
let countdown=3;
let timer=0;
let treptanje=-1;
let black=true;
let timerlock=false;

const letterMap = {
    "а" : 1, "б" : 2, "в" : 3, "г" : 4, "д" : 5, 
    "ђ" : 6, "е" : 7, "ж" : 8, "з" : 9, "и" : 10, 
    "ј" : 11, "к" : 12, "л" : 13, "љ" : 14, "м" : 15, 
    "н" : 16, "њ" : 17, "о" : 18, "п" : 19, "р" : 20, 
    "с" : 21, "т" : 22, "ћ" : 23, "у" : 24, "ф" : 25, 
    "х" : 26, "ц" : 27, "ч" : 28, "џ" : 29, "ш" : 30 
}

const keyMap = {
    "KeyA" : "а", "KeyB" : "б", "KeyV" : "в", "KeyG" : "г", "KeyD" : "д", "BracketRight" : "ђ", 
    "KeyE" : "е", "Backslash" : "ж", "KeyY" : "з", "KeyZ" : "з", "KeyI" : "и", "KeyJ" : "ј", "KeyK" : "к", 
    "KeyL" : "л", "KeyQ" : "љ", "KeyM" : "м", "KeyN" : "н", "KeyW" : "њ", "KeyO" : "о", 
    "KeyP" : "п", "KeyR" : "р", "KeyS" : "с", "KeyT" : "т", "Quote" : "ћ", "KeyU" : "у", 
    "KeyF" : "ф", "KeyH" : "х", "KeyC" : "ц", "Semicolon" : "ч", "KeyX" : "џ", "BracketLeft" : "ш"
};

function showPopup(msg) {
    $("#myPopup").text(msg);
    $("#myPopup").fadeIn(1000); 
    setTimeout(function() {
        $("#myPopup").fadeOut(1000);  
    }, 2500);
}

function newArcade(){
    if(gameOver==false) {
        return;
    }
    fhandle = setInterval(function(){
        if(lastsquare!=null){
            lastsquare.css("background-color","transparent");
            lastsquare.html("");
        }
        if(countdown==0){
            clearInterval(fhandle);
            fhandle = 0;
            countdown = 3;
            lastsquare = null;
            startGame();
            return;
        }
        let row = Math.floor(Math.random() * 6) + 1;
        let col = Math.floor(Math.random() * 5) + 1;
        let square = $("#square"+row.toString()+col.toString());
        switch(countdown){
            case 3: square.css("background-color", "red"); break;
            case 2: square.css("background-color", "yellow"); break;
            case 1: square.css("background-color", "green");
        }
        square.html(countdown.toString());
        lastsquare=square;
        countdown--;
    },1000);
}

function startGame(){
    reset();
    rezultat=0;
    $("#timer").html("3:00").show();
    $("#counter").html("Речи:0").show();
    timer = setInterval(function(){
        while(timerlock) ;
        timerlock=true;
        let tmp = $("#timer").html();
        let min = parseInt(tmp.split(":")[0]);
        let sec = parseInt(tmp.split(":")[1]);
        sec--;
        if(sec<0){
            sec = 59;
            min--;
        }
        if(min==-1){
            timerlock=false;
            clearInterval(timer);
            if(treptanje!=-1) {
                clearInterval(treptanje);
                treptanje = -1;
            }
            $("#timer").css("color","black");
            $("#timer").hide();
            $("#counter").hide();
            clearKeyboardAndBoard();
			gameOver = true;
            //alert("Игра је готова! Последња реч је била: " + secretWord + ". Ваш резултат је: " + rezultat);            
            $("#modalText").html([
                $('<p>', {text: "Игра је готова!"}),
                $('<p>', {text: "Последња реч је била: " + secretWord}),
                $('<p>', {text: "Ваш резултат је: " + rezultat}),
            ]);
            $('#endGameModal').modal('show');
            
            $.ajax({
                type: "POST",
                url: "/Ajax/azurirajRekord",
                data: {
                result: rezultat,
                username: korisnik
                }
                }).done(function(result) {
                });
            return;
        }
        if(min==0 && sec<=20 && treptanje==-1){
            treptanje = setInterval(function(){
                if(black){
                    black=false;
                    $("#timer").css("color","red");
                }
                else{
                    black=true;
                    $("#timer").css("color","black");
                }
            },500);
        }
        tmp = min.toString() + ":";
        if(sec<10) tmp = tmp + "0";
        tmp = tmp + sec.toString();
        $("#timer").html(tmp);
        timerlock=false;
    },1000);
}


function init() {
    enteredWord = [];
    currentRow = 1;
    currentCol = 1;
    guess = 0;
    badWord = false;
    enableEntry = true;
    gameOver = false;
    numOfGuesses = 6;
    count = [];
    (count = []).length = 30; count.fill(0);
    fillCount();
}

function clearKeyboardAndBoard(){
	$(".square").css({"background-color" : "transparent"});
    $(".square").html("");
    $("#keyboard button").css({"background-color" : "lightblue"});
}

function reset(first = false) {
	clearKeyboardAndBoard();
    $.ajax({
        type: "POST",
        url: "/Ajax/generisiRec",
        }).done(function(result) {
            secretWord = result;
			init();
            if(first) gameOver = true;
        });
}

function copyArray(arr){
	let copyArr = [];
	for(let i = 0; i < arr.length; i++) copyArr.push(arr[i]);
	return copyArr;
}

function fillCount() {
    for (let i = 0; i < 5; i++) {
        let ind = letterMap[secretWord[i]];
        count[ind - 1] += 1;
    }
}

document.addEventListener("keydown", function (event) {
    if (event.defaultPrevented) return; 

    let letter = keyMap[event.code];

    if (letter) enter(letter);
    else if (event.code == "Enter") check();
    else if (event.code == "Backspace") removeLetter();
    
    event.preventDefault();
  }, true);


function enter(currentLetter) { // we put letter in (currentRow, currentCol)
    if (gameOver) return;
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
    if (gameOver) return;
    if (currentRow == 1 && currentCol == 1) return; // empty
    if (currentCol == 6 && enableEntry == true) return; // UNESI was clicked
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
	enteredWord.pop();
}

function wordToString(word) {
    let rec = '';
    for(let i = 0; i < 5; i++) {
        rec += word[i].letter;
    }
    return rec;
}

function check(){
    if(enteredWord.length!=5) return;
    $.ajax({
        type: "POST",
        url: "/Ajax/proveraReci",
        data: {
        word: wordToString(enteredWord)
        }
        }).done(function(result) {
            badWord = result;
            checkEnteredWord();
        });
}

function checkEnteredWord() {
    if (gameOver) return;
    if (currentCol != 6) return;
    if (badWord == "false") {
        //alert("Реч не постоји!");
        showPopup("Реч не постоји!");
        return;
    }
    guess++;
    let greens = 0;
    (colored = []).length = 5; colored.fill(false);

    let copyCount = copyArray(count);
		
	for(let i = 0; i < 5; i++) {
        if (enteredWord[i].letter == secretWord[i]) {          
            document.getElementById(enteredWord[i].square).style.backgroundColor = colorGreen;
            document.getElementById(enteredWord[i].letter).style.backgroundColor = colorGreen;
            greens++;   
            copyCount[letterMap[secretWord[i]] - 1] -= 1;   
            colored[i] = true;      
            continue;
        }     
    }
	

    for(let i = 0; i < 5; i++) { 
        if (colored[i]) continue;
        let ind = letterMap[enteredWord[i].letter];
        if (copyCount[ind - 1] > 0) {
            document.getElementById(enteredWord[i].square).style.backgroundColor = colorPink;
            let keyboard = document.getElementById(enteredWord[i].letter);
			if(keyboard.style.backgroundColor!==colorGreen) keyboard.style.backgroundColor = colorPink;
            colored[i] = true;
            copyCount[ind - 1] -= 1;
        }
    }

		
    for(let i = 0; i < 5; i++) { 
        if (colored[i]) continue;
        document.getElementById(enteredWord[i].square).style.backgroundColor = colorGrey;
        let keyboard = document.getElementById(enteredWord[i].letter);
        if(keyboard.style.backgroundColor!==colorGreen && keyboard.style.backgroundColor!==colorPink) keyboard.style.backgroundColor = colorGrey;
        colored[i] = true;
    }

    if (greens == 5) {
        //gameOver = true;
        //setTimeout(function() {
        //    alert("Свака част!");
       // }, 1000);
       while(timerlock) ;
       timerlock = true;
       let tmp = $("#timer").html();
       let min = parseInt(tmp.split(":")[0]);
       let sec = parseInt(tmp.split(":")[1]);
       min++;
       tmp = min.toString() + ":";
       if(sec<10) tmp = tmp + "0";
       tmp = tmp + sec.toString();
       $("#timer").html(tmp);
       if(treptanje!=-1){
           clearInterval(treptanje);
           treptanje = -1;
       }
       timerlock=false;
       rezultat++;
       $("#counter").html("Речи:"+rezultat.toString());
       $("#myPopup").css("color","green");
       showPopup("Браво!!!");
       reset();
    }
    else if (guess == numOfGuesses) {
        //gameOver = true;
        //setTimeout(function() {
        //    alert("Тражена реч је била " + secretWord + "!");
        //}, 1000);
        $("#myPopup").css("color","#fff");
        showPopup("Реч је била " + secretWord);
        reset();
    }
    else { enableEntry = true; }
    
}

