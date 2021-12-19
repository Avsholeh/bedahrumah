<?php

namespace App\Models;

use CodeIgniter\Model;

class Rumah extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'data_rumah';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_pengajuan',
        'pondasi',
        'kolom_balok',
        'konstruksi_atap',
        'pencahayaan',
        'ventilasi',
        'mck',
        'kondisi_mck',
        'pembuangan',
        'kondisi_pembuangan',
        'sumber_air_minum',
        'sumber_listrik',
        'luas_rumah',
        'jumlah_penghuni',
        'tinggi_bangunan',
        'ruangan_lainnya',
        'material_atap',
        'kondisi_atap',
        'material_dinding',
        'kondisi_dinding',
        'material_lantai',
        'kondisi_lantai',
        'luas_lantai',
    ];
}
