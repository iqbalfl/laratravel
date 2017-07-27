<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Username', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('username', null, ['class'=>'form-control']) !!}
    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
  {!! Form::label('email', 'Email', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('mobile_phone') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Telepon', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::number('mobile_phone', null, ['class'=>'form-control']) !!}
    {!! $errors->first('mobile_phone', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
