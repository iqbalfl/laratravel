@extends('layouts.app')
<style type="text/css">
  body {
  padding-top: 70px;
  background: url({{asset('/front/img/196_365_2048x1365.jpg')}})
  no-repeat center center fixed;
  -webkit-background-size:cover;
  -moz-background-size:cover;
  -o-background-size:cover;
  background-size:cover;
}
</style>
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li>My Transaction</li>
          <li>New order</li>
          <li class="active">Order Info</li>
        </ul>
        <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Order Info</h2>
          </div>
          <div class="panel-body">
            {!! Form::model($transaction, ['url' => route('orders.update', $transaction->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
              <div class="form-group">
                <label class="col-sm-3 control-label">Kode Transaksi</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="{{$transaction->code}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Pelanggan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="{{$transaction->user->name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tempat Tujuan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="{{$transaction->place->name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Mobil</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="{{$transaction->car->name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Jumlah Orang</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="{{$transaction->total_participants}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Pergi</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="{{$transaction->start_date}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Kembali</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="{{$transaction->end_date}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Detail Harga</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control"
                  value="[Tempat = {{$transaction->place->cost}}] + [Mobil = {{$transaction->car->cost}}]" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Total Harga</label>
                <div class="col-sm-8">
                  <input type="text" name="total_cost" class="form-control" value="{{$cost}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                  {!! Form::submit('Selesai', ['class'=>'btn btn-primary']) !!}
                </div>
              </div>
              </div>
             {!! Form::close() !!}
          </div>
        </div>

        <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Bill Information</h2>
          </div>
          <div class="panel-body">
            <img src="{{ asset('img/mandiri.png') }}" class="img-responsive img-rounded" alt="Responsive image">
            <p><strong>10.17000.700 a/n Laratravel</strong></p>
            <hr/>
            <img src="{{ asset('img/bca.png') }}" class="img-responsive img-rounded" alt="Responsive image">
            <p><strong>4020.1110 a/n Laratravel</strong></p>
            <hr/>
            <img src="{{ asset('img/bri.png') }}" class="img-responsive img-rounded" alt="Responsive image">
            <p><strong>720.111.56565 a/n Laratravel</strong></p>
            <hr/>
            <img src="{{ asset('img/bni.png') }}" class="img-responsive img-rounded" alt="Responsive image">
            <p><strong>020.111.00100 a/n Laratravel</strong></p>
          </div>
          </div>
        </div>

       </div>
      </div>
    </div>
@endsection
