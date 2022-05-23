<?php

namespace App\Controllers;
use App\Models\StatistikaModel;
use App\Models\KorisnikModel;
use App\Models\PrijavaGreskeModel;
use App\Models\ReciModel;
use App\Models\VipZahtevModel;

/**
 * AdminController - kontroler klasa za funkcionalnosti admina.
 * Admin ima funkcije koje imaju svi tipovi korisnika u sistemu 
 * i dodatne za administriranje.
 * 
 * @version 1.0
 */

class Admin extends BaseController
{
    /**
     * Pomocna funkcija za prikaz odgovarajucih stranica 
     * uz oznacavanje da se radi o Adminu.
     * 
     * @param string $page 
     * @param array $data
     * @return void
     */
    protected function prikaz($page, $data) {
        $data["controller"] = "Admin";
        echo view($page, $data);
    }
    
    /**
     * Metod za osnovnu igru.
     * @return void
     */
    public function index() {
        $reciModel = new ReciModel();
        $rand = $reciModel->orderBy('id', 'RANDOM')->first();
        
        return $this->prikaz('stranice/loggedin', ["rec" => $rand->rec]);
    }
    
    /**
     * Odjava korisnika, unistava sesiju i 
     * redirektuje na osnovnu igru u funkciji Gosta.
     * @return void
     */
    public function logout() {
        $this->session->destroy();
        return redirect()->to(site_url('Gost/igra'));
    }
    
    /**
     * Prikaz stranice na kojoj se prijavljuju greske.
     * @return void
     */
    public function prijavaGreske() {
        return $this->prikaz('stranice/prijava_greske', []);
    }
    
    /**
     * Prijava gresaka u sistemu, pamti se opis i korisnik koji je prijavio.
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
        return $this->prikaz('stranice/prijava_greske', ['poruka' => 'Uspesno ste prijavili gresku']);
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
        
        return $this->prikaz('stranice/pregledAdmin', ['korisnik' => $kor, 'statistika' => $stat]);
    }
    
    /**
     * Administratorska funkcija.
     * Administrator rukovodi postojecim korisnicima
     * (registrovani korisnik je podrazumevano odobren),
     * obradjuje dosad neobradjene Vip Zahteve poslate od strane registrovanih korisnika,
     * evidentira prijave o greskama.
     * @return void
     */
    public function rukovodjenje(){
        $korModel = new KorisnikModel();
        $korisnici = $korModel->where('odobren', 1)->findAll();
        
        $vipModel = new VipZahtevModel();
        $vipZahtevi = $vipModel->where('status', 'N')->findAll();
        
        $greskeModel = new PrijavaGreskeModel();
        $greske = $greskeModel->where('evidentirano', 0)->findAll();
        
        return $this->prikaz('stranice/rukovodjenje', ['korisnici' => $korisnici, 'vipZahtevi' => $vipZahtevi, 'greske' => $greske]);
    }
    
    /**
     * Prikaz stranice sa pravilima igre.
     * @return void
     */  
    public function pravila() {     
        return $this->prikaz('stranice/pocetna', []);
    }
    
    /**
     * TODO
     * @param string $korime
     * @return void
     */
    
    public function pregledKorisnika($korime) {
        $korModel = new KorisnikModel();
        $korisnik = $korModel->find($korime);
        
        $statModel = new StatistikaModel();
        $stat = $statModel->where('username', $korime)->first();
        
        return $this->prikaz('stranice/obradaVIPzahtev', ['korisnik' => $korisnik, 'statistika' => $stat]);
    }
    
    /**
     * 
     * @param type $korime
     * @return void
     */
    public function vipObrada($korime) {
        $zahtevModel = new VipZahtevModel();
        $zahtev = $zahtevModel->where('username', $korime)->where('status', 'N')->first();
        
        $dozvola = $this->request->getVar('prihvacen');
        $opis = $this->request->getVar('opis');
        
        if($dozvola == "on") {
            $korModel = new KorisnikModel();
            $korisnik = $korModel->find($korime);
            $korisnik->vip = 1;
            $korModel->save($korisnik);
            
            $zahtev->status = 'P';
        }
        else $zahtev->status = 'O';
        
        $zahtev->opis = $opis;
        $zahtevModel->save($zahtev);
        
        return redirect()->to(site_url('Admin/rukovodjenje'));     
    }
}
