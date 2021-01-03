<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $allowedFields = ['no_bpjs', 'nama_pasien', 'jenis_kelamin', 'umur_pasien', 'keluhan_pasien', 'id_jadwal_dokter','info_janji','id_user','id_dokter'];

    public function get()
    {
        return $this->findAll();
    }
    
    public function getDashboard($id_user){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT `pasien`.*,`dokter`.*,`jadwal_dokter`.* FROM `pasien`,`dokter`,`jadwal_dokter` WHERE `pasien`.`id_user` = {$id_user} && `pasien`.`id_jadwal_dokter` = `jadwal_dokter`.`id` && `pasien`.`id_dokter` = `dokter`.`id_dokter` ");
        return $query;
    }
    
    public function delById($id_pasien){
        return $this->delete($id_pasien);
    }
}
