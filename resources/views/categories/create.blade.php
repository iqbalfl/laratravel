@extends('adminlte::page')

@section('title', 'LaraTravel')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li><a href="{{ url('/admin/categories') }}">Categories</a></li>
          <li class="active">Add Categories</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Add Categories</h2>
          </div>
          <div class="panel-body">
            {!! Form::open(['url' => route('categories.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}
            @include('categories._form')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
