<!-- Uros Mutavdzic 19/378 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/assets/js/singleplayer.js"></script>
    <script>
    function klikPrijaveGreske() {
        $("#modalText").text("Морате бити регистровани корисник да бисте пријавили грешку.");
        $('#endGameModal').modal('show');
        //alert("Морате бити регистровани корисник да бисте пријавили грешку.");
    }
    </script>
    <title>Словко</title>
</head>

<body onload="reset()">
    <div class="container-fluid">
        <div class="row" id="header">
            <div class="col-sm-4" id="links1">
                <nav class="navbar navbar-expand-sm navbar-light">
                    <ul class="navbar-nav" type="none">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Gost/index') ?>">Правила</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="klikPrijaveGreske()">Пријави грешку</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-sm-4 text-center">
                <img class="logo" src="/assets/img/slovko.svg" alt="logo" width="200px" height="50px">
            </div>
            <div class="col-sm-4" id="links2">
                <nav class="navbar navbar-expand-sm navbar-light">
                    <ul class="navbar-nav" type="none">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Gost/login') ?>">Улогуј се</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Gost/registracija') ?>">Региструј се</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <hr>
        </div>
        <div class="popup" id="myPopup">
            Bravo
        </div>
        <div class="row" id="title-row">
            <div class="col-sm-3"> &nbsp; </div>
            <div class="col-sm-6 text-center" id="title-bar">
                <!-- <span id="counter" style="display: none">Речи:0</span> -->
                <span id="title">SINGLEPLAYER</span>
                <!-- <span id="timer" style="display: none">3:00</span> -->
            </div>
            <div class="col-sm-3"> &nbsp; </div>
        </div>
        <div class="row" id="content">
            <div class="col-sm-12 text-center">
                <div id="board-container">
                    <div id="board">
                        <div class="board-row">
                            <div class="square" id="square11"></div>
                            <div class="square" id="square12"></div>
                            <div class="square" id="square13"></div>
                            <div class="square" id="square14"></div>
                            <div class="square" id="square15"></div>
                        </div>
                        <div class="board-row">
                            <div class="square" id="square21"></div>
                            <div class="square" id="square22"></div>
                            <div class="square" id="square23"></div>
                            <div class="square" id="square24"></div>
                            <div class="square" id="square25"></div>
                        </div>
                        <div class="board-row">
                            <div class="square" id="square31"></div>
                            <div class="square" id="square32"></div>
                            <div class="square" id="square33"></div>
                            <div class="square" id="square34"></div>
                            <div class="square" id="square35"></div>
                        </div>
                        <div class="board-row">
                            <div class="square" id="square41"></div>
                            <div class="square" id="square42"></div>
                            <div class="square" id="square43"></div>
                            <div class="square" id="square44"></div>
                            <div class="square" id="square45"></div>
                        </div>
                        <div class="board-row">
                            <div class="square" id="square51"></div>
                            <div class="square" id="square52"></div>
                            <div class="square" id="square53"></div>
                            <div class="square" id="square54"></div>
                            <div class="square" id="square55"></div>
                        </div>
                        <div class="board-row">
                            <div class="square" id="square61"></div>
                            <div class="square" id="square62"></div>
                            <div class="square" id="square63"></div>
                            <div class="square" id="square64"></div>
                            <div class="square" id="square65"></div>
                        </div>
                    </div>
                </div>
                <div class="keyboard-wrap">
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
                        <div id="dugmici">
                            <button type="button" onclick="reset()" style="text-align: center; display: none;" class="btn btn-dark btn-rounded">Нова игра</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="endGameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Игра је завршена</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modalText">
            Свака част!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-bs-dismiss="modal">ОК</button>
          </div>
        </div>
      </div>
    </div>
    
</body>

</html>