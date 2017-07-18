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
          <li class="active">by budget search result</li>
        </ul>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">by budget search result ...</h2>
          </div>
          <div class="panel-body">
              <table class="table table-striped">
                <thead>
                  <th>#</th>
                  <th>Nama Tempat</th>
                  <th>Deskripsi</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>-</th>
                </thead>
                <tbody>
                  @if($places->count())
                    @foreach($places as $key => $place)
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $place->name }}</td>
                        <td>{{ $place->description }}</td>
                        <td>{{ $place->category->name }}</td>
                        <td>{{ $place->cost }}</td>
                        <td><a href="{{ url('member/orders/dest',$place->id) }}" class="btn btn-primary">Pesan</a></td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="4">There are no data.</td>
                    </tr>
                  @endif
                </tbody>
              </table>
              {{ $places->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
