<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Humas\BeritaModel;
use App\Models\Media\AlbumModel;
use App\Models\Media\FotoModel;
use App\Models\Media\VideoModel;
use App\Models\CustomModel;
use App\Models\VisitorModel;

class BeritaController extends BaseController
{
	protected $berita, $kategori, $album, $foto, $video, $visitor;

	public function __construct()
	{
		$this->berita = new BeritaModel();
		$this->album = new AlbumModel();
		$this->foto = new FotoModel();
		$this->video = new VideoModel();
		$this->kategori = new CustomModel();
		$this->visitor = new VisitorModel();
	}

	public function index($beritaKategori = null)
	{
		$this->visitor->hitungPengunjung();

		if ($beritaKategori == null) {
			$data = [
				'beritaData' => $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('created_date', 'desc')->paginate(6, 'berita'),
				'beritaDataTerbaru' => $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('created_date', 'desc')->limit(3)->find(),
				'pager' => $this->berita->pager,
			];
		} else {
			if ($beritaKategori == 'kesejahteraan-rakyat') {
				$beritaKategori = 'KESEJAHTERAAN RAKYAT';
			}

			if ($beritaKategori == 'perekonomian-dan-pembangunan') {
				$beritaKategori = 'PEREKONOMIAN DAN PEMBANGUNAN';
			}

			if ($beritaKategori == 'sosial-budaya') {
				$beritaKategori = 'SOSIAL BUDAYA';
			}

			$this->kategori = $this->kategori->whereCustom('kategori_berita', 'nama_kategori', $beritaKategori);
			$totalBeritaData = $this->berita->findAllWhereCustom('berita', 'detail_berita_kategori', 'detail_berita_kategori.id_news = berita.id_berita', 'detail_berita_kategori.id_kategori', $this->kategori->id_kategori, 'publish_date !=', null, 'publish_date', 'desc');

			$pager = service('pager');
			$page = (int) ($this->request->getGet('page') ?? 1);
			$perPage 	= 6;
			$totalPage  = count($totalBeritaData);
			$pager_links = $pager->makeLinks($page, $perPage, $totalPage, 'template_pager');

			$data = [
				'beritaData' => $this->berita->findAllWhereCustom('berita', 'detail_berita_kategori', 'detail_berita_kategori.id_news = berita.id_berita', 'detail_berita_kategori.id_kategori', $this->kategori->id_kategori, 'publish_date !=', null, 'publish_date', 'desc', $page, 6),
				'beritaDataTerbaru' => $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('created_date', 'desc')->limit(3)->find(),
				'pager' => $pager_links,
			];
		}

		return view('frontend/berita_selatan/berita_selatan', $data);
	}

	public function show($slug)
	{
		$this->visitor->hitungPengunjung();

		$beritaData = $this->berita->where('slug', $slug)->where('status', 1)->first();
		$beritaDataTerbaru = $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('created_date', 'desc')->limit(3)->find();

		$this->berita->updateCustom(
			'berita',
			'id_berita',
			$beritaData['id_berita'],
			[
				'pembaca' => $beritaData['pembaca'] + 1,
			]
		);

		$data = [
			'beritaData' => $beritaData,
			'beritaDataTerbaru' => $beritaDataTerbaru,
		];

		return view('frontend/berita_selatan/berita_selatan_show', $data);
	}

	public function pencarian()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'beritaData' => $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('created_date', 'desc')->like('judul', $this->request->getVar('pencarian'))->paginate(6, 'pencarian'),
			'beritaDataTerbaru' => $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('created_date', 'desc')->limit(3)->find(),
			'pager' => $this->berita->pager,
		];

		return view('frontend/berita_selatan/pencarian', $data);
	}

	public function kategori($kategori)
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'beritaData' => $this->berita->where('slug', $kategori)->first(),
			'beritaDataTerbaru' => $this->berita->where('status', 1)->where('publish_date !=', null)->orderBy('created_date', 'desc')->limit(3)->find(),
		];

		return view('frontend/berita_selatan/berita_selatan_show', $data);
	}

	// Galeri
	public function foto()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'albumData' => $this->album->where('status', 1)->orderBy('created_date', 'desc')->paginate(9, 'album'),
			'pager' => $this->album->pager,
		];

		return view('frontend/berita_selatan/galeri/foto', $data);
	}

	public function foto_show($id_album)
	{
		$this->visitor->hitungPengunjung();

		$albumData = $this->album->where('id_album', $id_album)->first();

		$data = [
			'albumData' => $albumData,
			'fotoData' => $this->foto->where('status', 1)->where('id_album', $albumData['id_album'])->find(),
		];

		return view('frontend/berita_selatan/galeri/foto_show', $data);
	}

	public function video()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'videoData' => $this->video->where('status', 1)->orderBy('created_date', 'desc')->paginate(9, 'video'),
			'pager' => $this->video->pager,
		];

		return view('frontend/berita_selatan/galeri/video', $data);
	}

	public function video_show($id_video)
	{
		$this->visitor->hitungPengunjung();

		$videoData = $this->video->where('id_video', $id_video)->first();

		$this->video->updateCustom(
			'video',
			'id_video',
			$videoData['id_video'],
			[
				'pembaca' => $videoData['pembaca'] + 1,
			]
		);

		$data = [
			'videoData' => $videoData,
		];

		return view('frontend/berita_selatan/galeri/video_show', $data);
	}
}
