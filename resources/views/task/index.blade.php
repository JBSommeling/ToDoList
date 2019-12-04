@extends('layouts.app')

@section('content')
    <div id="screen"></div>
    <div class="row">
        <div id="taskListsList" class="col-sm-10 offset-sm-1 col-md-4 offset-md-1 d-inline-block">
            @can('manage-guests')
                <table class="mt-4 table table-dark bg-transparent">
                    <thead>
                    <h3 class="white mt-4">Taken</h3>
                    </thead>
                    <tbody>
                    <?php $count=1 ?>

                    @foreach($tasks as $task)
                        <tr>
                            <th scope="row">{{ $count }}</th>
                            <td><a class="btn white" href="#">{{ $task->name }}</a></td>
                            <td><a class="btn white"  href="">@if($task->is_done == 1) <strike>{{ $task->task_name }}</strike> @else {{$task->task_name}} @endif</a></td>
                            <td>
                                <a class="btn" href="{{ route('task.edit', $task->task_id) }}"><i class="far fa-eye white"></i></a>
                                <form action="{{ url('task/'.$task->task_id.'/'.$task->user_id.'/'.$task->list_id) }}" method="POST" class="float-right">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" onclick='return validate("taak")' class="btn btn-warning"><i class="fas fa-trash-alt white"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php $count++ ?>
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
                        <h3 class="buttonText d-md-none d-lg-inline-block">Taak toevoegen</h3>
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
                <i class="fas fa-plus-circle col-12 hover buttonHiddenMenu" data-toggle="modal" data-target="#add_list_modal"></i>
                {{--                <i class="fas fa-minus-circle col-12 hover buttonHiddenMenu"></i>--}}
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
