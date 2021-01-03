		<div id="formcaridokter"  class="col-sm-3 p-3 mr-sm-5">
			<div class="row p-sm-3">
				<div class="col title"><span>Cari Dokter</span></div>
			</div>
			<div class="row p-3 p-sm-3">
				<div class="p-1 col-12 no-dropdown">
				<input id="namesearch" type="text" name="namadokter" placeholder="Nama Dokter">
				</div>
				<label>Pilih Cabang</label>
				<div class="p-1 col-12 dropdown">
                    <select id="cabang" class="custom-select">
					   <option selected></option>
                        <?php foreach($list_rumahsakit as $key): ?>
						<option class="dropdown-item"><?= $key['nama_rumahsakit'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				
				<label>Pilih Spesialis</label>
				
        <div class="p-1 col-12 dropdown">
                <select id="spesialis" class="custom-select">
                     <option selected ></option>
 						<option class="dropdown-item">Akunpuntur</option>
						<option class="dropdown-item">Anak</option>
						<option class="dropdown-item">Bedah</option>
						<option class="dropdown-item">Forensik dan Medikolegal</option>
						<option class="dropdown-item">Gigi</option>
						<option class="dropdown-item">Jantung</option>
						<option class="dropdown-item">Kandungan</option>
						<option class="dropdown-item">Kesehatan Jiwa</option>
						<option class="dropdown-item">Kesehatan Pria</option>
						<option class="dropdown-item">Klinik Gizi</option>
						<option class="dropdown-item">Kulit dan kelamin</option>
						<option class="dropdown-item">Mata</option>
						<option class="dropdown-item">Mikrobiologi Klinik</option>
						<option class="dropdown-item">Neurologi Anak Syaraf</option>
						<option class="dropdown-item">Paru-paru</option>
						<option class="dropdown-item">Patologi Anatomi</option>
						<option class="dropdown-item">Patologi Klinik</option>
						<option class="dropdown-item">Pembiusan</option>
						<option class="dropdown-item">Penyakit Dalam</option>
						<option class="dropdown-item">Psikologi</option>
						<option class="dropdown-item">Radiologi</option>
						<option class="dropdown-item">Rehabilitasi Medis</option>
						<option class="dropdown-item">Saraf</option>
						<option class="dropdown-item">Telinga, Hidung, Tenggorokan, Bedah Kepala Leher</option>
						<option class="dropdown-item">Terapi Okupasi</option>
						<option class="dropdown-item">Urologi</option>
                </select>
        </div>

			<label>Jenis Kelamin</label>
				<div class="col-12 d-flex">
				<input type="checkbox" class="genre" name="" onclick="searchByJenisKelamin('Laki-Laki')">
				<label class="ml-1">Laki-Laki</label>
				</div>
				<div class="col-12 d-flex">
				<input type="checkbox" name="" class="genre" onclick="searchByJenisKelamin('Perempuan')">
				<label class="ml-1">Perempuan</label>
				</div>
				<div class="col-12 d-flex">
				<input type="checkbox" name="" class="genre" onclick="searchByJenisKelamin('reset')">
				<label class="ml-1">Semua</label>
				</div>
			</div>
			<div class="col-12 d-flex">
				<button id="reset" class="ml-auto mr-auto btn btn-outline-success">RESET <i class=" 	fas fa-trash-restore"></i></button>
			</div>
		</div>
	<style type="text/css">
	#formcaridokter{
		box-shadow: 0px 0px 2px #72809d;
		border-radius: 8px;
		max-height: 520.8px;
		background:white;
	}
	#formcaridokter div label {
    color: #72809d;
    display: block;
    font-size: .875rem;
    font-weight: 500;
    margin-bottom: .4rem;
}
	#formcaridokter div div.title{
		width: 100%;
		padding: 1rem 1.5rem;
		background: white;
		text-align: center;
	}
	#formcaridokter div div.title span{
		font-size: 1.5rem;
		color: grey;
	}
	#formcaridokter div div input[type='text'],#formcaridokter div div div input[type='text']{
		width: 100%;
		height: 40px;
		padding: 10px;
		border:none;
		box-shadow: none;
	}
	#formcaridokter div div.dropdown,#formcaridokter div div.no-dropdown{
		border:1px solid #72809d;
		margin: 2px 2px 2px 2px;
	}
	#formcaridokter div div div div i{
		color:#72809d; 
	}
</style>