@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Taken</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Gebruikersnaam</th>
                                <th scope="col">Taaknaam</th>
                                <th scope="col"></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <th scope="row">{{$task->task_id}}</th>
                                    <td>{{$task->name}}</td>
                                    <td>{{$task->task_name}}</td>
                                    <td><a class="btn" href="{{ route('admin.task.show', $task->task_id) }}"><i class="far fa-eye"></i></a>
                                        <form action="{{ url('admin/task/'.$task->task_id.'/'.$task->user_id.'/'.$task->list_id) }}" method="POST" class="float-right">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick='return validate("taak")' class="btn btn-warning"><i class="fas fa-trash-alt white"></i></button>
                                        </form></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
