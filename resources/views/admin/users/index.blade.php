@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                             <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Naam</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rollen</th>
                                    <th scope="col">Acties</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    @if(\Illuminate\Support\Facades\Gate::check('edit-users'))
                                        <td><a class="btn" href="{{ route('admin.tasklist.show', $user->id )}}">{{$user->name}}</a></td>
                                    @else
                                        <td>{{$user->name}}</td>
                                    @endif
                                    <td>{{$user->email}}</td>
                                    <td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                                    <td>
                                        @can('edit-users')
                                        <a href="{{route('admin.user.edit', $user->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                        @endcan
                                        @can('delete-users')
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="float-left">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
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
