
@extends('layouts.app')

@section('title','Mahasiswa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>DATA MATA KULIAH KE {{ $post->id }}
                </h2>
                </div>

                <div class="panel-body">
                	<h3>NIM : {{ $post->kodemk }} </h3> 
                    <h3>NAMA : {{ $post->nama }} </h3>                 
                    <h3>ANGKATAN : {{ $post->pengajar }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection