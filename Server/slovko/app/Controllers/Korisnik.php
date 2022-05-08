<?php

namespace App\Controllers;
use App\Models\StatistikaModel;
use App\Models\KorisnikModel;
use App\Models\PrijavaGreskeModel;
use App\Models\ReciModel;

class Korisnik extends BaseController
{
    protected function prikaz($page, $data) {
        echo view($page, $data);
    }
    
    public function index()
    {
        $reciModel = new ReciModel();
        $rand = $reciModel->orderBy('id', 'RANDOM')->first();
        
        
        return $this->prikaz('stranice/loggedin', ["rec" => $rand->rec]);
    }
    
    public function logout() {
        $this->session->destroy();
        return redirect()->to(site_url('Gost/igra'));
    }
    
    public function pregled() {
        $korisnik = $this->session->get('korisnik');
        $korModel = new KorisnikModel();
        $statModel = new StatistikaModel();
        
        $kor = $korModel->find($korisnik);
        $stat = $statModel->where('idK', $korisnik)->first();
        
        return $this->prikaz('stranice/pregledKorisnik', ['korisnik' => $kor, 'statistika' => $stat]);
    }
    
    public function prijavaGreske() {
        return $this->prikaz('stranice/prijava_greske', []);
    }
    
    public function greskaSubmit() {
        $kor = $this->session->get('korisnik');
        $tekst = $this->request->getVar('unos');
        
        $greskaModel = new PrijavaGreskeModel();
        $greskaModel->insert([
            "opis" => $tekst,
            "idK" => $kor
        ]);
        return $this->prikaz('stranice/prijava_greske', ['poruka' => 'Uspesno ste prijavili gresku']);
    }
}
