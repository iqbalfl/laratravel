@extends('layouts.app')
<style type="text/css">
  body {
  padding-top: 70px;
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
          <li><a href="{{ route('orders.index') }}">My Transaction</a></li>
          <li class="active">Unggah Bukti Transfer</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Unggah Bukti Transfer</h2>
          </div>
          <div class="panel-body">
          {!! Form::open( ['url' => url('/member/orders/upconf',$transaction->confirmation->id),'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}

          <!-- transaksi_id hidden -->
          {!! Form::hidden('transaction_id', $transaction->id, ['class'=>'form-control','readonly']) !!}

            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
              <label class="col-md-3 control-label">Kode Transaksi</label>
              <div class="col-md-4">
                <input type="text" class="form-control" value="{{$transaction->code}}" readonly>
                {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
              </div>
            </div>

            <div class="form-group {!! $errors->has('payment_method') ? 'has-error' : '' !!}">
              {!! Form::label('name', 'Metode Pembayaran', ['class'=>'col-md-3 control-label']) !!}
              <div class="col-md-4">
                {!! Form::text('payment_method', $transaction->confirmation->payment_method, ['class'=>'form-control','readonly']) !!}
                {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
              </div>
            </div>

            <div class="form-group {!! $errors->has('info') ? 'has-error' : '' !!}">
              {!! Form::label('name', 'Keterangan', ['class'=>'col-md-3 control-label']) !!}
              <div class="col-md-4">
                {!! Form::text('info', $transaction->confirmation->info, ['class'=>'form-control','readonly']) !!}
                {!! $errors->first('info', '<p class="help-block">:message</p>') !!}
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Total Tagihan</label>
              <div class="col-md-4">
                <input type="text" name="total_cost" class="form-control" value="{{$transaction->total_cost}}" readonly>
              </div>
            </div>

            <div class="form-group{{ $errors->has('paid_total') ? ' has-error' : '' }}">
              {!! Form::label('name', 'Total dibayar', ['class'=>'col-md-3 control-label']) !!}
              <div class="col-md-4">
                  {!! Form::text('paid_total', $transaction->confirmation->paid_total, ['class'=>'form-control','readonly']) !!}
                  {!! $errors->first('paid_total', '<p class="help-block">:message</p>') !!}
              </div>
            </div>

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
              {!! Form::label('name', 'Bukti Transfer', ['class'=>'col-md-3 control-label']) !!}
              <div class="col-md-4">
                {!! Form::file('image') !!}
                @if (isset($transaction->confirmation) && $transaction->confirmation->image)
                 <p> {!! Html::image(asset('img/'.$transaction->confirmation->image), null, ['class'=>'img-rounded img-responsive']) !!} </p>
                @endif
                {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-8 col-md-offset-2">
                {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
              </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
