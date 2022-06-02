<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * KorisnikModel - klasa modela za tabelu korisnik
 * 
 * @version 1.0
 */

class KorisnikModel extends Model
{
    /**
     * @var string $table Tabela
     */
    protected $table      = 'korisnik';
    
    /**
     * @var string $primaryKey Primarni kljuc
     */
    protected $primaryKey = 'username';

    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType     = 'object';
    
    /**
     * @var string $allowedFileds Dozvoljena polja
     */
    protected $allowedFields = ['username', 'lozinka', 'ime', 'prezime', 'vip', 'admin', 'email', 'odobren'];
}