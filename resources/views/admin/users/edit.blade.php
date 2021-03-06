@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit user {{$user->name}}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.user.update', $user) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                    @if($user->roles->pluck("id")->contains($role->id)) checked @endif>
{{--                                    //We want to know if this array of id's contains the current role id in the for each loop--}}
{{--                                    name is een array zodat people could check multiple roles for a user--}}
                                    <label>{{ $role->name }}</label>
                                </div>
                                @endforeach
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
