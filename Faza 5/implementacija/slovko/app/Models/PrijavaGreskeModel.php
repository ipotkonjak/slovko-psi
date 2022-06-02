<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * PrijavaGreskeModel - klasa modela za tabelu prijava_greske
 * 
 * @version 1.0
 */

class PrijavaGreskeModel extends Model
{
    /**
     * @var string $table Tabela
     */
    protected $table      = 'prijava_greske';
    
    /**
     * @var string $primaryKey Primarni kljuc
     */
    protected $primaryKey = 'idP';
    
    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType     = 'object';
    
    /**
     * @var string $allowedFileds Dozvoljena polja
     */
    protected $allowedFields = ['admin', 'opis', 'evidentirano', 'username'];
}