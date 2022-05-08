<?php

namespace App\Models;

use CodeIgniter\Model;

class IgraModel extends Model
{
    protected $table      = 'igra';
    protected $primaryKey = 'idI';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['brojPokusaja1', 'brojPokusaja2', 'vreme1', 'vreme2', 'idK1', 'idK2', 'pobeda1'];
}