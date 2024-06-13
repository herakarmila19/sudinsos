<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Humas\AgendaModel;
use App\Models\Pemerintahan\PejabatModel;
use App\Models\Pemerintahan\PrestasiKerjaModel;
use App\Models\Pemerintahan\BankDataModel;
use App\Models\Manajemen\MenuModel;
use App\Models\Media\RegulasiModel;
use App\Models\CustomModel;
use App\Models\VisitorModel;

class PemerintahanController extends BaseController
{
	protected $agenda, $pejabat, $prestasi_kerja, $bank_data, $regulasi, $menu, $custom, $visitor;

	public function __construct()
	{
		$this->agenda = new AgendaModel();
		$this->pejabat = new PejabatModel();
		$this->prestasi_kerja = new PrestasiKerjaModel();
		$this->bank_data = new BankDataModel();
		$this->regulasi = new RegulasiModel();
		$this->menu = new MenuModel();
		$this->custom = new CustomModel();
		$this->visitor = new VisitorModel();
	}

	

	public function perangkat_kelurahan()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'lurah' => $this->menu->where('judul', 'Pemerintahan - Perangkat Kelurahan - Lurah')->first(),
			'strukturOrganisasi' => $this->menu->where('judul', 'Pemerintahan - Perangkat Kelurahan - Struktur Organisasi')->first(),
			'tugasFungsi' => $this->menu->where('judul', 'Pemerintahan - Perangkat Kelurahan - Tugas Fungsi')->first(),
			'lmk' => $this->menu->where('judul', 'Pemerintahan - Perangkat Kelurahan - LMK')->first(),
		];

		return view('frontend/pemerintahan/perangkat_kelurahan', $data);
	}

	public function layanan()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'standarPelayanan' => $this->menu->where('judul', 'Pemerintahan - Layanan - Standar Pelayanan')->first(),
			'pelayananPtsp' => $this->menu->where('judul', 'Pemerintahan - Layanan - Pelayanan PTSP')->first(),
		];

		return view('frontend/pemerintahan/layanan', $data);
	}

	public function pejabat($pejabat)
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'pejabat' => $pejabat,
			// Walikota Terdahulu
			'walikotaTerdahulu' => $this->pejabat->where('status', 1)->where('kategori', 'Walikota Terdahulu')->orderBy('jabatan', 'asc')->find(),
			'walikotaTerdahuluCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'walikotaTerdahuluModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),
			// Walikota
			'walikota' => $this->menu->where('judul', 'Pemerintahan - Pejabat - Walikota')->first(),
			// Wakil Walikota
			'wakilWalikota' => $this->menu->where('judul', 'Pemerintahan - Pejabat - Wakil Walikota')->first(),
			// Pejabat Teras
			'terasData' => $this->pejabat->where('status', 1)->where('kategori', 'Pejabat Teras')->find(),
			'terasDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'terasDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),
			// ESELON III
			'eselonData' => $this->pejabat->where('status', 1)->where('kategori', 'ESELON III')->find(),
			'eselonDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'eselonDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			//  Camat & Lurah
			'tebetData' => $this->pejabat->where('status', 1)->like('kategori', '- Tebet')->find(),
			'tebetDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'tebetDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			'setiabudiData' => $this->pejabat->where('status', 1)->like('kategori', '- Setiabudi')->find(),
			'setiabudiDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'setiabudiDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			'mampangPrapatanData' => $this->pejabat->where('status', 1)->like('kategori', '- Mampang Prapatan')->find(),
			'mampangPrapatanDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'mampangPrapatanDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			'pasarMingguData' => $this->pejabat->where('status', 1)->like('kategori', '- Pasar Minggu')->find(),
			'pasarMingguDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'pasarMingguDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			'kebayoranLamaData' => $this->pejabat->where('status', 1)->like('kategori', '- Kebayoran Lama')->find(),
			'kebayoranLamaDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'kebayoranLamaDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			'cilandakData' => $this->pejabat->where('status', 1)->like('kategori', '- Cilandak')->find(),
			'cilandakDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'cilandakDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			'kebayoranBaruData' => $this->pejabat->where('status', 1)->like('kategori', '- Kebayoran Baru')->find(),
			'kebayoranBaruDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'kebayoranBaruDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			'pancoranData' => $this->pejabat->where('status', 1)->like('kategori', '- Pancoran')->find(),
			'pancoranDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'pancoranDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			'jagakarsaData' => $this->pejabat->where('status', 1)->like('kategori', '- Jagakarsa')->find(),
			'jagakarsaDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'jagakarsaDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			'pesanggrahanData' => $this->pejabat->where('status', 1)->like('kategori', '- Pesanggrahan')->find(),
			'pesanggrahanDataCreatedDate' => $this->pejabat->orderBy('created_date', 'desc')->first(),
			'pesanggrahanDataModifiedDate' => $this->pejabat->orderBy('modified_date', 'desc')->first(),

			// KETUA CAMAT & WAKIL CAMAT
			'camat' => $this->menu->where('judul', 'Pemerintahan - Pejabat - Walikota')->first(),
			'wakilCamat' => $this->menu->where('judul', 'Pemerintahan - Pejabat - Walikota')->first(),
		];

		return view('frontend/pemerintahan/pejabat', $data);
	}

	public function wilayah($wilayah)
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'wilayah' => $wilayah,
			'kota' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Kota Administrasi Jakarta Selatan')->first(),
			'tebet' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Tebet')->first(),
			'setiabudi' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Setiabudi')->first(),
			'mampangPrapatan' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Mampang Prapatan')->first(),
			'pasarMinggu' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Pasar Minggu')->first(),
			'kebayoranLama' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Kebayoran Lama')->first(),
			'cilandak' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Cilandak')->first(),
			'kebayoranBaru' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Kebayoran Baru')->first(),
			'pancoran' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Pancoran')->first(),
			'jagakarsa' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Jagakarsa')->first(),
			'pesanggrahan' => $this->menu->where('judul', 'Pemerintahan - Wilayah - Pesanggrahan')->first(),
		];

		return view('frontend/pemerintahan/wilayah', $data);
	}

	public function bank_data()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'pasarData' => $this->bank_data->where('status', 1)->where('jenis', 'Pasar')->find(),
			'pasarDataCreatedDate' => $this->bank_data->orderBy('created_date', 'desc')->first(),
			'pasarDataModifiedDate' => $this->bank_data->orderBy('modified_date', 'desc')->first(),

			'hotelData' => $this->bank_data->where('status', 1)->where('jenis', 'Hotel')->find(),
			'hotelDataCreatedDate' => $this->bank_data->orderBy('created_date', 'desc')->first(),
			'hotelDataModifiedDate' => $this->bank_data->orderBy('modified_date', 'desc')->first(),

			'dataData' => $this->bank_data->where('status', 1)->where('jenis', 'Data')->orderBy('nama', 'desc')->find(),
			'dataDataCreatedDate' => $this->bank_data->orderBy('created_date', 'desc')->first(),
			'dataDataModifiedDate' => $this->bank_data->orderBy('modified_date', 'desc')->first(),
		];

		return view('frontend/pemerintahan/bank_data', $data);
	}

	public function agenda()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'agendaData' => $this->agenda->where('status', 1)->where('publish', 1)->orderBy('tanggal_acara', 'desc')->paginate(5, 'agenda'),
			'kategoriData' => $this->custom->findAllCustom('kategori_agenda'),
			'pager' => $this->agenda->pager,
		];

		return view('frontend/pemerintahan/agenda', $data);
	}

	public function regulasi()
	{
		$this->visitor->hitungPengunjung();

		$data = [
			'regulasiData' => $this->regulasi->where('status', 1)->orderBy('created_date', 'desc')->paginate(5, 'regulasi'),
			'pager' => $this->regulasi->pager,
		];

		return view('frontend/pemerintahan/regulasi', $data);
	}

	public function regulasi_unduh($title)
	{
		$this->visitor->hitungPengunjung();

		$regulasiData = $this->regulasi->where('title', $title)->first();

		$this->regulasi->updateCustom(
			'regulasi',
			'id_regulasi',
			$regulasiData['id_regulasi'],
			[
				'didownload' => $regulasiData['didownload'] + 1,
			]
		);

		return redirect()->to('upload/regulasi/' . $regulasiData['path_regulasi']);
	}
}
