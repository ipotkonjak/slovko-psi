<!-- Luka Hrvacevic 19/353 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/css/login.css">
    <!-- comment <script src="/assets/js/login_register.js"></script>-->
    <title>Пријава</title>
</head>

<body>
    <header>
        <img class="logo" src="/assets/img/slovko.svg" alt="logo" width="200px" height="50px">
    </header>
    <div id="container">
        <div class="login">
			<form name="loginform" action="<?php echo site_url("Gost/loginRequest"); ?>" method="post">
                            <h2>Пријава</h2><br><br>
                            <div class="lab">
                            <label><b>Корисничко име</b></label><br>
                            </div>
                            <div class="greska" id="korisnickoImeGreska" ><font color='red'><?php if(isset($korimeGreska)) echo $korimeGreska;?></font></div>
                            <input type="text" class="unos" placeholder="Унесите корисничко име" id="korisnickoIme" name="korisnickoIme"
                                   value="<?= set_value('korisnickoIme') ?>"><br><br>
                            <div class="lab">
                            <label><b>Шифра</b></label><br>
                            </div>
                            <div class="greska" id="sifraGreska"><font color='red'><?php if(isset($sifraGreska)) echo $sifraGreska;?></font></div>
                            <input type="password" class="unos" placeholder="Унесите шифру" id="sifra" name="sifra"><br><br>
                            <input type="submit" value="Пријави се!" id="submit" >
                            <br><br>
                            <div class="registerlink">
                                Немаш налог? <a href="<?php echo site_url('Gost/registracija')?>">Региструј се.</a>
                            </div>
				
			</form>
		</div>
    </div>
</body>

</html>