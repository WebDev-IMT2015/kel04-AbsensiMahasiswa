
@extends('layouts.app')

@section('title','Mahasiswa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>DATA MAHASISWA KE {{ $post->id }}
                </h2>
                </div>

                <div class="panel-body">
                    <form action="{{ route('mahasiswa.update', $post->id) }}" method="post"> 
    <div class ="col-md-8">
        <label for="nim">Nim:</label>
            <textarea type="text" class="form-control input-md" id="nim" name="nim" rows="1" style="resize:none;">{{ $post->nim }}</textarea>

            <label for="nama">Nama:</label>
            <textarea type="text" class="form-control input-md" id="nama" name="nama" rows="1">{{ $post->nama }}</textarea>

            <label for="jurusan">Jurusan:</label>
            <textarea type="text" class="form-control input-md" id="jurusan" name="jurusan" rows="1">{{ $post->jurusan }}</textarea>

            <label for="angkatan">Angkatan:</label>
            <textarea type="text" class="form-control input-md" id="angkatan" name="angkatan" rows="1">{{ $post->angkatan }}</textarea>

            <label for="password">Password:</label>
            <textarea type="text" class="form-control input-md" id="password" name="password" rows="1">{{ $post->password }}</textarea>
           </div> 

    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>create at:</dt>
                <dd>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Last Updated:</dt>
                <dd>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                    <div class="col-sm-6">
                        <a href="{{  route('mahasiswa.show', $post->id, 'Cancel')  }}" class="btn btn-danger btn-block"> Cancel</a>﻿
                    </div>
                    <div class="col-sm-6">
                         <button type="submit" class="btn btn-success btn-block">Save Changes</button>
                    </div>
                </div>
        </div>
    </div>
    
   <input type="hidden" name="_method" value="PUT">
   <input type="hidden" name="_token" value="{{ Session::token() }}">  <!-- HARUS PAKE INI SUPAYA GA TOKEN ERROR EXXEPTION-->
  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection