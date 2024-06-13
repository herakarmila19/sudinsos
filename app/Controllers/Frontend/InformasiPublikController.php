<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\VisitorModel;

class InformasiPublikController extends BaseController
{
	protected $visitor;

	public function __construct()
	{
		$this->visitor = new VisitorModel();
	}

	public function index()
	{
		$this->visitor->hitungPengunjung();

		return view('frontend/informasi_publik');
	}
}
