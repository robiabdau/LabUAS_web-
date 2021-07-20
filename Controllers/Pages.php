<?php

namespace App\Controllers;

use App\Models\wargaModel;

class Pages extends BaseController
{
    protected $wargaModel;
    public function __construct()
    {
        $this->wargaModel = new wargaModel();
    }
    public function index()
    {
        //$warga = $this->wargaModel->findAll();
        
        $data = [
            'title' => 'Sistem Iuran Kas RT',
            'warga' => $this->wargaModel->getWarga()
        ];
        
        return view('pages/data', $data);
    }
    
    public function laporan()
    {
        $data = [
            'title' => 'Laporan'
        ];
        return view('pages/laporan', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Masjid Attaqwa, Pasir Sari',
                    'kota' => 'Cikarang'
                ],
                [
                    'tipe' => 'Kampus Universitras Pelita Bngsa',
                    'alamat' => 'Jl. Inspeksi Kalimalang Tegal Danas Arah Deltamas',
                    'kota' => 'Cikarang'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }

    public function create()
    {
        //session();
        $data = [
        'title' => 'Form Tambah Data Warga',
        'validation' => \Config\Services::validation()
    ];

        return view('Pages/create', $data);
    }
    public function save()
    {
        //validasi input
        if (!$this->validate([
            'nik' => [
                'rules' => 'required[pages.nik]',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ],
            'nama' => [
                'rules' => 'required[pages.nama]',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ],
            'alamat' => [
                'rules' => 'required[pages.alamat]',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ],
            'no_rumah' => [
                'rules' => 'required[pages.no_rumah]',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ],
            'status' => [
                'rules' => 'required[pages.status]',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ]

                ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Pages/create')->withInput()->with('validation', $validation);
        }
        
        $this->wargaModel->save([
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'kelamin' => $this->request->getVar('kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'no_rumah' => $this->request->getVar('no_rumah'),
            'status' => $this->request->getVar('status')
        ]);
        
        

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('/pages');
    }

    public function delete($id)
    {
        $this->wargaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/pages');
    }

    public function edit($id)
    {
        $warga = $this->wargaModel->findAll();
        $data = [
        'title' => 'Form Ubah Data Warga',
        'validation' => \Config\Services::validation(),
        'warga' => $this->wargaModel->getWarga($id)
        ];

        return view('Pages/edit', $data);
    }

    public function update($id)
    {
        $this->wargaModel->save([
            'id' => $id,
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'kelamin' => $this->request->getVar('kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'no_rumah' => $this->request->getVar('no_rumah'),
            'status' => $this->request->getVar('status')
        ]);
        
        

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('/pages');
    }
}