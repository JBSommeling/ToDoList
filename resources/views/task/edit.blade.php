@extends('layouts.app')

@section('content')
    <div class="jumbotron col-12 col-md-6 mx-auto">
        <form action="{{ url('task/'.$task[0]->task_id) }}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <input type="hidden" name="user_id" value="{{ $task[0]->user_id }}">
            <input type="hidden" name="list_id" value="{{ $task[0]->list_id }}">
            <div class="form-group">
                <label for="edit_task_name" class="white">Naam van taak:</label>
                <input type="text" name="edit_task_name" class="form-control @error('edit_task_name') is-invalid @enderror" id="edit_task_name" value="{{ $task[0]->task_name }}">
            </div>
            @error('edit_task_name')
            <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="edit_task_description" class="white">Taak omschrijving:</label>
                <textarea name="edit_task_description" id="edit_task_description" class="form-control" cols="30" rows="10">{{ $task[0]->task_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="edit_is_done" class="white">Voltooid:</label>
                <input class="form-control d-inline-block" type="checkbox" name="edit_is_done" id="edit_is_done" @if($task[0]->is_done == 1) checked @endif>
            </div>
            <button type="submit" class="btn btn-primary float-left mr-4">Opslaan</button>
        </form>
        <a href="{{ url('task/index/'. $task[0]->user_id .'/'. $task[0]->list_id) }}"><input type="button" class="btn btn-danger float-left" value="Terug"></a>
    </div>
@endsection

