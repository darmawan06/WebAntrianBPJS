<div class="col ">
<div  id="listDokter" class="row row-cols-1 row-cols-md-2">
<?php foreach($list_dokter as $key) :?>
  <div class="col list mb-4">
    <div class="card">
        <center>      
            <img src="<?= base_url('img/profile.png') ?>" class="card-img-top" alt="...">
        </center>
        <div class="card-body">
            <span class="card-title nama"><?= $key->nama_dokter  ?></span>
            <p class="card-text jenis_kelamin"><?= $key->jenis_kelamin ?></p>
            <p class="card-text cabang"><?= $key->nama_rumahsakit ?></p>
            <small class="lokasi">
            <?= $key->lokasi_rumahsakit ?>
            </small>
        </div>
        <div class="card-footer">
            <small class="text-muted spesialis"><?= $key->spesialis ?></small>
            <br/>
            <a href="<?php echo base_url('/janji/') ?>/<?= $key->id_dokter ?>" > <small style="color:green; font-size:18px">BUAT JANJI</small></a>
        </div>
    </div>
  </div>
<?php endforeach ?>
</div>
</div>
<style>
    #listDokter{
        overflow-y:auto;
        height:31em;
    }
    #listDokter .col .card{
        border-radius:5px;
        margin-top:1px;
        box-shadow:0px 0px 2px grey;
    }
    #listDokter .card .card-body span{
        font-size:2.5vh;
    }
    #listDokter .card .card-body p{
        color : green;
        font-size:2vh;
    }
    #listDokter .card img{
        width:200px;
        height:200px;
    }
    
    @media only screen and (max-width: 600px) {
        #listDokter{
            margin-top :30px;
        }
    }
</style>