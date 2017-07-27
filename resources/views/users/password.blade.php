@extends('adminlte::page')

@section('content')
  <div class="container-fluid spark-screen">
  @include('layouts._flash')
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">Change Password</li>
        </ul>
        <div class="box">
          <div class="box-header with-border">
            <h2 class="box-title">Change Password</h2>
          </div>
          <div class="box-body">

            {!! Form::open(['url' => url('/admin/settings/password'),'method' => 'post', 'class'=>'form-horizontal']) !!}

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::label('password', 'Password lama', ['class'=>'col-md-4 control-label']) !!}
              <div class="col-md-4">
                {!! Form::password('password', ['class'=>'form-control']) !!}
                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
              </div>
            </div>
            <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
              {!! Form::label('new_password', 'Password baru', ['class'=>'col-md-4 control-label']) !!}
              <div class="col-md-4">
                {!! Form::password('new_password', ['class'=>'form-control']) !!}
                {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
              </div>
            </div>
            <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error': '' }}">
              {!! Form::label('new_password_confirmation', 'Konfirmasi password baru', ['class'=>'col-md-4 control-label']) !!}
              <div class="col-md-4">
                {!! Form::password('new_password_confirmation', ['class'=>'form-control']) !!}
                {!! $errors->first('new_password_confirmation', '<p class="help-block">:message</p>') !!}
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4 col-md-offset-4">
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
