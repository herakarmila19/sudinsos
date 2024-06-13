<?php

namespace App\Controllers\Backend\Media;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class AlbumController extends BaseController
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
            'albumData' => $this->custom->findAllWhereCustom('album', 'created_date', 'desc', 'status', 1)
        ];

        return view('backend/media/album/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/media/album/new', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'judul_album' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'deskripsi_album' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
        ])) {
            return redirect()->to('admin/album/new')->withInput();
        }

        $id_album = date("YmdHis");
        // $path_album = '';

        foreach ($this->request->getFileMultiple('path_foto') as $no => $fileData) {
            $fileName = date('YmdHi') . '_' . $fileData->getClientName();
            $fileName = preg_replace("/[^a-z0-9\_\-\.]/i", '_', $fileName);
            $fileData->move('upload/foto/', $fileName);

            if ($no == 0) {
                $path_album = $fileName;
            }

            $this->custom->insertCustom(
                'foto',
                [
                    'id_foto' => date("YmdHis") . $no,
                    'id_album' => $id_album,
                    'judul_foto' => $this->request->getVar('judul_foto[' . $no . ']'),
                    'deskripsi_foto' => $this->request->getVar('deskripsi_foto[' . $no . ']'),
                    'path_foto' => $fileName,
                    "status" => 1,
                    "created_by" => $_SESSION['id'],
                    "created_date" => date("Y-m-d H:i:s"),
                ]
            );
        }

        $this->custom->insertCustom(
            'album',
            [
                'id_album' => $id_album,
                'judul_album' => $this->request->getVar('judul_album'),
                'path_album' => $path_album,
                'deskripsi_album' => $this->request->getVar('deskripsi_album'),
                "status" => 1,
                "created_by" => $_SESSION['id'],
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Album Berhasil Ditambah');

        return redirect()->to('admin/album');
    }

    public function show($id)
    {
        $data = [
            'albumData' => $this->custom->whereCustom('album', 'id_album', $id),
            'fotoData' => $this->custom->findAllWhereCustomDua('foto', 'created_date', 'asc', 'id_album', $id, 'status', 1)
        ];

        return view('backend/media/album/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'albumData' => $this->custom->whereCustom('album', 'id_album', $id),
            'validation' => $this->validation,
            'fotoData' => $this->custom->findAllWhereCustomDua('foto', 'created_date', 'asc', 'id_album', $id, 'status', 1)
        ];

        return view('backend/media/album/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul_album' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'deskripsi_album' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
        ])) {
            return redirect()->to('admin/album/' . $id . '/edit')->withInput();
        }

        // Reset Foto by id_album
        $this->custom->updateCustom(
            'foto',
            'id_album',
            $id,
            [
                'status' => 0,
                "modified_by" => $_SESSION['id'],
                "modified_date" => date("Y-m-d H:i:s"),
            ]
        );

        foreach ($this->request->getFileMultiple('path_foto') as $no => $fileData) {
            if ($fileData->getError() == 4) {
                $fileName = $this->request->getVar('path_fotoLama[' . $no . ']');
            } else {
                $fileName = date('YmdHi') . '_' . $fileData->getClientName();
                $fileName = preg_replace("/[^a-z0-9\_\-\.]/i", '_', $fileName);
                $fileData->move('upload/foto/', $fileName);
            }

            if ($no == 0) {
                $path_album = $fileName;
            }

            if (is_null($this->request->getVar('id_foto[' . $no . ']'))) {
                $this->custom->insertCustom(
                    'foto',
                    [
                        'id_foto' => date("YmdHis") . $no,
                        'id_album' => $id,
                        'judul_foto' => $this->request->getVar('judul_foto[' . $no . ']'),
                        'deskripsi_foto' => $this->request->getVar('deskripsi_foto[' . $no . ']'),
                        'path_foto' => $fileName,
                        "status" => 1,
                        "created_by" => $_SESSION['id'],
                        "created_date" => date("Y-m-d H:i:s"),
                    ]
                );
            } else {
                $this->custom->updateCustom(
                    'foto',
                    'id_foto',
                    $this->request->getVar('id_foto[' . $no . ']'),
                    [
                        'id_foto' => $this->request->getVar('id_foto[' . $no . ']'),
                        'judul_foto' => $this->request->getVar('judul_foto[' . $no . ']'),
                        'deskripsi_foto' => $this->request->getVar('deskripsi_foto[' . $no . ']'),
                        'path_foto' => $fileName,
                        'status' => 1,
                        "modified_by" => $_SESSION['id'],
                        "modified_date" => date("Y-m-d H:i:s"),
                    ]
                );
            }
        }

        // Update Album
        $this->custom->updateCustom('album', 'id_album', $id, [
            'judul_album' => $this->request->getVar('judul_album'),
            'deskripsi_album' => $this->request->getVar('deskripsi_album'),
            'path_album' => $path_album,
            'modified_by' => $_SESSION['id'],
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Album Berhasil Diubah');

        return redirect()->to('admin/album');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('album', 'id_album', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Album Berhasil Dihapus');

        return redirect()->to('admin/album');
    }
}
