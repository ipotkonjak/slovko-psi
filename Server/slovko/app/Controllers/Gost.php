<?php

namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\StatistikaModel;
use App\Models\ReciModel;

class Gost extends BaseController
{
    protected function prikaz($page, $data) {
        $data['controller'] = 'Gost';
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
        
        $this->session->set('korisnickoIme', $korime);
        
        if($korisnik->admin == 0){
            return redirect()->to(site_url('Korisnik/index'));
        }
        else{
            return redirect()->to(site_url('Admin/index'));
        }
    }
    
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
