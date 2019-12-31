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
                                <th scope="col">Gebruikersnaam</th>
                                <th scope="col">Lijstnaam</th>
                                <th scope="col"></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <th scope="row">{{$list->list_id}}</th>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->list_name}}</td>
                                    <td><a class="btn" href=""><i class="far fa-eye"></i></a>
                                        <form action="{{ route('tasklist.destroy', $list->list_id) }}" method="POST" class="float-right">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick='return validate("lijst")' class="btn btn-warning"><i class="fas fa-trash-alt white"></i></button>
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
