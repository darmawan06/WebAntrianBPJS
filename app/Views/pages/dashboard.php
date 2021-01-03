<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php 
$i=0;
?>

<?php $session=session();?>
    <div class="row">
        <div id="listDashboard" class="col-12 d-flex list-group-item flex-nowrap flex-column p-5">
            <?php foreach($dataDashboard as $key) :?>
              <div href="#" class="list-group-item list-group-item-action flex-column align-items-start mb-4 bg-gradient">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-2 ">Nama Dokter : <?= $key->nama_dokter ?></h5>
                    <span>No Antrian : <?= $key->id_pasien ?></span>
                </div>
                  <p class="mb-2">No BPJS : <?= $key->no_bpjs ?></p>
                  <p class="mb-2">Nama Pasien : <?= $key->nama_pasien ?></p>
                   <p class="mb-2">Umur Pasien : <?= $key->umur_pasien ?></p>
                  <p><label class="keluhan">Keluhan :</label> <?= $key->keluhan_pasien ?></p>
                  <p><label class="keluhan">Info Janji :</label> <?= $key->info_janji ?></p>
                <a href="<?= base_url("pages/delJanji/{$key->id_pasien}/{$session->get('user_id')}/{$key->id_dokter}/{$key->id_jadwal_dokter}") ?>" class="btn btn-danger">Batalkan</a>

              </div>
              <?php $i++;?>
             <?php endforeach ?>
                 
                 
            <?php if ($i==0) : ?>
            <div class="text-center empty">
            <h1 class="font-second">Belum Membuat Janji</h1>
            <p>Silahkan Buat Janji</p>
            <a href="<?php echo base_url('/pages/caridokter') ?>" class="btn btn-success">Cari Dokter</a>
            </div>
           
            <?php endif; ?>
          
        </div>
    </div>
    <style>
        #listDashboard{
            overflow-y:auto;
            overflow-x:hidden;
            min-height:500px;
            max-height:700px;
            margin-bottom:50px;
            background:transparent;
        }
        #listDashboard .bg-gradient{
            /*background: linear-gradient(32deg, rgba(2,0,36,1) 0%, rgba(10,28,26,1) 53%, rgba(3,144,18,1) 100%);*/
        }
        /*#listDashboard .bg-gradient:hover{*/
        /*    box-shadow:0px 0px 2px white;*/
            /*background: linear-gradient(32deg, rgba(2,0,36,1) 0%, rgba(1,138,124,1) 22%, rgba(0,255,27,1) 100%);*/
        /*    font-weight:bold;*/
        /*    color: white;*/
        /*} */
        
       .empty{
            color:white;
        }
    </style>

<?php $this->endSection() ?>