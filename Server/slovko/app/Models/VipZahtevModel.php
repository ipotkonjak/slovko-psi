<?php

namespace App\Models;

use CodeIgniter\Model;

class VipZahtevModel extends Model
{
    protected $table      = 'vip_zahtev';
    protected $primaryKey = 'idZ';

    protected $returnType     = 'object';
    
    protected $allowedFields = ['opis', 'status', 'username'];
}