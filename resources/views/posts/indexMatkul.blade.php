
@extends('layouts.app')

@section('title','Mahasiswa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Halaman Mata Kuliah</div>

                <div class="panel-body">
                    <form method="POST" action="createMtk">
                      <input type="submit" value=" + Tambah Mata Kuliah " class="btn btn-success btn-lg btn-block">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                    <br>
                    <h3>TAMPILAN MAHASISWA : </h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <th>Kode MK</th>
                                        <th>NAMA</th>
                                        <th>PENGAJAR</th>
                                        <th>DIBUAT PADA</th>
                                        <th></th>
                                    </thead>

                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                            <th>{{ $post->kodemk }}</th>
                                            <td>{{ $post->nama }}</td>
                                            <td>{{ $post->pengajar }}</td>
                                            <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                            <td>
                                            <a href="{{ route('matakuliah.show',$post->id)}}" class="btn btn-default">Lihat</a> 
                                            <a href="{{ route('matakuliah.edit',$post->id) }}" class="btn btn-default">Edit</a>  
                                            <form method="POST" action="{{ route('matakuliah.destroy', $post->id) }}">
                            <input type="submit" value="Delete" class="btn btn-danger btn-block">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                           {{ method_field('DELETE') }}
                        </form>﻿ 
                                            </td>
                                            
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection