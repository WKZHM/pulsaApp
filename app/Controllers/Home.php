<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\PenjualanModel;
use App\Models\PulsaModel;

class Home extends BaseController
{
	protected $memberModel;
	protected $pulsaModel;
	protected $penjualanModel;
	public function __construct()
	{
		$this->memberModel = new MemberModel();
		$this->pulsaModel = new PulsaModel();
		$this->penjualanModel = new PenjualanModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Penjualan Pulsa',
			'member' => $this->memberModel->getcountMember(),
			'pulsa' => $this->pulsaModel->getsaldo(),
			'penjualan' => $this->penjualanModel->getSUM()
		];
		return view('beranda/index', $data);
	}
}
