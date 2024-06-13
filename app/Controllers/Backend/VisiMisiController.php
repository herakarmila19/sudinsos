<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class VisiMisiController extends BaseController
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
            'visiMisiData' => $this->custom->findAllWhereCustom('visi_misi', 'created_date', 'asc', 'status', 1)
        ];

        return view('backend/visi_misi/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/visi_misi/new', $data);
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
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'visi_misi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,10240]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 10 MB',
                ],
            ]
        ])) {
            return redirect()->to('admin/visi-misi/new')->withInput();
        }

        $fileUnggah = $this->request->getFile('gambar');
        if ($fileUnggah->getError() == 4) {
            $namaUnggah = '-';
        } else {
            $namaUnggah = date('YmdHi') . '-' . strtolower($this->request->getVar('nama')) . '.' . $fileUnggah->getExtension();
            $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '-', $namaUnggah);
            $fileUnggah->move('upload/visi_misi/', $namaUnggah);
        }

        $this->custom->insertCustom(
            'visi_misi',
            [
                'nama' => $this->request->getVar('nama'),
                'jabatan' => $this->request->getVar('jabatan'),
                'visi_misi' => $this->request->getVar('visi_misi'),
                'gambar' => $namaUnggah,
                "status" => 1,
                "created_date" => date("Y-m-d H:i:s"),
                "modified_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Visi & Misi Berhasil Ditambah');

        return redirect()->to('admin/visi-misi');
    }

    public function show($id)
    {
        $data = [
            'visiMisiData' => $this->custom->whereCustom('visi_misi', 'id', $id)
        ];

        return view('backend/visi_misi/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'visiMisiData' => $this->custom->whereCustom('visi_misi', 'id', $id),
            'validation' => $this->validation
        ];

        return view('backend/visi_misi/edit', $data);
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
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'visi_misi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,10240]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 10 MB',
                ],
            ]
        ])) {
            return redirect()->to('admin/visi-misi/' . $id . '/edit')->withInput();
        }

        $fileUnggah = $this->request->getFile('gambar');
        if ($fileUnggah->getError() == 4) {
            $namaUnggah = $this->request->getVar('gambarLama');
        } else {
            $namaUnggah = date('YmdHi') . '-' . strtolower($this->request->getVar('nama')) . '.' . $fileUnggah->getExtension();
            $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '-', $namaUnggah);
            $fileUnggah->move('upload/visi_misi/', $namaUnggah);
        }

        $this->custom->updateCustom('visi_misi', 'id', $id, [
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'visi_misi' => $this->request->getVar('visi_misi'),
            'gambar' => $namaUnggah,
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Visi & Misi Berhasil Diubah');

        return redirect()->to('admin/visi-misi');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('visi_misi', 'id', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Visi & Misi Berhasil Dihapus');

        return redirect()->to('admin/visi-misi');
    }
}
