@extends('layout.master')

@section('content')
    <div class="container ">
        <h1 class="text-center h1-26 mb-2">DAFTAR POLLING</h1>
        <div class="card">
            <div class="card-body">
                @foreach($questions as $key => $question)
                    <a href="{{ route('polling', $question->id) }}">
                        <h5>{{ $question->question }}</h5>
                        <div class="text-secondary">Dibuat Tgl {{ $question->created_at }}</div>
                        <div class="clearfix"></div>
                        <hr>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
