<?php

namespace App\Controllers;
use App\Models\KorisnikModel;

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
        return $this->prikaz('stranice/index', []);
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
}
