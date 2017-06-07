
@extends('layouts.app')

@section('title','Mahasiswa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Halaman Mahasiswa</div>

                <div class="panel-body">
                    <form method="POST" action="create">
                      <input type="submit" value=" + Tambah Mahasiswa " class="btn btn-success btn-lg btn-block">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                    <br>
                    <h3>TAMPILAN MAHASISWA : </h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <th>NIM</th>
                                        <th>NAMA</th>
                                        <th>ANGKATAN</th>
                                        <th>JURUSAN</th>
                                        <th>PASSWORD</th>
                                        <th>DIBUAT PADA</th>
                                        <th></th>
                                    </thead>

                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                            <th>{{ $post->nim }}</th>
                                            <td>{{ $post->nama }}</td>
                                            <td>{{ $post->angkatan }}</td>
                                            <td>{{ $post->jurusan }}</td>
                                            <td>{{ $post->password }}</td>
                                            <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                            <td>
                                            <a href="{{ route('mahasiswa.show',$post->id)}}" class="btn btn-default">Matkul</a> 
                                            <a href="{{ route('mahasiswa.edit',$post->id) }}" class="btn btn-default">Edit</a>  
                                            <a href="{{ route('mahasiswa.destroy',$post->id) }}" class="btn btn-default">Delete</a>    
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