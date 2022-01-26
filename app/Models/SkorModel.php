<?php

namespace App\Models;

use CodeIgniter\Model;

class SkorModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'skor';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_permohonan',
        'indikator',
        'atribut',
        'bobot',
    ];
}
