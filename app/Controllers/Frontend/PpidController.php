<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Manajemen\MenuModel;
use App\Models\VisitorModel;

class PpidController extends BaseController
{
	protected $menu, $visitor;

	public function __construct()
	{
		$this->menu = new MenuModel();
		$this->visitor = new VisitorModel();
	}

	public function profil()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'tentangPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Profil - Tentang')->first(),
			'dasarPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Profil - Dasar Hukum')->first(),
			'strukturPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Profil - Struktur Organisasi')->first(),
			'visiPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Profil - Visi & Misi')->first(),
			'maklumatPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Profil - Maklumat Informasi')->first(),
			'standardPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Profil - Standard Operating Procedure')->first(),
			'kontakPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Profil - Kontak')->first(),
		];

		return view('frontend/ppid/profil', $data);
	}

	public function alur_mekanisme()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'permohonanPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Alur Mekanisme - Permohonan PPID')->first(),
			'keberatanPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Alur Mekanisme - Keberatan PPID')->first(),
			'penangananPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Alur Mekanisme - Penanganan Sengketa Informasi')->first(),
			'penyelesaianPpid' => $this->menu->where('judul', 'PPID Jak-Sel - Alur Mekanisme - Permohonan Penyelesaian Sengketa Informasi')->first(),
		];

		return view('frontend/ppid/alur_mekanisme', $data);
	}
}
