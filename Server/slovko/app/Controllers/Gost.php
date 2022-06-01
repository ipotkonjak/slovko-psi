<?php

namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\StatistikaModel;
use App\Models\ReciModel;

/**
 * Gost - kontroler klasa Gosta
 * To je osnovni tip korisnika sistema koji nema nalog.
 * 
 * @version 1.0
 */

class Gost extends BaseController
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
        $data['controller'] = 'Gost';
        echo view($page, $data);
    }
    
    /**
     * Prikaz pocetne stranice sa pravilima o svim igrama.
     * @return void
     */
    public function index() {   
        return $this->prikaz('stranice/pocetna', []);
    }
    
    /**
     * Osnovna singleplayer igra, dohvata se nasumicna rec iz tabele reci.
     * @return void
     */
    public function igra() {
        $reciModel = new ReciModel();
        $rand = $reciModel->orderBy('id', 'RANDOM')->first();
              
        return $this->prikaz('stranice/index', ["rec" => $rand->rec]);
    }
    
    /**
     * Gost ako ima nalog moze zahtevati da unese svoje kredencijale.
     * @return void
     */
    public function login() {
        return $this->prikaz('stranice/login', []);
    }

    /**
     * Gost ako nema nalog moze zahtevati da se registruje.
     * @return void
     */
    public function registracija() {
        return $this->prikaz('stranice/register', []);
    }

    /**
     * Logovanje trenutno neulogovanog korisnika.
     * Proverava se validnost kredencijala i pravi se sesija.
     * @return void
     */
    public function loginRequest() {
        $korime = $this->request->getVar('korisnickoIme');
        $lozinka = $this->request->getVar('sifra');
        
        if($korime == '') {
            return $this->prikaz('stranice/login', ['korimeGreska' => 'Унесите корисничко име']);
        }
        
        if($lozinka == '') {
            return $this->prikaz('stranice/login', ['sifraGreska' => 'Унесите лозинку']);
        }
        
        $korModel = new KorisnikModel();
        $korisnik = $korModel->find($korime);
        
        if($korisnik == null) {
            return $this->prikaz('stranice/login', ['korimeGreska' => 'Корисник не постоји']);
        }
        
        if(!password_verify($lozinka, $korisnik->lozinka)) {
            return $this->prikaz('stranice/login', ['sifraGreska' => 'Погрешна лозинка']);
        }
        
        if(!$korisnik->odobren){
            return $this->prikaz('stranice/login', ['korimeGreska' => 'Ваш налог је суспендован!']);
        }
        
        $this->session->set('korisnickoIme', $korime);
        $this->session->set('vip', $korisnik->vip || $korisnik->admin);
        
        if($korisnik->admin == 0){
            return redirect()->to(site_url('Korisnik/index'));
        }
        else{
            return redirect()->to(site_url('Admin/index'));
        }
    }
    
    /**
     * Registracija trenutno neregistrovanog korisnika.
     * Unose se korisnicko ime, lozinka, ime, prezime, i email.
     * Korisnik se cuva u bazi u tabeli korisnik.
     * Pravi se nova sesija.
     * @return void
     */
    
    public function registracijaRequest(){
        $korModel = new KorisnikModel();
        $korisnik = $korModel->find($this->request->getVar("korisnickoIme"));
        if($korisnik != null){
            return $this->prikaz("stranice/register", ["korimegreska" => "Корисничко име је заузето."]);
            //return redirect()->to(site_url('Gost/registracija'));
        }
        if($this->request->getVar("sifra") != $this->request->getVar("ponovljenaSifra")){
            return $this->prikaz("stranice/register", ["sifragreska" => "Лозинка и поновљена лозинка се не поклапају."]);
        }
        
        $korisnik = $korModel->insert([
                "username" => $this->request->getVar("korisnickoIme"),
                "lozinka" => password_hash($this->request->getVar("sifra"), PASSWORD_DEFAULT), //Treba da se hesira sifra
                "ime" => $this->request->getVar("ime"),
                "prezime" => $this->request->getVar("prezime"),
                "vip" => 0,
                "admin" => 0,
                "email" => $this->request->getVar("mejl"),
            ]
        );
        
        $statModel = new StatistikaModel();
        $statistika = $statModel->insert([
            "brojPoena" => 0,
            "brojPobeda" => 0,
            "brojNeresenih" => 0,
            "brojPoraza" => 0,
            "arcadeRecord" => 0,
            "username" => $this->request->getVar("korisnickoIme")
        ]);
        
        $this->session->set('korisnickoIme', $this->request->getVar("korisnickoIme"));
        
        return redirect()->to(site_url('Korisnik/index'));
    }
}
