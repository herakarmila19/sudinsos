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
			'bannerData' => $this->banner->where('deleted', 0)->where('place', 1)->where('publish_date <=', date('Y-m-d H:i:s'))->where('end_date >=', date('Y-m-d H:i:s'))->find(),
			'slideData' => $this->slide->where('status', 1)->orderBy('created_date', 'desc')->find(),
			'visiMisiData' => $this->visiMisi->where('status', 1)->orderBy('created_date', 'asc')->find(),
			'agendaData' => $this->agenda->where('status', 1)->where('publish', 1)->orderBy('tanggal_acara', 'desc')->limit(2)->find(),
			'kategoriData' => $this->custom->findAllCustom('kategori_agenda'),
			'beritaData' => $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('publish_date', 'desc')->limit(3)->find(),
			'videoData' => $this->video->where('status', 1)->where('created_date !=', null)->orderBy('created_date', 'desc')->limit(6)->find(),
			'totalBerita' => $this->berita->where('status', 1)->countAllResults(),
			'totalVideo' => $this->video->where('status', 1)->countAllResults(),
			'totalPengunjung' => $this->visitor->sumAllCustom('jumlah'),
		];

		return view('frontend/beranda', $data);
	}

	public function menu($url)
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'menuData' => $this->menu->where('status', 1)->where('publish', 1)->where('url', $url)->first(),
			'beritaDataTerbaru' => $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('publish_date', 'desc')->limit(3)->find(),
		];

		if (isset($data['menuData'])) {
			return view('frontend/menu', $data);
		} else {
			return redirect('/');
		}
	}

	public function menu_custom()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'menuData' => $this->menu->where('status', 1)->where('publish', 1)->where('url', 'kominfotik-rekrutmen')->first(),
			'beritaDataTerbaru' => $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('publish_date', 'desc')->limit(3)->find(),
		];

		if (isset($data['menuData'])) {
			return view('frontend/menu', $data);
		} else {
			return redirect('/');
		}
	}

	public function files($name)
	{
		$file = "upload/files/" . $name;

		if (!file_exists($file)) {
			return redirect('/');
		} else {
			$fp = fopen($file, 'rb');
		}

		if (!is_readable($file)) {
			return redirect('/');
		} else {
			$fp = fopen($file, 'rb');
		}

		$tipe = "";
		$arr = "";
		$tipe = explode('.', $name);
		$arr = count($tipe) - 1;

		$filetype = array(
			'pdf' => 'application/pdf',
			'zip' => 'application/zip',
			'rar' => 'application/x-rar',
			'gif' => 'image/gif',
			'png' => 'image/png',
			'jpeg' => 'image/jpeg',
			'jpg' => 'image/jpg',
			'JPG' => 'image/jpg',
			'doc' => 'application/msword',
			'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		);

		if (array_key_exists($tipe[$arr], $filetype)) {
			if ($tipe[$arr] == 'png' or $tipe[$arr] == 'jpeg' or $tipe[$arr] == 'jpg' or $tipe[$arr] == 'gif') {
				http_response_code(200);
				header("Content-Type: image/" . $tipe[$arr]);
				header("Content-Length: " . filesize($file));
				fpassthru($fp);
				exit;
			} else {
				http_response_code(200);
				header("Content-Type: " . $filetype[$tipe[$arr]]);
				header('Content-Disposition: inline; filename="' . $name . '"');
				header('Content-Transfer-Encoding: binary');
				header('Content-Length: ' . filesize($file));
				header('Accept-Ranges: bytes');

				readfile($file);
				exit;
			}
		} else {
			return redirect('/');
		}
	}

	// profil
	public function profil()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'fotoPetaLokasi' => $this->menu->where('judul', 'Pemerintahan - Profil - Foto Peta Lokasi')->first(),
			'sejarah' => $this->menu->where('judul', 'Pemerintahan - Profil - Sejarah')->first(),
			'geografi' => $this->menu->where('judul', 'Pemerintahan - Profil - Geografi')->first(),
			'demografi' => $this->menu->where('judul', 'Pemerintahan - Profil - Demografi')->first(),
		];

		return view('frontend/pemerintahan/profil', $data);
	}
}
