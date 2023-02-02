@extends('layout.master')

@section('content')
    <div class="container ">
        <div class="mt-2"></div>
        <div class="card">
            <div class="card-header">
                <a href="{{ route('question.add') }}" class="btn btn-primary m-1">Tambah Poling</a>
                <a target="_blank" href="{{ route('question.print') }}" class="btn btn-success m-1">Cetak</a>
            </div>
            <div class="card-body">
                <table class="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $key => $question)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $question->question }}</td>
                                <td>
                                    @if($question->is_publish)
                                        <div class="badge badge-success">Published</div>
                                    @else
                                        <div class="badge badge-danger">UnPublished</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('question.detail', $question->id) }}" class="btn btn-primary m-1">Edit</a>
                                    <a href="{{ route('question.destroy', $question->id) }}" class="btn btn-danger m-1">Hapus</a>
                                    <a href="{{ route('summary', $question->id) }}" class="btn btn-success m-1">Hasil</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
