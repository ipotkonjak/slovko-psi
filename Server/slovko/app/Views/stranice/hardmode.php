<!-- Katarina Jocic 19/0014 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="/assets/css/stil.css">
    <link rel="stylesheet" href="/assets/css/hard.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        <?php
        echo "let secretWord = '$rec';";
        ?>
    </script>
    <script src="/assets/js/hardmode.js"></script>
    <title>Словко</title>
</head>

<body onload="init()">
    <header>
        <ul type="none">
            <li><a href="<?php echo site_url('Gost/index') ?>">Правила</a></li>
            <li><a href="<?php echo site_url('Gost/prijavaGreske') ?>">Пријави грешку</a></li>
            <li>
                <div class="dropdown">
                    <button class="dropbtn">Мод игре</button>
                    <div class="dropdown-content">
                        <a href="<?php echo site_url("$controller/index") ?>">Singleplayer</a>
                        <a href="<?php echo site_url("$controller/arcade") ?>">Arcade</a>
                        <a href="<?php echo site_url("$controller/multiplayer") ?>">Multiplayer</a>
                        <a href="<?php echo site_url("$controller/hardmode") ?>">Hardmode</a>
                    </div>
                </div>
            </li>
        </ul>
        <img class="logo" src="/assets/img/slovko.svg" alt="logo" width="200px" height="50px">
        <nav>
            <ul type="none">
                <li><a href="<?php echo site_url('Korisnik/pregled') ?>">Преглед профила</a></li>
                <li><a href="<?php echo site_url('Korisnik/logout') ?>">Одјави се</a></li>
            </ul>
        </nav>
    </header>
    <div id="container">
        <div id="game">
            <div class="game-title">
                <div class="title-left">

                </div>
                <div class="title-center">
                    <h2>Hardmode</h2>
                </div>
                <div class="title-right">
                    <!-- 05:00 -->
                </div>
            </div>
            <div class="popup" id="myPopup">
                Користите сваки хинт
            </div>
            <div id="board-container">
                <div id="board">
                    <div class="row" id="row1">
                        <div class="square" id="square11"></div>
                        <div class="square" id="square12"></div>
                        <div class="square" id="square13"></div>
                        <div class="square" id="square14"></div>
                        <div class="square" id="square15"></div>
                    </div>
                    <div class="row" id="row2">
                        <div class="square" id="square21"></div>
                        <div class="square" id="square22"></div>
                        <div class="square" id="square23"></div>
                        <div class="square" id="square24"></div>
                        <div class="square" id="square25"></div>
                    </div>
                    <div class="row" id="row3">
                        <div class="square" id="square31"></div>
                        <div class="square" id="square32"></div>
                        <div class="square" id="square33"></div>
                        <div class="square" id="square34"></div>
                        <div class="square" id="square35"></div>
                    </div>
                    <div class="row" id="row4">
                        <div class="square" id="square41"></div>
                        <div class="square" id="square42"></div>
                        <div class="square" id="square43"></div>
                        <div class="square" id="square44"></div>
                        <div class="square" id="square45"></div>
                    </div>
                    <div class="row" id="row5">
                        <div class="square" id="square51"></div>
                        <div class="square" id="square52"></div>
                        <div class="square" id="square53"></div>
                        <div class="square" id="square54"></div>
                        <div class="square" id="square55"></div>
                    </div>
                    <div class="row" id="row6">
                        <div class="square" id="square61"></div>
                        <div class="square" id="square62"></div>
                        <div class="square" id="square63"></div>
                        <div class="square" id="square64"></div>
                        <div class="square" id="square65"></div>
                    </div>
                    <div class="row" id="row7">
                        <div class="square" id="square71"></div>
                        <div class="square" id="square72"></div>
                        <div class="square" id="square73"></div>
                        <div class="square" id="square74"></div>
                        <div class="square" id="square75"></div>
                    </div>
                </div>
            </div>
            <div id="keyboard">
                <div class="k-row">
                    <button id="љ" onclick="enter('љ')">љ</button>
                    <button id="њ" onclick="enter('њ')">њ</button>
                    <button id="е" onclick="enter('е')">е</button>
                    <button id="р" onclick="enter('р')">р</button>
                    <button id="т" onclick="enter('т')">т</button>
                    <button id="з" onclick="enter('з')">з</button>
                    <button id="у" onclick="enter('у')">у</button>
                    <button id="и" onclick="enter('и')">и</button>
                    <button id="о" onclick="enter('о')">о</button>
                    <button id="п" onclick="enter('п')">п</button>
                    <button id="ш" onclick="enter('ш')">ш</button>
                    <button id="ђ" onclick="enter('ђ')">ђ</button>
                    <button id="ж" onclick="enter('ж')">ж</button>
                </div>
                <div class="k-row">
                    <button id="а" onclick="enter('а')">а</button>
                    <button id="с" onclick="enter('с')">с</button>
                    <button id="д" onclick="enter('д')">д</button>
                    <button id="ф" onclick="enter('ф')">ф</button>
                    <button id="г" onclick="enter('г')">г</button>
                    <button id="х" onclick="enter('х')">х</button>
                    <button id="ј" onclick="enter('ј')">ј</button>
                    <button id="к" onclick="enter('к')">к</button>
                    <button id="л" onclick="enter('л')">л</button>
                    <button id="ч" onclick="enter('ч')">ч</button>
                    <button id="ћ" onclick="enter('ћ')">ћ</button>
                </div>
                <div class="k-row">
                    <button data-key="↵" class="one-and-a-half" onclick="check()">унеси</button></a>
                    <button id="џ" onclick="enter('џ')">џ</button>
                    <button id="ц" onclick="enter('ц')">ц</button>
                    <button id="в" onclick="enter('в')">в</button>
                    <button id="б" onclick="enter('б')">б</button>
                    <button id="н" onclick="enter('н')">н</button>
                    <button id="м" onclick="enter('м')">м</button>
                    <button id="←" class="one-and-a-half" onclick="removeLetter()">обриши</button>
                </div>
            </div>
            <div id="dugmici">
                <button type="button" onclick="reset()">Нова игра</button>
                <button type="button" onclick="moreTries()">Додатни покушај</button>
                <button type="button" onclick="giveUp()">Одустани</button>
            </div>
        </div>
    </div>
</body>

</html>