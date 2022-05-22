<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\KorisnikModel;

class GostFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
       $session = session();
       if($session->has("korisnickoIme")){
            $korisnikModel = new KorisnikModel();
            $korisnik = $korisnikModel->find($session->get("korisnickoIme"));
           if(!$korisnik->admin)
               return redirect()->to(site_url("Korisnik/index"));
           else 
               return redirect()->to(site_url("Admin/index"));
       }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}