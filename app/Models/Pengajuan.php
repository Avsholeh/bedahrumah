<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengajuan extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'pengajuan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_user',
        'tanggal',
        'status',
    ];
}
