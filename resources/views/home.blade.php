@extends('layouts.app')

@section('content')
    <div id="screen"></div>
    <div class="row">
        <div id="taskListsList" class="col-sm-10 offset-sm-1 col-md-4 offset-md-1 d-inline-block">
            @can('manage-guests')
                <table class="mt-4 table table-dark bg-transparent">
                    <thead>

                    </thead>
                    <tbody>
                    {{ $count = 1 }}
                    @foreach($lists as $list)
                            <tr>
                                <th scope="row">{{ $count }}</th>
                                <td><a class="btn white" href="#">{{ $list->name }}</a></td>
                                <td><a class="btn white" href="#">{{ $list->list_name }}</a></td>
                                <td>
                                    <a class="btn" href=""><i class="far fa-eye white"></i></a>
                                    <form action="{{ route('tasklist.destroy', $list->list_id) }}" method="POST" class="float-right">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" onclick='return validate()' class="btn btn-warning"><i class="fas fa-trash-alt white"></i></button>
                                    </form>
                                </td>
                                {{ $count++ }}
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            @endcan
        </div>
        @can('manage-guests')
        <div id="menu" class="col-md-4 offset-md-2 d-none d-md-inline-block">
            <div class="buttonsShownMenu">
                <div class="row col-12" data-toggle="modal" data-target="#add_list_modal">
                    <i class="fas fa-plus-circle buttons hover"></i>
                    <h3 class="buttonText d-md-none d-lg-inline-block">Lijst toevoegen</h3>
                </div>
{{--                <div class="row col-12">--}}
{{--                    <i class="fas fa-minus-circle buttons hover"></i>--}}
{{--                    <h3 class="buttonText d-md-none d-lg-inline-block">Lijsten verwijderen</h3>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="row">
        <div id="hiddenMenu" class="col-6 col-sm-4 d-sm-inline-block d-md-none hiddenMenu">
            <i class="fas fa-times-circle hover" onclick="hideMenu()"></i>
            <div class="buttonsHiddenMenu">
                <i class="fas fa-plus-circle col-12 hover buttonHiddenMenu"></i>
{{--                <i class="fas fa-minus-circle col-12 hover buttonHiddenMenu"></i>--}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="arrow">
            <i class="fas fa-chevron-right hover d-inline-block d-md-none" onclick="showMenu()"></i>
        </div>
    </div>

    <div class="modal fade" id="add_list_modal" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_list_modal_Title">Lijst toevoegen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="GET">
                        @csrf
                            <div class="form-group">
                                <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="form-group">
                                <label for="list_name">Naam van lijst:</label>
                                <input type="text" id="list_name" name="list_name" class="form-control">
                            </div>
                        <input type="submit" id="create_button" value="Maken">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    @endcan
@endsection
