@extends('adminlte::page')

@section('content')
  <div class="container-fluid spark-screen">
  @include('layouts._flash')
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">Add Member</li>
        </ul>
        <div class="box">
          <div class="box-header with-border">
            <h2 class="box-title">Add Member</h2>
          </div>
          <div class="box-body">
            {!! Form::open(['url' => route('members.store'),'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
              @include('membersdata._form')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
