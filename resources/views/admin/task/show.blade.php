@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Taken</div>
                    <div class="card-body">
                        <h3>{{$task[0]->task_name}}</h3>
                        <p>{{$task[0]->task_description}}</p>
                        <small>Auteur: {{ $task[0]->name}}</small>
                        <br>
                        <small>status: @if($task[0]->is_done == 1) voltooid. @else onvoltooid. @endif</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
