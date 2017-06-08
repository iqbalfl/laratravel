<div class="form-group{{ $errors->has('transaction_id') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Transaksi ID', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::number('transaction_id', null, ['class'=>'form-control','readonly']) !!}
    {!! $errors->first('transaction_id', '<p class="help-block">:message</p>') !!}
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

<div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Status', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('status',[
      'pending'=>'Pending',
      'confirmed'=>'Confirmed',
      'canceled' => 'Canceled'
    ],null,[
      'class'=>'form-control',
      'placeholder' => 'Pilih Status']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
