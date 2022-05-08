<!-- Iva Potkonjak 19/301 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/register.css">
    <script src="/assets/js/login_register.js"></script>
    <title>Регистрација</title>
</head>

<body>
    <header>
       
        <img class="logo" src="/assets/img/slovko.svg" alt="logo" width="200px" height="50px">
        
    </header>
    <div id="container">
        <div id="reg">
            <div class="reg-title">
                
                <div class="title-center">
                    <h2>Регистрација</h2>
                </div>
                
            </div>
            <div class="forms">
                <form action="">
                    <div class="form-els">
                        <label for=""><b>Корисничко име: </b></label> <input type="text" id="korisnickoIme" class="unos" required>
                    </div>
                    <div class="greska" id="korisnickoImeGreska"></div>
                    <div class="form-els">
                        <label for=""><b>Лозинка: </b></label><input type="password" id="sifra" class="unos" required>
                    </div>
                    <div class="form-els">
                        <label for=""><b>Поновљена лозинка: </b></label><input type="password" id="ponovljenaSifra" class="unos" required>
                    </div>
                    <div class="greska" id="sifraGreska"></div>
                    <div class="form-els">
                        <label for=""><b>Име: </b></label> <input type="text" id="ime" class="unos" required>
                    </div>
                    <div class="form-els">
                        <label for=""><b>Презиме: </b></label><input type="text" id="prezime" class="unos" required>
                    </div>
                    <div class="form-els">
                        <label for=""><b>e-mail: </b></label> <input type="email" id="mejl" class="unos" required>
                    </div>
                    <div class="form-sub">
                        <div class="form-text">
                            Уколико већ имаш налог <a href="<?php echo site_url('Gost/login')?>">пријави се</a>.
                        </div>
                        <div class="form-button">
                            <input type="submit" value="Региструј се!" id="reg_dugme" onclick="registracija()">
                        </div>
                    </div>
                    
                    
                </form>
            </div>
            
           
            </div>
        </div>
    </div>
</body>

</html>