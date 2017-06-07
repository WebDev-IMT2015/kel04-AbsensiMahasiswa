@extends('layouts.app')

@section('title','Tambah Mata Kuliah Baru')

@section('content')

	<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Tambah Mahasiswa Baru</h1>
    <hr>

    <form method="POST" action="{{ route('matakuliah.store') }}">
      <div class="form-group">
        <label name="kodemk">Kode MK :</label>
        <input id="kodemk" name="kodemk" class="form-control">
      </div>

      <div class="form-group">
        <label name="nama">NAMA :</label>
        <input id="nama" name="nama" class="form-control">
      </div>

      <div class="form-group">
        <label name="pengajar">Pengajar :</label>
        <input id="pengajar" name="pengajar" class="form-control">
      </div>

      <input type="submit" value="Tambah Mata Kuliah " class="btn btn-success btn-lg btn-block">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>

  </div>
</div>﻿

@endsection