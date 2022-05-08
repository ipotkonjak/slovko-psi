<?php

namespace App\Controllers;
use App\Models\ReciModel;

class Ajax extends BaseController
{
    public function index()
    {
        return view('welcome_message');
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
