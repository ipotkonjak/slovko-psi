<!-- Uros Mutavdzic 19/0378 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/rukovodjenje.css" type="text/css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/assets/js/paging.js"></script>
    <script src="/assets/js/rukovodjenje.js"></script>
    <title>Руковођење</title>
</head>

<body>
    <header>

        <img class="logo" src="/assets/img/slovko.svg" alt="logo" width="200px" height="50px">

    </header>
    <div id="container">

        <div class="welcome-title">
            <div class="title-left"> </div>
            <div class="title-center">
                <br>
                <h3>Руковођење профилима и ВИП захтевима</h2> <!-- promeniti naslov -->
                    <br>
            </div>
            <div class="title-right"> </div>
        </div>

        <div class="info">
            <table class="styled-info table table-striped" id="tableData">
                <thead>
                    <tr>
                        <th>Корисничко име</th>
                        <th>Име</th>
                        <th>Презиме</th>
                        <th>e-mail</th>
                        <th>Aкција</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($korisnici as $korisnik) {
                        echo "<tr><td>{$korisnik->username}</td><td>{$korisnik->ime}</td>";
                        echo "<td>{$korinsik->prezime}</td><td>{$korisnik->mail}</td>";
                        echo "<td><div class=\"butt\"><input type=\"button\" value=\"Уклони\" id=\"button-ukloni\" onclick=\"\"></div></td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <hr>

            <table class="styled-info table table-striped" id="tableData1">
                <thead>
                    <tr>
                        <th>Корисничко име</th>
                        <th>Опис</th>
                        <th>Aкција</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($vipZahtevi as $vipZahtev) {
                        echo "<tr><td>{$vipZahtev->username}</td><td>{$vipZahtev->opis}</td>";
                        echo "<td><div class=\"butt\"><input type=\"button\" value=\"Уклони\" id=\"button-ukloni\" onclick=\"\"></div></td></tr>";
                    }

                    ?>
                </tbody>
            </table>
            <hr>
            <table class="styled-info table table-striped" id="tableData2">
                <thead>
                    <tr>
                        <th>Корисничко име</th>
                        <th>Опис</th>
                        <th>Aкција</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($greske as $greska) {
                        echo "<tr><td>{$greska->username}</td><td>{$greska->opis}</td>";
                        echo "<td><div class=\"butt\"><input type=\"button\" value=\"Уклони\" id=\"button-ukloni\" onclick=\"\"></div></td></tr>";
                    }

                    ?>


                </tbody>
            </table>
        </div>
        <div class="dugmici">
            <div class="butt">
                <input type="button" value="Назад" id="button-igraj" onclick="history.back()">
            </div>
        </div>
    </div>
</body>

</html>