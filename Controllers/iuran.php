<?php

namespace App\Controllers;

use App\Models\iuranModel;

class iuran extends BaseController
{
    protected $iuranModel;

    public function __construct()
    {
        $this->iuranModel = new iuranModel();
    }
    public function iuran()
    {
        $data = [
            'title' => 'Transaksi',
            'iuran' => $this->iuranModel->getiuran()
        ];
        
        return view('pages/iuran', $data);
    }
    public function create_transaksi()
    {
        $data = [
        'title' => 'Form Tambah Iuran Warga',
        'iuran' => $this->iuranModel->getiuran(),
        'validation' => \Config\Services::validation()
    ];

        return view('Pages/create_transaksi', $data);
    }
    public function save()
    {
        //validasi input
        if (!$this->validate([
            'bulan' => [
                'rules' => 'required[iuran.bulan]',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ],
            'tahun' => [
                'rules' => 'required[iuran.tahun]',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ],
            'keterangan' => [
                'rules' => 'required[iuran.keterangan]',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
                ],
            

                ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/iuran/create_transaksi')->withInput()->with('validation', $validation);
        }
        
        $this->iuranModel->save([
            'bulan' => $this->request->getVar('bulan'),
            'tahun' => $this->request->getVar('keterangan'),
            'id' => $this->request->getVar('id'),
            'keterangan' => $this->request->getVar('keterangan'),
            
        ]);
        
        

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('/iuran/iuran');
    }
}