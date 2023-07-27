<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksiModel;

class Home extends Controller
{

	public function index()
	{
		$pemasukan = transaksiModel::where('jenis_transaksi', 'Pemasukan')->sum('nominal');
		$pengeluaran = transaksiModel::where('jenis_transaksi', 'Pengeluaran')->sum('nominal');

		$data['saldo'] = $pemasukan - $pengeluaran;
		$data['pemasukan'] = $pemasukan;
		$data['pengeluaran'] = $pengeluaran;
		return view('admin/home', $data);
	}
}