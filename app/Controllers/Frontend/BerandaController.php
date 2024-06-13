<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Humas\BannerModel;
use App\Models\Humas\BeritaModel;
use App\Models\Media\VideoModel;
use App\Models\Manajemen\MenuModel;
use App\Models\VisitorModel;
use App\Models\SlideModel;
use App\Models\VisiMisiModel;
use App\Models\CustomModel;
use App\Models\Humas\AgendaModel;

class BerandaController extends BaseController
{
	protected $banner, $berita, $video, $menu, $visitor, $slide, $visiMisi, $custom, $agenda;

	public function __construct()
	{
		$this->banner = new BannerModel();
		$this->berita = new BeritaModel();
		$this->video = new VideoModel();
		$this->menu = new MenuModel();
		$this->visitor = new VisitorModel();
		$this->slide = new SlideModel();
		$this->visiMisi = new VisiMisiModel();
		$this->custom = new CustomModel();
		$this->agenda = new AgendaModel();
	}

	public function index()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'slideData' => $this->slide->where('status', 1)->orderBy('created_date', 'desc')->find(),
			'visiMisiData' => $this->visiMisi->where('status', 1)->orderBy('created_date', 'asc')->find(),
			'beritaData' => $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('publish_date', 'desc')->limit(3)->find(),			
		];

		return view('frontend/beranda', $data);
	}

	// profil
	public function profil()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'visi_misi' => $this->menu->where('judul', 'Profil - Visi Misi')->first(),
			'maklumat_pelayanan' => $this->menu->where('judul', 'Profil - Maklumat Pelayanan')->first(),
			'kanal_aduan' => $this->menu->where('judul', 'Profil - Kanal Aduan')->first(),
			'kepuasan_masyarakat' => $this->menu->where('judul', 'Profil - Kepuasan Masyarakat')->first(),
		];

		return view('frontend/profil', $data);
	}

	// pelayanan
	public function pelayanan()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'pelayanan' => $this->menu->where('judul', 'Pelayanan')->first(),
		];

		return view('frontend/pelayanan', $data);
	}
}
