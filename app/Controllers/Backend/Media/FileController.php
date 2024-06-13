<?php

namespace App\Controllers\Backend\Media;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class FileController extends BaseController
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
            'fileData' => $this->custom->findAllWhereCustom('file', 'created_date', 'desc', 'deleted', 0)
        ];

        return view('backend/media/file/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/media/file/new', $data);
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
            'source' => [
                'rules' => 'max_size[source,20480]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 20 MB',
                ],
            ]
        ])) {
            return redirect()->to('admin/file/new')->withInput();
        }

        $fileUnggah = $this->request->getFile('source');
        $namaUnggah = date('YmdHi') . '_' . $fileUnggah->getClientName();
        $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '_', $namaUnggah);
        $fileUnggah->move('upload/files/', $namaUnggah);

        $this->custom->insertCustom(
            'file',
            [
                'title' => $this->request->getVar('title'),
                'type' => '.' . $fileUnggah->getClientExtension(),
                'source' => $namaUnggah,
                "deleted" => 0,
                "created_by" => $_SESSION['id'],
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data File Berhasil Ditambah');

        return redirect()->to('admin/file');
    }

    public function show($id)
    {
        $data = [
            'fileData' => $this->custom->whereCustom('file', 'id_files', $id)
        ];

        return view('backend/media/file/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'fileData' => $this->custom->whereCustom('file', 'id_files', $id),
            'validation' => $this->validation
        ];

        return view('backend/media/file/edit', $data);
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
            'source' => [
                'rules' => 'max_size[source,20480]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 20 MB',
                ],
            ]
        ])) {
            return redirect()->to('admin/file/' . $id . '/edit')->withInput();
        }

        $fileUnggah = $this->request->getFile('source');

        if ($fileUnggah->getError() == 4) {
            $namaUnggah = $this->request->getVar('sourceLama');
            $namaType = $this->request->getVar('type');
        } else {
            $namaUnggah = date('YmdHi') . '_' . $fileUnggah->getClientName();
            $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '_', $namaUnggah);
            $fileUnggah->move('upload/files', $namaUnggah);
            $namaType = '.' . $fileUnggah->getClientExtension();
        }

        $this->custom->updateCustom('file', 'id_files', $id, [
            'title' => $this->request->getVar('title'),
            'type' => $namaType,
            'source' => $namaUnggah,
            'modified_by' => $_SESSION['id'],
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data File Berhasil Diubah');

        return redirect()->to('admin/file');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('file', 'id_files', $id, [
            'deleted' => 1
        ]);

        session()->setFlashdata('pesan_hapus', 'Data File Berhasil Dihapus');

        return redirect()->to('admin/file');
    }
}
