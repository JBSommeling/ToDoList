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
                        <form action="#" method="POST">
                            <tr>
                                <th scope="row">{{ $count }}</th>
                                <td><input type="checkbox" name="task_checked[]"></td>
                                <td><a class="btn white" href="#">{{ $list->name }}</a></td>
                                <td><a class="btn white" href="#">{{ $list->list_name }}</a></td>
                                <td><a class="btn" href="#"><i class="far fa-eye white"></i></a></td>
                                {{ $count++ }}
                            </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>
            @endcan
        </div>
        @can('manage-guests')
        <div id="menu" class="col-md-4 offset-md-2 d-none d-md-inline-block">
            <div class="buttonsShownMenu">
                <div class="row col-12">
                    <i class="fas fa-plus-circle buttons hover"></i>
                    <h3 class="buttonText d-md-none d-lg-inline-block">Lijst toevoegen</h3>
                </div>
                <div class="row col-12">
                    <i class="fas fa-minus-circle buttons hover"></i>
                    <h3 class="buttonText d-md-none d-lg-inline-block">Lijsten verwijderen</h3>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div id="hiddenMenu" class="col-6 col-sm-4 d-sm-inline-block d-md-none hiddenMenu">
            <i class="fas fa-times-circle hover" onclick="hideMenu()"></i>
            <div class="buttonsHiddenMenu">
                <i class="fas fa-plus-circle col-12 hover buttonHiddenMenu"></i>
                <i class="fas fa-minus-circle col-12 hover buttonHiddenMenu"></i>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="arrow">
            <i class="fas fa-chevron-right hover d-inline-block d-md-none" onclick="showMenu()"></i>
        </div>
    </div>
    @endcan
@endsection
