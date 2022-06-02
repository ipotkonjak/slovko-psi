<!-- Katarina Jocic 19/0014 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/css/pocetna.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Почетна</title>
</head>

<body>
    <header>
        <img class="logo" src="/assets/img/slovko.svg" alt="logo" width="200px" height="50px">

    </header>
    <div id="container">

            <div class="welcome-title">
                <div class="title-left">  </div>
                <div class="title-center">
                    <br>
                    <h2>Добродошли на игру Словко</h2>
                    <br>
                </div>
                <div class="title-right">  </div>
            </div>
        
            <div class="list-group opcije">
                <a href="#" class="list-group-item list-group-item-action text-center" id="single">
                  SINGLEPLAYER игра
                </a>
                <span class="collapse" id="singlePravila">
                    <span>Ову игру можете играти као гост.<br></span>
                    Имате 6 покушаја да погодите задату реч.
                    Сваки покушај мора бити постојећа реч у српском језику.
                    Погођено слово на тачном месту биће обојено у <span style="color: rgba(89, 217, 131, 0.8)">зелено</span>. 
                    Погођено слово на погрешном месту биће обојено у <span style="color: rgba(217, 138, 89, 0.8)">жуто</span>.
                    Слово које се не налази у задатој речи биће обојено у <span style="color: rgba(79, 74, 71, 0.7)">сиво</span>.  
                </span>
                <a href="#" class="list-group-item list-group-item-action text-center" id="multi">
                    MULTIPLAYER игра
                </a>
                <span class="collapse" id="multiPravila">
                    <span>Ову игру можете играти као корисник.<br></span>
                    Играте игру против другог корисника.
                    Оба корисника погађају исту реч. 
                    Партија траје 2 минута.
                    Број освојених бодова рачуна се у односу на утрошено време и броју искоришћених покушаја. 
                    Победили сте ако сте погодили реч и уједно освојили већи број бодова у односу на противника.
                </span>
                <a href="#" class="list-group-item list-group-item-action text-center" id="arcade">
                    АРКАДНА игра
                </a>
                <span class="collapse" id="arcadePravila">
                    <span>Ову игру можете играти као корисник.<br></span>
                       У овој игри противник вам је време. 
                        За додељених 3 минута циљ је погодити што више задатих речи. 
                        Уз сваку погођену реч игра се продужава за минут.
                        Ваш рекорд погођених речи у једној игри се чува. 
                </span>
                <a href="#" class="list-group-item list-group-item-action text-center" id="hard">
                    ТЕШКА игра
                </a>
                <span class="collapse" id="hardPravila">
                    <span>Ову игру можете играти као ВИП корисник.<br></span>
                    Уз правила SINGLEPLAYER игре, важи да у сваком покушају након првог морате искористити сва погођена слова
                    из претходних покушаја.
                    Имате право на додатни покушај.
                </span>
            </div>
             
            <div class="butt">
                <a href="<?php echo site_url('Gost/igra')?>"><input type="button" value="ИГРАЈ!" id="button-igraj"></a>
            </div>

    </div>
    <script>
       
    </script>
        
</body>

</html>