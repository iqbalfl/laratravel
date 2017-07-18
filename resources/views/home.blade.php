@extends('adminlte::page')

@section('htmlheader_title')
	{{ config('app.name') }}
@endsection

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
 <div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-12">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Artikel</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<p>Selamat Datang Admin</p>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
		</div>
	</div>
</div>
@stop

@extends('adminlte::layouts.app')
