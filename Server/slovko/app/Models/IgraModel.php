<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * IgraModel - klasa modela za tabelu igra.
 * Cuvaju se rezultati iz svih odigranih Multiplayer igara.
 * 
 * @version 1.0
 */

class IgraModel extends Model
{
    /**
     * @var string $table Tabela
     */
    protected $table      = 'igra';
    
    /**
     * @var string $primaryKey Primerni kljuc
     */
    protected $primaryKey = 'idI';

    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType     = 'object';
    
    /**
     * @var string $allowedFileds Dozvoljena polja
     */
    protected $allowedFields = ['brojPokusaja1', 'brojPokusaja2', 'vreme1', 'vreme2', 'username1', 'username2', 'pobeda1'];
}