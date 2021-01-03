<?php

namespace App\Controllers;

use App\Models\ModelDokter;
use App\Models\JadwalModel;
use App\Models\RumahSakitModel;
use App\Models\ModelDokterToJadwal;
use App\Models\PasienModel;


class Pages extends BaseController
{
	protected $pasienModel;
	protected $ModelDokterToJadwal;
	public function __construct()
	{
		$this->pasienModel = new PasienModel();
		$this->ModelDokterToJadwal = new ModelDokterToJadwal();
	}
	public function index()
	{
		$data = [
			'title' => 'Home',
			'carousel' => [
				[
					'link' => 'img/rs2.jpg',
					'title' => 'Dokter',
					'caption' => 'Dokter yang siap sedia merawat Anda'
				],
				[
					'link' => 'img/rs1.jpg',
					'title' => 'Ruangan',
					'caption' => 'Ruangan sangat nyaman dan bersih'
				], [
					'link' => 'img/rs3.jpg',
					'title' => 'Dokter',
					'caption' => 'Dokter yang siap melayani anda'
				]
			],	
			'poli' => [
				[
					'nama' => 'Poli Anak',
				],
				[
					'nama' => 'Poli Gigi',
				], 
				[
					'nama' => 'Poli Mata',
				],
				[
				    'nama' => 'Poli Jantung',
				]
			]
		];
		return view('pages/home', $data);
	}

	public function login()
	{
		$data = [
			'title' => 'Login',
		];
		return view('pages/login', $data);
	}

	public function register()
	{
		$data = [
			'title' => 'Register',
		];
		return view('pages/register', $data);
	}
	
	public function dashboard($id_user){
	    $data= [
	        'title' => "Dashboard",
	        'dataDashboard' => $this->pasienModel->getDashboard($id_user)->getResult()
	    ];
	    return view('pages/dashboard',$data);
	}

	public function caridokter()
	{

		$modelDokter = new ModelDokter();
		$jadwalModel = new JadwalModel();
		$rumahSakitModel = new RumahSakitModel();
		$data = [
			'title' => 'Cari Dokter',
			'list_dokter' => $modelDokter->getJoin()->getResult(),
			'list_jadwal' => $jadwalModel->get(),
			'list_rumahsakit' => $rumahSakitModel->get(),
		];
		// $data1['list_dokter'] = $model->get_data();
		return view('pages/caridokter', $data);
	}


	public function janji($id_dokter)
	{
		$dokterToJadwal = new ModelDokterToJadwal();
		$data = [
			'title' => "Buat Janji",
			'listDokterToJadwal' =>	$dokterToJadwal->get($id_dokter),
			'validation' => \Config\Services::validation(),
			'id_dokter' => $id_dokter,
		];
		// 		dd($data);
		return view('pages/janji', $data);
	}

    public function delJanji($id_janji,$id_user,$id_dokter,$id_jadwal){
        $this->ModelDokterToJadwal->setAntrian(0,$id_dokter,$id_jadwal);
        $cek = $this->pasienModel->delById($id_janji);
         if($cek){
        	return redirect()->to(base_url('pages/dashboard/'.$id_user));
        }
    }
    
	public function buat_janji($id_dokter,$id_user)
	{
		if (!$this->validate([
			'no_bpjs' => [
				'rules' => 'required|is_unique[pasien.no_bpjs]',
				'errors' => [
					'required' => 'No BPJS harus diisi',
                    'is_unique' => 'No BPJS sudah di gunakan'
				]
			],
			'nama_pasien' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus diisi'
				]
			],
			'jenis_kelamin' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Jenis kelamin harus diisi'
				]
			],
			'umur_pasien' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Umur pasien harus diisi'
				]
			],
			'keluhan_pasien' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Keluhan harus diisi'
				]
			],
			'id_jadwal_dokter' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Jadwal harus diisi'
				]
			],'tanggal' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal Error'
				]
			]
		])){
            session()->setFlashdata('pesan', 'Data Gagal Di Simpan');
			return redirect()->to(base_url('pages/janji/' . $id_dokter))->withInput();
		};
		

		$cekSukses = $this->pasienModel->save([
			'no_bpjs' => $this->request->getVar('no_bpjs'),
			'nama_pasien' => $this->request->getVar('nama_pasien'),
			'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
			'umur_pasien' => $this->request->getVar('umur_pasien'),
			'keluhan_pasien' => $this->request->getVar('keluhan_pasien'),
			'id_jadwal_dokter' => $this->request->getVar('id_jadwal_dokter'),
			'info_janji' => $this->request->getVar('tanggal'),
			'id_user' => $id_user,
			'id_dokter' => $id_dokter
		]);
		
        if($cekSukses){
            $cekAntrian = $this->ModelDokterToJadwal->setAntrian(1,$id_dokter,$this->request->getVar('id_jadwal_dokter'));
            if($cekAntrian){
             session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan, Kunjungi dashboard untuk melihat No Antrian');   
            }else{
        	 session()->setFlashdata('pesan', 'Data Gagal Di Tambahkan ke Antrian');
            }
        }else{
    		session()->setFlashdata('pesan', 'Data Gagal Di Tambahkan ke Database');
        }
		return redirect()->to(base_url('/janji/'. $id_dokter) );
	}

	//--------------------------------------------------------------------

}
