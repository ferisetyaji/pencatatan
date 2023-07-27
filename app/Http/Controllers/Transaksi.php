<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\kategoriModel;
use App\Models\transaksiModel;
use Illuminate\Support\Facades\Validator;
use Session;

class Transaksi extends Controller
{
	public function index(Request $req)
	{

		if(!empty($req->dari) && !empty($req->ke)){
			$transaksi = transaksiModel::select('*')->whereBetween('created_at', [$req->dari, $req->ke])->get();
			$data['dari'] = $req->dari;
			$data['ke'] = $req->ke;
			$pemasukan = transaksiModel::where('jenis_transaksi', 'Pemasukan')->whereBetween('created_at', [$req->dari, $req->ke])->sum('nominal');
			$pengeluaran = transaksiModel::where('jenis_transaksi', 'Pengeluaran')->whereBetween('created_at', [$req->dari, $req->ke])->sum('nominal');
		}else{
			$transaksi = transaksiModel::select('*')->whereMonth('created_at', '07')->get();
			$pemasukan = transaksiModel::where('jenis_transaksi', 'Pemasukan')->whereMonth('created_at', '07')->sum('nominal');
			$pengeluaran = transaksiModel::where('jenis_transaksi', 'Pengeluaran')->whereMonth('created_at', '07')->sum('nominal');
		}

		$data['saldo'] = $pemasukan - $pengeluaran;
		$data['transaksi'] = $transaksi;
		return view('admin/transaksi', $data);
	}

	public function action_transaksi($id = '')
	{
		$title = 'Tambah ';
		$action_url = 'action_tambah_transaksi';

		if(!empty($id)){
			$transaksi = transaksiModel::select('*')->where('id', $id)->first();
			$data['transaksi'] = $transaksi;
			$data['kategori'] = kategoriModel::select('*')->where('tipe', $transaksi->jenis_transaksi)->get();
			$title = 'Edit ';
			$action_url = 'action_edit_transaksi';
		}else{
			$data['kategori'] = kategoriModel::select('*')->where('tipe', 'Pemasukan')->get();
		}

		$data['title'] = $title;
		$data['action_url'] = $action_url;

		return view('admin/transaksi_form', $data);
	}

	public function action_tambah_transaksi(Request $req)
	{
		$validator = Validator::make($req->all(), [
        	'nominal' => 'required|numeric',
        	'deskripsi' => 'required',
    	]);

    	if ($validator->fails()) {
            return redirect()
            			->route('tambah_transaksi')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		if($req->has('save')){
			$kategori = kategoriModel::select('*')->where('id', $req->input('kategori'))->first();
			transaksiModel::create([
				'jenis_transaksi' => $req->input('jenis_transaksi'),
				'id_kategori' => $req->input('kategori'),
				'nama_kategori' => $kategori->nama_kategori,
				'nominal' => $req->input('nominal'),
				'deskripsi' => $req->input('deskripsi')
			]);

			return redirect()->route('transaksi');
		}
	}

	public function action_edit_transaksi(Request $req)
	{
		$validator = Validator::make($req->all(), [
        	'nominal' => 'required|numeric',
        	'deskripsi' => 'required',
    	]);

    	if ($validator->fails()) {
            return redirect()
            			->route('tambah_transaksi')
                        ->withErrors($validator)
                        ->withInput();
        }

		if($req->has('save')){
			$kategori = kategoriModel::select('*')->where('id', $req->input('kategori'))->first();
			transaksiModel::where('id', $req->input('id'))->update([
				'jenis_transaksi' => $req->input('jenis_transaksi'),
				'id_kategori' => $req->input('kategori'),
				'nama_kategori' => $kategori->nama_kategori,
				'nominal' => $req->input('nominal'),
				'deskripsi' => $req->input('deskripsi')
			]);

			return redirect()->route('transaksi');
		}
	}

	public function action_del_transaksi(Request $req)
	{
   	
		transaksiModel::where('id', $req->input('del'))->delete();
		return redirect()->route('transaksi');
	}

	public function data_kategori(Request $req)
	{
		$kategori = kategoriModel::select('*')->where('tipe', $req->input('tipe'))->get();
		$items = json_encode($kategori);	
		return response($items, 200)->header('Content-Type', 'application/json');
	}
}