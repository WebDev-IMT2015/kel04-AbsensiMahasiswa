<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostAbsensi;
use App\PostMahasiswa;
use App\PostMatkul;
use Session;

class AbsensiController extends Controller
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
        $posts = PostAbsensi::all();
        //$nim = DB::table('absensi')->get();

        //return a view and pass in the above variable
        return view('posts.indexAbsensi')->withPosts($posts);
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

        return view('posts.createAbsensi')->withNim($nim)->withMatkul($matkul);
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
            $post = new PostAbsensi;

            $post->nim = $request->get('mahasiswasn');
            $post->mk = $request->get('matkulsn');
            $post->hari = $request->get('hari');
            $post->status = $request->get('status');

            $post->save();

            //bisa pake put juga tapi permanent
            Session::flash('success','Data Mahasiswa Berhasil Tersimpan!');

            return redirect()->route('absensi.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostAbsensi::find($id); //disimpan di dalm variable post
        return view('posts.showAbsensi')->with('post',$post); //di halaman post.show akan ditampilkan isi variable tersebut
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
        $post = PostAbsensi::find($id);
        $nim = PostMahasiswa::all();
        $matkul = PostMatkul::all();
        //return the view and pass the var that is previously xreated
        return view('posts.editAbsensi')->withPost($post)->withNim($nim)->withMatkul($matkul);
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
        //save the data to the database
        $post = PostAbsensi::find($id);

        $post->nim = $request->get('mahasiswasn');
        $post->mk = $request->get('matkulsn');
        $post->hari = $request->get('hari');
        $post->status = $request->get('status');

        $post->save();

        //set flash data with sukses messages
        Session::flash('success', 'This post was successfully updated!.');
        //redirext with flash data to posts.show
        return redirect()->route('absensi.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PostAbsensi::find($id);
        //$posts = PostMahasiswa::all();

        //$post->delete();

        if ($post != null) {
        $post->delete();
        return redirect()->route('absensi.index')->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect()->route('absensi.index')->with(['message'=> 'Wrong ID!!']);
    }
}
