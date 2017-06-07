<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostMahasiswa;
use Session;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //create a variable and store all the blog post in it from the database
        $posts = PostMahasiswa::all();
        //return a view and pass in the above variable
        return view('posts.indexMahasiswa')->withPosts($posts);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.createMahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request,array(
            'nim' =>'required',
            'nama' =>'required',
            'jurusan' =>'required',
            'angkatan' =>'required',
            'password' =>'required'
            ));

        //store in database
        $post = new PostMahasiswa;

        $post->nim = $request->nim;
        $post->nama = $request->nama;
        $post->jurusan = $request->jurusan;
        $post->angkatan = $request->angkatan;
        $post->password = $request->password;

        $post->save();

        //bisa pake put juga tapi permanent
        Session::flash('success','Data Mahasiswa Berhasil Tersimpan!');

        return redirect()->route('mahasiswa.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostMahasiswa::find($id); //disimpan di dalm variable post
        return view('posts.showMahasiswa')->with('post',$post); //di halaman post.show akan ditampilkan isi variable tersebut
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
