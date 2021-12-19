<?php

namespace App\Models;

use CodeIgniter\Model;

class Gambar extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'data_gambar';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_pengajuan',
        'jenis',
        'file'
    ];
}
