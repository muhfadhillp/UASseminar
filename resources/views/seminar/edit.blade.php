@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('seminar') }}</h1>
    <form action="{{ url('/seminar/update/'.$seminar->id) }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="nama_seminar" class="col-3 col-form-label">seminar</label>
            <div class="col-9">
                <input type="text" class="form-control" id="nama_seminar" name="nama_seminar" value="{{ old('nama_seminar') ?? $seminar->nama_seminar }}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-large btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection