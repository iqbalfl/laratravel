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
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li><a href="{{ route('orders.index') }}">My Transaction</a></li>
          <li class="active">Confirmation</li>
        </ul>
        <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Confirmation</h2>
          </div>
          <div class="panel-body">
          {!! Form::model($transaction->confirmation, ['url' => url('/member/orders/confirmation',$transaction->confirmation->id),'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
            @include('members._conf')
            {!! Form::close() !!}
          </div>
          </div>
        </div>

        <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Bill Information</h2>
          </div>
          <div class="panel-body">
            <img src="{{ asset('img/mandiri.png') }}" class="img-responsive img-rounded" alt="Responsive image">
            <p><strong>10.17000.700 a/n Laratravel</strong></p>
            <hr/>
            <img src="{{ asset('img/bca.png') }}" class="img-responsive img-rounded" alt="Responsive image">
            <p><strong>4020.1110 a/n Laratravel</strong></p>
            <hr/>
            <img src="{{ asset('img/bri.png') }}" class="img-responsive img-rounded" alt="Responsive image">
            <p><strong>720.111.56565 a/n Laratravel</strong></p>
            <hr/>
            <img src="{{ asset('img/bni.png') }}" class="img-responsive img-rounded" alt="Responsive image">
            <p><strong>020.111.00100 a/n Laratravel</strong></p>
          </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
