<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Merk Mobil', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('car_type_id') ? 'has-error' : '' !!}">
  {!! Form::label('car_type_id', 'Tipe Mobil', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('car_type_id', [''=>'']+App\Car_type::pluck('name','id')->all(), null,[
      'class'=>'form-control',
      'placeholder' => 'Pilih Tipe Mobil']) !!}
    {!! $errors->first('car_type_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('sheet') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Jumlah Kursi', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::number('sheet', null, ['class'=>'form-control']) !!}
    {!! $errors->first('sheet', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Harga', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('cost', null, ['class'=>'form-control']) !!}
    {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Status', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('status',['available'=>'Available', 'booked'=>'Booked'],null,[
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
