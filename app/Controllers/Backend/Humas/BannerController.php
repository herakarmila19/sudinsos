<?php

namespace App\Controllers\Backend\Humas;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class BannerController extends BaseController
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
            'bannerData' => $this->custom->findAllWhereCustom('banner', 'end_date', 'desc', 'deleted', 0)
        ];

        return view('backend/humas/banner/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/humas/banner/new', $data);
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
            'desc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'publish_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'end_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'place' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'position' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,10240]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 10 MB',
                ],
            ],
        ])) {
            return redirect()->to('admin/banner/new')->withInput();
        }

        $fileUnggah = $this->request->getFile('image');
        $namaUnggah = date('YmdHi') . '_' . $fileUnggah->getClientName();
        $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '_', $namaUnggah);
        $fileUnggah->move('upload/banner/', $namaUnggah);

        $this->custom->insertCustom(
            'banner',
            [
                'title' => $this->request->getVar('title'),
                'desc' => $this->request->getVar('desc'),
                'publish_date' => $this->request->getVar('publish_date'),
                'end_date' => $this->request->getVar('end_date'),
                'place' => $this->request->getVar('place'),
                'position' => $this->request->getVar('position'),
                'image' => $namaUnggah,
                'source' => $this->request->getVar('source'),
                "deleted" => 0,
                "created_by" => $_SESSION['id'],
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Banner Berhasil Ditambah');

        return redirect()->to('admin/banner');
    }

    public function show($id)
    {
        $data = [
            'bannerData' => $this->custom->whereCustom('banner', 'id_banner', $id)
        ];

        return view('backend/humas/banner/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'bannerData' => $this->custom->whereCustom('banner', 'id_banner', $id),
            'validation' => $this->validation
        ];

        return view('backend/humas/banner/edit', $data);
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
            'desc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'publish_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'end_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'place' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'position' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,10240]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 10 MB',
                ],
            ],
        ])) {
            return redirect()->to('admin/banner/' . $id . '/edit')->withInput();
        }

        $fileUnggah = $this->request->getFile('image');

        if ($fileUnggah->getError() == 4) {
            $namaUnggah = $this->request->getVar('imageLama');
        } else {
            $namaUnggah = date('YmdHi') . '_' . $fileUnggah->getClientName();
            $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '_', $namaUnggah);
            $fileUnggah->move('upload/banner', $namaUnggah);
        }

        $this->custom->updateCustom('banner', 'id_banner', $id, [
            'title' => $this->request->getVar('title'),
            'desc' => $this->request->getVar('desc'),
            'publish_date' => $this->request->getVar('publish_date'),
            'end_date' => $this->request->getVar('end_date'),
            'place' => $this->request->getVar('place'),
            'position' => $this->request->getVar('position'),
            'image' => $namaUnggah,
            'source' => $this->request->getVar('source'),
            'modified_by' => $_SESSION['id'],
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Banner Berhasil Diubah');

        return redirect()->to('admin/banner');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('banner', 'id_banner', $id, [
            'deleted' => 1
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Banner Berhasil Dihapus');

        return redirect()->to('admin/banner');
    }
}
