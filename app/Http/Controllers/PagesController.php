<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
	public function getMahasiswa()
	{
		return view('pages/mahasiswa');
	}

	public function getMatakuliah()
	{
		return view('pages/matakuliah');
	}

	public function getNilai()
	{
		return view('pages/nilai');
	}

	public function getAbsensi()
	{
		return view('pages/absensi');
	}

}
