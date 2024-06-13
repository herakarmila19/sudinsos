<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class SlideController extends BaseController
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
            'slideData' => $this->custom->findAllWhereCustom('slide', 'created_date', 'asc', 'status', 1)
        ];

        return view('backend/slide/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/slide/new', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'deskripsi' => [
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
            return redirect()->to('admin/slide/new')->withInput();
        }

        $fileUnggah = $this->request->getFile('gambar');
        if ($fileUnggah->getError() == 4) {
            $namaUnggah = '-';
        } else {
            $namaUnggah = date('YmdHi') . '-' . strtolower($this->request->getVar('judul')) . '.' . $fileUnggah->getExtension();
            $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '-', $namaUnggah);
            $fileUnggah->move('upload/slide/', $namaUnggah);
        }

        $this->custom->insertCustom(
            'slide',
            [
                'judul' => $this->request->getVar('judul'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'gambar' => $namaUnggah,
                "status" => 1,
                "created_date" => date("Y-m-d H:i:s"),
                "modified_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Slide Berhasil Ditambah');

        return redirect()->to('admin/slide');
    }

    public function show($id)
    {
        $data = [
            'slideData' => $this->custom->whereCustom('slide', 'id', $id)
        ];

        return view('backend/slide/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'slideData' => $this->custom->whereCustom('slide', 'id', $id),
            'validation' => $this->validation
        ];

        return view('backend/slide/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'deskripsi' => [
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
            return redirect()->to('admin/slide/' . $id . '/edit')->withInput();
        }

        $fileUnggah = $this->request->getFile('gambar');
        if ($fileUnggah->getError() == 4) {
            $namaUnggah = $this->request->getVar('gambarLama');
        } else {
            $namaUnggah = date('YmdHi') . '-' . strtolower($this->request->getVar('judul')) . '.' . $fileUnggah->getExtension();
            $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '-', $namaUnggah);
            $fileUnggah->move('upload/slide/', $namaUnggah);
        }

        $this->custom->updateCustom('slide', 'id', $id, [
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'gambar' => $namaUnggah,
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Slide Berhasil Diubah');

        return redirect()->to('admin/slide');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('slide', 'id', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Slide Berhasil Dihapus');

        return redirect()->to('admin/slide');
    }
}
