<!-- Uros Mutavdzic 19/0378 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    <h3>Преглед профила</h3>
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
                <table class="styled-info">
                    <thead>
                        <tr>
                            <th id="stat" colspan="2">СТАТИСТИКА</th>
                        </tr>
                    </thead>
                    <tr>
                        <th>Број поена</td>
                        <td><?php echo $statistika->brojPoena;?></td>
                    </tr>
                    <tr>
                        <th>Број победа</td>
                        <td><?php echo $statistika->brojPobeda;?></td>
                    </tr>
                    <tr>
                        <th>Број нерешених</td>
                        <td><?php echo $statistika->brojNeresenih;?></td>
                    </tr>
                    <tr>
                        <th>Број пораза</td>
                        <td><?php echo $statistika->brojPoraza;?></td>
                    </tr>
                    <tr>
                        <th>Успех - аркадна игра</td>
                        <td><?php echo $statistika->arcadeRecord;?></td>
                    </tr>
                </table>
                
            </div> 
            <div class="dugmici">
                <div class="butt">
                    <a href="<?php echo site_url("$controller/rangLista")?>"><input type="button" value="Ранг листа" id="button-igraj"></a>
                </div>
                <div class="butt">  
                    <a href="<?php echo site_url("$controller/rukovodjenje")?>"><input type="button" value="Руковођење" id="button-igraj"></a>
                </div>
                <div class="butt">
                    <a href="<?php echo site_url("$controller/index")?>"><input type="button" value="Крај прегледа" id="button-igraj"></a>
                </div>
            </div>
    </div>
</body>

</html>