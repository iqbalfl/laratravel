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
@include('layouts._flash')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li class="active">About Us</li>
        </ul>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">About Us</h2>
          </div>
          <div class="panel-body">

            <!-- Tambahkan About disini  -->
           <p>LaraTravel adalah perusahaan jasa transportasi Tours &amp; Travel yang sedang berkembang sampai saat ini, dari di Tahun 2015 LaraTravel terus mengembangkan usahanya di bidang jasa Tours &amp; Travel untuk memberikan pelayanan yang terbaik bagi semua pelanggan LaraTravel.</p>
             <!-- sampai sini  -->

        </div>
      </div>
    </div>
  </div>
@endsection
