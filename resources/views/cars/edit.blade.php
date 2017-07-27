@extends('adminlte::page')

@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
      		<li><a href="{{ url('/admin/cars') }}">Car</a></li>
      		<li class="active">Edit Car</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Edit Car</h2>
          </div>
          <div class="panel-body">
            {!! Form::model($car, ['url' => route('cars.update', $car->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
            @include('cars._form')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
