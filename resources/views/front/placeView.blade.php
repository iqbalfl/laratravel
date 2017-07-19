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
      <div class="col-md-9">
        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li class="active">Deskripsi Tempat</li>
        </ul>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">Deskripsi Tempat</h2>
          </div>
          <div class="panel-body">

            <div class="col-md-8">
              <h3>{{$place->name}}</h3>
              <i class="fa fa-paperclip"></i> Kategori : {{$place->category->name}}
            <div class = "media">
               <div class = "media-body">
                <img class = "img-thumbnail" src="{{asset('img/'.$place->image)}}" alt="post-image" width="400" height="300" >
                <p><p>
                  {{$place->description}}
               </div>
            </div>

            <hr />
            <h3><i class="fa fa-map-marker"></i> Lokasi</h3>
            <p>{{$place->province->name}}
            <br />{{$place->regency->name}}
            <br />{{$place->district->name}}

            <hr  />
            <h3><i class="fa fa-dollar"></i> Harga : </h3>
            <p>
              IDR {{$place->cost}}
            </p>

            <hr  />
            <a href="{{ url('member/orders/dest',$place->id) }}" class="btn btn-primary btn-lg">Pesan Sekarang</a></td>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
