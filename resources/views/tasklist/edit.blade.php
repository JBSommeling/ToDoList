@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-10 mx-auto jumbotron">
        <form action="{{ route('tasklist.update', $tasklist[0]->list_id) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}

            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
    </div>
</div>

@endsection
