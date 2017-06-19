
@extends('layouts.app')

@section('title','Mahasiswa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Halaman Nilai</div>

                <div class="panel-body">
                <a href="{{ route('nilai.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Tambah Nilai</a>

                    <br>
                    <h3>TAMPILAN NILAI MAHASISWA : </h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <th>NIM</th>
                                        <th>MATA KULIAH</th>
                                        <th>HARI</th>
                                        <th>SAA1</th>
                                        <th>SAA2</th>
                                        <th>SAA3</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                        <th>NILAI AKHIR</th>
                                        <th></th>
                                    </thead>

                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                            <th>{{ $post->nim }}</th>
                                            <td>{{ $post->mk }}</td>
                                            <td>{{ $post->hari }}</td>
                                            <td>{{ $post->saa1 }}</td>
                                            <td>{{ $post->saa2 }}</td>
                                            <td>{{ $post->saa3 }}</td>
                                            <td>{{ $post->uts }}</td>
                                            <td>{{ $post->uas }}</td>
                                            <td>{{ $post->nilaiakhir }}</td>
                                            <td>
                                            <a href="{{ route('nilai.show',$post->id)}}" class="btn btn-default">Lihat</a> 
                                            <a href="{{ route('nilai.edit',$post->id) }}" class="btn btn-default">Edit</a>  
                                            <form method="POST" action="{{ route('nilai.destroy', $post->id) }}">
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