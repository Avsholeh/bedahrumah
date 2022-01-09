<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'data_gambar';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_permohonan',
        'jenis',
        'file'
    ];
}
