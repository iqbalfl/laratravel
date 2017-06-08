@extends('adminlte::page')

@section('title', 'LaraTravel')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
      		<li><a href="{{ url('/admin/transactions') }}">Transaction</a></li>
      		<li class="active">Confirmation</li>
        </ul>
        <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2 class="panel-title">Data Transaksi</h2>
              </div>
              <div class="panel-body">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Pelanggan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{$transaction->user->name}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Tempat Tujuan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{$transaction->place->name}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Mobil</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{$transaction->car->name}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Jumlah Orang</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{$transaction->total_participants}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Pergi</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{$transaction->start_date}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Kembali</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{$transaction->end_date}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Total Harga</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{$transaction->total_cost}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{$transaction->status}}" readonly>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">Confirmation</h2>
            </div>
            <div class="panel-body">
              {!! Form::model($confirmation, ['url' => route('confirmations.update', $transaction->confirmation->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
              @include('transactions._conf')
              {!! Form::close() !!}
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
