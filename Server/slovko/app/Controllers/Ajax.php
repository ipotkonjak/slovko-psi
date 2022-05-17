<?php

namespace App\Controllers;
use App\Models\ReciModel;
use App\Models\KorisnikModel;


class Ajax extends BaseController
{
    public function index()
    {
        return view('welcome_message');
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
}
