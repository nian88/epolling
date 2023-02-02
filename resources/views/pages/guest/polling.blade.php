@extends('layout.master')

@section('content')
    <div class="container ">
        <h1 class="text-center h1-26 mb-2">{{ $question->question }}</h1>
        <div class="card">
            <div class="card-body text-center">
                <h4>Klik tombol pilihan anda</h4>
                <a href="{{ route('vote', ["id" => $question->id, 'value' => 'option_1']) }}" class="btn btn-primary btn-block mt-2 rounded-0">{{ $question->option_1 }}</a>
                <a href="{{ route('vote', ["id" => $question->id, 'value' => 'option_2']) }}" class="btn btn-primary btn-block mt-2 rounded-0">{{ $question->option_2 }}</a>
                <a href="{{ route('vote', ["id" => $question->id, 'value' => 'option_3']) }}" class="btn btn-primary btn-block mt-2 rounded-0">{{ $question->option_3 }}</a>
            </div>

            <div class="card-footer">
                <a href="{{ route('summary', $question->id) }}" class="btn btn-success m-1">Hasil</a>
            </div>
        </div>
    </div>
@endsection
