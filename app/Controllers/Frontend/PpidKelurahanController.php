<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Manajemen\MenuModel;

class PpidKelurahanController extends BaseController
{
    protected $agenda, $pejabat, $prestasi_kerja, $bank_data, $regulasi, $menu, $custom;

    public function __construct()
    {
        $this->menu = new MenuModel();
    }

    public function index()
    {
        $data = [
            'daftarInformasiPublik' => $this->menu->where('judul', 'PPID - Daftar Informasi Publik')->first(),
            'formPermohonanInformasiPublik' => $this->menu->where('judul', 'PPID - Form Permohonan Informasi Publik')->first(),
            'laporanPelayananPpid' => $this->menu->where('judul', 'PPID - Laporan Pelayanan PPID')->first(),
            'prosedurPelayananInformasi' => $this->menu->where('judul', 'PPID - Prosedur Pelayanan Informasi')->first(),
            'strukturOrganisasiPpid' => $this->menu->where('judul', 'PPID - Struktur Organisasi PPID')->first(),
            'tugasFungsiPpid' => $this->menu->where('judul', 'PPID - Tugas dan Fungsi PPID')->first(),
            'waktuBiayaLayananInformasi' => $this->menu->where('judul', 'PPID - Waktu dan Biaya Layanan Informasi')->first(),
        ];

        return view('frontend/ppid_kelurahan/ppid_kelurahan', $data);
    }
}
