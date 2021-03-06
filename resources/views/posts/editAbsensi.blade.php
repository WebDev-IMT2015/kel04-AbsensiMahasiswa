
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

                    <form action="{{ route('absensi.update', $post->id) }}" method="post"> 
    <div class ="col-md-8">
        <label for="nim">Nim:</label>
            <div class="form-group">
        <label name="nim"><h3>NIM :</h3></label> &nbsp;
        <select name ="mahasiswasn" class="selectpicker" data-live-search="true" data-width="500px" title="Klik Nim Yang ingin Dipilih">
        @foreach($nim as $nm)
          <option value="{{ $nm->nim }}">{{ $nm->nim}}</option>
        @endforeach
      </select>
      </div>

      <div class="form-group">
        <label name="matkul"><h3>&nbsp;MK :</h3></label> &nbsp;
        <select name ="matkulsn" class="selectpicker" data-live-search="true" data-width="500px" title="Klik Mata Kuliah Yang ingin Dipilih">
        @foreach($matkul as $mkl)
          <option value="{{ $mkl->nama }}">{{ $mkl->nama}}</option>
        @endforeach
      </select>
      </div>

      <div class="form-group">
        <label name="hari"><h3>&nbsp;Hari :</h3></label> &nbsp;
        <select name ="hari" class="selectpicker" data-live-search="true" data-width="500px" title="Pilih Hari yang diinginkan">
        
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Kamis">Kamis</option>
          <option value="Jumat">Jumat</option>
          <option value="Sabtu">Sabtu</option>
          <option value="Minggu">Minggu</option>
      </select>
      </div>


      <div class="form-group">
        <label name="status"><h3>&nbsp;MK :</h3></label> &nbsp;
        <select name ="status" class="selectpicker" data-live-search="true" data-width="500px" title="Masuk/Absen">
          <option value="masuk">Masuk</option>
          <option value="absen">Absen</option>
      </select>
      </div>
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
                        <a href="{{  route('absensi.show', $post->id, 'Cancel')  }}" class="btn btn-danger btn-block"> Cancel</a>﻿
                    </div>
                    <div class="col-sm-6">
                         <button type="submit" class="btn btn-success btn-block">Update Absensi</button>
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