<?php

namespace App\Controllers\Backend\Humas;

use App\Controllers\BaseController;
use App\Models\CustomModel;
use Config\Services;

class BeritaController extends BaseController
{
    protected $custom, $validation;

    public function __construct()
    {
        $this->custom = new CustomModel();
        $this->validation = Services::validation();
    }

    public function index()
    {
        return view('backend/humas/berita/index');
    }

    public function new()
    {
        $data = [
            'validation' => $this->validation,
        ];

        return view('backend/humas/berita/new', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'editor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'fotografer' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
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
            'isi_konten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'kategori' => [
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
            'thumbnail' => [
                'rules' => 'max_size[thumbnail,10240]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 10 MB',
                ],
            ]
        ])) {
            return redirect()->to('admin/berita/new')->withInput();
        }

        $id_berita = date("YmdHis") . 'berita';
        $id_berita_kategori = date("YmdHis") . 'kategori';
        if ($this->request->getVar('publish') == 0) {
            $publish_date = NULL;
        } else {
            $publish_date = date("Y-m-d H:i:s");
        }
        $fileUnggah = $this->request->getFile('thumbnail');
        $namaUnggah = date('YmdHi') . '_' . $fileUnggah->getClientName();
        $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '_', $namaUnggah);
        $fileUnggah->move('upload/thumbnail/', $namaUnggah);

        $this->custom->insertCustom(
            'berita',
            [
                'id_berita' => $id_berita,
                'judul' => $this->request->getVar('judul'),
                'slug' => url_title($this->request->getVar('judul')),
                'penulis' => $this->request->getVar('penulis') . ';' . $this->request->getVar('editor') . ';' . $this->request->getVar('fotografer'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'isi_konten' => $this->request->getVar('isi_konten'),
                'publish' => $this->request->getVar('publish'),
                "publish_date" => $publish_date,
                'thumbnail' => $namaUnggah,
                "status" => 1,
                "created_by" => $_SESSION['id'],
                "created_date" => date("Y-m-d H:i:s"),
            ]
        );

        $this->custom->insertCustom(
            'detail_berita_kategori',
            [
                'id_news_kategori' => $id_berita_kategori,
                'id_news' => $id_berita,
                'id_kategori' => $this->request->getVar('kategori'),
            ]
        );

        session()->setFlashdata('pesan_tambah', 'Data Berita Berhasil Ditambah');

        return redirect()->to('admin/berita');
    }

    public function show($id)
    {
        $beritaData = $this->custom->whereCustom('berita', 'id_berita', $id);
        $detailKategori = $this->custom->whereCustom('detail_berita_kategori', 'id_news', $beritaData->id_berita);
        if (!empty($detailKategori->id_kategori)) {
            $kategori = $this->custom->whereCustom('kategori_berita', 'id_kategori', $detailKategori->id_kategori);
        } else {
            $kategori = 'Tidak Terkategori';
        }

        $data = [
            'beritaData' => $beritaData,
            'kategoriData' => $kategori,
        ];

        return view('backend/humas/berita/show', $data);
    }

    public function edit($id)
    {
        $beritaData = $this->custom->whereCustom('berita', 'id_berita', $id);
        $detailKategori = $this->custom->whereCustom('detail_berita_kategori', 'id_news', $beritaData->id_berita);
        if (!empty($detailKategori->id_kategori)) {
            $kategori = $this->custom->whereCustom('kategori_berita', 'id_kategori', $detailKategori->id_kategori);
        } else {
            $kategori = 'Tidak Terkategori';
        }

        $data = [
            'beritaData' => $beritaData,
            'kategoriData' => $kategori,
            'validation' => $this->validation
        ];

        return view('backend/humas/berita/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'editor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'fotografer' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
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
            'isi_konten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Ini Harus Diisi'
                ]
            ],
            'kategori' => [
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
            'thumbnail' => [
                'rules' => 'max_size[thumbnail,10240]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 10 MB',
                ],
            ]
        ])) {
            return redirect()->to('admin/berita/' . $id . '/edit')->withInput();
        }

        if ($this->request->getVar('publish') == 0) {
            $publish_date = NULL;
        } else {
            $publish_date = date("Y-m-d H:i:s");
        }

        $fileUnggah = $this->request->getFile('thumbnail');

        if ($fileUnggah->getError() == 4) {
            $namaUnggah = $this->request->getVar('thumbnailLama');
        } else {
            $namaUnggah = date('YmdHi') . '_' . $fileUnggah->getClientName();
            $namaUnggah = preg_replace("/[^a-z0-9\_\-\.]/i", '_', $namaUnggah);
            $fileUnggah->move('upload/thumbnail/', $namaUnggah);
        }

        $this->custom->updateCustom('berita', 'id_berita', $id, [
            'id_berita' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul')),
            'penulis' => $this->request->getVar('penulis') . ';' . $this->request->getVar('editor') . ';' . $this->request->getVar('fotografer'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'isi_konten' => $this->request->getVar('isi_konten'),
            'publish' => $this->request->getVar('publish'),
            "publish_date" => $publish_date,
            'thumbnail' => $namaUnggah,
            "status" => 1,
            "modified_by" => $_SESSION['id'],
            "modified_date" => date("Y-m-d H:i:s"),
        ]);

        $this->custom->updateCustom(
            'detail_berita_kategori',
            'id_news',
            $id,
            [
                'id_kategori' => $this->request->getVar('kategori'),
            ]
        );

        session()->setFlashdata('pesan_ubah', 'Data Berita Berhasil Diubah');

        return redirect()->to('admin/berita');
    }

    public function delete($id)
    {
        $this->custom->updateCustom('berita', 'id_berita', $id, [
            'status' => 0
        ]);

        session()->setFlashdata('pesan_hapus', 'Data Berita Berhasil Dihapus');

        return redirect()->to('admin/berita');
    }
}
