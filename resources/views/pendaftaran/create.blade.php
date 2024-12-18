@extends('layouts.app')
@section('content')
<div class="container">
<h1>{{ __('Pendaftaran') }}</h1>
<form method="post" action="{{ url('/pendaftaran/store') }}"
enctype="multipart/form-data">
@csrf
<div class="row mb-3">
<label for="nama_lengkap" class="col-3 col-form-label">
Nama Lengkap
</label>
<div class="col-9">
<input type="text" class="form-control" id="nama_lengkap"
name="nama_lengkap" value="{{ old('nama_lengkap') }}"/>
</div>
</div>
<div class="row mb-3">
<label for="alamat" class="col-3 col-form-label">Alamat</label>
<div class="col-9">
<input type="text" class="form-control" id="alamat"
name="alamat" value="{{ old('alamat') }}"/>
</div>
</div>
<div class="row mb-3">
<label for="kota" class="col-3 col-form-label">Kota</label>
<div class="col-9">
<input type="text" class="form-control" id="kota"
name="kota" value="{{ old('kota') }}"/>
</div>
</div>
<div class="row mb-3">
<label for="tanggal_lahir" class="col-3 col-form-label">Tgl Lahir</label>
<div class="col-9">
<input type="text" class="form-control" id="tanggal_lahir"
name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"/>
</div>
</div>
<div class="row mb-3">
<label for="asal_sekolah" class="col-3 col-form-label">
Asal Sekolah
</label>
<div class="col-9">
<input type="text" class="form-control" id="asal_sekolah"
name="asal_sekolah" value="{{ old('asal_sekolah') }}"/>
</div>
</div>
</select>
</div>
</div>
<div class="row">
<div class="col-md-12">
<button type="submit" class="btn btn-large btn-primary">
Daftar
</button>
</div>
</div>
</form>
</div>
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
(function() {
flatpickr('#tanggal_lahir', {});
})();
</script>
@endsection