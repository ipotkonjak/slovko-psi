<!-- Katarina Jocic 19/0014 Luka Hrvacevic 19/0353 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/pocetna.css" type="text/css">
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
                    <h3>Добродошли на игру Словко</h2>
                    <br>
                </div>
                <div class="title-right">  </div>
            </div>

            <div class="options">
                <div class="options-title">
                    <h3>Понуђене опције</h2>
                </div> 
                <dl>
                    <dt>Ову игру можете играти као гост</dt>
                    <dd>
                        <ul>
                            <li><b>SINGLEPLAYER игра</b></li>
                        </ul>
                        <p>
                            Имате 6 покушаја да погодите задату реч. <br>
                            Сваки покушај мора бити постојећа реч у српском језику. <br>
                            Погођено слово на тачном месту биће обојено у <span style="color: rgba(89, 217, 131, 0.5)">зелено</span>. <br>
                            Погођено слово на погрешном месту биће обојено у <span style="color: rgba(217, 138, 89, 0.5)">жуто</span>.<br>
                            Слово које се не налази у задатој речи биће обојено у <span style="color: rgba(79, 74, 71, 0.4)">сиво</span>.
                            
                        </p>
                    </dd>
                    <br>
                    <dt>Као регистровани корисник можете играти: </dt>
                    <dd>
                        <ul>
                            <li><b>MULTIPLAYER игра</b></li>
                        <p>
                            Играте игру против другог корисника. <br>
                            Важе иста правила као и за singleplayer игру, и оба корисника погађају исту реч. <br>
                            Партија траје 3 минута. <br>
                            Број освојених бодова рачуна се у односу на утрошено време и броју искоришћених покушаја. <br>
                            Победили сте ако сте погодили реч и уједно освојили већи број бодова у односу на противника.
                        </p>
                            <li><b>АРКАДНА игра</b></li>
                        <p>
                            У овој игри противник вам је време. <br>
                            За додељених 3 минута циљ је погодити што више задатих речи. <br>
                            Уз сваку погођену реч игра се продужава за минут.<br>
                            Ваш рекорд погођених речи у једној игри се чува. <br>
                        </p>
                        </ul>
                    </dd>
                    <br>
                    <dt>Као ВИП корисник можете играти: </dt>
                    <dd>
                        <ul>
                            <li><b>ТЕШКА игра</b></li>
                        <p>
                            Иста правила као и за singleplayer игру важе.<br>
                            Уз та правила, важи да у сваком покушају након првог морате искористити сва погођена слова
                            из претходних покушаја. Имате право на додатни покушај. <br>
                        </p>
                        </ul>
                    </dd>
                </dl>
            </div> 
            <div class="butt">
                <a href="<?php echo site_url('Gost/igra')?>"><input type="button" value="ИГРАЈ!" id="button-igraj"></a>
            </div>


    </div>
</body>

</html>