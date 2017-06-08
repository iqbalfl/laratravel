<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Deskripsi', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
