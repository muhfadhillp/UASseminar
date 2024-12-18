@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('fakultas') }}</h1>
    <form method="POST" action="{{ url('/seminar/store') }}">
        @csrf
        <div class="row-mb3">
            <label for="nama_seminar" class="col-3 col-form-label">Seminar</label>
            <div class="col-9">
                <input type="text" class="form-control" id="nama_seminar" name="nama_seminar" value="{{ old('nama_seminar') }}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-large btn-primary">
                    simpan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection