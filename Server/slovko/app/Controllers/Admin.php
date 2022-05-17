<?php

namespace App\Controllers;
use App\Models\StatistikaModel;
use App\Models\KorisnikModel;
use App\Models\PrijavaGreskeModel;
use App\Models\ReciModel;
use App\Models\VipZahtevModel;

class Admin extends BaseController
{
    protected function prikaz($page, $data) {
        $data["controller"] = "Admin";
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

    public function pregled() {
        $korisnik = $this->session->get('korisnickoIme');
        $korModel = new KorisnikModel();
        $statModel = new StatistikaModel();
        
        $kor = $korModel->find($korisnik);
        $stat = $statModel->where('username', $korisnik)->first();
        
        return $this->prikaz('stranice/pregledAdmin', ['korisnik' => $kor, 'statistika' => $stat]);
    }

    public function rukovodjenje(){
        $korModel = new KorisnikModel();
        $korisnici = $korModel->where('odobren', 1)->findAll();
        
        $vipModel = new VipZahtevModel();
        $vipZahtevi = $vipModel->where('status', 'N')->findAll();
        
        $greskeModel = new PrijavaGreskeModel();
        $greske = $greskeModel->where('evidentirano', 0)->findAll();
        
        return $this->prikaz('stranice/rukovodjenje', ['korisnici' => $korisnici, 'vipZahtevi' => $vipZahtevi, 'greske' => $greske]);
    }
    public function pravila()
    {   
        
        return $this->prikaz('stranice/pocetna', []);
    }
    
    public function pregledKorisnika($korime) {
        $korModel = new KorisnikModel();
        $korisnik = $korModel->find($korime);
        
        $statModel = new StatistikaModel();
        $stat = $statModel->where('username', $korime)->first();
        
        return $this->prikaz('stranice/obradaVIPzahtev', ['korisnik' => $korisnik, 'statistika' => $stat]);
    }
    
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
