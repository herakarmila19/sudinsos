<?php

namespace App\Controllers\Backend\Media;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class RegulasiController extends BaseController
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
            'regulasiData' => $this->custom->findAllWhereCustom('regulasi', 'created_date', 'desc', 'status', 1)
        ];

        return view('backend/media/regulasi/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/media/regulasi/new', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'path_regulasi' => [
                'rules' => 'max_size[path_regulasi,10240]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 10 MB',
                ],
            ]
        ])) {
            return redirect()->to('admin/regulasi/new')->withInput();
        }

        $fileUnggah = $this->request->getFile('path_regulasi');
        $namaUnggah = date('YmdHi') . '_' . $fileUnggah->getClientName();
        $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '_', $namaUnggah);
        $fileUnggah->move('upload/regulasi/', $namaUnggah);

        $this->custom->insertCustom(
            'regulasi',
            [
                'id_regulasi' => date("YmdHis"),
                'title' => $this->request->getVar('title'),
                'path_regulasi' => $namaUnggah,
                "status" => 1,
                "created_by" => $_SESSION['id'],
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Regulasi Berhasil Ditambah');

        return redirect()->to('admin/regulasi');
    }

    public function show($id)
    {
        $data = [
            'regulasiData' => $this->custom->whereCustom('regulasi', 'id_regulasi', $id)
        ];

        return view('backend/media/regulasi/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'regulasiData' => $this->custom->whereCustom('regulasi', 'id_regulasi', $id),
            'validation' => $this->validation
        ];

        return view('backend/media/regulasi/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'path_regulasi' => [
                'rules' => 'max_size[path_regulasi,10240]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 10 MB',
                ],
            ]
        ])) {
            return redirect()->to('admin/regulasi/' . $id . '/edit')->withInput();
        }

        $fileUnggah = $this->request->getFile('path_regulasi');

        if ($fileUnggah->getError() == 4) {
            $namaUnggah = $this->request->getVar('path_regulasiLama');
        } else {
            $namaUnggah = date('YmdHi') . '_' . $fileUnggah->getClientName();
            $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '_', $namaUnggah);
            $fileUnggah->move('upload/regulasi', $namaUnggah);
        }

        $this->custom->updateCustom('regulasi', 'id_regulasi', $id, [
            'title' => $this->request->getVar('title'),
            'path_regulasi' => $namaUnggah,
            'modified_by' => $_SESSION['id'],
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Regulasi Berhasil Diubah');

        return redirect()->to('admin/regulasi');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('regulasi', 'id_regulasi', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Regulasi Berhasil Dihapus');

        return redirect()->to('admin/regulasi');
    }
}
