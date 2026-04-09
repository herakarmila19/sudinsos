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
            'totalPengunjung' => 0,
            'totalMenu' => $this->custom->countAllCustom('menu'),
        ];

        return view('backend/dashboard', $data);
    }
}
