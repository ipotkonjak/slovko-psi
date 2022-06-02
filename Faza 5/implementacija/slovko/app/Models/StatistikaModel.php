<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * StatistikaModel - klasa modela za tabelu statistika.
 * Cuvaju se za korisnika bitni podaci iz istorije igara.
 * 
 * @version 1.0
 */

class StatistikaModel extends Model
{
    /**
     * @var string $table Tabela
     */
    protected $table      = 'statistika';
    
    /**
     * @var string $primaryKey Primarni kljuc
     */
    protected $primaryKey = 'idS';

    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType     = 'object';
    
    /**
     * @var string $allowedFileds Dozvoljena polja
     */
    protected $allowedFields = ['brojPoena', 'brojPobeda', 'brojNeresenih', 'brojPoraza', 'arcadeRecord', 'username'];
}