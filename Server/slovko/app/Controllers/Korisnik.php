<?php

namespace App\Controllers;
use App\Models\StatistikaModel;
use App\Models\KorisnikModel;
use App\Models\PrijavaGreskeModel;
use App\Models\ReciModel;
use App\Models\VipZahtevModel;

/**
 * Korisnik - klasa kontrolera registrovanog korisnika sistema
 * 
 * @version 1.0
 */
class Korisnik extends BaseController
{
    /**
     * Pomocna funkcija za prikaz odgovarajucih stranica 
     * uz oznacavanje da se radi o Gostu.
     * 
     * @param string $page 
     * @param array $data
     * @return void
     */
    protected function prikaz($page, $data) {
        $data['controller'] = 'Korisnik';
        echo view($page, $data);
    }
    
    /**
     * Arkadni mod.
     * Bira se prva rec za arkadni mod i pokrece prikaz stranice.
     * @return void
     */
    public function arcade(){
        return $this->prikaz("stranice/arcade", ["korisnik" => $this->session->get("korisnickoIme")]);
    }
    
    /**
     * Pokrece prikaz stranice za hardmode.
     * @return void
     */ 
    public function hardmode(){
        return $this->prikaz("stranice/hardmode", []);
    }
       
    /**
     * Singleplayer igra
     * Osnovni mod igre, bira se rec i pokrece prikaz stranice.
     * @return void
     */
    public function index() {     
        return $this->prikaz('stranice/loggedin', []);
    }
    
    /**
     * Izlogovanje korisnika, unistava se sesija i prelazi se na osnovnu igru Gosta.
     * @return void
     */
    public function logout() {
        $this->session->destroy();
        return redirect()->to(site_url('Gost/igra'));
    }
    
    /**
     * Registrovani korisnik na zahtev moze pregledati svoj profil,
     * Potreban je uvid u tabele Korisnik i Stastika
     * @return void
     */
    public function pregled() {
        $korisnik = $this->session->get('korisnickoIme');
        $korModel = new KorisnikModel();
        $statModel = new StatistikaModel();
        
        $kor = $korModel->find($korisnik);
        $stat = $statModel->where('username', $korisnik)->first();
        
        return $this->prikaz('stranice/pregledKorisnik', ['korisnik' => $kor, 'statistika' => $stat]);
    }
    
    /**
     * Zahtev za prijavu greske u sistemu.
     * @return void
     */
    public function prijavaGreske() {
        return $this->prikaz('stranice/prijava_greske', []);
    }
    
    /**
     * Prijava greske se evidentira u bazi u tabeli prijava_greske.
     * Poruka o uspehu se prikazuje.
     * @return void
     */
    public function greskaSubmit() {
        $kor = $this->session->get('korisnickoIme');
        $tekst = $this->request->getVar('unos');
        
        $greskaModel = new PrijavaGreskeModel();
        $greskaModel->insert([
            "opis" => $tekst,
            "username" => $kor
        ]);
        return $this->prikaz('stranice/prijava_greske', ['poruka' => 'Успешно сте пријавили грешку!']);
    }
    
    
    /**
     * Registrovanom korisniku dostupne su osnovna, Multiplayer i Arkadna igra.
     * Moze se vratiti na stranicu sa pravilima kako bi se detaljnije informisao.
     * @return void
     */
    public function pravila() {     
        return $this->prikaz('stranice/pocetna', []);
    }
    
    /**
     * Na stranici za pregled profila, registrovani korisnik moze poslati zahteva 
     * da postane Vip korisnik.
     * Zahtev se evidentira u bazi u tabeli vip_zahtev i ceka odobrenje od Admina.
     * @return void
     */ 
    public function posaljiVipZahtev() {
        $korisnik = $this->session->get('korisnickoIme');
        $korModel = new KorisnikModel();
        $statModel = new StatistikaModel();
        $vipModel = new VipZahtevModel();
        
        $kor = $korModel->find($korisnik);
        $stat = $statModel->where('username', $korisnik)->first();
        $idZah = $vipModel->where('username', $korisnik)->where('status', 'N')->first();
        
        $brPartija = $stat->brojPobeda + $stat->brojNeresenih + $stat->brojPoraza;
        
        if($brPartija<50){
            return $this->prikaz("stranice/pregledKorisnik", 
                    ['korisnik' => $kor, 'statistika' => $stat, 'zahtevGreska' => 'Морате имати минимум 50 партија да бисте послали ВИП захтев!']);
        }
             
        if ($idZah != null) {
            return $this->prikaz("stranice/pregledKorisnik", 
                    ['korisnik' => $kor, 'statistika' => $stat, 'zahtevGreska' => 'Већ сте послали ВИП захтев']);
        }
        $vipZahtev = $vipModel->insert([
            "status" => "N",
            "username" => $kor->username
        ]);
        
        return redirect()->to(site_url('Korisnik/pregled'));
    }
    
    /**
     * Uvid u rand listu 10 najboljih registrovanih korisnika sistema.
     * Korisnik ima i uvid u svoj plasman na rang listi.
     * @return void
     */  
    public function rangLista() {
        $korime = $this->session->get('korisnickoIme');
        $korModel = new KorisnikModel();
        $statModel = new StatistikaModel();
        
        $brPoena = -1;
        $rangLista = $statModel->orderBy('brojPoena', 'DESC')->findAll();
        $korRang = 0;
        foreach ($rangLista as $red) {
            $korRang++;
            if($red->username == $korime) {
                $brPoena = $red->brojPoena;
                break;
            }
        }
        $korisnici = array_slice($rangLista, 0, 10);
        return $this->prikaz('stranice/rang_lista', ['korisnici' => $korisnici, 'rangKor' => $korRang, 'poeni' => $brPoena]);
    }
    
    /**
     * Multiplayer igra.
     * Pokrece se prikaz stranice gde se daljim akcijama korisnika ostvaruje konekcija.
     * @return void
     */
    public function multiplayer() {
        return $this->prikaz('stranice/multiplayer', []);
    }
}
