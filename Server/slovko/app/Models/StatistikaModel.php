<?php

namespace App\Models;

use CodeIgniter\Model;

class StatistikaModel extends Model
{
    protected $table      = 'statistika';
    protected $primaryKey = 'ids';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['brojPoena', 'brojPobeda', 'brojNeresenih', 'brojPoraza', 'arcadeRecord', 'idK'];
}