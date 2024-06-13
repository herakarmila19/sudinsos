<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class KecamatanController extends BaseController
{
    protected $custom, $validation;

    public function __construct()
    {
        $this->custom = new CustomModel();
        $this->validation = Services::validation();
    }

    public function index()
    {
        $data = [
            'kecamatanData' => $this->custom->findAllLikeCustom('pejabat', 'kategori', 'asc', 'jabatan', 'asc', 'status', 1, 'kategori', explode('Kecamatan', session()->get('nama'))[1])
        ];

        return view('backend/kecamatan/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'kecamatanData' => $this->custom->whereCustom('pejabat', 'id', $id),
            'validation' => $this->validation
        ];

        return view('backend/kecamatan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Error: Ukuran Foto Maksimal 1 MB',
                    'mime_in' => 'Error: File yang diupload bukan Gambar'
                ],
            ]
        ])) {
            return redirect()->to('kecamatan/' . $id . '/edit')->withInput();
        }

        $fileUnggah = $this->request->getFile('foto');
        if ($fileUnggah->getError() == 4) {
            $namaUnggah = $this->request->getVar('fotoLama');
        } else {
            $namaUnggah = date('YmdHi') . '-' . strtolower($this->request->getVar('jabatan')) . '.' . $fileUnggah->getExtension();
            $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '-', $namaUnggah);
            $fileUnggah->move('upload/pejabat/', $namaUnggah);
        }

        $this->custom->updateCustom('pejabat', 'id', $id, [
            'nama' => $this->request->getVar('nama'),
            'kategori' => $this->request->getVar('kategori'),
            'jabatan' => $this->request->getVar('jabatan'),
            'foto' => $namaUnggah,
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Camat & Lurah Berhasil Diubah');

        return redirect()->to('kecamatan');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('');
    }
}
