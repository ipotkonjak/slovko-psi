<?php

namespace App\Models;

use CodeIgniter\Model;

class PrijavaGreskeModel extends Model
{
    protected $table      = 'prijava_greske';
    protected $primaryKey = 'idP';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['idAdmin', 'opis', 'evidentirano', 'idK'];
}