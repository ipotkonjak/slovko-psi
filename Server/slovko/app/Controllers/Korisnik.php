<?php

namespace App\Controllers;
use App\Models\StatistikaModel;
use App\Models\KorisnikModel;
use App\Models\PrijavaGreskeModel;
use App\Models\ReciModel;
use App\Models\VipZahtevModel;

class Korisnik extends BaseController
{
    protected function prikaz($page, $data) {
        $data['controller'] = 'Korisnik';
        echo view($page, $data);
    }
    
    public function arcade(){
        $reciModel = new ReciModel();
        $rand = $reciModel->orderBy('id', 'RANDOM')->first();
        
        return $this->prikaz("stranice/arcade", ["rec" => $rand->rec, "korisnik" => $this->session->get("korisnickoIme")]);
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
    
    public function posaljiVipZahtev() {
        $korisnik = $this->session->get('korisnickoIme');
        $korModel = new KorisnikModel();
        $statModel = new StatistikaModel();
        $vipModel = new VipZahtevModel();
        
        $kor = $korModel->find($korisnik);
        $stat = $statModel->where('username', $korisnik)->first();
        $idZah = $vipModel->where('username', $korisnik)->where('status', 'N')->first();
       
        
       
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
    
    public function rangLista() {
        $korime = $this->session->get('korisnickoIme');
        $korModel = new KorisnikModel();
        $statModel = new StatistikaModel();
        
        $rangLista = $statModel->orderBy('brojPoena', 'DESC')->findAll();
        $korRang = 0;
        foreach ($rangLista as $red) {
            $korRang++;
            if($red->username == $korime) {
                break;
            }
        }
        $korisnici = array_slice($rangLista, 0, 10);
        return $this->prikaz('stranice/rang_lista', ['korisnici' => $korisnici, 'rangKor' => $korRang]);
    }
    
    public function multiplayer() {
        return $this->prikaz('stranice/multiplayer', []);
    }
}
