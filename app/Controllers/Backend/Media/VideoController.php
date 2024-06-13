<?php

namespace App\Controllers\Backend\Media;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class VideoController extends BaseController
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
            'videoData' => $this->custom->findAllWhereCustom('video', 'created_date', 'desc', 'status', 1)
        ];

        return view('backend/media/video/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/media/video/new', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'judul_video' => [
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
            'path_video' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
        ])) {
            return redirect()->to('admin/video/new')->withInput();
        }

        $this->custom->insertCustom(
            'video',
            [
                'id_video' => date("YmdHis"),
                'judul_video' => $this->request->getVar('judul_video'),
                'deskripsi' => $this->request->getVar('path_video'),
                'path_video' => 'embed-' . $this->request->getVar('deskripsi'),
                "status" => 1,
                "created_by" => $_SESSION['id'],
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Video Berhasil Ditambah');

        return redirect()->to('admin/video');
    }

    public function show($id)
    {
        $data = [
            'videoData' => $this->custom->whereCustom('video', 'id_video', $id)
        ];

        return view('backend/media/video/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'videoData' => $this->custom->whereCustom('video', 'id_video', $id),
            'validation' => $this->validation
        ];

        return view('backend/media/video/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul_video' => [
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
            'path_video' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
        ])) {
            return redirect()->to('admin/video/' . $id . '/edit')->withInput();
        }

        $this->custom->updateCustom('video', 'id_video', $id, [
            'judul_video' => $this->request->getVar('judul_video'),
            'deskripsi' => $this->request->getVar('path_video'),
            'path_video' => 'embed-' . $this->request->getVar('deskripsi'),
            'modified_by' => $_SESSION['id'],
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Video Berhasil Diubah');

        return redirect()->to('admin/video');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('video', 'id_video', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Video Berhasil Dihapus');

        return redirect()->to('admin/video');
    }
}
