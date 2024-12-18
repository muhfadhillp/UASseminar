@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('seminar') }}</h1>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-large btn-primary" 
            href="{{ url('/seminar/create') }}">Tambah Seminar</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>&nbsp;</th><th>Seminar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($seminar as $se)
            <tr>
                <td class="d-flex">
                    <a href="{{ url('/seminar/edit/'.$se->id) }}"
                    class="btn btn-primary">Edit</a>
                    &nbsp;
                    <form action="{{ url('/seminar/destroy/'.$se->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
                <td>{{ $se->nama_seminar }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2">
                    <div class="alert alert-warning">
                        tidak ada data!
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if($seminar)
    {{ $seminar->links() }}
    @endif
</div>
@endsection