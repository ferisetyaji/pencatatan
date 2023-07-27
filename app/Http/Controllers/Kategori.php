<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\kategoriModel;
use Illuminate\Support\Facades\Validator;
use Session;

class Kategori extends Controller
{
	public function index()
	{
		$data['kategori'] = kategoriModel::select('*')->get();
		return view('admin/kategori', $data);
	}

	public function action_kategori($id = '')
	{
		$title = 'Tambah ';
		$action_url = 'action_tambah_kategori';

		if(!empty($id)){
			$title = 'Edit ';
			$action_url = 'action_edit_kategori';
			$data['kategori'] = kategoriModel::select('*')->where('id', $id)->first();
		}

		$data['title'] = $title;
		$data['action_url'] = $action_url;

		return view('admin/kategori_form', $data);
	}

	public function action_tambah_kategori(Request $req)
	{
		$validator = Validator::make($req->all(), [
        	'nama_kategori' => 'required',
        	'deskripsi_kategori' => 'required',
    	]);

    	if ($validator->fails()) {
            return redirect()
            			->route('tambah_kategori')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		if($req->has('save')){

			kategoriModel::create([
				'nama_kategori' => $req->input('nama_kategori'),
				'deskripsi_kategori' => $req->input('deskripsi_kategori'),
				'tipe' => $req->input('tipe'),
			]);

			return redirect()->route('kategori');
		}
	}

	public function action_edit_kategori(Request $req)
	{
		$validator = Validator::make($req->all(), [
        	'nama_kategori' => 'required',
        	'deskripsi_kategori' => 'required',
    	]);

    	if ($validator->fails()) {
            return redirect()
            			->route('edit_kategori')
                        ->withErrors($validator)
                        ->withInput();
        }

		if($req->has('save')){
			kategoriModel::where('id', $req->input('id'))->update([
				'nama_kategori' => $req->input('nama_kategori'),
				'deskripsi_kategori' => $req->input('deskripsi_kategori'),
				'tipe' => $req->input('tipe'),
			]);

			return redirect()->route('kategori');
		}
	}

	public function action_del_kategori(Request $req)
	{
   	
		kategoriModel::where('id', $req->input('del'))->delete();
		return redirect()->route('kategori');
	}
}