@extends('layout.master')

@section('content')
    <div class="container ">
        <div class="mt-2"></div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-center h1-26">Perbaharui Polling</h1>
                <form method="post" action="{{ route('question.update', $question->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="title"><b>Pertanyaan</b></label>
                        <input type="text" class="form-control form-cus" value="{{ old('question', $question->question) }}" autofocus id="question" name="question">
                        @error('question')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label><span><b>Ketikan Pilihan Dibawah Ini</b></span></label>
                        <input type="text" class="form-control mb-1" id="option_1" value="{{ old('option_1', $question->option_1) }}" name="option_1" placeholder="Pilihan">
                        @error('option_1')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror

                        <input type="text" class="form-control mb-1" id="option_2" value="{{ old('option_2', $question->option_2) }}" name="option_2" maxlength="50" placeholder="Pilihan">
                        @error('option_2')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror

                        <input type="text" class="form-control mb-1" id="option_3" value="{{ old('option_3', $question->option_3) }}" name="option_3" maxlength="50" placeholder="Pilihan">
                        @error('option_3')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="text-left">
                        <input type="checkbox" class="mb-1" @if($question->is_publish) checked @endif id="is_publish" name="is_publish"> Dipublikasi
                        @error('is_publish')
                            <label class="alert alert-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="text-center">
                        @error('error')
                        <label class="alert alert-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="text-center">
                        <a href="{{ route('question.list') }}" class="btn btn-primary pl-5 pr-5 mt-2">Daftar Poling</a>
                        <button type="submit" name="save" class="btn btn-success pl-5 pr-5 mt-2">Perbaharui Polling</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
