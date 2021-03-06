<!-- transaksi_id hidden -->
{!! Form::hidden('transaction_id', $transaction->id, ['class'=>'form-control','readonly']) !!}

<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
  <label class="col-sm-3 control-label">Kode Transaksi</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" value="{{$transaction->code}}" readonly>
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('payment_method') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Metode Pembayaran', ['class'=>'col-md-3 control-label']) !!}
  <div class="col-sm-8">
    {!! Form::select('payment_method',[
      'Transfer'=>'Transfer',
      'Cash'=>'Cash'
    ],null,[
      'class'=>'form-control',
      'placeholder' => 'Pilih Metode Pembayaran']) !!}
    {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('info') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Keterangan', ['class'=>'col-md-3 control-label']) !!}
  <div class="col-sm-8">
    {!! Form::select('info',[
      'BCA'=>'BCA',
      'Mandiri'=>'Mandiri',
      'BNI'=>'BNI',
      'BRI'=>'BRI',
      'Cash' =>'Cash',
    ],null,[
      'class'=>'form-control',
      'placeholder' => 'Keterangan Pembayaran']) !!}
    {!! $errors->first('info', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label">Total Tagihan</label>
  <div class="col-sm-8">
    <input type="text" name="total_cost" class="form-control" value="{{$transaction->total_cost}}" readonly>
  </div>
</div>

<div class="form-group{{ $errors->has('paid_total') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Total dibayar', ['class'=>'col-md-3 control-label']) !!}
  <div class="col-sm-8">
      {!! Form::number('paid_total', null, ['class'=>'form-control']) !!}
      {!! $errors->first('paid_total', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Bukti Transfer', ['class'=>'col-md-3 control-label']) !!}
  <div class="col-sm-8">
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
