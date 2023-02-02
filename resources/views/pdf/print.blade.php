<!DOCTYPE html>
<html>
<head>
    <style>
        @page{
            margin: 40px;
            background-color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <table style="width: 100%;" border="1">
        <thead>
            <tr>
                <th>NO.</th>
                <th>PERTANYAAN</th>
                <th>JAWABAN 1</th>
                <th>JAWABAN 2</th>
                <th>JAWABAN 3</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $key => $question)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $question->question}}</td>
                    <td>{{ $question->option_1}}</td>
                    <td>{{ $question->option_2}}</td>
                    <td>{{ $question->option_3}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
