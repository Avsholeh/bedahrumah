<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'permohonan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_user',
        'tanggal',
        'status',
    ];
}
