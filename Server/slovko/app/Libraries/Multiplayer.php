<?php
//Iva Potkonjak 301/19
namespace App\Libraries;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use App\Models\ReciModel;

class Multiplayer implements MessageComponentInterface {

    protected $clients;
    protected $korisnici;
    protected $igre;
    protected $connBaza;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->korisnici = [];
        $this->igre = [];
        $this->connBaza = mysqli_connect("localhost", "root", "", "slovko") or die("Konekcija neuspesna");
        $this->connBaza->set_charset('utf8mb4');
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        echo "Nova konekcija! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $por = json_decode($msg, true);
        switch ($por['kod']) {
            case "1": {
                    if (sizeof($this->korisnici) == 0) {
                        array_push($this->korisnici, ['id' => $from, 'korisnik' => $por['korisnik']]);
                        echo "Korisnik {$por['korisnik']} ceka na protivnika\n";
                    } else {
                        $protivnik = array_pop($this->korisnici);
                        $ja = ['id' => $from, 'korisnik' => $por['korisnik']];
                        array_push($this->igre, [
                            'igrac1' => $protivnik, 'igrac2' => $ja, 'status' => 0, 'brPokusaja1' => 0, 'brPokusaja2' => 0,
                            'vreme1' => 0, 'vreme2' => 0, 'pogodio1' => false, 'pogodio2' => false
                        ]);
                        
                        echo "Spojeni su {$por['korisnik']} i {$protivnik['korisnik']}\n";

                        $upit = "SELECT * FROM reci ORDER BY RAND() LIMIT 1;";

                        $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                        $reci_db = mysqli_fetch_array($result);
                        $rand = $reci_db['rec'];
                        $idrec = $reci_db['idR'];

                        echo "Izabrana je rec {$rand} za igru\n";
                        
                        $poruka2 = ['kod' => "1", "rec" => $rand, "protivnik" => $protivnik['korisnik']];
                        $poruka1 = ['kod' => "1", "rec" => $rand, "protivnik" => $ja['korisnik']];

                        $ja['id']->send(json_encode($poruka2));
                        $protivnik['id']->send(json_encode($poruka1));
                    }
                }
                break;
            case "2": {
                    $index = 0;
                    $igrac = 0;
                    foreach ($this->igre as $igra) {
                        if ($igra['igrac1']['id'] === $from) {
                            $igrac = 1;
                            break;
                        } else if ($igra['igrac2']['id'] === $from) {
                            $igrac = 2;
                            break;
                        }
                        $index++;
                    }
                    $this->igre[$index]['pogodio' . $igrac] = $por['pogodio'];
                    $this->igre[$index]['vreme' . $igrac] = $por['vreme'];
                    $this->igre[$index]['brPokusaja' . $igrac] = $por['brPokusaja'];


                    if (++$this->igre[$index]['status'] == 2) {
                        echo "Gotova igra izmedju {$this->igre[$index]['igrac1']['korisnik']} i {$this->igre[$index]['igrac2']['korisnik']}, ";
                        $brPoena1 = 0;
                        $brPoena2 = 0;
                        if ($this->igre[$index]['pogodio1'] == 'true') {
                            $brPoena1 = (7 - (intval($this->igre[$index]['brPokusaja1']))) * 500;
                            $brPoena1 = $brPoena1 * (1 - 0.05 * intdiv(intval($this->igre[$index]['vreme1']), 15));
                        }
                        if ($this->igre[$index]['pogodio2'] == 'true') {
                            $brPoena2 = (7 - (intval($this->igre[$index]['brPokusaja2']))) * 500;
                            $brPoena2 = $brPoena2 * (1 - 0.05 * intdiv(intval($this->igre[$index]['vreme2']), 15));
                        }
                        $pobedio = "Ishod je neresen.";
                        $pobeda = "null";
                        if ($brPoena1 > $brPoena2) {
                            $pobedio = "Pobednik je " . $this->igre[$index]['igrac1']['korisnik'] . ".";
                            $pobeda = "'1'";
                        }
                        if ($brPoena2 > $brPoena1) {
                            $pobedio = "Pobednik je " . $this->igre[$index]['igrac2']['korisnik'] . ".";
                            $pobeda = "'0'";
                        }

                        $poruka = [
                            'kod' => '2', 'poruka' => strval($pobedio),
                            $this->igre[$index]['igrac1']['korisnik'] => strval($brPoena1), $this->igre[$index]['igrac2']['korisnik'] => strval($brPoena2)
                        ];
                        $this->igre[$index]['igrac1']['id']->send(json_encode($poruka));
                        $this->igre[$index]['igrac2']['id']->send(json_encode($poruka));

                        $upit = "INSERT INTO igra (`brojPokusaja1`, `brojPokusaja2`, `vreme1`, `vreme2`, `pobeda1`, `username1`, `username2`) VALUES ('" .
                                $this->igre[$index]['brPokusaja1'] . "','" . $this->igre[$index]['brPokusaja2'] .
                                "','" . $this->igre[$index]['vreme1'] . "','" . $this->igre[$index]['vreme2'] .
                                "'," . $pobeda . ",'" . $this->igre[$index]['igrac1']['korisnik'] . "','" . $this->igre[$index]['igrac2']['korisnik'] . "');";
                        //echo $upit;
                        $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");

                        if ($pobeda == "'1'") {
                            echo "pobedio je {$this->igre[$index]['igrac1']['korisnik']}\n";
                            $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . $brPoena1 .
                                    ",`brojPobeda`=`brojPobeda` + 1 WHERE `username`='" . $this->igre[$index]['igrac1']['korisnik'] . "';";
                            //echo $upit;
                            $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                            $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . floor($brPoena2 * 0.5) .
                                    ",`brojPoraza`=`brojPoraza` + 1 WHERE `username`='" . $this->igre[$index]['igrac2']['korisnik'] . "';";
                            //echo $upit;
                            $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                        } else if ($pobeda == "'0'") {
                            echo "pobedio je {$this->igre[$index]['igrac2']['korisnik']}\n";
                            $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . $brPoena2 .
                                    ",`brojPobeda`=`brojPobeda` + 1 WHERE `username`='" . $this->igre[$index]['igrac2']['korisnik'] . "';";
                            //echo $upit;
                            $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                            $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . floor($brPoena1 * 0.5) .
                                    ",`brojPoraza`=`brojPoraza` + 1 WHERE `username`='" . $this->igre[$index]['igrac1']['korisnik'] . "';";
                            //echo $upit;
                            $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                        } else {
                            echo "ishod je neresen\n";
                            $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . $brPoena1 .
                                    ",`brojNeresenih`=`brojNeresenih` + 1 WHERE `username`='" . $this->igre[$index]['igrac1']['korisnik'] . "';";
                            //echo $upit;
                            $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                            $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . $brPoena2 .
                                    ",`brojNeresenih`=`brojNeresenih` + 1 WHERE `username`='" . $this->igre[$index]['igrac2']['korisnik'] . "';";
                            //echo $upit;
                            $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                        }

                        array_splice($this->igre, $index, 1);
                    }
                }
                break;
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        $index = 0;
        $igrac = 0;
        foreach ($this->igre as $igra) {
            if ($igra['igrac1']['id'] === $conn) {
                $igrac = 1;
                break;
            } else if ($igra['igrac2']['id'] === $conn) {
                $igrac = 2;
                break;
            }
            $index++;
        }
        if ($igrac > 0) {
            echo "Igrac {$igra['igrac'.$igrac]['korisnik']} izasao iz igre\n";
            if (++$this->igre[$index]['status'] == 2) {
                echo "Gotova igra izmedju {$this->igre[$index]['igrac1']['korisnik']} i {$this->igre[$index]['igrac2']['korisnik']}, ";
                $brPoena1 = 0;
                $brPoena2 = 0;
                if ($this->igre[$index]['pogodio1'] == 'true') {
                    $brPoena1 = (7 - (intval($this->igre[$index]['brPokusaja1']))) * 500;
                    $brPoena1 = $brPoena1 * (1 - 0.05 * intdiv(intval($this->igre[$index]['vreme1']), 15));
                }
                if ($this->igre[$index]['pogodio2'] == 'true') {
                    $brPoena2 = (7 - (intval($this->igre[$index]['brPokusaja2']))) * 500;
                    $brPoena2 = $brPoena2 * (1 - 0.05 * intdiv(intval($this->igre[$index]['vreme2']), 15));
                }
                $pobedio = "Ishod je neresen.";
                $pobeda = "null";
                if ($brPoena1 > $brPoena2) {
                    $pobedio = "Pobednik je " . $this->igre[$index]['igrac1']['korisnik'] . ".";
                    $pobeda = "'1'";
                }
                if ($brPoena2 > $brPoena1) {
                    $pobedio = "Pobednik je " . $this->igre[$index]['igrac2']['korisnik'] . ".";
                    $pobeda = "'0'";
                }
                $poruka = [
                    'kod' => '2', 'poruka' => strval($pobedio),
                    $this->igre[$index]['igrac1']['korisnik'] => strval($brPoena1), $this->igre[$index]['igrac2']['korisnik'] => strval($brPoena2)
                ];
                $this->igre[$index]['igrac1']['id']->send(json_encode($poruka));
                $this->igre[$index]['igrac2']['id']->send(json_encode($poruka));

                $upit = "INSERT INTO igra (`brojPokusaja1`, `brojPokusaja2`, `vreme1`, `vreme2`, `pobeda1`, `username1`, `username2`) VALUES ('" .
                        $this->igre[$index]['brPokusaja1'] . "','" . $this->igre[$index]['brPokusaja2'] .
                        "','" . $this->igre[$index]['vreme1'] . "','" . $this->igre[$index]['vreme2'] .
                        "'," . $pobeda . ",'" . $this->igre[$index]['igrac1']['korisnik'] . "','" . $this->igre[$index]['igrac2']['korisnik'] . "');";
                //echo $upit;
                $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan igra");

                if ($pobeda == "'1'") {
                    echo "pobedio je {$this->igre[$index]['igrac1']['korisnik']}\n";
                    $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . $brPoena1 .
                            ",`brojPobeda`=`brojPobeda` + 1 WHERE `username`='" . $this->igre[$index]['igrac1']['korisnik'] . "';";
                    //echo $upit;
                    $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                    $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . floor($brPoena2 * 0.5) .
                            ",`brojPoraza`=`brojPoraza` + 1 WHERE `username`='" . $this->igre[$index]['igrac2']['korisnik'] . "';";
                    //echo $upit;
                    $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                } else if ($pobeda == "'0'") {
                    echo "pobedio je {$this->igre[$index]['igrac2']['korisnik']}\n";
                    $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . $brPoena2 .
                            ",`brojPobeda`=`brojPobeda` + 1 WHERE `username`='" . $this->igre[$index]['igrac2']['korisnik'] . "';";
                    //echo $upit;
                    $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                    $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . floor($brPoena1 * 0.5) .
                            ",`brojPoraza`=`brojPoraza` + 1 WHERE `username`='" . $this->igre[$index]['igrac1']['korisnik'] . "';";
                    //echo $upit;
                    $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                } else {
                    echo "ishod je neresen\n";
                    $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . $brPoena1 .
                            ",`brojNeresenih`=`brojNeresenih` + 1 WHERE `username`='" . $this->igre[$index]['igrac1']['korisnik'] . "';";
                    //echo $upit;
                    $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                    $upit = "UPDATE `statistika` SET `brojPoena`=`brojPoena` + " . $brPoena2 .
                            ",`brojNeresenih`=`brojNeresenih` + 1 WHERE `username`='" . $this->igre[$index]['igrac2']['korisnik'] . "';";
                    //echo $upit;
                    $result = mysqli_query($this->connBaza, $upit) or die("Upit neuspesan");
                }

                array_splice($this->igre, $index, 1);
            }
        }
        $index = 0;
        $found = 0;
        foreach ($this->korisnici as $korisnik) {
            if ($korisnik['id'] === $conn) {
                $found = 1;
                break;
            }
            $index++;
        }
        if ($found){
            echo "Igrac {$this->korisnici[$index]['korisnik']} odustao od trazenja protivnika\n";
            array_splice($this->korisnici, $index, 1);
        }


        echo "Konekcija {$conn->resourceId} je ugasena\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Greska: {$e->getMessage()}\n";

        $conn->close();
    }

}
