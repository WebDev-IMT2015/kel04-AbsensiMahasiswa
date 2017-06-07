@extends('layouts.app')

@section('title','Tambah Mahasiswa Baru')

@section('content')

	<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Tambah Mahasiswa Baru</h1>
    <hr>

    <form method="POST" action="{{ route('mahasiswa.store') }}">
      <div class="form-group">
        <label name="nim">NIM :</label>
        <input id="nim" name="nim" class="form-control">
      </div>

      <div class="form-group">
        <label name="nama">NAMA :</label>
        <input id="nama" name="nama" class="form-control">
      </div>

      <div class="form-group">
        <label name="jurusan">JURUSAN :</label>
        <input id="jurusan" name="jurusan" class="form-control">
      </div>

      <div class="form-group">
        <label name="angkatan">ANGKATAN :</label>
        <input id="angkatan" name="angkatan" class="form-control">
      </div>

      <div class="form-group">
        <label name="password">PASSWORD :</label>
        <input id="password" name="password" class="form-control">
      </div>

      <input type="submit" value="Tambah Mahasiswa " class="btn btn-success btn-lg btn-block">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>

  </div>
</div>﻿

@endsection