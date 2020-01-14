@can('manage-guests')
    <table class="mt-4 table table-dark bg-transparent">
        <thead>
        <h3 class="white mt-4">Taken</h3>
        </thead>
        <tbody>
        <?php $count=1 ?>
        @if (isset($tasks[0]))
        <p class="white">Sorteren op:
            <a  class="btn btn-warning" href="{{ url('task/index/'.$tasks[0]->user_id.'/'.$tasks[0]->list_id.'/complete') }}">Voltooid</a>
            <a class="btn btn-warning" href="{{ url('task/index/'.$tasks[0]->user_id.'/'.$tasks[0]->list_id.'/incomplete') }}">Onvoltooid</a>
        </p>
        <p class="white">Filteren op:
            <a href="{{ url('task/index/'.$tasks[0]->user_id.'/'.$tasks[0]->list_id.'/filter_complete') }}" class="btn btn-success">Voltooid</a>
            <a class="btn btn-success" href="{{ url('task/index/'.$tasks[0]->user_id.'/'.$tasks[0]->list_id.'/filter_incomplete') }}">Onvoltooid</a>
        </p>
        @else
            <p class="white">U heeft geen (on)voltooide taken staan.</p>
        @endif
        @foreach($tasks as $task)
            <tr>
                <th scope="row">{{ $count }}</th>
                <td><a class="btn white" href="#">{{ $task->name }}</a></td>
                <td><a class="btn white"  href="{{ route('task.edit', $task->task_id) }}">@if($task->is_done == 1) <strike>{{ $task->task_name }}</strike> @else {{$task->task_name}} @endif</a></td>
                <td>
                    <a class="btn" href="{{ route('task.show', $task->task_id) }}"><i class="far fa-eye white"></i></a>
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
