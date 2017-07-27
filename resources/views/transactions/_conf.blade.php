<!-- transaksi_id hidden -->
{!! Form::hidden('transaction_id', $transaction->id, ['class'=>'form-control','readonly']) !!}

<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
  <label class="col-md-3 control-label">Kode Transaksi</label>
  <div class="col-md-9">
    <input type="text" class="form-control" value="{{$transaction->code}}" readonly>
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('payment_method') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Metode Pembayaran', ['class'=>'col-md-3 control-label']) !!}
  <div class="col-md-9">
    {!! Form::select('payment_method',[
      'Transfer'=>'Transfer',
      'Cash'=>'Cash'
    ],$transaction->confirmation->payment_method,[
      'class'=>'form-control',
      'placeholder' => 'Pilih Metode Pembayaran']) !!}
    {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('info') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Keterangan', ['class'=>'col-md-3 control-label']) !!}
  <div class="col-md-9">
    {!! Form::select('info',[
      'BCA'=>'BCA',
      'Mandiri'=>'Mandiri',
      'BNI'=>'BNI',
      'BRI'=>'BRI',
      'Cash' =>'Cash',
    ],$transaction->confirmation->info,[
      'class'=>'form-control',
      'placeholder' => 'Keterangan Pembayaran']) !!}
    {!! $errors->first('info', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('paid_total') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Total dibayar', ['class'=>'col-md-3 control-label']) !!}
  <div class="col-md-9">
      {!! Form::number('paid_total', $transaction->confirmation->paid_total, ['class'=>'form-control']) !!}
      {!! $errors->first('paid_total', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Bukti Transfer', ['class'=>'col-md-3 control-label']) !!}
  <div class="col-md-9">
    @if (isset($transaction->confirmation) && $transaction->confirmation->image)
     <p> {!! Html::image(asset('img/'.$transaction->confirmation->image), null, ['class'=>'img-rounded img-responsive']) !!} </p>
    @else
      {!! Form::text('null', 'User belum mengunggah bukti transfer', ['class'=>'form-control','readonly']) !!}
    @endif
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Status', ['class'=>'col-md-3 control-label']) !!}
  <div class="col-md-9">
    {!! Form::select('status',[
      'pending'=>'Pending',
      'confirmed'=>'Confirmed',
      'canceled' => 'Canceled'
    ],$transaction->confirmation->status,[
      'class'=>'form-control',
      'placeholder' => 'Pilih Status']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-9 col-md-offset-2">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
