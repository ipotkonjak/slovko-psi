<?php

namespace App\Controllers;

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
    }
}
