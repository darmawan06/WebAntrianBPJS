<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDokterToJadwal extends Model
{
    protected $table = "dokter_to_jadwaldokter";
    public function get($id_dokter)
    {
        // echo $id_dokter;
        $db = \Config\Database::connect();
        $query = $db->query("SELECT `dokter`.* ,`jadwal_dokter`.* FROM `dokter`,`jadwal_dokter`,`dokter_to_jadwaldokter` WHERE `dokter`.`id_dokter` = {$id_dokter} && `dokter_to_jadwaldokter`.`id_dokter` = {$id_dokter} && `dokter_to_jadwaldokter`.`id_jadwal` = `jadwal_dokter`.`id` && `dokter_to_jadwaldokter`.`cek_antrian` != '1'");
        $data = $query->getResult('array');
        //   dd($data);
        return $data;
    }
    
    public function setAntrian($bool,$id_dokter,$id_jadwal){
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE `dokter_to_jadwaldokter` SET `cek_antrian` = '{$bool}' WHERE `dokter_to_jadwaldokter`.`id_dokter` = {$id_dokter} && `dokter_to_jadwaldokter`.`id_jadwal` = {$id_jadwal} ;");
        return $query;
    }
}
