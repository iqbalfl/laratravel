<!-- transaksi_id hidden -->
{!! Form::hidden('transaction_id', null , ['class'=>'form-control','readonly']) !!}

<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
  <label class="col-sm-2 control-label">Kode Transaksi</label>
  <div class="col-sm-4">
    <input type="text" class="form-control" value="{{$confirmation->transaction->code}}" readonly>
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('payment_method') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Metode Pembayaran', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
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
  {!! Form::label('name', 'Keterangan', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
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

<div class="form-group{{ $errors->has('paid_total') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Total dibayar', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::number('paid_total', null, ['class'=>'form-control']) !!}
    {!! $errors->first('paid_total', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Bukti Transfer', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    @if (isset($confirmation) && $confirmation->image)
     <p> {!! Html::image(asset('img/'.$confirmation->image), null, ['class'=>'img-rounded img-responsive']) !!} </p>
    @else
      {!! Form::text('null', 'User belum mengunggah bukti transfer', ['class'=>'form-control','readonly']) !!}
    @endif
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
