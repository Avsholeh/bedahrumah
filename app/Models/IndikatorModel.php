<?php

namespace App\Models;

use CodeIgniter\Model;

class IndikatorModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'skor_indikator';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'indikator',
        'bobot',
    ];
}
