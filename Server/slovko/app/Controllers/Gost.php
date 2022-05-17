<?php

namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\StatistikaModel;
use App\Models\ReciModel;

class Gost extends BaseController
{
    protected function prikaz($page, $data) {
        echo view($page, $data);
    }
    
    
    
    public function index()
    {   
        
        return $this->prikaz('stranice/pocetna', []);
    }
    
    public function igra() {
        $reciModel = new ReciModel();
        $rand = $reciModel->orderBy('id', 'RANDOM')->first();
        
        
        return $this->prikaz('stranice/index', ["rec" => $rand->rec]);
    }
    
    public function login() {
        return $this->prikaz('stranice/login', []);
    }

    public function registracija() {
        return $this->prikaz('stranice/register', []);
    }
    
    public function loginRequest() {
        $korime = $this->request->getVar('korisnickoIme');
        $lozinka = $this->request->getVar('sifra');
        
        if($korime == '') {
            return $this->prikaz('stranice/login', ['korimeGreska' => 'Unesite korisnicko ime']);
        }
        
        if($lozinka == '') {
            return $this->prikaz('stranice/login', ['sifraGreska' => 'Unesite lozinku']);
        }
        
        $korModel = new KorisnikModel();
        $korisnik = $korModel->where('username', $korime)->first();
        
        if($korisnik == null) {
            return $this->prikaz('stranice/login', ['korimeGreska' => 'Korisnik ne postoji']);
        }
        
        if($korisnik->lozinka != $lozinka) {
            return $this->prikaz('stranice/login', ['sifraGreska' => 'Pogresna lozinka']);
        }
        
        $this->session->set('korisnik', $korisnik->idK);
        $this->session->set('korisnickoIme', $korime);
        
        return redirect()->to(site_url('Korisnik/index'));
    }
    
    public function registracijaRequest(){
        $korModel = new KorisnikModel();
        $korisnik = $korModel->where("username", $this->request->getVar("korisnickoIme"))->first();
        if($korisnik != null){
            return $this->prikaz("stranice/register", ["korimegreska" => "Корисничко име је заузето."]);
            //return redirect()->to(site_url('Gost/registracija'));
        }
        if($this->request->getVar("sifra") != $this->request->getVar("ponovljenaSifra")){
            return $this->prikaz("stranice/register", ["sifragreska" => "Лозинка и поновљена лозинка се не поклапају."]);
        }
        
        $korisnik = $korModel->insert([
                "username" => $this->request->getVar("korisnickoIme"),
                "lozinka" => $this->request->getVar("sifra"), //Treba da se hesira sifra
                "ime" => $this->request->getVar("ime"),
                "prezime" => $this->request->getVar("prezime"),
                "vip" => 0,
                "admin" => 0,
                "email" => $this->request->getVar("mejl"),
            ]
        );
        $idKor = $korModel->getInsertId();
        
        $statModel = new StatistikaModel();
        $statistika = $statModel->insert([
            "brojPoena" => 0,
            "brojPobeda" => 0,
            "brojNeresenih" => 0,
            "brojPoraza" => 0,
            "arcadeRecord" => 0,
            "idK" => $idKor
        ]);
        
        $this->session->set('korisnik', $idKor);
        $this->session->set('korisnickoIme', $this->request->getVar("korisnickoIme"));
        
        return redirect()->to(site_url('Korisnik/index'));
    }
}
