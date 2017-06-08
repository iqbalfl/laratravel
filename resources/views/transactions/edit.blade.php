@extends('adminlte::page')

@section('title', 'LaraTravel')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
      		<li><a href="{{ url('/admin/transactions') }}">Transaction</a></li>
      		<li class="active">Edit Transaction</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Edit Transaction</h2>
          </div>
          <div class="panel-body">
            {!! Form::model($transaction, ['url' => route('transactions.update', $transaction->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
            @include('transactions._form')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
