<?php

namespace App\Models;

use CodeIgniter\Model;

class RumahModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'data_rumah';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_permohonan',
        'pencahayaan',
        'jenis_atap',
        'kondisi_atap',
        'jenis_dinding',
        'kondisi_dinding',
        'jenis_lantai',
        'skor'
    ];
}
