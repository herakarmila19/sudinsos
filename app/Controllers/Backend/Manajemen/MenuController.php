<?php

namespace App\Controllers\Backend\Manajemen;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class MenuController extends BaseController
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
            'menuData' => $this->custom->findAllWhereCustom('menu', 'created_date', 'desc', 'status', 1)
        ];

        return view('backend/manajemen/menu/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/manajemen/menu/new', $data);
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
            'url' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'isi_konten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'publish' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
        ])) {
            return redirect()->to('admin/menu/new')->withInput();
        }

        $this->custom->insertCustom(
            'menu',
            [
                'id_menu' => date("YmdHis"),
                'judul' => $this->request->getVar('judul'),
                'url' => $this->request->getVar('url'),
                'isi_konten' => $this->request->getVar('isi_konten'),
                'publish' => $this->request->getVar('publish'),
                "status" => 1,
                "created_by" => $_SESSION['id'],
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Menu Berhasil Ditambah');

        return redirect()->to('admin/menu');
    }

    public function show($id)
    {
        $data = [
            'menuData' => $this->custom->whereCustom('menu', 'id_menu', $id)
        ];

        return view('backend/manajemen/menu/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'menuData' => $this->custom->whereCustom('menu', 'id_menu', $id),
            'validation' => $this->validation
        ];

        return view('backend/manajemen/menu/edit', $data);
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
            'url' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'isi_konten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'publish' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
        ])) {
            return redirect()->to('admin/menu/' . $id . '/edit')->withInput();
        }

        $this->custom->updateCustom('menu', 'id_menu', $id, [
            'judul' => $this->request->getVar('judul'),
            'url' => $this->request->getVar('url'),
            'isi_konten' => $this->request->getVar('isi_konten'),
            'publish' => $this->request->getVar('publish'),
            'modified_by' => $_SESSION['id'],
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Menu Berhasil Diubah');

        return redirect()->to('admin/menu');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('menu', 'id_menu', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Menu Berhasil Dihapus');

        return redirect()->to('admin/menu');
    }
}
