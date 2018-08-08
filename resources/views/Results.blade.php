@extends('layouts.main')

@section('content')


    @if (count($questions) < 1)
        <div class="alert alert-warning" role="alert">
            Rezultatų nerasta
        </div>
    @else

        @foreach ($questions as $question)

        <h4 class="mb-3">{{ $question->question }}</h4>
        <div class="form-group">

            @if ($question->answer_type == 'text')

            <strong>{{ $question->answer }}</strong>
            
            @elseif ($question->answer_type == 'array')

            <ul>
                @foreach (json_decode($question->answer) as $an)
                    <li>{{ $an }}</li>
                @endforeach
            </ul>

            @elseif ($question->answer_type == 'image')

                <img src="{{ asset('uploads/'.$question->answer) }}" style="width: 150px;">

            @endif
        </div>

        @endforeach

    @endif


@endsection