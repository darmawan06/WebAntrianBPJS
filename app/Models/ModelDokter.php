<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelDokter extends Model
{
    protected $table = "dokter";
    public function get()
    {
        return $this->findAll();
    }

    public function getJoin()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT `dokter`.*,`rumah_sakit`.* FROM `dokter`,`rumah_sakit` WHERE `dokter`.`tempat_rumahsakit` = `rumah_sakit`.`id_rumahsakit` ORDER BY `dokter`.`spesialis`;");
        return $query;
    }
}

// <?php namespace App\Models;
// use CodeIgniter\Model;

// class Doktermodel extends Model
// {
//     protected $table = 'table';

//     public function get_data()
//     {
//         return $this->findAll();
//     }

// }
