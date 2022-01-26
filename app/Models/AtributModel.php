<?php

namespace App\Models;

use CodeIgniter\Model;

class AtributModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'skor_atribut';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_indikator',
        'atribut',
        'bobot',
    ];
}
