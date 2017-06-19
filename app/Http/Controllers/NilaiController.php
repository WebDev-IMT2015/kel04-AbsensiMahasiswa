<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostNilai;
use App\PostMahasiswa;
use App\PostMatkul;
use Session;

class NilaiController extends Controller
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
    { //pergi ke halaman utama langsung
        //create a variable and store all the blog post in it from the database
        $posts = PostNilai::all();
        //return a view and pass in the above variable
        return view('posts.indexNilai')->withPosts($posts);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nim = PostMahasiswa::all();
        $matkul = PostMatkul::all();

        return view('posts.createNilai')->withNim($nim)->withMatkul($matkul);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store in database
            $post = new PostNilai;

            $post->nim = $request->get('mahasiswasn');
            $post->mk = $request->get('matkulsn');
            $post->hari = $request->get('hari');

            $saa1 = $request->get('saa1');
            $saa2 = $request->get('saa2');
            $saa3 = $request->get('saa3');
            $uts = $request->get('uts');
            $uas = $request->get('uas');

            $post->saa1 = $request->get('saa1');
            $post->saa2 = $request->get('saa2');
            $post->saa3 = $request->get('saa3');
            $post->uts = $request->get('uts');
            $post->uas = $request->get('uas');
            $post->nilaiakhir = ($saa1 + $saa2 + $saa3 + $uts + $uas) / 5;

            $post->save();

            //bisa pake put juga tapi permanent
            Session::flash('success','Data Nilai Mahasiswa Berhasil Tersimpan!');

            return redirect()->route('nilai.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostNilai::find($id); //disimpan di dalm variable post
        return view('posts.showNilai')->with('post',$post); //di halaman post.show akan ditampilkan isi variable tersebut    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as variable
        $post = PostNilai::find($id);
        $nim = PostMahasiswa::all();
        $matkul = PostMatkul::all();
        //return the view and pass the var that is previously xreated
        return view('posts.editNilai')->withPost($post)->withNim($nim)->withMatkul($matkul);
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
        $post = PostNilai::find($id);

        $post->nim = $request->get('mahasiswasn');
        $post->mk = $request->get('matkulsn');
        $post->hari = $request->get('hari');
        $post->saa1 = $request->get('saa1');
        $post->saa2 = $request->get('saa2');
        $post->saa3 = $request->get('saa3');
        $post->uts = $request->get('uts');
        $post->uas = $request->get('uas');

        $post->save();

        //set flash data with sukses messages
        Session::flash('success', 'This post was successfully updated!.');
        //redirext with flash data to posts.show
        return redirect()->route('nilai.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PostNilai::find($id);
        //$posts = PostMahasiswa::all();

        //$post->delete();

        if ($post != null) {
        $post->delete();
        return redirect()->route('nilai.index')->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect()->route('nilai.index')->with(['message'=> 'Wrong ID!!']);
    }
}
