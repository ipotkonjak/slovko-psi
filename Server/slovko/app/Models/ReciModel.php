<?php

namespace App\Models;

use CodeIgniter\Model;

class ReciModel extends Model
{
    protected $table      = 'reci';
    protected $primaryKey = 'idR';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['rec'];
}