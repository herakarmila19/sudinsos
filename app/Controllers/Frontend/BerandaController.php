<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Humas\BannerModel;
use App\Models\Media\VideoModel;
use App\Models\Manajemen\MenuModel;
use App\Models\SlideModel;
use App\Models\CustomModel;
use App\Models\Humas\AgendaModel;

class BerandaController extends BaseController
{
	protected $banner, $video, $menu, $slide, $custom, $agenda;

	public function __construct()
	{
		$this->banner = new BannerModel();
		$this->video = new VideoModel();
		$this->menu = new MenuModel();
		$this->slide = new SlideModel();
		$this->custom = new CustomModel();
		$this->agenda = new AgendaModel();
	}

	public function index()
	{
		$infografis = $this->menu->where('judul', 'Infografis')->first();
		if (empty($infografis)) {
			$infografis = $this->menu->where('judul', 'Info Grafis')->first();
		}

		$kegiatan = $this->menu->where('judul', 'Kegiatan')->first();

		// Fetch Kominfo Apps
		$apps = [];
		try {
			$apps = $this->custom->view('aplikasi', '*', null, 'urutan', 'ASC');
			$apps = $apps->getResult('array');
		} catch (\Exception $e) {
			// Tabel aplikasi tidak ada, lewatkan empty array
			$apps = [];
		}

		$data = [
			'infografis' => $infografis,
			'kegiatan' => $kegiatan,
			'kominfo_apps' => $apps,
		];

		return view('frontend/beranda', $data);
	}

	// profil main
	public function profil()
	{
		$data = [
			'visi_misi' => $this->menu->where('judul', 'Profil - Visi Misi')->first(),
			'maklumat_pelayanan' => $this->menu->where('judul', 'Profil - Maklumat Pelayanan')->first(),
			'kanal_aduan' => $this->menu->where('judul', 'Profil - Kanal Aduan')->first(),
			'kepuasan_masyarakat' => $this->menu->where('judul', 'Profil - Kepuasan Masyarakat')->first(),
		];

		return view('frontend/profil', $data);
	}

	// halaman dinamis (submenu profil & seksi)
	public function halaman($seg1, $seg2)
	{
		$url = $seg1 . '/' . $seg2;
		$menuData = $this->menu->where('url', $url)->first();
		
		if (!$menuData) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$data = [
			'menu' => $menuData,
		];

		return view('frontend/halaman', $data);
	}

	// pelayanan
	public function pelayanan()
	{
		$data = [
			'pelayanan' => $this->menu->where('judul', 'Pelayanan')->first(),
		];

		return view('frontend/pelayanan', $data);
	}
}
