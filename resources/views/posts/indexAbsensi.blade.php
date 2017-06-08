
@extends('layouts.app')

@section('title','Mahasiswa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Halaman Absensi</div>

                <div class="panel-body">
                <a href="{{ route('absensi.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Tambah Absensi</a>

                    <br>
                    <h3>TAMPILAN MAHASISWA : </h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <th>NIM</th>
                                        <th>MATA KULIAH</th>
                                        <th>HARI</th>
                                        <th>STATUS</th>
                                        <th></th>
                                    </thead>

                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                            <th>{{ $post->nim }}</th>
                                            <td>{{ $post->mk }}</td>
                                            <td>{{ $post->hari }}</td>
                                            <td>{{ $post->status }}</td>
                                            <td>
                                            <a href="{{ route('absensi.show',$post->id)}}" class="btn btn-default">Lihat</a> 
                                            <a href="{{ route('absensi.edit',$post->id) }}" class="btn btn-default">Edit</a>  
                                            <form method="POST" action="{{ route('absensi.destroy', $post->id) }}">
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