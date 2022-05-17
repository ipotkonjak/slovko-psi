<?php

namespace App\Controllers;
use App\Models\ReciModel;
use App\Models\KorisnikModel;
use App\Models\StatistikaModel;
use App\Models\PrijavaGreskeModel;


class Ajax extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    
    public function evidencijaGreske() {
        $admin = $this->request->getVar('admin');
        $greska = $this->request->getVar('idGreske');
        
        $prijavaModel = new PrijavaGreskeModel();
        $prijava = $prijavaModel->find(intval($greska));
        
        $prijava->admin = $admin;
        $prijava->evidentirano = 1;
        
        $prijavaModel->save($prijava);
    }

    public function ukloniKorisnika(){
       $korime = $this->request->getVar('korime');
       $korModel = new KorisnikModel();
       
       $korisnik = $korModel->find($korime);
       $korisnik->odobren = 0;
       $korModel->save($korisnik);
       echo $korime;
    }
    
    public function proveraReci(){
        $rec = $this->request->getVar('word');
        $reciModel = new ReciModel();
        $trazena = $reciModel->where("rec",$rec)->first();
        if($trazena == null){
            echo "false";
        }
        else{
            echo "true";
        }
    }
    
    public function generisiRec(){
        $reciModel = new ReciModel();
        $rand = $reciModel->orderBy('id', 'RANDOM')->first();
        echo $rand->rec;
    }
    
    public function azurirajRekord(){
        $korime = $this->request->getVar('username');
        $rezultat = $this->request->getVar("result");
        $statModel = new StatistikaModel();
        
        $statistika = $statModel->where("username", $korime)->first();
        if($statistika->arcadeRecord < $rezultat){
            $statistika->arcadeRecord = $rezultat;
            $statModel->save($statistika);
        }
        
    }
}
