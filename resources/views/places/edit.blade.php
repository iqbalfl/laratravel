@extends('adminlte::page')

@section('title', 'LaraTravel')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
      		<li><a href="{{ url('/admin/places') }}">Place</a></li>
      		<li class="active">Edit place</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Edit place</h2>
          </div>
          <div class="panel-body">
            {!! Form::model($place, ['url' => route('places.update', $place->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
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
                    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>
                <div class="form-group {!! $errors->has('category_id') ? 'has-error' : '' !!}">
                  {!! Form::label('category_id', 'Kategori Tempat', ['class'=>'col-md-2 control-label']) !!}
                  <div class="col-md-4">
                    {!! Form::select('category_id', [''=>'']+App\Category::pluck('name','id')->all(), null,[
                      'class'=>'form-control',
                      'placeholder' => 'Pilih Kategori']) !!}
                    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="title" class="col-md-2 control-label">Propinsi</label>
                  <div class="col-md-4">
                  <select name="province_id" class="form-control" style="width:350px">
                    <option value="{{$place->province_id}}">{{$place->province->name}}</option>
                    <option value="">--- Pilih Propinsi ---</option>
                    @foreach($propinsi as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-md-2 control-label">Kabupaten/kota</label>
                  <div class="col-md-4">
                  <select name="regency_id" class="form-control" style="width:350px">
                    <option value="{{$place->regency_id}}">{{$place->regency->name}}</option>
                    <option value="">--- Pilih Kabupaten/kota ---</option>
                  </select>
                </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-md-2 control-label">Kecamatan</label>
                  <div class="col-md-4">
                  <select name="district_id" class="form-control" style="width:350px">
                    <option value="{{$place->district_id}}">{{$place->district->name}}</option>
                    <option value="">--- Pilih Kecamatan ---</option>
                  </select>
                </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-md-2 control-label">Kelurahan</label>
                  <div class="col-md-4">
                  <select name="village_id" class="form-control" style="width:350px">
                    <option value="{{$place->village_id}}">{{$place->village->name}}</option>
                    <option value="">--- Pilih Kelurahan ---</option>
                  </select>
                </div>
                </div>

                <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                  {!! Form::label('name', 'Harga', ['class'=>'col-md-2 control-label']) !!}
                  <div class="col-md-4">
                    {!! Form::text('cost', null, ['class'=>'form-control']) !!}
                    {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>
                    {!! Form::hidden('admin_id',Auth::user()->id,['class'=>'form-control']) !!}
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
@section('js')
  <script type="text/javascript">
    $(document).ready(function()
    {
        $('select[name="province_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID)
            {
                $.ajax({
                    url: '/admin/places/kabupaten/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data)
                    {
                        console.log(data);
                        $('select[name="regency_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="regency_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else
            {
                $('select[name="regency_id"]').empty();
            }
        });
    });

    $(document).ready(function()
    {
        $('select[name="regency_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID)
            {
                $.ajax({
                    url: '/admin/places/kecamatan/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data)
                    {
                        console.log(data);
                        $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else
            {
                $('select[name="district_id"]').empty();
            }
        });
    });

    $(document).ready(function()
    {
        $('select[name="district_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID)
            {
                $.ajax({
                    url: '/admin/places/kelurahan/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data)
                    {
                        console.log(data);
                        $('select[name="village_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="village_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else
            {
                $('select[name="village_id"]').empty();
            }
        });
    });
</script>
@endsection
