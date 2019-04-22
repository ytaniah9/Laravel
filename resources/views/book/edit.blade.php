@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4>Buku</h4>
		</div>
	</div>

	@if ($errors->any())
	<div class="alert alert-danger">
		<strong>Ups !!! </strong>there where some problem with your input.<br>
		<ul>
			@foreach ($errors as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="{{ route('book.update', $book->id) }}" method="post">
		@csrf
		@method('PUT')
		<div class="row">
			<div class="col-md-12">
				<strong>Judul</strong>
				<input type="text" name="judul" class="form-control" value="{{$perpus->judul}}">
			</div>
			<div class="col-md-12">
				<strong>Penerbit</strong>
				<input type="text" name="penerbit" class="form-control" value="{{$perpus->penerbit}}">
			</div>
			<div class="col-md-12">
				<strong>Tahun terbit</strong>
				<input type="text" name="tahun_terbit" class="form-control" value="{{$perpus->tahun_terbit}}">
			</div>
			<div class="col-md-12">
				<strong>Pengarang</strong>
				<input type="text" name="pengarang" class="form-control" value="{{$perpus->pengarang}}">
			</div>
			<div class="col-md-12"><br>
				<a href="{{ route('book.index')}}" class="btn btn-sm btn-success">Back</a>
				<button type="submit" class="btn btn-sm btn-primary">Save</button>
			</div>
		</div>
	</form>
</div>
@endsection