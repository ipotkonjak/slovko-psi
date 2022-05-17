<?php

namespace App\Controllers;
use App\Models\StatistikaModel;
use App\Models\KorisnikModel;
use App\Models\PrijavaGreskeModel;
use App\Models\ReciModel;

class Korisnik extends BaseController
{
    protected function prikaz($page, $data) {
        $data['controller'] = 'Korisnik';
        echo view($page, $data);
    }
    
    public function arcade(){
        $reciModel = new ReciModel();
        $rand = $reciModel->orderBy('id', 'RANDOM')->first();
        
        return $this->prikaz("stranice/arcade", ["rec" => $rand->rec]);
    }
    
    public function hardmode(){
        $reciModel = new ReciModel();
        $rand = $reciModel->orderBy('id', 'RANDOM')->first();
        
        return $this->prikaz("stranice/hardmode", ["rec" => $rand->rec]);
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
        $korisnik = $this->session->get('korisnickoIme');
        $korModel = new KorisnikModel();
        $statModel = new StatistikaModel();
        
        $kor = $korModel->find($korisnik);
        $stat = $statModel->where('username', $korisnik)->first();
        
        return $this->prikaz('stranice/pregledKorisnik', ['korisnik' => $kor, 'statistika' => $stat]);
    }
    
    public function prijavaGreske() {
        return $this->prikaz('stranice/prijava_greske', []);
    }
    
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
    
    public function pravila()
    {   
        
        return $this->prikaz('stranice/pocetna', []);
    }
}
