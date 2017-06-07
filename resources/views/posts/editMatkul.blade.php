
@extends('layouts.app')

@section('title','Mata Kuliah')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>DATA Mata Kuliah KE {{ $post->id }}
                </h2>
                </div>

                <div class="panel-body">
                    <form action="{{ route('matakuliah.update', $post->id) }}" method="post"> 
    <div class ="col-md-8">
        <label for="kodemk">Kode MK:</label>
            <textarea type="text" class="form-control input-md" id="kodemk" name="kodemk" rows="1" style="resize:none;">{{ $post->kodemk }}</textarea>

            <label for="nama">Nama:</label>
            <textarea type="text" class="form-control input-md" id="nama" name="nama" rows="1">{{ $post->nama }}</textarea>

            <label for="pengajar">Pengajar:</label>
            <textarea type="text" class="form-control input-md" id="pengajar" name="pengajar" rows="1">{{ $post->pengajar }}</textarea>

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
                        <a href="{{  route('matakuliah.show', $post->id, 'Cancel')  }}" class="btn btn-danger btn-block"> Cancel</a>﻿
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