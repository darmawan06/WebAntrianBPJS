<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = "jadwal_dokter";
    public function get()
    {
        return $this->findAll();
    }
}
