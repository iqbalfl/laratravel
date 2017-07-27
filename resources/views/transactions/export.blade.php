@extends('adminlte::page')

@section('content')
  <div class="container-fluid spark-screen">
  @include('layouts._flash')
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li><a href="{{ route('transactions.index') }}">Transactions</a></li>
          <li class="active">Transactions Report</li>
        </ul>
        <div class="box">
          <div class="box-header with-border">
            <h2 class="box-title">Transactions Report</h2>
          </div>
          <div class="box-body">

            {!! Form::open(['url' => route('export.transactions.post'),'method' => 'post', 'class'=>'form-horizontal']) !!}
            <div class="form-group {!! $errors->has('month') ? 'has-error' : '' !!}">
              {!! Form::label('name', 'Berdasarkan bulan', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-4">
                  {!! Form::select('month',[
                    '1'=>'Januari',
                    '2'=>'Februari',
                    '3'=>'Maret',
                    '4'=>'April',
                    '5'=>'Mei',
                    '6'=>'Juni',
                    '7'=>'Juli',
                    '8'=>'Agustus',
                    '9'=>'September',
                    '10'=>'Oktober',
                    '11'=>'November',
                    '12'=>'Desember'
                  ],null,[
                    'class'=>'form-control',
                    'placeholder' => 'Pilih Bulan']) !!}
                  {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                  {!! Form::submit('Download', ['class'=>'btn btn-primary']) !!}
                </div>
              </div>
              {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
