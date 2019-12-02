@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-10 col-md-4 mx-auto jumbotron">
        <form action="{{ route('tasklist.update', $tasklist[0]->list_id) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}

            <div class="form-group">
                <input type="text" class="form-control @error('edit_list_name') is-invalid @enderror" name="edit_list_name" id="edit_list_name"  value="{{ $tasklist[0]->list_name }}">
            </div>
            @error('edit_list_name')
            <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
    </div>
</div>

@endsection
