@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4>Detail Buku</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<strong>Judul</strong> {{$book->judul}}
			</div>

			<div class="form-group">
				<strong>Penerbit : </strong> {{$book->penerbit}}
			</div>

			<div class="form-group">
				<strong>Tahun terbit : </strong> {{$book->tahun_terbit}}
			</div>

			<div class="form-group">
				<strong>Pengarang :</strong> {{$book->pengarang}}
			</div>
			</div>
			<div class="col-md-12">
				<a href="{{route('book.index')}}" class="btn btn-sm btn-success">Back</a>
			</div>
		</div>
	</div>
@endsection