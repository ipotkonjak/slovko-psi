<?php

namespace App\Controllers;
use App\Models\ReciModel;
use App\Models\KorisnikModel;
use App\Models\StatistikaModel;
use App\Models\PrijavaGreskeModel;


/**
 * Ajax - pomocna klasa kontrolera za funkcije odradjene koriscenjem Ajaxa
 * 
 * @version 1.0
 */

class Ajax extends BaseController
{
    
    /**
     * Poziv ajax-a za evidentiranje odredjene greske.
     * U bazi se azurira koji admin je evidentirao i
     * postavlja se da je greska evidentirana.
     * 
     * @return void
     */
    public function evidencijaGreske() {
        $admin = $this->request->getVar('admin');
        $greska = $this->request->getVar('idGreske');
        
        $prijavaModel = new PrijavaGreskeModel();
        $prijava = $prijavaModel->find(intval($greska));
        
        $prijava->admin = $admin;
        $prijava->evidentirano = 1;
        
        $prijavaModel->save($prijava);
    }

    /**
     * Poziv ajax-a za uklanjanje korisnika.
     * U bazi se azurira da korisnik vise nije odobren.
     * 
     * @return void
     */
    public function ukloniKorisnika(){
       $korime = $this->request->getVar('korime');
       $korModel = new KorisnikModel();
       
       $korisnik = $korModel->find($korime);
       $korisnik->odobren = 0;
       $korModel->save($korisnik);
       echo $korime;
    }
    
    
    /**
     * Poziv ajax-a za proveru unete reci.
     * U bazi se proverava da li postoji rec koju je igrac uneo
     * i vraca true ako postoji i false ako ne postoji, na osnovu
     * cega igrac dobija povratnu informaciju.
     * 
     * @return string
     */
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
    
    /**
     * Poziv ajax-a za generisanje nove reci za novu igru.
     * Iz baze dohvata random rec iz tabele reci.
     * 
     * @return string
     */
    public function generisiRec(){
        $reciModel = new ReciModel();
        $rand = $reciModel->orderBy('id', 'RANDOM')->first();
        echo $rand->rec;
    }
    
    /**
     * Poziv ajax-a za azuriranje arcade rekorda.
     * Poziva se kada igrac zavrsi arcade igru, i proverava
     * se da li mu je to novi najbolji rekord za arcade, ako
     * jeste onda se azurira.
     * 
     * @return void
     */
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
