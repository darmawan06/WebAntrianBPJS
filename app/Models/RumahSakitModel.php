<?php

namespace App\Models;

use CodeIgniter\Model;

class RumahSakitModel extends Model
{
    protected $table = "rumah_sakit";
    public function get()
    {
        return $this->findAll();
    }
}
