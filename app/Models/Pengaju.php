<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaju extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'data_pengaju';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nama',
        'no_ktp',
        'no_kk',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'sektor_pekerjaan',
        'penghasilan',
        'pengeluaran',
        'status_pemilik_tanah',
        'bukti_pemilik_tanah',
        'status_pemilik_rumah',
        'aset_rumah',
        'aset_tanah',
    ];
}