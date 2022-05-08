<?php

namespace App\Controllers;

class Korisnik extends BaseController
{
    protected function prikaz($page, $data) {
        echo view($page, $data);
    }
    
    public function index()
    {
        return $this->prikaz('stranice/loggedin', []);
    }
}
