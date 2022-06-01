<!-- Katarina Jocic 19/0014 -->
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/rang_lista.css" type="text/css">
    <title>Ранг листа</title>
</head>

<body>
    <header class="header">
        
        <img class="logo" src="/assets/img/slovko.svg" alt="logo" width="200px" height="50px">

    </header>
    <div class="container-fluid">
        <div class='row'>
            <div class='col-sm-12'>
                <br> <br>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 center">
                <b>Мој ранг: <?php echo $rangKor;?></b>
                <span style="float: right"><b>Моји поени: <?php echo $poeni;?></b></span>
                <br>
                <table class="table table-bordered" id="rang">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Корисничко име</th>
                        <th scope="col">Поени</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
                      $i = 0;
                    foreach ($korisnici as $korisnik) {
                        $i++;
                        echo "<tr><th>{$i}</th>
                        <td>{$korisnik->username}</td>
                        <td>{$korisnik->brojPoena}</td></tr>";
                       
                    }

                    ?>
                    </tbody>
                  </table>
            </div>
            
        </div>  
        <div class="row text-center">
            <div class="col-sm-12">
                <input type="button" value="Назад" id="button-nazad" onclick="history.back()" style="width: 100px">
            </div>
            
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>