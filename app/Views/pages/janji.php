<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php $session=session();?>
<?php 
    // $location = base_url("php/realTimeDate.php");
    // include "/{$location}";
    if(is_null($session->get('user_id'))){
        header("Location:".base_url('/login'));
    }
?>
<?php if($listDokterToJadwal != NULL) :?>
<h3 class="m-3 text-center" style="color:white;">Form Janji dengan Dokter</h3>
<div class="container">
    <div id="listDokter" class="row row-cols-1 row-cols-md-2">
        <div class="col list mb-4 mt-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <?php foreach ($listDokterToJadwal as $key) : ?>
                    <li class="list-group-item">Nama Dokter : <?= $key['nama_dokter']; ?></li>
                    <li class="list-group-item">Jenis Kelamin : <?= $key['jenis_kelamin']; ?></li>
                    <li class="list-group-item">Spesialis : <?= $key['spesialis']; ?></li>
                    <?php
                        break;
                    ?>
                    <?php endforeach ?>
                </ul>
                <?php if (session()->getFlashdata('pesan')) : ?>
                <div id="notif" class="success alert alert-info" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
                <?php endif; ?>
                <form action="<?php echo base_url('/pages/buat_janji/' . $id_dokter . '/' . $session->get('user_id')) ?>"
                    method="POST" class="m-3">
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input hidden type="text"
                                class="form-control <?= ($validation->hasError('')) ? 'is-invalid' : ''; ?> " id=""
                                name="" value="<?= old(''); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError(''); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_bpjs" class="col-sm-2 col-form-label">No BPJS</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Isi No BPJS"
                                class="form-control <?= ($validation->hasError('no_bpjs')) ? 'is-invalid' : ''; ?> "
                                id="no_bpjs" name="no_bpjs" value="<?= old('no_bpjs'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('no_bpjs'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Nama Pasien"
                                class="form-control <?= ($validation->hasError('nama_pasien')) ? 'is-invalid' : ''; ?> "
                                id="nama_pasien" name="nama_pasien" value="<?= old('nama_pasien'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_pasien'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Jenis Kelamin"
                                class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?> "
                                id="jenis_kelamin" name="jenis_kelamin" value="<?= old('jenis_kelamin'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jenis_kelamin'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="umur_pasien" class="col-sm-2 col-form-label">Umur Pasien</label>
                        <div class="col-sm-10"> 
                            <input type="text" placeholder="Umur Pasien"
                                class="form-control <?= ($validation->hasError('umur_pasien')) ? 'is-invalid' : ''; ?> "
                                id="umur_pasien" name="umur_pasien" value="<?= old('umur_pasien'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('umur_pasien'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keluhan_pasien" class="col-sm-2 col-form-label">Keluhan Pasien</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Keluhan Pasien"
                                class="form-control <?= ($validation->hasError('keluhan_pasien')) ? 'is-invalid' : ''; ?> "
                                id="keluhan_pasien" name="keluhan_pasien" value="<?= old('keluhan_pasien'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('keluhan_pasien'); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="keluhan_pasien" class="col-sm-2 col-form-label">Pilih Jadwal</label>
                        <div class="col-sm-10">
                        <select name="id_jadwal_dokter"   class="custom-select <?= ($validation->hasError('jadwal')) ? 'is-invalid' : ''; ?>" id="jadwal" onchange="moveTanggal(this)" >
                            <option selected> Pilih Jadwal...</option>
                            <?php foreach ($listDokterToJadwal as $key) : ?>
                            <?php $translate = translateId($key['hari']); $date = searchDate($translate); ?>
                            <option  value="<?= $key['id']; ?>">Tanggal: <?= $date ?>, Hari : <?= $key['hari']; ?>, Jam : <?= $key['jam_mulai']; ?> - <?= $key['jam_selesai']; ?></option>
                            <?php endforeach ?>
                        </select>
                          <div class="invalid-feedback">
                                <?= $validation->getError('jadwal'); ?>
                          </div>
                        </div>
                    </div>
                    <input type="text" value="" name="tanggal" id="tanggal" class="d-none">
                    <div class="form-group row">
                        <div class="col-sm-12 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </div>
                </form>

                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
        <div class="row " style="height:80vh">
            <div class= "col-sm-12 text-center d-flex flex-column text-white m-auto ">
                <i class="far fa-calendar-times" style="font-size:15vw;"></i>
                <br>
                <span style="font-size:3vw;" class="font-primary">Maaf Dokter Sibuk Cari Yang Lain</span>
            </div>
        </div>
<?php endif ?>
<script>

function moveTanggal(tanggal){
    var value = tanggal.options[tanggal.selectedIndex].text;
    document.getElementById('tanggal').value = value;
}
</script>
<style>


option,.custom-select,form {
    font-size: 1rem;
}
</style>
<?= $this->endSection(); ?>



<?php 
    function translateId($hari){
        switch($hari){
            case "Senin":
                return "Monday";
            break;
            case "Selasa":
                return "Tuesday";
            break;
            case "Rabu":
                return "Wednesday";
            break;
            case "Kamis":
                return "Thursday";
            break;
            case "Jumat":
                return "Friday";
            break;
            case "Sabtu":
                return "Saturday";
            break;
            case "Minggu":
                return "Sunday";
            break;
            default:
                return $hari;
        }
    }
    
    function translateEng($hari){
        switch($hari){
            case "Monday":
                return "Senin";
            break;
            case "Tuersday":
                return "Selasa";
            break;
            case "Wednesday":
                return "Rabu";
            break;
            case "Thursday":
                return "Kamis";
            break;
            case "Friday":
                return "Jumat";
            break;
            case "Saturday":
                return "Sabtu";
            break;
            case "Sunday":
                return "Minggu";
            break;
            default:
                return $hari;
        }
    }
    
    function searchDate($day){
        $i = 0;
        $date = date("j F Y",strtotime("+{$i} day"));
        while($day != date("l",strtotime("+{$i} day"))){
            $i++;
            $date = date("j F Y",strtotime("+{$i} day"));
        }
        return $date;
    }
    
?>
