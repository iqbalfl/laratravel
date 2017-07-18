@extends('layouts.app')
<style type="text/css">
  body {
  padding-top: 70px;
  background: url({{asset('/front/img/196_365_2048x1365.jpg')}})
  no-repeat center center fixed;
  -webkit-background-size:cover;
  -moz-background-size:cover;
  -o-background-size:cover;
  background-size:cover;
}
</style>
@section('content')
  <div class="container">
  @include('layouts._flash')
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">My Profile</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">My Profile</h2>
          </div>
          <div class="panel-body">

          {!! Form::model($user, ['url' => url('/member/settings/'),'method'=>'post', 'class'=>'form-horizontal']) !!}
              <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title" class="col-md-2 control-label">Nama</label>
                <div class="col-md-4">
                  <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
                <label for="title" class="col-md-2 control-label">Username</label>
                <div class="col-md-4">
                  <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                  @if ($errors->has('username'))
                      <span class="help-block">
                          <strong>{{ $errors->first('username') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="title" class="col-md-2 control-label">Email</label>
                <div class="col-md-4">
                  <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group has-feedback {{ $errors->has('mobile_phone') ? 'has-error' : '' }}">
                <label for="title" class="col-md-2 control-label">Nomor hp</label>
                <div class="col-md-4">
                  <input type="text" name="mobile_phone" class="form-control" value="{{ $user->mobile_phone }}">
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('mobile_phone') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                  {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                </div>
              </div>
          {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
