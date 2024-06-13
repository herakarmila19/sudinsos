<?php

namespace App\Controllers\Backend\Pemerintahan;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class BankDataController extends BaseController
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
            'bankData' => $this->custom->findAllWhereCustom('bank_data', 'created_date', 'desc', 'status', 1)
        ];

        return view('backend/pemerintahan/bank_data/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/pemerintahan/bank_data/new', $data);
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
            'wilayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
        ])) {
            return redirect()->to('admin/bank-data/new')->withInput();
        }

        $this->custom->insertCustom(
            'bank_data',
            [
                'nama' => $this->request->getVar('nama'),
                'wilayah' => $this->request->getVar('wilayah'),
                'alamat' => $this->request->getVar('alamat'),
                'jenis' => $this->request->getVar('jenis'),
                "status" => 1,
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Bank Data Berhasil Ditambah');

        return redirect()->to('admin/bank-data');
    }

    public function show($id)
    {
        $data = [
            'bankData' => $this->custom->whereCustom('bank_data', 'id', $id)
        ];

        return view('backend/pemerintahan/bank_data/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'bankData' => $this->custom->whereCustom('bank_data', 'id', $id),
            'validation' => $this->validation
        ];

        return view('backend/pemerintahan/bank_data/edit', $data);
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
            'wilayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
        ])) {
            return redirect()->to('admin/bank-data/' . $id . '/edit')->withInput();
        }

        $this->custom->updateCustom('bank_data', 'id', $id, [
            'nama' => $this->request->getVar('nama'),
            'wilayah' => $this->request->getVar('wilayah'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis' => $this->request->getVar('jenis'),
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Bank Data Berhasil Diubah');

        return redirect()->to('admin/bank-data');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('bank_data', 'id', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Bank Data Berhasil Dihapus');

        return redirect()->to('admin/bank-data');
    }
}
