<!-- Uros Mutavdzic 19/0378 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
                <h1>Руковођење профилима и ВИП захтевима</h1> <!-- promeniti naslov -->
                    <br>
            </div>
            <div class="title-right"> </div>
        </div>

        <div class="info">
            <h2>Корисници</h2>
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
                        echo "<tr id=\"{$korisnik->username}\"><td>{$korisnik->username}</td><td>{$korisnik->ime}</td>";
                        echo "<td>{$korisnik->prezime}</td><td>{$korisnik->email}</td>";
                        echo "<td><div class=\"butt\"><input type=\"button\" value=\"Уклони\" id=\"button-ukloni\" onclick=\"ukloni('{$korisnik->username}')\"></div></td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <hr>

            <h2>ВИП захтеви</h2>
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
                        echo "<td><div class=\"butt\"><a href = \"";
                        echo site_url('Admin/pregledKorisnika/'.$vipZahtev->username);
                        echo "\" ><input type=\"button\" value=\"Обради\" id=\"button-prihvati\" onclick=\"\"></div></td></tr>";
                    }

                    ?>
                </tbody>
            </table>
            
            <hr>
            
            <h2>Пријављене грешке</h2>
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
                        echo "<tr id=\"{$greska->idP}\"><td>{$greska->username}</td><td>{$greska->opis}</td>";
                        echo "<td><div class=\"butt\"><input type=\"button\" value=\"Евидентирај\" id=\"button-prihvatigit\" onclick=\"evidentiraj('{$_SESSION['korisnickoIme']}', '{$greska->idP}')\"></div></td></tr>";
                    }

                    ?>


                </tbody>
            </table>
        </div>
        <div class="dugmici">
            <div class="butt">
                <a href="<?php echo site_url("Admin/pregled") ?>"><input type="button" value="Назад" id="button-igraj"></input></a>
            </div>
        </div>
    </div>
</body>

</html>