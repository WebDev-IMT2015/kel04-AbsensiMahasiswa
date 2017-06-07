<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostMatkul;
use Session;

class MatkulController extends Controller
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
        $posts = PostMatkul::all();
        //return a view and pass in the above variable
        return view('posts.indexMatkul')->withPosts($posts);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.createMatkul');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'kodemk' =>'required',
            'nama' =>'required',
            'pengajar' =>'required'
            ));

        //store in database
        $post = new PostMatkul;

        $post->kodemk = $request->kodemk;
        $post->nama = $request->nama;
        $post->pengajar = $request->pengajar;

        $post->save();

        //bisa pake put juga tapi permanent
        Session::flash('success','Mata Kuliah Berhasil Tersimpan!');

        return redirect()->route('matakuliah.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostMatkul::find($id); //disimpan di dalm variable post
        return view('posts.showMatkul')->with('post',$post); //di halaman post.show akan ditampilkan isi variable tersebut
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
        $post = PostMatkul::find($id);
        //return the view and pass the var that is previously xreated
        return view('posts.editMatkul')->withPost($post);
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
        //validate the data
        $this->validate($request,array(
            'kodemk' =>'required',
            'nama' =>'required',
            'pengajar' =>'required'
            ));


        //save the data to the database
        $post = PostMatkul::find($id);

        $post->kodemk = $request->input('kodemk');
        $post->nama = $request->input('nama');
        $post->pengajar = $request->input('pengajar');

        $post->save();

        //set flash data with sukses messages
        Session::flash('success', 'This post was successfully saved.');
        //redirext with flash data to posts.show
        return redirect()->route('matakuliah.show',$post->id);
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
