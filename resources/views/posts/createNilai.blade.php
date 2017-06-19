@extends('layouts.app')

@section('title','Tambah Nilai')

@section('content')



	<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Tambah Nilai</h1>
    <hr>

    <form method="POST" action="{{ route('nilai.store') }}">

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
        <label name="saa1">SAA1 :</label>
        <input id="saa1" name="saa1" class="form-control">
      </div>
      <div class="form-group">
        <label name="saa2">SAA2 :</label>
        <input id="saa2" name="saa2" class="form-control">
      </div>
      <div class="form-group">
        <label name="saa3">SAA3 :</label>
        <input id="saa3" name="saa3" class="form-control">
      </div>
      <div class="form-group">
        <label name="uts">UTS :</label>
        <input id="uts" name="uts" class="form-control">
      </div>
      <div class="form-group">
        <label name="uas">UAS :</label>
        <input id="uas" name="uas" class="form-control">
      </div>


      <input type="submit" value="Tambah Nilai " class="btn btn-success btn-lg btn-block">
      <input type="hidden" name="_token" value="{{ Session::token() }}">

    </form>

  </div>
</div>﻿

@endsection