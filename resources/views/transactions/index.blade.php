@extends('adminlte::page')

@section('title', 'LaraTravel')

@section('content')
  <div class="container-fluid spark-screen">
  @include('layouts._flash')
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">Transaction</li>
        </ul>
        <div class="box">
          <div class="box-header with-border">
            <h2 class="box-title">Transaction</h2>
          </div>
          <div class="box-body">
            {!! $html->table(['class'=>'table-striped']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
{!! $html->scripts() !!}
@endsection
