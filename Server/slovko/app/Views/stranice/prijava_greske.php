<!-- Iva Potkonjak 19/301 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/prijava_greske.css">
    <title>Пријава грешке</title>
</head>

<body>
    <header>
       
        <img class="logo" src="/assets/img/slovko.svg" alt="logo" width="200px" height="50px">
        
    </header>
    
    <div id="container">
        <div id="reg">
            <div class="reg-title">
                
                <div class="title-center">
                    <h2>Пријава грешке</h2>
                </div>
                
            </div>
            <p>
                Уколико приметите било какав проблем на сајту пријавите грешку администраторима кроз следећу форму. 
            </p>
            <div class="forms">
                <form  action="<?php echo site_url("Korisnik/greskaSubmit"); ?>" method="post">
                    
                    <div class="form-els">
                        <textarea name="unos" id="unos" cols="55" rows="7" placeholder=" Опис проблема"></textarea>
                    </div>
                    <div class="form-sub">
                        <div class="form-button">
                            <input type="button" value="Назад" id="nazad" onclick="history.back()"> 
                            <input type="submit" value="Пошаљи" id="reg_dugme">
                        </div>
                    </div>
                    
                    
                </form>
            </div>
            
           
            </div>
        </div>
    </div>
    <div class="poruka" id="poruka" style="text-align: center; font-weight: bold; font-size: 20px" ><font color='green'><?php if(isset($poruka)) echo $poruka;?></font></div>
</body>

</html>