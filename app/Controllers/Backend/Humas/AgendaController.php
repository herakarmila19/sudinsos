<?php

namespace App\Controllers\Backend\Humas;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class AgendaController extends BaseController
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
            'agendaData' => $this->custom->findAllWhereCustom('agenda', 'tanggal_acara', 'desc', 'status', 1)
        ];

        return view('backend/humas/agenda/index', $data);
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
            'kategoriData' => $this->custom->findAllCustom('kategori_agenda')
        ];

        return view('backend/humas/agenda/new', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'nama_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'deskripsi_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'tanggal_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'jam_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'menit_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'pejabat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'id_kategori_agenda' => [
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
            return redirect()->to('admin/agenda/new')->withInput();
        }

        $this->custom->insertCustom(
            'agenda',
            [
                'id_agenda' => date("YmdHis"),
                'nama_acara' => $this->request->getVar('nama_acara'),
                'deskripsi_acara' => $this->request->getVar('deskripsi_acara'),
                'tanggal_acara' => $this->request->getVar('tanggal_acara'),
                'jam_acara' => $this->request->getVar('jam_acara'),
                'menit_acara' => $this->request->getVar('menit_acara'),
                'pejabat' => $this->request->getVar('pejabat'),
                'lokasi' => $this->request->getVar('lokasi'),
                'id_kategori_agenda' => $this->request->getVar('id_kategori_agenda'),
                'publish' => $this->request->getVar('publish'),
                "status" => 1,
                "created_by" => $_SESSION['id'],
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Agenda Berhasil Ditambah');

        return redirect()->to('admin/agenda');
    }

    public function show($id)
    {
        $data = [
            'agendaData' => $this->custom->whereCustom('agenda', 'id_agenda', $id),
            'kategoriData' => $this->custom->findAllCustom('kategori_agenda')
        ];

        return view('backend/humas/agenda/show', $data);
    }

    public function edit($id)
    {
        $data = [
            'agendaData' => $this->custom->whereCustom('agenda', 'id_agenda', $id),
            'validation' => $this->validation,
            'kategoriData' => $this->custom->findAllCustom('kategori_agenda')
        ];

        return view('backend/humas/agenda/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'deskripsi_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'tanggal_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'jam_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'menit_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'pejabat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'id_kategori_agenda' => [
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
            return redirect()->to('admin/agenda/' . $id . '/edit')->withInput();
        }

        $this->custom->updateCustom('agenda', 'id_agenda', $id, [
            'nama_acara' => $this->request->getVar('nama_acara'),
            'deskripsi_acara' => $this->request->getVar('deskripsi_acara'),
            'tanggal_acara' => $this->request->getVar('tanggal_acara'),
            'jam_acara' => $this->request->getVar('jam_acara'),
            'menit_acara' => $this->request->getVar('menit_acara'),
            'pejabat' => $this->request->getVar('pejabat'),
            'lokasi' => $this->request->getVar('lokasi'),
            'id_kategori_agenda' => $this->request->getVar('id_kategori_agenda'),
            'publish' => $this->request->getVar('publish'),
            'modified_by' => $_SESSION['id'],
            'modified_date' => date("Y-m-d H:i:s"),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Agenda Berhasil Diubah');

        return redirect()->to('admin/agenda');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('agenda', 'id_agenda', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Agenda Berhasil Dihapus');

        return redirect()->to('admin/agenda');
    }
}
