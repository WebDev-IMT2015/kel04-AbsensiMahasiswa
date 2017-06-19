
@extends('layouts.app')

@section('title','Mahasiswa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>DATA NILAI MAHASISWA KE {{ $post->id }}
                </h2>
                </div>

                <div class="panel-body">
                	<h3>NIM : {{ $post->nim }} </h3> 
                    <h3>NAMA : {{ $post->mk }} </h3>                 
                    <h3>HARI : {{ $post->hari }}</h3>
                    <h3>SAA1 : {{ $post->saa1 }}</h3>
                    <h3>SAA2 : {{ $post->saa2 }}</h3>
                    <h3>SAA3 : {{ $post->saa3 }}</h3>
                    <h3>UTS : {{ $post->uts }}</h3>
                    <h3>UAS : {{ $post->uas }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection