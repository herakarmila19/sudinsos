<?php

namespace App\Controllers\Backend\Pemerintahan;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class PrestasiKerjaController extends BaseController
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
            'prestasiKerjaData' => $this->custom->findAllWhereCustom('prestasi_kerja', 'created_date', 'desc', 'status', 1)
        ];

        return view('backend/pemerintahan/prestasi_kerja/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/pemerintahan/prestasi_kerja/new', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
        ])) {
            return redirect()->to('admin/prestasi-kerja/new')->withInput();
        }

        $this->custom->insertCustom(
            'prestasi_kerja',
            [
                'keterangan' => $this->request->getVar('keterangan'),
                'tahun' => $this->request->getVar('tahun'),
                "status" => 1,
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Prestasi Kerja Berhasil Ditambah');

        return redirect()->to('admin/prestasi-kerja');
    }

    public function show($id)
    {
        $data = [
            'prestasiKerjaData' => $this->custom->whereCustom('prestasi_kerja', 'id', $id)
        ];

        return view('backend/pemerintahan/prestasi_kerja/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'prestasiKerjaData' => $this->custom->whereCustom('prestasi_kerja', 'id', $id),
            'validation' => $this->validation
        ];

        return view('backend/pemerintahan/prestasi_kerja/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
        ])) {
            return redirect()->to('admin/prestasi-kerja/' . $id . '/edit')->withInput();
        }

        $this->custom->updateCustom('prestasi_kerja', 'id', $id, [
            'keterangan' => $this->request->getVar('keterangan'),
            'tahun' => $this->request->getVar('tahun'),
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Prestasi Kerja Berhasil Diubah');

        return redirect()->to('admin/prestasi-kerja');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('prestasi_kerja', 'id', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Prestasi Kerja Berhasil Dihapus');

        return redirect()->to('admin/prestasi-kerja');
    }
}