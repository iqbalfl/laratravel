<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
  <label class="col-md-2 control-label">Kode Transaksi</label>
  <div class="col-md-4">
    <input type="text" class="form-control" value="{{$transaction->code}}" readonly>
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('user_id') ? 'has-error' : '' !!}">
  {!! Form::label('user_id', 'Nama Pelanggan', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('user_id', [''=>'']+App\User::pluck('name','id')->all(), null,[
      'class'=>'form-control',
      'placeholder' => 'Pilih Pelanggan']) !!}
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('place_id') ? 'has-error' : '' !!}">
  {!! Form::label('place_id', 'Tempat Tujuan', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('place_id', [''=>'']+App\Place::pluck('name','id')->all(), null,[
      'class'=>'form-control',
      'placeholder' => 'Pilih Ttempat Tujuan']) !!}
    {!! $errors->first('place_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('car_id') ? 'has-error' : '' !!}">
  {!! Form::label('car_id', 'Merk Mobil', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('car_id', [''=>'']+App\Car::pluck('name','id')->all(), null,[
      'class'=>'form-control',
      'placeholder' => 'Pilih Merk Mobil']) !!}
    {!! $errors->first('car_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('total_participants') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Jumlah Orang', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::number('total_participants', null, ['class'=>'form-control']) !!}
    {!! $errors->first('total_participants', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Tanggal Pergi', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::date('start_date', null, ['class'=>'form-control']) !!}
    {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Tanggal Kembali', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::date('end_date', null, ['class'=>'form-control']) !!}
    {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('total_cost') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Harga', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::number('total_cost', null, ['class'=>'form-control']) !!}
    {!! $errors->first('total_cost', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Status', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('status',[
      'pending'=>'Pending',
      'confirmed'=>'Confirmed',
      'completed' => 'Completed',
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
