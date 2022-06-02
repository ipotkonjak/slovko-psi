<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * ReciModel - klasa modela za tabelu reci.
 * Cuvaju se sve reci koje se koriste za igre i za proveru validnosti unosa pri svakom pokusaju.
 * 
 * @version 1.0
 */

class ReciModel extends Model
{
    /**
     * @var string $table Tabela
     */
    protected $table      = 'reci';
    
    /**
     * @var string $primaryKey Primarni kljuc
     */
    protected $primaryKey = 'idR';

    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType     = 'object';
    
    /**
     * @var string $allowedFileds Dozvoljena polja
     */
    protected $allowedFields = ['rec'];
}