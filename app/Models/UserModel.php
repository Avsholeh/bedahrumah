<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'users';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'nama_lengkap',
        'email',
        'password',
        'status',
        'jabatan',
        'alamat',
        'no_telp',
        'ktp',
    ];
}
