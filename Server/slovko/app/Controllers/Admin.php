<?php

namespace App\Controllers;
use App\Models\StatistikaModel;
use App\Models\KorisnikModel;
use App\Models\PrijavaGreskeModel;
use App\Models\ReciModel;

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
        return $this->prikaz('stranice/rukovodjenje', ['korisnici' => [], 'vipZahtevi' => [], 'greske' => []]);
    }
}