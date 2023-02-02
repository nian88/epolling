@extends('layout.master')

@section('content')
    <div class="container ">
        <div class="mt-2"></div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-center h1-26">Buat Polling Anda Sendiri</h1>
                <form method="post" action="{{ route('question.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title"><b>Pertanyaan</b></label>
                        <input type="text" class="form-control form-cus" value="{{ old('question', '') }}" autofocus id="question" name="question">
                        @error('question')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label><span><b>Ketikan Pilihan Dibawah Ini</b></span></label>
                        <input type="text" class="form-control mb-1" id="option_1" value="{{ old('option_1', '') }}" name="option_1" placeholder="Pilihan">
                        @error('option_1')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        <input type="text" class="form-control mb-1" id="option_2" value="{{ old('option_2', '') }}" name="option_2" maxlength="50" placeholder="Pilihan">
                        @error('option_2')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        <input type="text" class="form-control mb-1" id="option_3" value="{{ old('option_3', '') }}" name="option_3" maxlength="50" placeholder="Pilihan">
                        @error('option_3')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="text-center">
                        @error('error')
                            <label class="alert alert-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" name="save" class="btn btn-success pl-5 pr-5 mt-2">Buat Polling</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
