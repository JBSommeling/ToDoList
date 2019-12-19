@extends('layouts.app')

@section('content')
    <div class="jumbotron col-12 col-md-6 mx-auto white">
        @foreach($task as $tasks)
            <h3>{{$tasks->task_name}}</h3>
            <p>{{$tasks->task_description}}</p>
            <small>Auteur: {{ $tasks->name}}</small>
            <br>
            <small>status: @if($tasks->is_done == 1) voltooid. @else onvoltooid. @endif</small>
        @endforeach
    </div>
@endsection
