<!-- Katarina Jocic 19/0014 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/pregled.css" type="text/css">
    <title>Преглед профила</title>
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
                    <h3>Преглед профила</h2>
                    <br>
                </div>
                <div class="title-right">  </div>
            </div>

            <div class="info">
                <table class="styled-info">
                    <tr>
                        <th>Kорисничко име</th>
                        <td><?php echo $korisnik->username; ?></td>
                    </tr>
                    <tr>
                        <th>Име</th>
                        <td><?php echo $korisnik->ime; ?></td>
                    </tr>
                    <tr>
                        <th>Презиме</th>
                        <td><?php echo $korisnik->prezime; ?></td>
                    </tr>
                    <tr>
                        <th>e-mail</th>
                        <td><?php echo $korisnik->email; ?></td>
                    </tr>
                </table>
                <br>
                <hr>
                <br>
                <table class="styled-info">
                    <thead>
                        <tr>
                            <th id="stat" colspan="2">статистика</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Број поена</td>
                        <td><?php echo $statistika->brojPoena;?></td>
                    </tr>
                    <tr>
                        <td>Број победа</td>
                        <td><?php echo $statistika->brojPobeda;?></td>
                    </tr>
                    <tr>
                        <td>Број нерешених</td>
                        <td><?php echo $statistika->brojNeresenih;?></td>
                    </tr>
                    <tr>
                        <td>Број пораза</td>
                        <td><?php echo $statistika->brojPoraza;?></td>
                    </tr>
                    <tr>
                        <td>Успех - аркадна игра</td>
                        <td><?php echo $statistika->arcadeRecord;?></td>
                    </tr>
                    <tr>
                        <td>Позиција на ранг листи</td>
                        <td>1</td> <<-<!-- Dodati rang -->
                    </tr>

                </table>
                
            </div> 
            <div class="dugmici">
                <div class="butt">
                    <a href="<?php echo site_url('Korisnik/rangLista')?>"><input type="button" value="Ранг листа" id="button-igraj"></a>
                </div>
                <div class="butt">  
                    <input type="button" value="Крај прегледа" id="button-igraj" onclick="history.back()">
                </div>
            </div>
    </div>
</body>

</html>