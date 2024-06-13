<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class DashboardController extends BaseController
{
    protected $custom;

    public function __construct()
    {
        $this->custom = new CustomModel();
    }

    public function dashboard()
    {
        $data = [
            // Data Manajemen
            'totalPengunjung' => $this->custom->sumAllCustom('visitor', 'jumlah'),
            'totalUser' => $this->custom->countAllCustom('user'),
            'totalMenu' => $this->custom->countAllCustom('menu'),

            // Data Pemerintahan
            'totalPejabat' => $this->custom->countAllCustom('pejabat'),
            'totalPrestasiKerja' => $this->custom->countAllCustom('prestasi_kerja'),
            'totalBankData' => $this->custom->countAllCustom('bank_data'),

            // Data Humas
            'totalBanner' => $this->custom->countAllCustom('banner'),
            'totalBerita' => $this->custom->countAllCustom('berita'),
            'totalAgenda' => $this->custom->countAllCustom('agenda'),

            // Data Media
            'totalFile' => $this->custom->countAllCustom('file'),
            'totalAlbum' => $this->custom->countAllCustom('album'),
            'totalVideo' => $this->custom->countAllCustom('video'),
            'totalRegulasi' => $this->custom->countAllCustom('regulasi'),
        ];

        return view('backend/dashboard', $data);
    }
}
