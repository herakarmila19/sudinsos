<?php

namespace App\Controllers\Backend\Pemerintahan;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class PejabatController extends BaseController
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
            'pejabatData' => $this->custom->findAllWhereCustom('pejabat', 'created_date', 'desc', 'status', 1)
        ];

        return view('backend/pemerintahan/pejabat/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/pemerintahan/pejabat/new', $data);
    }

    public function create()
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
                'rules' => 'max_size[foto,2048]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 2 MB',
                ],
            ]
        ])) {
            return redirect()->to('admin/pejabat/new')->withInput();
        }

        $fileUnggah = $this->request->getFile('foto');
        if ($fileUnggah->getError() == 4) {
            $namaUnggah = '-';
        } else {
            $namaUnggah = date('YmdHi') . '-' . strtolower($this->request->getVar('jabatan')) . '.' . $fileUnggah->getExtension();
            $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '-', $namaUnggah);
            $fileUnggah->move('upload/pejabat/', $namaUnggah);
        }

        $this->custom->insertCustom(
            'pejabat',
            [
                'nama' => $this->request->getVar('nama'),
                'kategori' => $this->request->getVar('kategori'),
                'jabatan' => $this->request->getVar('jabatan'),
                'foto' => $namaUnggah,
                "status" => 1,
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Pejabat Berhasil Ditambah');

        return redirect()->to('admin/pejabat');
    }

    public function show($id)
    {
        $data = [
            'pejabatData' => $this->custom->whereCustom('pejabat', 'id', $id)
        ];

        return view('backend/pemerintahan/pejabat/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'pejabatData' => $this->custom->whereCustom('pejabat', 'id', $id),
            'validation' => $this->validation
        ];

        return view('backend/pemerintahan/pejabat/edit', $data);
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
                'rules' => 'max_size[foto,2048]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 2 MB',
                ],
            ]
        ])) {
            return redirect()->to('admin/pejabat/' . $id . '/edit')->withInput();
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

        session()->setFlashdata('pesan_ubah', 'Data Pejabat Berhasil Diubah');

        return redirect()->to('admin/pejabat');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('pejabat', 'id', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Pejabat Berhasil Dihapus');

        return redirect()->to('admin/pejabat');
    }
}
