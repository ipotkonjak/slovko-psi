<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * VipZahtevModel - klasa modela za tabelu vip_zahtev.
 * Cuvaju se zahtevi registrovanih korisnika da postanu Vip korisnici.
 * Zahteve treba da obradi Admin.
 * 
 * @version 1.0
 */

class VipZahtevModel extends Model
{
    /**
     * @var string $table Tabela
     */
    protected $table      = 'vip_zahtev';
    
    /**
     * @var string $primaryKey Primerni kljuc
     */
    protected $primaryKey = 'idZ';

    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType     = 'object';
    
    /**
     * @var string $allowedFileds Dozvoljena polja
     */
    protected $allowedFields = ['opis', 'status', 'username'];
}