<!-- Uros Mutavdzic 19/378 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/loggedin.css">
    <title>Словко</title>
</head>

<body>
    <header>
        <ul type="none">
            <li><a href="<?php echo site_url('Korisnik/pravila')?>">Правила</a></li>
            <li><a href="<?php echo site_url('Korisnik/prijavaGreske')?>">Пријави грешку</a></li>
        </ul>
        <img class="logo" src="/assets/img/slovko.svg" alt="logo" width="200px" height="50px">
        <nav>
            <ul type="none">
                <li><a href="<?php echo site_url('Korisnik/pregled')?>">Преглед профила</a></li>
                <li><a href="<?php echo site_url('Korisnik/logout')?>">Одјави се</a></li>
            </ul>
        </nav>
    </header>
    <div id="container">
        <div id="game">
            <div class="game-title">
                <div class="title-left">
                    
                </div>
                <div class="title-center">
                    <h2>SinglePlayer</h2>
                </div>
                <div class="title-right">
                    <!-- 05:00 -->
                </div>
            </div>
            <div id="board-container">
                <div id="board">
                    <div class="row">
                        <div class="square" id="square1"></div>
                        <div class="square" id="square2"></div>
                        <div class="square" id="square3"></div>
                        <div class="square" id="square4"></div>
                        <div class="square" id="square5"></div>
                    </div>
                    <div class="row">
                        <div class="square" id="square6"></div>
                        <div class="square" id="square7"></div>
                        <div class="square" id="square8"></div>
                        <div class="square" id="square9"></div>
                        <div class="square" id="square10"></div>
                    </div>
                    <div class="row">
                        <div class="square" id="square11"></div>
                        <div class="square" id="square12"></div>
                        <div class="square" id="square13"></div>
                        <div class="square" id="square14"></div>
                        <div class="square" id="square15"></div>
                    </div>
                    <div class="row">
                        <div class="square" id="square16"></div>
                        <div class="square" id="square17"></div>
                        <div class="square" id="square18"></div>
                        <div class="square" id="square19"></div>
                        <div class="square" id="square20"></div>
                    </div>
                    <div class="row">
                        <div class="square" id="square21"></div>
                        <div class="square" id="square22"></div>
                        <div class="square" id="square23"></div>
                        <div class="square" id="square24"></div>
                        <div class="square" id="square25"></div>
                    </div>
                    <div class="row">
                        <div class="square" id="square26"></div>
                        <div class="square" id="square27"></div>
                        <div class="square" id="square28"></div>
                        <div class="square" id="square29"></div>
                        <div class="square" id="square30"></div>
                    </div>
                </div>
            </div>
            <div id="keyboard">
                <div class="k-row">
                    <button data-key="љ">љ</button>
                    <button data-key="њ">њ</button>
                    <button data-key="е">е</button>
                    <button data-key="р">р</button>
                    <button data-key="т">т</button>
                    <button data-key="з">з</button>
                    <button data-key="у">у</button>
                    <button data-key="и">и</button>
                    <button data-key="о">о</button>
                    <button data-key="п">п</button>
                    <button data-key="ш">ш</button>
                    <button data-key="ђ">ђ</button>
                    <button data-key="ж">ж</button>
                </div>
                <div class="k-row">
                    <button data-key="а">а</button>
                    <button data-key="с">с</button>
                    <button data-key="д">д</button>
                    <button data-key="ф">ф</button>
                    <button data-key="г">г</button>
                    <button data-key="х">х</button>
                    <button data-key="ј">ј</button>
                    <button data-key="к">к</button>
                    <button data-key="л">л</button>
                    <button data-key="ч">ч</button>
                    <button data-key="ћ">ћ</button>
                </div>
                <div class="k-row">
                    <a href="pokusaj1.html"><button data-key="↵" class="one-and-a-half">унеси</button></a>
                    <button data-key="џ">џ</button>
                    <button data-key="ц">ц</button>
                    <button data-key="в">в</button>
                    <button data-key="б">б</button>
                    <button data-key="н">н</button>
                    <button data-key="м">м</button>
                    <button data-key="←" class="one-and-a-half">обриши</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>