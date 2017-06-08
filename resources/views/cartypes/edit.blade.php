@extends('adminlte::page')

@section('title', 'LaraTravel')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
      		<li><a href="{{ url('/admin/cartypes') }}">Car Types</a></li>
      		<li class="active">Edit Car Types</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Edit Car Types</h2>
          </div>
          <div class="panel-body">
            {!! Form::model($cartype, ['url' => route('cartypes.update', $cartype->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
            @include('cartypes._form')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
